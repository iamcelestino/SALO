<?php
<<<<<<< HEAD
declare(strict_types=1);

namespace App\Services;
use App\Contracts\{FreelancerSkillInterface, SkillInterface, FreelancerInterface};
use App\Models\FreelancerSkill;

class FreelancerSkillService
{
    public function __construct(
        private readonly FreelancerSkillInterface $freelancerSkillModel,
        private readonly SkillInterface           $skillModel,
        private readonly FreelancerInterface      $freelancerModel
    ) {}

    public function getSkillsByFreelancer(int $freelancerId): array
    {
        return $this->freelancerSkillModel->findByFreelancer($freelancerId);
    }

    public function create(array $freelancerSkill): void
    {
        // // Validate freelancer exists
        // if (!$this->freelancerModel->find($freelancerId)) {
        //     return false;
        // }
        // // Validate skill exists
        // if (!$this->skillModel->find($skillId)) {
        //     return false;
        // }
        // // Prevent duplicate
        // if ($this->freelancerSkillModel->existsForFreelancer($freelancerId, $skillId)) {
        //     return false;
        // }

        $this->freelancerSkillModel->insert($freelancerSkill);

    }

    public function syncSkills(int $freelancerId, array $skillIds): bool
    {
        if (!$this->freelancerModel->find($freelancerId)) {
            return false;
        }

        $existing = $this->freelancerSkillModel->findByFreelancer($freelancerId);
        foreach ($existing as $row) {
            if (!in_array((int) $row['skill_id'], $skillIds)) {
                /** @var FreelancerSkill $model */
                $model = $this->freelancerSkillModel;
                $model->deleteByFreelancerAndSkill($freelancerId, (int) $row['skill_id']);
            }
        }
        $existingIds = array_column($existing, 'skill_id');
        foreach ($skillIds as $skillId) {
            $skillId = (int) $skillId;
            if (!in_array($skillId, $existingIds) && $this->skillModel->find($skillId)) {
                $this->freelancerSkillModel->create([
                    'freelancer_id' => $freelancerId,
                    'skill_id'      => $skillId,
                ]);
            }
        }

        return true;
    }

    public function removeSkillFromFreelancer(int $freelancerId, int $skillId): bool
    {
        /** @var FreelancerSkill $model */
        $model = $this->freelancerSkillModel;
        return $model->deleteByFreelancerAndSkill($freelancerId, $skillId);
    }
}