<?php

declare(strict_types=1);

namespace App\Storages\Order;

use App\Models\Order;
use App\Models\User;

interface OrderStorageInterface
{
    public function getOrderDetails(int $orderId): ?Order;

    /**
     * @return Order[]
     */
    public function getOrdersDetailsForUser(User $user): array;

    public function createOrderForUser(User $user): Order;
}
