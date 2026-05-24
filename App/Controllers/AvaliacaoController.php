<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;
use App\Services\AvaliacaoService;
use App\Contracts\ContratoInterface;

class AvaliacaoController extends Controller
{
    public function __construct(
        private readonly AvaliacaoService  $avaliacaoService,
        private readonly ContratoInterface $contratoModel
    ) {}

    public function index(): void
    {
        $this->requireAuth();
        $userId      = (int) $_SESSION['user']['id'];
        $avaliacoes  = $this->avaliacaoService->getAvaliacoesByAvaliado($userId);
        $this->view('avaliacao/index', compact('avaliacoes'));
    }

    public function create(int $contratoId): void
    {
        $this->requireAuth();

        $contrato = $this->contratoModel->find($contratoId);
        if (!$contrato) {
            $this->redirect('/contratos');
        }

        $errors = [];
        $old    = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $avaliadorId = (int) $_SESSION['user']['id'];

            $data = [
                'contract_id'  => $contratoId,
                'avaliado_id'  => $_POST['avaliado_id'] ?? '',
                'pontuacao'    => $_POST['pontuacao']   ?? '',
                'comentario'   => $_POST['comentario']  ?? '',
            ];
            $old = $data;

            $errors = $this->avaliacaoService->getValidationErrors($data);

            if (empty($errors)) {
                $id = $this->avaliacaoService->createAvaliacao($data, $avaliadorId);
                if ($id) {
                    $_SESSION['flash'] = ['type' => 'success', 'msg' => 'Avaliação registada com sucesso!'];
                    $this->redirect('/contratos');
                }
                $errors[] = 'Já avaliou este contrato ou ocorreu um erro.';
            }
        }

        $this->view('avaliacao/create', compact('contrato', 'errors', 'old'));
    }

    public function update(int $id): void
    {
        $this->requireAuth();

        $avaliacao = $this->avaliacaoService->getAvaliacaoById($id);
        if (!$avaliacao) {
            $this->redirect('/contratos');
        }

        $avaliadorId = (int) $_SESSION['user']['id'];

        // Only original avaliador can edit
        if ((int) $avaliacao['avaliador_id'] !== $avaliadorId) {
            $this->redirect('/contratos');
        }

        $errors = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'pontuacao'  => $_POST['pontuacao']  ?? '',
                'comentario' => $_POST['comentario'] ?? '',
            ];

            $errors = $this->avaliacaoService->getValidationErrors($data, updating: true);

            if (empty($errors)) {
                if ($this->avaliacaoService->updateAvaliacao($id, $data, $avaliadorId)) {
                    $_SESSION['flash'] = ['type' => 'success', 'msg' => 'Avaliação atualizada!'];
                    $this->redirect('/contratos');
                }
                $errors[] = 'Erro ao atualizar avaliação.';
            }
        }

        $this->view('avaliacao/update', compact('avaliacao', 'errors'));
    }

    private function requireAuth(): void
    {
        if (empty($_SESSION['user'])) {
            $this->redirect('/login');
        }
    }
