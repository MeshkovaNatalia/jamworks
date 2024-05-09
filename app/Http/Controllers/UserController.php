<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\Order;

class UserController extends Controller
{
    public function getUserOrders(string $userId): JsonResponse
    {
        $orders = Order::where('user_id', $userId)
            ->with('orderItems.product')
            ->get();

        return new JsonResponse(['orders' => $orders]);
    }
}
