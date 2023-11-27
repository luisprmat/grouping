<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $names = collect([
            'Computer',
            'Laptop',
            'Phone',
            'Tablet',
            'Watch',
            'TV',
            'Camera',
            'Headphones',
            'Keyboard',
            'Mouse',
            'Monitor',
            'Printer',
            'Speaker',
            'Projector',
            'Router',
            'Modem',
            'Server',
            'Microwave',
            'Refrigerator',
            'Oven',
            'Dishwasher',
        ]);

        return [
            'name' => $names->random().' - '.random_int(1, 1000),
            'price' => $this->faker->randomFloat(2, 10, 1000),
            'stock_quantity' => random_int(1, 3000),
        ];
    }
}
