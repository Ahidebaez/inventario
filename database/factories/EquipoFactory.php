<?php
namespace Database\Factories;

use App\Models\Equipo;
use App\Models\Area;
use App\Models\Tipo;
use Illuminate\Database\Eloquent\Factories\Factory;

class EquipoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Obtener los IDs de las áreas y tipos existentes en la base de datos
        $areaIds = Area::pluck('id')->toArray();
        $tipoIds = Tipo::pluck('id')->toArray();

        return [
            'nombre_equipo' => $this->faker->randomElement([
                'Computadora',
                'Impresora',
                'Proyector',
                'Escáner',
                'Pantalla LED',
                'Router',
                'Servidor',
                'Unidad de almacenamiento',
                'Estación de trabajo',
                'Laptop',
                'Computadora de escritorio',
                'Impresora láser',
                'Proyector de video',
                'Monitor',
                'Teclado mecánico',
                'Ratón óptico',
            ]), // Nombres aleatorios de equipos
            'descripcion' => $this->faker->sentence(),
            'estado' => $this->faker->randomElement(['Disponible', 'En reparación', 'Asignado']),
            'fecha_adquisicion' => $this->faker->date(),
            'area' => $this->faker->randomElement($areaIds), // Seleccionar un ID de área
            'tipo_equipo' => $this->faker->randomElement($tipoIds), // Seleccionar un ID de tipo de equipo
        ];
    }
}