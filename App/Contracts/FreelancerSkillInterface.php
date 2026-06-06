<?php 
declare(strict_types=1);
namespace App\Contracts;

interface FreelancerSkillInterface extends BaseInterface
{
    public function findByFreelancer(int $freelancerId): array;
    public function findBySkill(int $skillId): array;
    public function existsForFreelancer(int $freelancerId, int $skillId): bool;
}