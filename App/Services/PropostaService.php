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
    
}