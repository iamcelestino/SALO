<?php

namespace App\Controllers;
use App\Core\Controller;
use App\Services\UserService;

class LoginController extends Controller
{
    public function __construct(
        protected UserService $usuario
    ){}

    public function index(): void 
    {
        if(!$this->usuario->isLogged()) {
            $this->redirect('/login');
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->usuario->login($_POST);
            $this->redirect('/');
        }
        $this->view('login', []);
    }
}