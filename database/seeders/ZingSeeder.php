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
        $zing = new Zing();

        $zing->title = 'Gancho 3D plegable en colores';
        $zing->description = 'Gancho 3D plegable en colores. Robusto. Aguanta hasta 100Kg con un relleno del 100% y 50Kg con un relleno del 20%.';
        $zing->user_id = 1;

        $zing->save();

        $image = new Image();

        $image->url = url('images/zing3d.png');
        $image->imageable_id = $zing->id;
        $image->imageable_type = Zing::class;

        $image->save();

        $zings = Zing::factory(100)->create();

        foreach ($zings as $zing) {
            Image::factory(1)->create([
                'imageable_id' => $zing->id,
                'imageable_type' => Zing::class
            ]);
        }

        
    }
}
