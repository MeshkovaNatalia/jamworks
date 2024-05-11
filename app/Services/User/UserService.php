<?php

declare(strict_types=1);

namespace App\Services\User;

use App\Models\User;
use App\Storages\User\UserStorageInterface;

class UserService implements UserServiceInterface
{
    public function __construct(
        private UserStorageInterface $userStorage,
    ) {}

    public function getUser(int $userId): ?User
    {
        return $this->userStorage->getUser($userId);
    }
}
