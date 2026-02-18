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

	public function update(int $idTrabalho)
	{
		if (!$idTrabalho) {
			echo "This id appearing";
		}

		$trabalho = $this->trabalho->getSingleTodo($idTrabalho);

		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$this->trabalho->update($idTrabalho, $_POST);
		}

		$this->view('editar_trabalho', [
			'trabalho' => $trabalho[0]
		]);
	}

	public function delete(int $idTrabalho)
	{
		if(!$idTrabalho) {
			echo "this id is not appear";
		}

		$trabalho = $this->trabalho->getSingleTodo($idTrabalho);

		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$this->trabalho->delete($idTrabalho);
		}

		$this->view('deletar_trabalho', [
			'trabalho' => $trabalho[0]
		]);
	}
}


