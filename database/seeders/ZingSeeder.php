<?php

namespace Database\Seeders;

use App\Models\Zing;
use Database\Factories\ImageFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Image; // Import the missing class 'Image'

class ZingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $zings = Zing::factory(100)->create();

        foreach ($zings as $zing) {
            Image::factory(1)->create([
                'imageable_id' => $zing->id,
                'imageable_type' => Zing::class
            ]);
        }
    }
}
