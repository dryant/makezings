<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $precio = $this->faker->randomFloat(1, 0, 100);

        $precio = $this->faker->boolean ? round($precio) : $precio;

        $customer_id = $this->faker->numberBetween(1, 15);

        do {
            $maker_id = $this->faker->numberBetween(1, 15);
        } while ($maker_id === $customer_id);

        return [
            'price' => $precio,
            'customer_id' => $this->faker->numberBetween(1, 15),
            'maker_id' => $this->faker->numberBetween(1, 15),
        ];
        
    }
}
