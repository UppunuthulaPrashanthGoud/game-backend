<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Action', 'Racing', 'Adventures', 'Classic', 'Mind Games', 'Puzzles', 'Education', 'Sports', 'Strategy',
        ];
        foreach ($categories as $name) {
            Category::firstOrCreate([
                'name' => $name,
            ], [
                'slug' => str($name)->slug(),
                'is_active' => true,
            ]);
        }
    }
}
