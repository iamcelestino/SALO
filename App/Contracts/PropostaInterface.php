<?php 
declare(strict_types=1);

namespace App\Contracts;

interface PropostaInterface extends BaseInterface
{
	public function getTodasPropostas(): array|object;
	public function getPropostasByFreelancer(int $id): array|object;
	public function getPropostasByCliente(int $id): array|object;
}