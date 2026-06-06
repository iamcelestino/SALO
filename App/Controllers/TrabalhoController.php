<?php
declare(strict_types=1);

namespace App\Controllers;
use App\Core\Controller;
use App\Services\{TrabalhoService, ClienteService, UserService};

class TrabalhoController extends Controller
{
	public function __construct(
		protected TrabalhoService $trabalho,
		protected ClienteService $cliente,
		protected UserService    $usuario
	){}

	public function index(): void 
	{
		if(!$this->usuario->isLogged()) {
			$this->redirect('/login');
		}
		
		$trabalhos = $this->trabalho->getTodosTrabalhos();

		$this->view('trabalhos',
			[
				'trabalhos' => $trabalhos
			]
		);
	}

	public function create(): void 
	{
		if(($this->usuario->isLogged()) && !($_SESSION['USER'][0]->role === 'cliente')) {
			echo "Apenas Clientes postam trabalho, inscreva-se como cliente";
			$this->redirect('/login');
		}

		if ($_SERVER['REQUEST_METHOD'] === 'POST') {

			$userId = $_SESSION['USER'][0]->id;

			$clienteId = $this->cliente->getClienteById($userId);

			$_POST['client_id'] = $clienteId[0]->id;

			$this->trabalho->create($_POST);
			$this->redirect('/trabalhos');
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


