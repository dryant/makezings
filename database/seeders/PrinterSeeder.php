<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

class PrinterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csvFile = File::get('public/data/printers/printers.csv');

        $data = array_map('str_getcsv', explode("\n", $csvFile));

        
        foreach ($data as $row) {
            echo $row[0]." => ".$row[1]."\n";

            DB::table('printers')->insert([
                'created_at' => now(),
                'updated_at' => now(),
                'brand' => $row[0],
                'model' => $row[1]
            ]);
        }
    }
}
