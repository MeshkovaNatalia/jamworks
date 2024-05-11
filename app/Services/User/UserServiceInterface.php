<?php

declare(strict_types=1);

namespace App\Services\User;

use App\Models\User;

interface UserServiceInterface
{
    public function getUser(int $userId): ?User;
}
