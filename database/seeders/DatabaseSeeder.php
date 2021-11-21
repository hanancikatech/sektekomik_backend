<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Manga;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'name' => 'hanan',
            'email' => 'hasyrawi@gmail.com',
            'password' => bcrypt('awiroot123'),
        ]);
        
        $this->call([MangaSeeder::class]);        
    }
}
