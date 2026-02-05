<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Services\UserService;

class SignupController extends Controller 
{
    public function __construct(
        protected UserService $user
    ){}
    
    public function index(): void
    {
        $this->view('signup', []);
    }
     
    public function submit(): void
    {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            $role = $_POST['role'] ?? '';

            $redirect = match($role) {
                'cliente' => "/cliente/signup",
                'freelancer' => "/freelancer/signup",
                default => "/signup",
            };

            $userId = $this->user->signup($_POST);
            $_SESSION['signup_user_id'] = $userId;

            $this->redirect($redirect);
            exit();
        }
        $this->view('signup', []);
    }
}