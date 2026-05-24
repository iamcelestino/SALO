<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\ContratoInterface;

class ContratoService
{
    public function __construct(
        private readonly ContratoInterface $contratoModel
    ) {}

    public function getAllContratos(): array
    {
        return $this->contratoModel->all();
    }

    public function getContratoById(int $id): ?array
    {
        return $this->contratoModel->find($id) ?: null;
    }

    public function getContratosByFreelancer(int $freelancerId): array
    {
        return $this->contratoModel->findByFreelancer($freelancerId);
    }

    public function getContratosByCliente(int $clienteId): array
    {
        return $this->contratoModel->findByCliente($clienteId);
    }

    public function createContrato(array $data): bool|int
    {
        $errors = $this->validate($data);
        if (!empty($errors)) {
            return false;
        }

        return $this->contratoModel->create([
            'trabalho_id'  => (int) $data['trabalho_id'],
            'freelancer_id' => (int) $data['freelancer_id'],
            'client_id'    => (int) $data['client_id'],
            'data_inicio'  => $data['data_inicio'],
            'data_fim'     => $data['data_fim'] ?? null,
            'status'       => $data['status'] ?? 'ativo',
        ]);
    }

    public function updateContrato(int $id, array $data): bool
    {
        $contrato = $this->getContratoById($id);
        if (!$contrato) {
            return false;
        }

        $errors = $this->validate($data, updating: true);
        if (!empty($errors)) {
            return false;
        }

        return $this->contratoModel->update($id, [
            'data_inicio' => $data['data_inicio'] ?? $contrato['data_inicio'],
            'data_fim'    => $data['data_fim']    ?? $contrato['data_fim'],
            'status'      => $data['status']      ?? $contrato['status'],
        ]);
    }

    private function validate(array $data, bool $updating = false): array
    {
        $errors = [];

        if (!$updating) {
            if (empty($data['trabalho_id']))  $errors[] = 'Trabalho é obrigatório.';
            if (empty($data['freelancer_id'])) $errors[] = 'Freelancer é obrigatório.';
            if (empty($data['client_id']))    $errors[] = 'Cliente é obrigatório.';
            if (empty($data['data_inicio']))  $errors[] = 'Data de início é obrigatória.';
        }

        if (!empty($data['status']) && !in_array($data['status'], ['ativo', 'concluido', 'cancelado'])) {
            $errors[] = 'Status inválido.';
        }

        return $errors;
    }

    public function getValidationErrors(array $data, bool $updating = false): array
    {
        return $this->validate($data, $updating);
    }
}