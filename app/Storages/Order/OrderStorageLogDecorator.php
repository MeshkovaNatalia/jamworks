<?php

declare(strict_types=1);

namespace App\Storages\Order;

use App\Models\Order;
use App\Models\User;

class OrderStorageLogDecorator implements OrderStorageInterface
{
    public function __construct(
        private OrderStorageInterface $orderStorage,
    ) {
    }

    public function getOrderDetails(int $orderId): ?Order
    {
        $order = $this->orderStorage->getOrderDetails($orderId);

        if ($order) {
            $this->log("Order details for order ID {$orderId} were retrieved.");
        }

        return $order;
    }

    public function getOrdersDetailsForUser(User $user): array
    {
        $orders = $this->orderStorage->getOrdersDetailsForUser($user);

        if ($orders) {
            $this->log("Orders details for user ID {$user->id} were retrieved.");
        }

        return $orders;
    }

    public function createOrderForUser(User $user): Order
    {
        $order = $this->orderStorage->createOrderForUser($user);

        $this->log("Order for user ID {$user->id} was created.");

        return $order;
    }

    private function log(string $message): void
    {
        // Log the message
    }
}
