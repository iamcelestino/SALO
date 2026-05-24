<<<<<<< HEAD
<?php 
declare(strict_types=1);
=======
<?php

>>>>>>> 82131aa (add more files)
namespace App\Contracts;

interface FreelancerSkillInterface extends BaseInterface
{
<<<<<<< HEAD
	
=======
    public function findByFreelancer(int $freelancerId): array;
    public function findBySkill(int $skillId): array;
    public function existsForFreelancer(int $freelancerId, int $skillId): bool;
>>>>>>> 82131aa (add more files)
}