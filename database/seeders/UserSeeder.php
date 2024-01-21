<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Profile;

class UserSeeder extends Seeder
{
    /**
    * Run the database seeds.
    */
    public function run(): void
    {
        
        $user = new User();
        
        /*********************************************
        *          Estilos Usuario por defecto
        **********************************************/
        
        
        $user->name = 'admin';
        $user->email = 'dryant@gmail.com';
        $user->password = bcrypt('12345678');
        $user->slug = 'admin';
        
        $user->save();
        
        $profile = new Profile();
        
        $profile->user_id = $user->id;
        $profile->country = 'España';
        $profile->postal_code = '28001';
        $profile->biography = "Ingenierio industrial. Me encanta diseñar mis propias piezas mecanicas. Adoro la impresión 3D desde que me compré mi primera impresora en el 2016. Si necesitas una pieza hecha a medida, soy tu maker.";
        $profile->website = "https://dryant.com";
        $profile->instagram = "https://www.instagram.com/dryant/";
        $profile->youtube = "https://www.youtube.com/channel/UCsviTHiUZRIVDzIc4YUE7Ag";
        $profile->tiktok = "https://www.tiktok.com/@dryant";
        $profile->linkedin = "https://www.linkedin.com/in/dryant/";
        
        $profile->save();
        
        /************* Fin Usuario por defecto *************/
        
        $users = User::factory(14)->create();
        
        foreach ($users as $user) {
            $id = ($user->id) + 1;
            $profile = Profile::factory()->create([
                'user_id' => $user->id,
                'country' => 'España',
                'postal_code' => '28001',
                'biography' => "Me llamo ".$user->name.". Soy ingeniero informatico y maker por afición. Diseño Piezas",
                'website' => "https://dryant.com",
                'instagram' => "https://www.instagram.com/dryant/",
                'youtube' => "https://www.youtube.com/channel/UCsviTHiUZRIVDzIc4YUE7Ag",
                'tiktok' => "https://www.tiktok.com/@dryant",
                'linkedin' => "https://www.linkedin.com/in/dryant/",
                
            ]);
            
            $image = new \App\Models\Image();
            
            $image->url = asset('images/gravatar_'.$user->id.'.png');
            $image->imageable_id = $profile->id;
            $image->imageable_type = 'App\Models\Profile';
            
            var_dump($image->url);
            
            $image->save();
            
            $profile->image()->create([
                'url' => $image->url,
                'imageable_id' => $profile->id,
                'imageable_type' => 'App\Models\Profile',
            ]);
            
            $profile->save();
            
        }
        
        
        
    }
    
    
}
