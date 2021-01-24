<?php

namespace Database\Seeders;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now()->toDateTimeString();

        Category::insert([
            ['name' => 'Movies', 'slug' => 'movies', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Series', 'slug' => 'Series', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Actors', 'slug' => 'Actors', 'created_at' => $now, 'updated_at' => $now],
        ]);
    }
}

