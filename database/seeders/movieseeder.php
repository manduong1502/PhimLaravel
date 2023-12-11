<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\movie_vip;
use Faker\Factory as Faker;

class movieseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for ($i = 1; $i <= 10; $i++) {
            movie_vip::create([
                'title' => $faker->sentence(3),
                'description' => $faker->paragraph(3),
                // Các trường dữ liệu khác có thể thêm ở đây
            ]);
        }
    }
}
