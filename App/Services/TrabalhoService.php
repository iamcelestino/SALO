<?php
declare(strict_types=1);

namespace App\Services;
use App\Contracts\TrabalhoInterface;

class TrabalhoService
{
	public function __construct(
		protected TrabalhoInterface $trabalho
	){}

	public function create(array $trabalho): void 
	{
		$this->trabalho->insert($trabalho);
	}

	public function getTodosTrabalhos(): array|object 
	{
		return $this->trabalho->all();
	}
}