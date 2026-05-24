<?php

namespace App\Contracts;

interface AvaliacaoInterface extends BaseInterface
{
    public function findByContrato(int $contratoId): array;
    public function findByAvaliador(int $avaliadorId): array;
    public function findByAvaliado(int $avaliadoId): array;
    public function contratoJaAvaliado(int $contratoId, int $avaliadorId): bool;
}
