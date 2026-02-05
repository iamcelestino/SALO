<?php
declare(strict_types=1);

namespace App\Services;
use App\Contracts\SkillInterface;

class SkillService
{
	public function __construct(
		protected SkillInterface $skill
	){}

	public function create(array $skill): void
	{
		$this->skill->insert($skill);
	}
}