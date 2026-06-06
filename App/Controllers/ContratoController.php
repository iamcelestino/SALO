<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;
use App\Services\ContratoService;
use App\Contracts\{TrabalhoInterface, FreelancerInterface, ClienteInterface};

class ContratoController extends Controller
{
    public function __construct(
        private readonly ContratoService      $contrato,
        private readonly TrabalhoInterface    $trabalho,
        private readonly FreelancerInterface  $freelancer,
        private readonly ClienteInterface     $cliente
    ) {}

    public function index(): void
    {
        if(!$this->usuario->isLogged()) {
            $this->redirect('/login');
        }

        $user = $_SESSION['USER'];
        $contratos = $this->contrato->getAllContratos();
        dd($contratos);
        // $contratos = match ($user[0]->role) {
        //     'freelancer' => $this->contrato->getContratosByFreelancer(
        //         (int) $user[0]->id
        //     ),
        //     'cliente'    => $this->contrato->getContratosByCliente(
        //         (int) $user[0]->id
        //     ),
        //     default      => $this->contrato->getAllContratos(),
        // };

        $this->view('contratos', [
            'contratos' => $contratos
        ]);
    }

    public function create(int $id): void
    {
        if (!$id) {
            echo "Este trabalho não existe";
            return;
        }

        $trabalho = $this->trabalho->getTrabalhoById($id);

        if (!$trabalho) {
            echo "Este trabalho não existe";
            return;
        }

        $errors = [];
        $old    = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $old = [
                'trabalho_id'   => $_POST['trabalho_id']   ?? '',
                'freelancer_id' => $_POST['freelancer_id'] ?? '',
                'client_id'     => $_POST['client_id']     ?? '',
                'data_inicio'   => $_POST['data_inicio']   ?? '',
                'data_fim'      => $_POST['data_fim']       ?? null,
                'status'        => $_POST['status']         ?? 'ativo',
            ];

            dd($errors);
            dd($old);

            if (empty($errors)) {
                $newId = $this->contratoService->createContrato($old);
                if ($newId) {
                    $_SESSION['flash'] = [
                        'type' => 'success',
                        'msg'  => 'Contrato criado com sucesso!',
                    ];
                    $this->redirect('/contratos');
                    return;
                }
                $errors[] = 'Erro ao criar contrato. Verifique os dados.';
            }
        }

        $this->view('criar_contrato', [
            'trabalho' => $trabalho[0],  // single object, not an array of objects
            'errors'   => $errors,
            'old'      => $old,
        ]);
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

}