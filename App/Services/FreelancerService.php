<?php
declare(strict_types=1);

namespace App\Services;
use App\Contracts\{
	FreelancerInterface, 
	SkillInterface,
	FreelancerSkillInterface
};
use Exception;

class FreelancerService 
{
	public function __construct(
		protected FreelancerInterface $freelancer,
		protected SkillInterface $skill,
		protected FreelancerSkillService $freelancerSkill
	){}

	public function create(array $freelancer, array $skill): void 
	{
		try {
			
			$this->freelancer->beginTransaction();

			$this->freelancer->insert($freelancer);
				$this->skill->insert($skill);

			$skillId = (int) $this->skill->lastInsertId();

			$freelancerId = (int) $this->freelancer->lastInsertId();

			if ($freelancerId === 0 || $skillId === 0) {
            	throw new \Exception("Falha ao obter IDs gerados.");
        	}

			$freelancerSkill = [
				'freelancer_id' => $freelancerId,
				'skill_id' => $skillId
			];

			$this->freelancerSkill->create($freelancerSkill);
			$this->freelancer->commit();

		} catch(Exception $e) {
			echo $e->getMessage();
			$this->freelancer->rollBack();
		}
	}

	public function getByUserId(int $id): array|object 
	{
		return $this->freelancer->getByUserId($id);
	}
}