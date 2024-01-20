<?php 
public function run(): void
{
    // Crea usuarios y perfiles
    $users = User::factory(14)->create();

    foreach ($users as $user) {
        // Crea un perfil para cada usuario
        $profile = Profile::factory()->create([
            'user_id' => $user->id,
            // ... otros atributos del perfil
        ]);

        // Crea una imagen para cada perfil
        $image = new \App\Models\Image();
        $image->url = asset('images/gravatar_' . $user->id . '.png');
        $image->imageable_id = $profile->id;
        $image->imageable_type = 'App\Models\Profile';
        $image->save();

        // Asigna la URL de la imagen al perfil
        $profile->image()->associate($image);
        $profile->save();
    }

    // Crear usuario administrador (como en tu código original)
    $admin = User::create([
        'name' => 'admin',
        'email' => 'dryant@gmail.com',
        'password' => bcrypt('12345678'),
        'slug' => 'admin',
    ]);

    $adminProfile = Profile::create([
        'user_id' => $admin->id,
        'country' => 'España',
        'postal_code' => '28001',
        'biography' => 'Me llamo dryant. Soy ingeniero informático y maker por afición. Diseño Piezas',
        'website' => 'https://dryant.com',
        'instagram' => 'https://www.instagram.com/dryant/',
        'youtube' => 'https://www.youtube.com/channel/UCsviTHiUZRIVDzIc4YUE7Ag',
        'tiktok' => 'https://www.tiktok.com/@dryant',
        'linkedin' => 'https://www.linkedin.com/in/dryant/',
    ]);

    $adminImage = new \App\Models\Image();
    $adminImage->url = asset('images/gravatar_admin.png');
    $adminImage->imageable_id = $adminProfile->id;
    $adminImage->imageable_type = 'App\Models\Profile';
    $adminImage->save();

    $adminProfile->image()->associate($adminImage);
    $adminProfile->save();
}
