<?php
declare(strict_types=1);

namespace App\Controllers;
use App\Core\Controller;
use App\Services\{ClienteService, TrabalhoService, ContratoService, UserService, PropostaService};

class ClienteController extends Controller
{
	public function __construct(
		protected ClienteService  $cliente,
		protected TrabalhoService $trabalho,
		protected ContratoService $contrato,
		protected UserService     $usuario,
		protected PropostaService $proposta
	){}

	public function index(): void 
	{
		if(!$this->usuario->isLogged()) {
			$this->redirect('/login');
		}

		 $clientes = $this->cliente->getTodosClientes();
 
	    $this->view('clientes', [
	        'clientes' => $clientes,
	    ]);
	}

	public function trabalhos(): void 
	{
		$user = $_SESSION['USER'][0];
		if($user && $user->role === 'cliente') {
			$cliente = $this->cliente->getClienteById($user->id);
			$todosTrabalhos = $this->trabalho->getTodosTrabalhoByCliente($cliente[0]->id);
		}

		$this->view('clientes_trabalhos', [
			'trabalhos' => $todosTrabalhos ?? []
		]);
	}

	public function contrato(): void 
	{
		$user = $_SESSION['USER'][0];
		if($user && $user->role === 'cliente') {
			$cliente = $this->cliente->getClienteById($user->id);
			$contratos = $this->contrato->getContratosByCliente($cliente[0]->id);
		}

		$this->view('clientes_contratos', [
			'contratos' => $contratos
		]);
	}


	public function propostas(): void
	{
		$user = $_SESSION['USER'][0];
		if($user && $user->role === 'cliente') {
			$cliente = $this->cliente->getClienteById($user->id);
			$propostas = $this->proposta->getPropostasByCliente($user->id);
		}

		$this->view('cliente_propostas', [
				'propostas' => $propostas
		]);
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

			$this->cliente->create($dados_cliente);
			$this->redirect('/login');
		}

		$this->view('criar_cliente', []);
	}
}