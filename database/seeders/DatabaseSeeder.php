<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Profile;
use App\Models\City;
use App\Models\Zing;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CitySeeder::class,
            UserSeeder::class,
            ProfileSeeder::class,
            ZingSeeder::class
        ]);

        
    }
}
