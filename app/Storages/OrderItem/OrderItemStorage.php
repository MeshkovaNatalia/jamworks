<?php

declare(strict_types=1);

namespace App\Storages\OrderItem;

use App\Models\OrderItem;
use App\Models\Order;

class OrderItemStorage implements OrderItemStorageInterface
{
    public function createFromData(Order $order, array $data): OrderItem
    {
        return OrderItem::create(['order_id' => $order->id, ...$data]);
    }

    public function createManyFromData(Order $order, array $data): array
    {
        $data = \array_map(fn($item) => ['order_id' => $order->id, ...$item], $data);

        OrderItem::insert($data);

        return OrderItem::where('order_id', $order->id)->get()->toArray();
    }
}
