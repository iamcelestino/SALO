<?php
namespace App\Controllers;
use App\Core\Controller;

class ContratoController extends Controller
{
	public function index(): void;
	{
		$this->view('contratos', []);
	}

	public function create(): void 
	{
		
	}
}