<?php
declare(strict_types=1);

namespace App\Models;
use App\Core\Model;
use App\Contracts\SkillInterface;

class Skill extends Model implements SkillInterface
{
    public function findByName(string $name): ?array
    {
        $stmt = $this->db->prepare(
            "SELECT * FROM {$this->table} WHERE nome = :nome LIMIT 1"
        );
        $stmt->execute([':nome' => $name]);
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $result ?: null;
    }
}
