<?php

declare(strict_types=1);

namespace App\Services\Order;

use App\Models\Order;
use App\Storages\Order\OrderStorageInterface;
use App\Models\User;
use App\Storages\OrderItem\OrderItemStorageInterface;

class OrderService implements OrderServiceInterface
{
    public function __construct(
        private OrderStorageInterface $orderStorage,
        private OrderItemStorageInterface $orderItemStorage,
    ) {
    }

    public function getOrderDetails(int $orderId): ?Order
    {
        return $this->orderStorage->getOrderDetails($orderId);
    }

    public function getOrdersDetailsForUser(User $user): array
    {
        return $this->orderStorage->getOrdersDetailsForUser($user);
    }

    public function createOrderWithItemsForUser(User $user, array $orderItemsData): Order
    {
        // Validate order items data
        // ...

        // Create order
        $order = $this->orderStorage->createOrderForUser($user);

        // Create order items
        $this->orderItemStorage->createManyFromData($order, $orderItemsData);

        return $order;
    }
}
