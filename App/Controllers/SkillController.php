<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;
use App\Services\SkillService;

class SkillController extends Controller
{
    public function __construct(
        private readonly SkillService $skillService
    ) {}

    public function index(): void
    {
        $this->requireAdmin();
        $skills = $this->skillService->getAllSkills();
        $this->view('skills/index', compact('skills'));
    }

    public function create(): void
    {
        $this->requireAdmin();

        $errors = [];
        $old    = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = ['nome' => $_POST['nome'] ?? ''];
            $old  = $data;

            $errors = $this->skillService->getValidationErrors($data);

            if (empty($errors)) {
                $id = $this->skillService->createSkill($data);
                if ($id) {
                    $_SESSION['flash'] = ['type' => 'success', 'msg' => 'Skill criada com sucesso!'];
                    $this->redirect('/skills');
                }
                $errors[] = 'Essa skill já existe ou ocorreu um erro.';
            }
        }

        $this->view('skills/create', compact('errors', 'old'));
    }

    public function update(int $id): void
    {
        $this->requireAdmin();

        $skill = $this->skillService->getSkillById($id);
        if (!$skill) {
            $this->redirect('/skills');
        }

        $errors = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = ['nome' => $_POST['nome'] ?? ''];

            $errors = $this->skillService->getValidationErrors($data);

            if (empty($errors)) {
                if ($this->skillService->updateSkill($id, $data)) {
                    $_SESSION['flash'] = ['type' => 'success', 'msg' => 'Skill atualizada!'];
                    $this->redirect('/skills');
                }
                $errors[] = 'Esse nome já está em uso ou ocorreu um erro.';
            }
        }

        $this->view('skills/update', compact('skill', 'errors'));
    }

    private function requireAdmin(): void
    {
        if (empty($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
            $this->redirect('/dashboard');
        }
    }
}