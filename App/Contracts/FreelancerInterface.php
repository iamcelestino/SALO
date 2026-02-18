<?php
declare(strict_types=1);

namespace App\Contracts;

interface FreelancerInterface extends BaseInterface
{
	public function getByUserId(int $id): array|object;
}