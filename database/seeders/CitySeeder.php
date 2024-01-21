<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\City;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $csvFile = File::get('public/data/postalcodes/ES/zipcodes.es.csv');
        // echo $csvFile;
        $data = array_map('str_getcsv', explode("\n", $csvFile));

        foreach ($data as $row) {
            DB::table('cities')->insert([
                'created_at' => now(),
                'updated_at' => now(),
                'postal_code' => $row[1],
                'name' => $row[2],
                'region' => $row[3],
                'country' => 'España',
            ]);
        }
    }
}
