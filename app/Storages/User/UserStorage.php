<?php

declare(strict_types=1);

namespace App\Storages\User;

use App\Models\User;

class UserStorage implements UserStorageInterface
{
    public function getUser(int $userId): ?User
    {
        return User::find($userId);
    }
}
