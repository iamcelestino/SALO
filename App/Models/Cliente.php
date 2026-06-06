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

	public function getTodosClientes(): array
    {
        return $this->query(
            "SELECT 
                cl.id,
                cl.nif,
                cl.empresa_nome,
                cl.sector,
                u.nome,
                u.email,
                COUNT(t.id) AS total_trabalhos
             FROM clientes cl
             JOIN users u        ON cl.user_id  = u.id
             LEFT JOIN trabalhos t ON cl.id = t.client_id
             GROUP BY cl.id, cl.nif, cl.empresa_nome, cl.sector, u.nome, u.email
             ORDER BY cl.empresa_nome ASC",
             []
        );
    }
}

