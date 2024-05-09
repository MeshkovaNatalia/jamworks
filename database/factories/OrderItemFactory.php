<?php

declare(strict_types=1);

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\OrderItem;

class OrderItemFactory extends Factory
{
    protected $model = OrderItem::class;

    public function definition(): array
    {
        return [
            'order_id' => $this->faker->numberBetween(1, 6),
            'product_id' => $this->faker->numberBetween(1, 10),
            'quantity' => $this->faker->numberBetween(1, 3),
            'price' => $this->faker->numberBetween(100, 1000),
        ];
    }
}
