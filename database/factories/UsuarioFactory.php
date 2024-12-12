<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Usuario>
 */
class UsuarioFactory extends Factory
{
    protected $model = \App\Models\Usuario::class;

    public function definition(): array
    {
        return [
            'nombre_usuario' => $this->faker->name(),
            'correo' => $this->faker->unique()->safeEmail(),
            'telefono' => $this->faker->unique()->phoneNumber(),
            'rol' => $this->faker->randomElement(['Administrador', 'Residente', 'Usuario']),
        ];
    }
}
