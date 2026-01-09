<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Examen>
 */
class ExamenFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            random_int(1, 100), // id_paciente
            $this->faker->date(), // fecha_examen
            $this->faker->text(200), // observaciones               
        ];
    }
}
