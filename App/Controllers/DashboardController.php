<?php
declare(strict_types=1);

namespace App\Controllers;
use App\Core\Controller;
use App\Services\TrabalhoService;

class DashboardController extends Controller
{
	public function __construct(
		protected TrabalhoService $trabalho
	){}

	public function index(): void 
	{
		$role = $_SESSION['USER'][0]->role ?? '';

        $redirect = match($role) {
            'cliente' => '/cliente/dashboard',
            'freelancer' => '/cliente/dashboard',
            'admin' => '/admin/dashboard',
            default => '/admin/dashboard'
        };

		$this->redirect($redirect);
	}

	public function admin(): void 
	{
		$this->view('dashboard');
	}

	public function cliente(): void 
	{
		$this->view('cliente_dashboard');
		$trabalhos = $this->trabalho->getTrabalhosByCliente(2);

		$this->view('cliente_dashboard', [
			'trabalhos' => $trabalhos
		]);
	}

	public function freelancer(): void
	{
		$this->view('freelancer_dashboard');
	}
}