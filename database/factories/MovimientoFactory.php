<?php

namespace Database\Factories;

use App\Models\Movimiento;
use App\Models\Usuario;
use App\Models\Equipo;
use Illuminate\Database\Eloquent\Factories\Factory;

class MovimientoFactory extends Factory
{
    protected $model = Movimiento::class;

    public function definition()
    {
        return [
            'fecha_movimiento' => $this->faker->dateTime(),
            'tipo_movimiento' => $this->faker->randomElement(['Entrada', 'Salida']),
            'id_usuario' => Usuario::all()->random()->id,  // Toma un ID aleatorio de la tabla usuarios
            'id_equipo' => Equipo::all()->random()->id,  // Toma un ID aleatorio de la tabla equipos
            'observaciones' => $this->faker->sentence(),
        ];
    }
}
