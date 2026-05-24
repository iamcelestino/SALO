<?php
declare(strict_types=1);

namespace App\Controllers;
use App\Core\Controller;
use App\Services\ClienteService;

class ClienteController extends Controller
{
	public function __construct(
		protected ClienteService $cliente
	){}

	public function index(): void 
	{
		$this->view('clientes', []);
<<<<<<< HEAD
=======

>>>>>>> 82131aa (add more files)
	}

	public function create(): void 
	{
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			
			$dados_cliente = [
				'user_id'      => $_SESSION['signup_user_id'] ?? null,
				'nif'          => $_POST['nif'],
				'empresa_nome' => $_POST['empresa_nome'],
				'sector'       => $_POST['sector']
			];
<<<<<<< HEAD

=======
>>>>>>> 82131aa (add more files)
			$this->cliente->create($dados_cliente);
		}

		$this->view('criar_cliente', []);
	}
}