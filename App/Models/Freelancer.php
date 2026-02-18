<?php
declare(strict_types=1);

namespace App\Models;
use App\Core\Model;
use App\Contracts\FreelancerInterface;

class Freelancer extends Model implements FreelancerInterface
{
	public function getByUserId(int $id): array|object
	{
		return $this->where('user_id', $id);
	}
}
