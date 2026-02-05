<?php
declare(strict_types=1);

namespace App\Services;
use App\Contracts\FreelancerSkillInterface;

class FreelancerSkillService
{
	public function __construct(
		protected FreelancerSkillInterface $freelancerSkill
	){}

	public function create(array $freelancerSkill): void 
	{
		$this->freelancerSkill->insert($freelancerSkill);
	}
}