<?php
declare(strict_types=1);

namespace App\Controllers;
use App\Core\Controller;
<<<<<<< HEAD

class DashboardController extends Controller
{
	public function index(): void 
	{
		$role = $_SESSION['USER'][0]->role ?? '';
		
        $redirect = match($role) {
            'cliente' => $this->cliente(),
            'freelancer' => $this->freelancer(),
            default => "/admin/dashboard",
        };

		$this->view('dashboard', []);
=======
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
>>>>>>> 82131aa (add more files)
	}

	public function cliente(): void 
	{
<<<<<<< HEAD
		$this->view('cliente_dashboard');
=======
		$trabalhos = $this->trabalho->getTrabalhosByCliente(2);

		$this->view('cliente_dashboard', [
			'trabalhos' => $trabalhos
		]);
>>>>>>> 82131aa (add more files)
	}

	public function freelancer(): void
	{
		$this->view('freelancer_dashboard');
	}
}