<?php
declare(strict_types=1);

namespace App\Controllers;
use App\Core\Controller;
use App\Services\{TrabalhoService, ClienteService};

class TrabalhoController extends Controller
{
	public function __construct(
		protected TrabalhoService $trabalho,
		protected ClienteService $cliente
	){}

	public function index(): void 
	{
		$trabalhos = $this->trabalho->getTodosTrabalhos();

		dd($trabalhos);

		$this->view('trabalhos',
			[
				'trabalhos' => $trabalhos
			]
		);
	}

	public function create(): void 
	{
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {

			$userId = $_SESSION['signup_user_id'];

			$clienteId = $this->cliente->getClienteById($userId);

			$_POST['client_id'] = $clienteId[0]->id;

			$this->trabalho->create($_POST);
		}

		$this->view('criar_trabalho', []);
	}
}


