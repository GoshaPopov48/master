<?php

namespace Database\Seeders;

use App\Models\Car;
use App\Models\Comment;
use Illuminate\Database\Seeder;

class CarsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Car::factory()->count(3)
            ->has(Comment::factory()->count(12))
            ->create();
    }
}
