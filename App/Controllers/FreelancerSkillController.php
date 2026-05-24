<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;
use App\Services\FreelancerSkillService;
use App\Contracts\{FreelancerInterface, SkillInterface};

class FreelancerSkillController extends Controller
{
    public function __construct(
        private readonly FreelancerSkillService $freelancerSkillService,
        private readonly FreelancerInterface    $freelancerModel,
        private readonly SkillInterface         $skillModel
    ) {}

    public function index(int $freelancerId): void
    {
        $this->requireAuth();

        $freelancer = $this->freelancerModel->find($freelancerId);
        if (!$freelancer) {
            $this->redirect('/freelancer');
        }

        $this->authorizeFreelancerOrAdmin($freelancer);

        $skills           = $this->skillModel->all();
        $freelancerSkills = $this->freelancerSkillService->getSkillsByFreelancer($freelancerId);
        $selectedIds      = array_column($freelancerSkills, 'skill_id');

        $this->view('freelancerskills/index', compact('freelancer', 'skills', 'freelancerSkills', 'selectedIds'));
    }

    public function sync(int $freelancerId): void
    {
        $this->requireAuth();

        $freelancer = $this->freelancerModel->find($freelancerId);
        if (!$freelancer) {
            $this->redirect('/freelancer');
        }

        $this->authorizeFreelancerOrAdmin($freelancer);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $skillIds = array_map('intval', $_POST['skill_ids'] ?? []);
            $this->freelancerSkillService->syncSkills($freelancerId, $skillIds);
            $_SESSION['flash'] = ['type' => 'success', 'msg' => 'Skills atualizadas com sucesso!'];
        }

        $this->redirect("/freelancer/{$freelancerId}/skills");
    }
    
    public function add(int $freelancerId): void
    {
        $this->requireAuth();

        $freelancer = $this->freelancerModel->find($freelancerId);
        if (!$freelancer) {
            $this->redirect('/freelancer');
        }

        $this->authorizeFreelancerOrAdmin($freelancer);

        $errors  = [];
        $skills  = $this->skillModel->all();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $skillId = (int) ($_POST['skill_id'] ?? 0);

            if (!$skillId) {
                $errors[] = 'Selecione uma skill válida.';
            } else {
                $ok = $this->freelancerSkillService->addSkillToFreelancer($freelancerId, $skillId);
                if ($ok) {
                    $_SESSION['flash'] = ['type' => 'success', 'msg' => 'Skill adicionada!'];
                    $this->redirect("/freelancer/{$freelancerId}/skills");
                }
                $errors[] = 'Essa skill já foi adicionada ou é inválida.';
            }
        }

        $freelancerSkills = $this->freelancerSkillService->getSkillsByFreelancer($freelancerId);

        $this->view('freelancerskills/add', compact('freelancer', 'skills', 'freelancerSkills', 'errors'));
    }

    private function requireAuth(): void
    {
        if (empty($_SESSION['user'])) {
            $this->redirect('/login');
        }
    }

    private function authorizeFreelancerOrAdmin(array $freelancer): void
    {
        $user = $_SESSION['user'];
        if ($user['role'] === 'admin') return;

        // Freelancer can only manage their own skills
        if ($user['role'] === 'freelancer' && (int) $freelancer['user_id'] === (int) $user['id']) return;

        $this->redirect('/dashboard');
    }
}
