<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;
use App\Services\ContratoService;
use App\Contracts\{TrabalhoInterface, FreelancerInterface, ClienteInterface};

class ContratoController extends Controller
{
    public function __construct(
        private readonly ContratoService      $contratoService,
        private readonly TrabalhoInterface    $trabalhoModel,
        private readonly FreelancerInterface  $freelancerModel,
        private readonly ClienteInterface     $clienteModel
    ) {}

    public function index(): void
    {
        // $this->requireAuth();

        $user = $_SESSION['user'];
        $contratos = match ($user['role']) {
            'freelancer' => $this->contratoService->getContratosByFreelancer(
                (int) $_SESSION['freelancer_id']
            ),
            'cliente'    => $this->contratoService->getContratosByCliente(
                (int) $_SESSION['cliente_id']
            ),
            default      => $this->contratoService->getAllContratos(),
        };

        $this->view('contratos', 
            [
            
            ]
        );
    }

    public function create(): void
    {
        $this->requireAuth();

        $trabalhos   = $this->trabalhoModel->all();
        $freelancers = $this->freelancerModel->all();
        $clientes    = $this->clienteModel->all();
        $errors      = [];
        $old         = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'trabalho_id'   => $_POST['trabalho_id']   ?? '',
                'freelancer_id' => $_POST['freelancer_id'] ?? '',
                'client_id'     => $_POST['client_id']     ?? '',
                'data_inicio'   => $_POST['data_inicio']   ?? '',
                'data_fim'      => $_POST['data_fim']      ?? null,
                'status'        => $_POST['status']        ?? 'ativo',
            ];
            $old = $data;

            $errors = $this->contratoService->getValidationErrors($data);

            if (empty($errors)) {
                $id = $this->contratoService->createContrato($data);
                if ($id) {
                    $_SESSION['flash'] = ['type' => 'success', 'msg' => 'Contrato criado com sucesso!'];
                    $this->redirect('/contratos');
                }
                $errors[] = 'Erro ao criar contrato. Verifique os dados.';
            }
        }

        $this->view('contratos/create', compact('trabalhos', 'freelancers', 'clientes', 'errors', 'old'));
    }

    public function update(int $id): void
    {
        $this->requireAuth();

        $contrato = $this->contratoService->getContratoById($id);
        if (!$contrato) {
            $this->redirect('/contratos');
        }

        $errors = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'data_inicio' => $_POST['data_inicio'] ?? '',
                'data_fim'    => $_POST['data_fim']    ?? null,
                'status'      => $_POST['status']      ?? '',
            ];

            $errors = $this->contratoService->getValidationErrors($data, updating: true);

            if (empty($errors)) {
                if ($this->contratoService->updateContrato($id, $data)) {
                    $_SESSION['flash'] = ['type' => 'success', 'msg' => 'Contrato atualizado!'];
                    $this->redirect('/contratos');
                }
                $errors[] = 'Erro ao atualizar contrato.';
            }
        }

        $this->view('contratos/update', compact('contrato', 'errors'));
    }

    private function requireAuth(): void
    {
        if (empty($_SESSION['user'])) {
            $this->redirect('/login');
        }
    }
}