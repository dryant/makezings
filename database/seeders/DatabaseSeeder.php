<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Profile;
use App\Models\City;
use App\Models\Zing;
use App\Models\Printer;

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
            PermissionSeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
            ProfileSeeder::class,
            ZingSeeder::class,
            PrinterSeeder::class,
        ]);

        
    }
}
