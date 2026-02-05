<?php
declare(strict_types=1);

namespace App\Controllers;
use App\Core\Controller;
use App\Services\FreelancerService;

class FreelancerController extends Controller
{
	public function __construct(
		protected FreelancerService $freelancer
	){}

	public function index(): void 
	{
		$this->view('', []);
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
		}

		$this->view('criar_freelancers', []);
	}
}