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

    public function getPropostaByFreelancer(int $id): array|object
    {
        return $this->proposta->where('freelancer_id', $id);
    }

    public function getPropostaById(int $id): array|object
    {
        return $this->proposta->where('id', $id);
    }
}