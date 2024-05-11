<?php

declare(strict_types=1);

namespace App\Storages\User;

use App\Models\User;

interface UserStorageInterface
{
    public function getUser(int $userId): ?User;
}
