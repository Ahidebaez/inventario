<?php

namespace Database\Factories;

use App\Models\Tipo;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tipo>
 */
class TipoFactory extends Factory
{
    protected $model = Tipo::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre_tipo' => $this->faker->randomElement(['Computadora', 'Escritorio', 'Silla', 'Proyector', 'Mesa', 'Estante', 'Impresora'])
        ];
    }
}
