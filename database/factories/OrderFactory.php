<?php

namespace Database\Factories;

use App\Enums\OrderStatus;
use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $pre_tax = $this->faker->randomFloat(2, 5, 10_000);
        $tax = $pre_tax * 0.21;

        return [
            'user_id' => User::factory(),
            'status' => collect(OrderStatus::getValues())->random(),
            'order_time' => fake()->dateTime(),
            'delivery_time' => fake()->dateTime(now()->addMonth()),
            'pre_tax' => $pre_tax,
            'tax' => $tax,
            'total' => $pre_tax + $tax,
        ];
    }
}
