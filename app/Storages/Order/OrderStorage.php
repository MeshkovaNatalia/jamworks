<?php

declare(strict_types=1);

namespace App\Storages\Order;

use App\Models\Order;
use App\Models\User;

class OrderStorage implements OrderStorageInterface
{
    public function getOrderDetails(int $orderId): ?Order
    {
        return Order::where('id', $orderId)
            ->with('orderItems.product')
            ->first();
    }

    public function getOrdersDetailsForUser(User $user): array
    {
        return Order::where('user_id', $user->id)
            ->with('orderItems.product')
            ->get()
            ->toArray();
    }

    public function createOrderForUser(User $user): Order
    {
        return Order::create(['user_id' => $user->id]);
    }
}
