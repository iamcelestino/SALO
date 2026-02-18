<?php 
declare(strict_types=1);

namespace App\Controllers;
use App\Core\Controller;
use App\Services\{PropostaService, FreelancerService};

class PropostaController extends Controller
{
	public function __construct(
		protected FreelancerService $freelancer,
		protected PropostaService $proposta
	){}

	public function index(): void 
	{
		$userId = $_SESSION['signup_user_id'] ?? null;
		$freelancer = $this->freelancer->getByUserId($userId);

		$freelancer_id = $freelancer[0]->id;

		$propostas = $this->proposta->getPropostaByFreelancer(5);
		dd($propostas);

		$this->view('propostas', 
			[
				'propostas' => $propostas
			]
		);
	}

	public function create(int $id): void 
	{
		if(!$id) {
			echo "Quer enviar a proposta para que trabalho?";
		}

		$trabalhoId = $id;

		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$_POST['trabalhos_id'] = $trabalhoId;
			$_POST['freelancer_id'] = 5;
			$this->proposta->create($_POST);
		}
		$this->view('criar_proposta', []);
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