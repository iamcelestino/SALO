<?php 
declare(strict_types=1);

namespace App\Controllers;
use App\Core\Controller;
use App\Services\PropostaService;

class PropostaController extends Controller
{
	public function __construct(
		protected PropostaService $proposta
	){}

	public function index(): void 
	{
		$this->view('', 
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
			dd($_POST);
		}
		$this->view('criar_proposta', []);
	}

}