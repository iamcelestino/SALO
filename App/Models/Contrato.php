<?php
declare(strict_types=1);
namespace App\Models;
use App\Core\Model;
use App\Contracts\ContratoInterface;

class Contrato extends Model implements ContratoInterface
{
    public function getAllContratos(): array
    {
        return $this->query(
            "SELECT 
                c.id,
                c.trabalho_id,
                c.freelancer_id,
                c.client_id,
                c.data_inicio,
                c.data_fim,
                c.status,
                t.titulo              AS trabalho_titulo,
                u_f.nome              AS freelancer_nome,
                u_f.email             AS freelancer_email,
                f.titulo_profissional AS freelancer_especialidade,
                f.nivel               AS freelancer_nivel,
                u_c.nome              AS cliente_nome,
                u_c.email             AS cliente_email
             FROM contratos c
             JOIN trabalhos  t   ON c.trabalho_id   = t.id
             JOIN freelancers f  ON c.freelancer_id = f.id
             JOIN users u_f      ON f.user_id        = u_f.id
             JOIN clientes cl    ON c.client_id      = cl.id
             JOIN users u_c      ON cl.user_id       = u_c.id
             ORDER BY c.data_inicio DESC"
        );
    }
    public function findByFreelancer(int $freelancerId): array|object
    {
        return $this->query(
            "SELECT c.*, t.titulo AS trabalho_titulo, u.nome AS cliente_nome
             FROM contratos c
             JOIN trabalhos t ON c.trabalho_id = t.id
             JOIN clientes cl ON c.client_id = cl.id  
             JOIN users u ON cl.user_id = u.id         
             WHERE c.freelancer_id = :freelancer_id
             ORDER BY c.data_inicio DESC",
            ['freelancer_id' => $freelancerId]        
        );
    }

    public function findByCliente(int $clienteId): array|object
    {
        return $this->query(
            "SELECT c.*, t.titulo AS trabalho_titulo, u.nome AS freelancer_nome
             FROM contratos c
             JOIN trabalhos t ON c.trabalho_id = t.id
             JOIN freelancers f ON c.freelancer_id = f.id
             JOIN users u ON f.user_id = u.id
             WHERE c.client_id = :client_id
             ORDER BY c.data_inicio DESC",
            ['client_id' => $clienteId]
        );
    }

    public function findByTrabalho(int $trabalhoId): array|object
    {
        return $this->query(
            "SELECT c.*, u_f.nome AS freelancer_nome, u_c.nome AS cliente_nome
             FROM contratos c
             JOIN freelancers f ON c.freelancer_id = f.id
             JOIN users u_f ON f.user_id = u_f.id
             JOIN clientes cl ON c.client_id = cl.id
             JOIN users u_c ON cl.user_id = u_c.id
             WHERE c.trabalho_id = :trabalho_id",
            ['trabalho_id' => $trabalhoId]
        );
    }
}