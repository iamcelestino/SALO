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
        $user = $this->user->where('email', $data['email'])[0] ?? null;

        if ($user && password_verify($data['password'], $user->password)) {
            return true;
        }
    }
    
}

