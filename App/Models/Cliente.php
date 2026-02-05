<?php
declare(strict_types=1);

namespace App\Models;
use App\Core\Model;
use App\Contracts\ClienteInterface;

class Cliente extends Model implements ClienteInterface
{
	public function getClienteById(int $id): mixed 
	{
		return $this->query(
			"SELECT * 
			FROM clientes 
			WHERE user_id = :id",
			['id'=> $id]
		);
	}
}

