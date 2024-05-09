<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Models\Order;
use App\Models\OrderItem;

class OrderController extends Controller
{
    public function createOrder(int $userId): JsonResponse
    {
        $order = Order::create(['user_id' => $userId]);

        $orderItems = OrderItem::insert([
            ['order_id' => $order->id, 'product_id' => 1, 'quantity' => 1, 'price' => 100],
            ['order_id' => $order->id, 'product_id' => 2, 'quantity' => 2, 'price' => 200],
        ]);

        return new JsonResponse(['order' => $order->load('orderItems.product')]);
    }

    public function getOrderDetails(int $userId, int $orderId): JsonResponse
    {
        $order = Order::where('user_id', $userId)
            ->where('id', $orderId)
            ->with('orderItems.product')
            ->first();

        return new JsonResponse(['order' => $order]);
    }
}
