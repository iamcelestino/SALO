<?php
declare(strict_types=1);

namespace App\Contracts;

interface FreelancerInterface extends BaseInterface
{
	public function getByFreelancerByUserId(int $id): array|object;
	public function getTodosFreelancers(): array|object;
}