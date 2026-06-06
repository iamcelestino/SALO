<?php
declare(strict_types=1);

namespace App\Contracts;

interface TrabalhoInterface extends BaseInterface
{
	public function getTodosTrabalhos(): array|object;
	public function getTrabalhoById(int $id): array|object;
	public function getTrabalhosByCliente(int $id): array|object;
	public function getTrabalhosComPropostas(int $id): array|object;
}
