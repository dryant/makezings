<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Profile>
 */
class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
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
        // $users = User::pluck('id')->toArray();

        return [
                // 'user_id' => $this->faker->randomElement($users),
                'country' => 'España',
                'postal_code' => $this->faker->randomElement($codigosPostales),
                'biography' => fake()->sentence(25),
                'website' => "https://dryant.com",
                'instagram' => "https://www.instagram.com/dryant/",
                'youtube' => "https://www.youtube.com/channel/UCsviTHiUZRIVDzIc4YUE7Ag",
                'tiktok' => "https://www.tiktok.com/@dryant",
                'linkedin' => "https://www.linkedin.com/in/dryant/",
        ];
    }
}
