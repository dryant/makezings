<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $user = new User();

        $user->name = 'admin';
        $user->email = 'dryant@gmail.com';
        $user->password = bcrypt('12345678');

        $user->save();

        $profile = new Profile();

        $profile->user_id = $user->id;
        $profile->country = 'España';
        $profile->city = 'Madrid';
        $profile->postal_code = '28001';
        $profile->region = "Madrid";
        $profile->biography = "Me llamo dryant. Soy ingeniero informatiko y maker por afición. Diseño Piezas";
        $profile->website = "https://dryant.com";
        $profile->instagram = "https://www.instagram.com/dryant/";
        $profile->youtube = "https://www.youtube.com/channel/UCsviTHiUZRIVDzIc4YUE7Ag";
        $profile->tiktok = "https://www.tiktok.com/@dryant";
        $profile->linkedin = "https://www.linkedin.com/in/dryant/";
    
        $profile->save();




    }
}
