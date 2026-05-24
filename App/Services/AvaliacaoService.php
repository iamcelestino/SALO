<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\{AvaliacaoInterface, ContratoInterface};

class AvaliacaoService
{
    public function __construct(
        private readonly AvaliacaoInterface $avaliacaoModel,
        private readonly ContratoInterface  $contratoModel
    ) {}

    public function getAvaliacoesByContrato(int $contratoId): array
    {
        return $this->avaliacaoModel->findByContrato($contratoId);
    }

    public function getAvaliacoesByAvaliado(int $avaliadoId): array
    {
        return $this->avaliacaoModel->findByAvaliado($avaliadoId);
    }

    public function getAvaliacaoById(int $id): ?array
    {
        return $this->avaliacaoModel->find($id) ?: null;
    }

    public function createAvaliacao(array $data, int $avaliadorId): bool|int
    {
        $errors = $this->validate($data);
        if (!empty($errors)) {
            return false;
        }

        $contratoId = (int) $data['contract_id'];

        // Contrato must exist
        if (!$this->contratoModel->find($contratoId)) {
            return false;
        }

        // Avaliador cannot evaluate the same contract twice
        if ($this->avaliacaoModel->contratoJaAvaliado($contratoId, $avaliadorId)) {
            return false;
        }

        return $this->avaliacaoModel->create([
            'contract_id'  => $contratoId,
            'avaliador_id' => $avaliadorId,
            'avaliado_id'  => (int) $data['avaliado_id'],
            'pontuacao'    => (int) $data['pontuacao'],
            'comentario'   => trim($data['comentario'] ?? ''),
        ]);
    }

    public function updateAvaliacao(int $id, array $data, int $avaliadorId): bool
    {
        $avaliacao = $this->getAvaliacaoById($id);
        if (!$avaliacao) {
            return false;
        }

        // Only the original avaliador may edit
        if ((int) $avaliacao['avaliador_id'] !== $avaliadorId) {
            return false;
        }

        $errors = $this->validate($data, updating: true);
        if (!empty($errors)) {
            return false;
        }

        return $this->avaliacaoModel->update($id, [
            'pontuacao'  => (int) ($data['pontuacao']  ?? $avaliacao['pontuacao']),
            'comentario' => trim($data['comentario']   ?? $avaliacao['comentario']),
        ]);
    }

    private function validate(array $data, bool $updating = false): array
    {
        $errors = [];

        if (!$updating) {
            if (empty($data['contract_id']))  $errors[] = 'Contrato é obrigatório.';
            if (empty($data['avaliado_id'])) $errors[] = 'Avaliado é obrigatório.';
        }

        if (!isset($data['pontuacao']) || $data['pontuacao'] === '') {
            $errors[] = 'Pontuação é obrigatória.';
        } elseif ((int) $data['pontuacao'] < 1 || (int) $data['pontuacao'] > 5) {
            $errors[] = 'Pontuação deve ser entre 1 e 5.';
        }

        return $errors;
    }

    public function getValidationErrors(array $data, bool $updating = false): array
    {
        return $this->validate($data, $updating);
    }
}