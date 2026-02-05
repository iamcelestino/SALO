<?php
declare(strict_types=1);

namespace App\Services;
use App\Contracts\ClienteInterface;

class ClienteService 
{
	public function __construct(
		protected ClienteInterface $cliente
	){}

	public function create(array $dado_cliente): void 
	{
		$this->cliente->insert($dado_cliente);
	}

	public function getClienteById(int $id): mixed
	{
		return $this->cliente->getClienteById($id);
	}
}
