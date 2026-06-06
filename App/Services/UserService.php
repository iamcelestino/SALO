<?php
declare(strict_types=1);

namespace App\Services;
use App\Contracts\UserInterface;
use Exception;

class UserService 
{
    public function __construct (
        protected UserInterface $user
    ){}

    public function signup(array $userData): int
    {
        try {

            $this->user->beginTransaction();

            $userData['password'] = password_hash($userData['password'], PASSWORD_DEFAULT);

            $this->user->insert($userData);

            $userId = $this->user->lastInsertId();

            $this->user->commit();

            return (int) $userId;

        } catch (Exception $e) {
            $this->user->rollBack();
            throw $e;
        }
    }

    public function login(array $data): bool
    {
        $user = $this->user->where('email', $data['email']) ?? null;

        if ($user && password_verify($data['password'], $user[0]->password)) {
            $this->authenticate($user);
            return true;
        }
    }

    public function authenticate(array $user): void
    {
        $_SESSION['USER'] = $user;
    }

    public static function isLoggedOut(): void
    {
        if(isset($_SESSION['USER'])) {
            unset($_SESSION['USER']);
        }
    }

    public static function isLogged(): bool
    {
        if(isset($_SESSION['USER'])) {
            return true;
        }
        return false;
    }

}

