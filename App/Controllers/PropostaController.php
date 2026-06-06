<?php 
declare(strict_types=1);

namespace App\Controllers;
use App\Core\Controller;
use App\Services\{PropostaService, FreelancerService, UserService};

class PropostaController extends Controller
{
	public function __construct(
		protected FreelancerService $freelancer,
		protected PropostaService   $proposta,
		protected UserService       $usuario
	){}
	
	public function index(): void 
	{
		if(!$this->usuario->isLogged()) {
			$this->redirect('/login');
		}

		$userId = $_SESSION['USER'][0]->id ?? null;
		dd($_SESSION['USER']);
		
		$freelancer = $this->freelancer->getByFreelancerByUserId($userId);
		$freelancer_id = $freelancer[0]->id;

		$propostas = $this->proposta->getPropostaByFreelancer($freelancer_id);

		$this->view('propostas', 
			[
				'propostas' => $propostas
			]
		);
	}

	public function create(int $id): void 
	{
		if(($this->usuario->isLogged()) && !($_SESSION['USER'][0]->role === 'freelancer')) {
			echo "Apenas Freelancer Enviam Propostas";
			$this->redirect('/login');
		}

		if(!$id) {
			echo "Quer enviar a proposta para que trabalho?";
		}

		$trabalhoId = $id;

		$userId = $_SESSION['USER'][0]->id ?? null;

		// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		// 	$_POST['trabalhos_id'] = $trabalhoId;
		// 	$_POST['freelancer_id'] = getloggedInFreelancer($userId, $this->freelancer) ?? null;
		// 	$this->proposta->create($_POST);
		// 	$this->redirect('/trabalhos');
		// }
		$this->view('criar_proposta',['trabalhoId' => $trabalhoId]);
		$this->redirect('/dashboard');
	}

	public function update(int $id): void 
	{
		if (!$id) {
			echo "this is doesnt exist";
		}

		$proposta = $this->proposta->getPropostaById($id);

		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$this->proposta->update($id, $_POST);
		}

		$this->view('editar_proposta', [
			'proposta' => $proposta[0]
		]);
	}

	public function delete(int $id): void
	{
		if (!$id) {
			echo "this does't exist";
		}

		$proposta = $this->proposta->getPropostaById($id);

		if ($_SERVER['REQUEST_METHOD']) {
			$this->proposta->delete($id);
		}

		$this->view('deletar_proposta', [
			'proposta' => $proposta[0]
		]);
	}

}