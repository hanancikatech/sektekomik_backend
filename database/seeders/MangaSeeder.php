<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Manga;
use Illuminate\Database\Seeder;

class MangaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Manga::factory(10)
                ->hasAttached(Category::factory()->count(3))
                ->create();
    }
}
