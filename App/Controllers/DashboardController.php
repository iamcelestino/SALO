<?php
declare(strict_types=1);

namespace App\Controllers;
use App\Core\Controller;

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
	}

	public function cliente(): void 
	{
		$this->view('cliente_dashboard');
	}

	public function freelancer(): void
	{
		$this->view('freelancer_dashboard');
	}
}