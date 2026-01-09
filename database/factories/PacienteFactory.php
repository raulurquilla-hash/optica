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
        $nombre1 = $this->faker->firstName();
        $nombre2 = $this->faker->firstName();
        $apellidoP = $this->faker->lastName();
        $apellidoM = $this->faker->lastName();
        
        return [
            'fecha_consulta' => $this->faker->date(),
            'nombre1' => $nombre1,
            'nombre2' => $nombre2,
            'apellidoP' => $apellidoP,
            'apellidoM' => $apellidoM,
            'DUI' => $this->faker->unique()->numerify('##########'),
            'fecha_nacimiento' => $this->faker->date(),
            'genero' => $this->faker->randomElement(['Masculino', 'Femenino']),
            'telefono' => $this->faker->phoneNumber(),
            'email' => $this->faker->unique()->safeEmail(),
            'direccion' => $this->faker->address(),
            'expediente_medico' => $this->generarCodigoExpediente($nombre1, $nombre2, $apellidoP, $apellidoM),
        ];
    }
    
    /**
     * Genera el código de expediente a partir de los nombres y apellidos
     * Formato: Iniciales + ID formateado con ceros
     * Ejemplo: JM-CR-000001 (Juan María - Carmen Rodríguez - ID 1)
     */
    private function generarCodigoExpediente(string $nombre1, string $nombre2, string $apellidoP, string $apellidoM): string
    {
        // Función para obtener inicial sin acentos
        $getInicial = function($texto) {
            // Remover acentos
            $acentos = array('á'=>'a','é'=>'e','í'=>'i','ó'=>'o','ú'=>'u','Á'=>'A','É'=>'E','Í'=>'I','Ó'=>'O','Ú'=>'U','ñ'=>'n','Ñ'=>'N');
            $texto = strtr($texto, $acentos);
            return strtoupper(substr($texto, 0, 1));
        };
        
        // Obtener iniciales de nombres
        $inicialN1 = $getInicial($nombre1);
        $inicialN2 = $getInicial($nombre2);
        
        // Obtener iniciales de apellidos
        $inicialAP = $getInicial($apellidoP);
        $inicialAM = $getInicial($apellidoM);
        
        // Obtener el próximo ID
        $id = \App\Models\Paciente::max('id') + 1;
        $idFormateado = str_pad($id, 6, '0', STR_PAD_LEFT);
        
        return "{$inicialN1}{$inicialN2}-{$inicialAP}{$inicialAM}-{$idFormateado}";
    }
}
