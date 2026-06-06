<?php
declare(strict_types=1);

namespace App\Models;
use App\Core\Model;
use App\Contracts\FreelancerInterface;

class Freelancer extends Model implements FreelancerInterface
{
	public function getByFreelancerByUserId(int $id): array|object
	{
		return $this->query(
			"
			SELECT u.id, u.nome, u.email, 
			f.titulo_profissional, 
			f.nivel, f.disponibilidade, f.bio
			FROM users as u 
			JOIN freelancers f ON u.id = f.user_id
			WHERE u.id = :id",
			['id' => $id],
		);;
	}

	public function getTodosFreelancers(): array|object
	{
		return $this->query(
			"
			SELECT u.id, u.nome, u.email, 
			f.titulo_profissional, 
			f.nivel, f.disponibilidade, f.bio
			FROM users as u 
			JOIN freelancers f ON u.id = f.user_id",
			[]
		);;
	}
}
