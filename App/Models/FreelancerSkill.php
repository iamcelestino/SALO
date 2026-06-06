<?php
declare(strict_types=1);

namespace App\Models;
use App\Core\Model;
use App\Contracts\FreelancerSkillInterface;

class FreelancerSkill extends Model implements FreelancerSkillInterface
{
    public function findByFreelancer(int $freelancerId): array
    {
        $stmt = $this->db->prepare(
            "SELECT fs.*, s.nome AS skill_nome
             FROM {$this->table} fs
             JOIN skills s ON fs.skill_id = s.id
             WHERE fs.freelancer_id = :freelancer_id
             ORDER BY s.nome ASC"
        );
        $stmt->execute([':freelancer_id' => $freelancerId]);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function findBySkill(int $skillId): array
    {
        $stmt = $this->db->prepare(
            "SELECT fs.*, u.nome AS freelancer_nome
             FROM {$this->table} fs
             JOIN freelancers f ON fs.freelancer_id = f.id
             JOIN users u ON f.user_id = u.id
             WHERE fs.skill_id = :skill_id"
        );
        $stmt->execute([':skill_id' => $skillId]);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function existsForFreelancer(int $freelancerId, int $skillId): bool
    {
        $stmt = $this->db->prepare(
            "SELECT COUNT(*) FROM {$this->table}
             WHERE freelancer_id = :freelancer_id AND skill_id = :skill_id"
        );
        $stmt->execute([
            ':freelancer_id' => $freelancerId,
            ':skill_id'      => $skillId,
        ]);
        return (int) $stmt->fetchColumn() > 0;
    }

    public function deleteByFreelancerAndSkill(int $freelancerId, int $skillId): bool
    {
        $stmt = $this->db->prepare(
            "DELETE FROM {$this->table}
             WHERE freelancer_id = :freelancer_id AND skill_id = :skill_id"
        );
        return $stmt->execute([
            ':freelancer_id' => $freelancerId,
            ':skill_id'      => $skillId,
        ]);
    }
}