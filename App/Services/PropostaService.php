<?php
declare(strict_types=1);

namespace App\Services;
use App\Contracts\PropostaInterface;
use Exception;

class PropostaService
{
    public function __construct (
        protected PropostaInterface $proposta
    ){}

    public function create(array $proposta): void 
    {
        $this->proposta->insert($proposta);
    }

    public function update(int $id, array $dataProposta): void 
    {
        $this->proposta->update($id, $dataProposta);
    }

    public function delete(int $id): void
    {
        $this->proposta->delete($id);
    }

    public function getTodasPropostas(): array|object
    {
        return $this->proposta->getTodasPropostas();
    }

    public function getPropostasByFreelancer(int $id): array|object
    {
        return $this->proposta->getPropostasByFreelancer($id);
    }

    public function getPropostasByCliente(int $id): array|object
    {
        return $this->proposta->getPropostasByCliente($id);
    }

    public function getPropostaById(int $id): array|object
    {
        return $this->proposta->where('id', $id);
    }
}