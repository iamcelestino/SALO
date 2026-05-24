<?php
<<<<<<< HEAD
namespace App\Contracts;

interface Contrato extends BaseInterface
{
}
=======

namespace App\Contracts;

interface ContratoInterface extends BaseInterface
{
    public function findByFreelancer(int $freelancerId): array;
    public function findByCliente(int $clienteId): array;
    public function findByTrabalho(int $trabalhoId): array;
}
>>>>>>> 82131aa (add more files)
