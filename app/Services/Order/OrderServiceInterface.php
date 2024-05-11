<?php

declare(strict_types=1);

namespace App\Services\Order;

use App\Models\Order;
use App\Models\User;

interface OrderServiceInterface
{
    public function getOrderDetails(int $orderId): ?Order;

    /**
     * @return Order[]
     */
    public function getOrdersDetailsForUser(User $user): array;

    public function createOrderWithItemsForUser(User $user, array $orderItemsData): Order;
}
