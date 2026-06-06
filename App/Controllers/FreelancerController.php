<?php
declare(strict_types=1);

namespace App\Controllers;
use App\Core\Controller;
use App\Services\{FreelancerService, contratoService, TrabalhoService, PropostaService, UserService};

class FreelancerController extends Controller
{
	public function __construct(
		protected FreelancerService $freelancer,
		protected contratoService   $contrato,
		protected TrabalhoService   $trabalho,
		protected PropostaService   $proposta,
		protected UserService       $usuario
	){}

	public function index(): void 
	{
		if(!$this->usuario->isLogged()) {
			$this->redirect('/login');
		}

		$freelancers = $this->freelancer->getTodosFreelancers();

		$this->view('freelancers', [
			'freelancer' => $freelancers
		]);

	}

	public function perfil(int $id): void
	{
		$contrato = $this->contrato->getContratosByFreelancer($id);
		$freelancer = $this->freelancer->getByFreelancerByUserId($id);
		
		$this->view('perfil_freelancer', [
			'contrato' => $contrato,
			'freelancer' => $freelancer[0]
		]);
	}

	public function trabalhos(): void
	{
		$user = $_SESSION['USER'][0];
		if($user && $user->role === 'freelancer') {
			$freelancer = $this->freelancer->getByFreelancerByUserId($user->id);

			$trabalhos = $this->trabalho->getTrabalhosByFreelancer($freelancer[0]->id);
		}
		
		$this->view('freelancer_dashboard', [
			'trabalhos' => $trabalhos
		]);
	}

	public function contratos(): void
	{
		$user = $_SESSION['USER'][0];
		if($user && $user->role === 'freelancer') {
			$freelancer = $this->freelancer->getByFreelancerByUserId($user->id);

			$contratos = $this->contrato->getContratosByFreelancer($user->id);
		}

		$this->view('freelancer_contratos', [
			'contratos' => $contratos
		]);
	}

	public function propostas(): void
	{
		$user = $_SESSION['USER'][0];
		if($user && $user->role === 'freelancer') {
			$freelancer = $this->freelancer->getByFreelancerByUserId($user->id);
			$propostas = $this->proposta->getPropostasByFreelancer($user->id);
		}

		$this->view('freelancer_propostas', [
				'propostas' => $propostas
		]);
	}

	public function create(): void 
	{

		if ($_SERVER['REQUEST_METHOD'] === 'POST') {

			$dados_freelancer = [
				'user_id'             => $_SESSION['signup_user_id'] ?? null,
				'titulo_profissional' => $_POST['titulo_profissional'] ?? null,
				'bio' 				  => $_POST['bio'] ?? null,
				'nivel'               => $_POST['nivel'],
				'disponibilidade'     => $_POST['disponibilidade'],
			];

			$skills = [
				'nome' => $_POST['titulo_profissional']
			];

			$this->freelancer->create($dados_freelancer, $skills);
			$this->redirect('/login');
		}

		$this->view('criar_freelancers', []);
	}

}