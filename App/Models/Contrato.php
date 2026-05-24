<?php
<<<<<<< HEAD
declare(strict_types=1);

namespace App\Models;
=======

declare(strict_types=1);

namespace App\Models;

>>>>>>> 82131aa (add more files)
use App\Contracts\ContratoInterface;
use App\Core\Model;

class Contrato extends Model implements ContratoInterface
{
<<<<<<< HEAD
	
}

=======
    public function findByFreelancer(int $freelancerId): array
    {
        $stmt = $this->db->prepare(
            "SELECT c.*, t.titulo AS trabalho_titulo, u.nome AS cliente_nome
             FROM {$this->table} c
             JOIN trabalhos t ON c.trabalho_id = t.id
             JOIN users u ON cl.user_id = u.id
             WHERE c.freelancer_id = :freelancer_id
             ORDER BY c.data_inicio DESC"
        );
        $stmt->execute([':freelancer_id' => $freelancerId]);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function findByCliente(int $clienteId): array
    {
        $stmt = $this->db->prepare(
            "SELECT c.*, t.titulo AS trabalho_titulo, u.nome AS freelancer_nome
             FROM {$this->table} c
             JOIN trabalhos t ON c.trabalho_id = t.id
             JOIN freelancers f ON c.freelancer_id = f.id
             JOIN users u ON f.user_id = u.id
             WHERE c.client_id = :client_id
             ORDER BY c.data_inicio DESC"
        );
        $stmt->execute([':client_id' => $clienteId]);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function findByTrabalho(int $trabalhoId): array
    {
        $stmt = $this->db->prepare(
            "SELECT c.*, u_f.nome AS freelancer_nome, u_c.nome AS cliente_nome
             FROM {$this->table} c
             JOIN freelancers f ON c.freelancer_id = f.id
             JOIN users u_f ON f.user_id = u_f.id
             JOIN clientes cl ON c.client_id = cl.id
             JOIN users u_c ON cl.user_id = u_c.id
             WHERE c.trabalho_id = :trabalho_id"
        );
        $stmt->execute([':trabalho_id' => $trabalhoId]);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}
>>>>>>> 82131aa (add more files)
