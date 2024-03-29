<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserSeeder extends Seeder
{
    /**
    * Run the database seeds.
    */
    public function run(): void
    {
        // Antes de crear el usuario "admin", asegúrate de que el rol "Admin" exista
        // $adminRole = Role::firstOrCreate(['name' => 'Admin']);

        $user = new User();
        
        /*********************************************
        *          Usuario Admin por defecto
        **********************************************/
        
        
        $user->name = 'admin';
        $user->email = 'admin@gmail.com';
        $user->password = bcrypt('12345678');
        $user->slug = 'admin';
        $user->avatar_url = 'images/avatars/1.jpg';
        
        $user->save();
        
        $user->assignRole('Admin');
        
        $profile = new Profile();
        
        $profile->user_id = $user->id;
        $profile->country = 'España';
        $profile->postal_code = '08001';
        $profile->biography = "Me llamo dryant. Soy ingeniero informatico y maker por afición. Diseño Piezas";
        $profile->website = "https://dryant.com";
        $profile->instagram = "https://www.instagram.com/dryant/";
        $profile->youtube = "https://www.youtube.com/channel/UCsviTHiUZRIVDzIc4YUE7Ag";
        $profile->tiktok = "https://www.tiktok.com/@dryant";
        $profile->linkedin = "https://www.linkedin.com/in/dryant/";
        
        $profile->save();
        
        // $adminprinter = new Printer();

        // $adminprinter->user_id = $user->id;
        

        /*********************************************
        *          Usuario maker por defecto
        **********************************************/

        $user2 = new User();

        $user2->name = 'Alvaro';
        $user2->email = 'alvaro@gmail.com';
        $user2->password = bcrypt('12345678');
        $user2->slug = 'alvaro';
        $user2->avatar_url = 'images/avatars/2.jpg';
        
        $user2->save();
        
        $user->assignRole('Usuario');
        
        $profile2 = new Profile();

        $profile2->user_id = $user2->id;
        $profile2->country = 'España';
        $profile2->postal_code = '28001';
        $profile2->biography = "Soy Alvaro. Tengo una impresora 3D y puedo imprimirte lo que quieras. Diseño Piezas con Fusion 360. Puedes ver mis diseños en Thingiverse. Si quieres que te imprima algo, contacta conmigo.";
        $profile2->website = "https://alvaro3D.com";
        $profile2->instagram = "https://www.instagram.com/alvaro3D/";
        $profile2->youtube = "https://www.youtube.com/channel/UCsviTHiUZRIVDzIc4YUE7Ag";
        $profile2->tiktok = "https://www.tiktok.com/@alvaro3D";
        $profile2->linkedin = "https://www.linkedin.com/in/alvaro3D/";
        
        $profile2->save();
        
        /************* Fin Usuario por defecto *************/
        
        $users = User::factory(14)->create();

        foreach ($users as $user) {
            $user->avatar_url = 'images/avatars/'.($user->id).'.jpg';
            $user->save();
        }

        $codigosPostales = [
            '01001', // Álava
            '02001', // Albacete
            '03001', // Alicante
            '04001', // Almería
            '05001', // Ávila
            '06001', // Badajoz
            '07001', // Islas Baleares (Palma)
            '08001', // Barcelona
            '09001', // Burgos
            '10001', // Cáceres
            '11001', // Cádiz
            '12001', // Castellón
            '13001', // Ciudad Real
            '14001', // Córdoba
            '15001', // A Coruña
            '16001', // Cuenca
            '17001', // Girona
            '18001', // Granada
            '19001', // Guadalajara
            '20001', // Gipuzkoa (San Sebastián)
            '21001', // Huelva
            '22001', // Huesca
            '23001', // Jaén
            '24001', // León
            '25001', // Lleida
            '26001', // La Rioja (Logroño)
            '27001', // Lugo
            '28001', // Madrid
            '29001', // Málaga
            '30001', // Murcia
            '31001', // Navarra (Pamplona)
            '32001', // Ourense
            '33001', // Asturias (Oviedo)
            '34001', // Palencia
            '35001', // Las Palmas (Las Palmas de Gran Canaria)
            '36001', // Pontevedra
            '37001', // Salamanca
            '38001', // Santa Cruz de Tenerife
            '39001', // Cantabria (Santander)
            '40001', // Segovia
            '41001', // Sevilla
            '42001', // Soria
            '43001', // Tarragona
            '44001', // Teruel
            '45001', // Toledo
            '46001', // Valencia
            '47001', // Valladolid
            '48001', // Vizcaya (Bilbao)
            '49001', // Zamora
            '50001', // Zaragoza
            '51001', // Ceuta
            '52001', // Melilla
        ];
        
        $longitudAleatoria = random_int(5, 10);
        
        foreach ($users as $user) {
            $id = ($user->id) + 2;
            $random_postal_code = Arr::random($codigosPostales);
            $web = Str::random($longitudAleatoria);
            $extension = Arr::random(['com', 'es', 'org', 'net', 'info', 'biz', 'eu', 'cat', 'edu', 'gov', 'int', 'mil', 'tel', 'travel']);



            $profile = Profile::factory()->create([
                'user_id' => $user->id,
                'country' => 'España',
                'postal_code' => $random_postal_code,
                'biography' => fake()->sentence(25),
                'website' => "https://".$web.".com",
                'instagram' => "https://www.instagram.com/".$web,
                'youtube' => "https://www.youtube.com/channel/".$web,
                'tiktok' => "https://www.tiktok.com/@".$web,
                'linkedin' => "https://www.linkedin.com/in/".$web,
                
            ]);
            
            // $image = new \App\Models\Image();
            
            // $image->url = asset('images/gravatar_'.$user->id.'.png');
            // $image->imageable_id = $profile->id;
            // $image->imageable_type = 'App\Models\Profile';
            
            // var_dump($image->url);
            
            // $image->save();
            
            // $profile->image()->create([
            //     'url' => $image->url,
            //     'imageable_id' => $profile->id,
            //     'imageable_type' => 'App\Models\Profile',
            // ]);
            
            $profile->save();
            
        }
        
        
        
    }
    
    
}
