<?php

declare(strict_types=1);

namespace App\Models;

use App\Contracts\AvaliacaoInterface;
use App\Core\Model;

class Avaliacao extends Model implements AvaliacaoInterface
{

    public function findByContrato(int $contratoId): array
    {
        $stmt = $this->db->prepare(
            "SELECT a.*, 
                    u_avaliador.nome AS avaliador_nome,
                    u_avaliado.nome  AS avaliado_nome
             FROM {$this->table} a
             JOIN users u_avaliador ON a.avaliador_id = u_avaliador.id
             JOIN users u_avaliado  ON a.avaliado_id  = u_avaliado.id
             WHERE a.contract_id = :contract_id
             ORDER BY a.criado_em DESC"
        );
        $stmt->execute([':contract_id' => $contratoId]);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function findByAvaliador(int $avaliadorId): array
    {
        $stmt = $this->db->prepare(
            "SELECT a.*, u.nome AS avaliado_nome
             FROM {$this->table} a
             JOIN users u ON a.avaliado_id = u.id
             WHERE a.avaliador_id = :avaliador_id
             ORDER BY a.criado_em DESC"
        );
        $stmt->execute([':avaliador_id' => $avaliadorId]);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function findByAvaliado(int $avaliadoId): array
    {
        $stmt = $this->db->prepare(
            "SELECT a.*, u.nome AS avaliador_nome
             FROM {$this->table} a
             JOIN users u ON a.avaliador_id = u.id
             WHERE a.avaliado_id = :avaliado_id
             ORDER BY a.criado_em DESC"
        );
        $stmt->execute([':avaliado_id' => $avaliadoId]);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function contratoJaAvaliado(int $contratoId, int $avaliadorId): bool
    {
        $stmt = $this->db->prepare(
            "SELECT COUNT(*) FROM {$this->table}
             WHERE contract_id = :contract_id AND avaliador_id = :avaliador_id"
        );
        $stmt->execute([
            ':contract_id' => $contratoId,
            ':avaliador_id' => $avaliadorId,
        ]);
        return (int) $stmt->fetchColumn() > 0;
    }
}
