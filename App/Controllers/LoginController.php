<?php

namespace App\Controllers;
use App\Core\Controller;
use App\Services\UserService;

class LoginController extends Controller
{

    public function __construct(
        protected UserService $user
    ){}

    public function index(): void 
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->user->login($_POST);
        }

        $this->view('login', []);
    }
}