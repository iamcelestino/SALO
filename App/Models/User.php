<?php 
<<<<<<< HEAD
=======

>>>>>>> 82131aa (add more files)
declare(strict_types=1);

namespace App\Models;
use App\Contracts\UserInterface;
use App\Core\Model;

<<<<<<< HEAD
class User extends Model implements UserInterface
{

=======
class User extends Model implements userInterface
{
    public function findByEmail(string $email): array|bool|object
    {
        return $this->where('email', $email);
    }
>>>>>>> 82131aa (add more files)
}