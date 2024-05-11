<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(3)->create();

        Product::factory(10)->create();

        Order::factory(6)->create()->each(function (Order $order) {
            $order->orderItems()->saveMany(OrderItem::factory(3)->make());
        });
    }
}
