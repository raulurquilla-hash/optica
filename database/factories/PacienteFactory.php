<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Paciente>
 */
class PacienteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'fecha_consulta' => $this->faker->date(),
            'nombre1' => $this->faker->firstName(),
            'nombre2' => $this->faker->firstName(),
            'apellidoP' => $this->faker->lastName(),
            'apellidoM' => $this->faker->lastName(),
            'DUI' => $this->faker->unique()->numerify('#########-#'),
            'fecha_nacimiento' => $this->faker->date(),
            'genero' => $this->faker->randomElement(['Masculino', 'Femenino', 'Otro']),
            'telefono' => $this->faker->phoneNumber(),
            'email' => $this->faker->unique()->safeEmail(),
            'direccion' => $this->faker->address(),
            'expediente_medico' => $this->faker->unique()->bothify('EXP-#####'),
        ];
    }
}
