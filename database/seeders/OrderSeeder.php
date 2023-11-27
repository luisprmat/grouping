<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Luis Parrado',
            'email' => 'luisprmat@gmail.com',
        ]);

        $users = User::factory()->count(99)->create()->pluck('id');

        for ($i = 0; $i < 1_000; $i++) {
            Order::factory()
                ->create([
                    'user_id' => $users->random(),
                ]);
        }
    }
}
