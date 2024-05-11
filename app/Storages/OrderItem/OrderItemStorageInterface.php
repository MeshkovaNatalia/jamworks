<?php

declare(strict_types=1);

namespace App\Storages\OrderItem;

use App\Models\OrderItem;
use App\Models\Order;

interface OrderItemStorageInterface
{
    public function createFromData(Order $order, array $data): OrderItem;

    /**
     * @return array<OrderItem>
     */
    public function createManyFromData(Order $order, array $data): array;
}
