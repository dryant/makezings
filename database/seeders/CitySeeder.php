<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\City;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $city = new City();
        
        $city->postal_code = '28001';
        $city->name = 'Madrid';
        $city->region = 'Madrid';
        $city->country = 'España';

        $city->save();
    }
}
