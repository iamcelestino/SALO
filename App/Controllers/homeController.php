<?php

namespace App\Controllers;
use App\Core\Controller;
use App\Services\UserService;

class HomeController extends Controller
{
    public function __construct(
        protected UserService $usuario
    ){}

    public function index(): void
    {
        if(!$this->usuario->isLogged()) {
            $this->redirect('/login');
        }

        $this->view('home', []);
    }
}