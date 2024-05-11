<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Models\Order;
use App\Models\OrderItem;
use App\Services\Order\OrderServiceInterface;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct(
        private OrderServiceInterface $orderService,
    ) {
    }

    public function createOrder(Request $request): JsonResponse
    {
        $postDataStub = [
            'items' => [
                ['product_id' => 1, 'quantity' => 1, 'price' => 100],
                ['product_id' => 2, 'quantity' => 2,  'price' => 200],
            ],
        ];

        $user = Auth::user();

        $order = $this->orderService->createOrderWithItemsForUser($user, $postDataStub['items']);

        return new JsonResponse(['order' => $order->load('orderItems.product')]);
    }

    public function getOrderDetails(int $orderId): JsonResponse
    {
        $order = $this->orderService->getOrderDetails($orderId);

        Gate::authorize('view', $order);

        return new JsonResponse(['order' => $order]);
    }
}
