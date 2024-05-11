<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use App\Services\Order\OrderServiceInterface;

class UserController extends Controller
{
    public function __construct(
        private OrderServiceInterface $orderService,
    ) {
    }

    public function getUserOrders(): JsonResponse
    {
        $user = Auth::user();

        $orders = $this->orderService->getOrdersDetailsForUser($user);

        return new JsonResponse(['orders' => $orders]);
    }
}
