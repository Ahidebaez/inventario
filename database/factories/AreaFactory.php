<?php

namespace Database\Factories;

use App\Models\Area;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Area>
 */
class AreaFactory extends Factory
{
    protected $model = Area::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
           'nombre_area' => $this->faker->words(3, true), // Generará un nombre de área aleatorio como "Sala conferencia general"
           'ubicacion' => $this->faker->randomElement(['Primer piso', 'Segundo piso', 'Planta baja', 'Tercer piso']),

        ];
    }
}