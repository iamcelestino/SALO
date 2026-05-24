<?php 
<<<<<<< HEAD
declare(strict_types=1);
namespace App\Contracts;

interface UserInterface extends BaseInterface
{
=======

declare(strict_types=1);

namespace App\Contracts;

interface UserInterface 
{
    public function findByEmail(string $email): array|bool|object;
    public function insert(array $user): array|bool;
>>>>>>> 82131aa (add more files)
}