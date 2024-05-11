<?php

declare(strict_types=1);

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Order;

class OrderFactory extends Factory
{
    protected $model = Order::class;

    public function definition(): array
    {
        return [
            'user_id' => $this->faker->numberBetween(1, 3),
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
