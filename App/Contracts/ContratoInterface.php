<?php

namespace App\Contracts;

interface ContratoInterface extends BaseInterface
{
    public function getAllContratos(): array|object;
    public function findByFreelancer(int $freelancerId): array|object;
    public function findByCliente(int $clienteId): array|object;
    public function findByTrabalho(int $trabalhoId): array|object;
}