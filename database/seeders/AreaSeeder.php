<?php

namespace Database\Seeders;

use App\Models\Area;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Vaciar la tabla
        Area::truncate();

        // Insertar los registros
        $areas = [
            ['nombre_area' => 'Sala de Lectura', 'ubicacion' => 'Primer Piso - Sección A', 'created_at' => '2024-11-24 21:54:33', 'updated_at' => '2024-11-24 21:54:33'],
            ['nombre_area' => 'Sala de Computación', 'ubicacion' => 'Segundo Piso - Sección B', 'created_at' => '2024-11-24 21:54:33', 'updated_at' => '2024-11-24 21:54:33'],
            ['nombre_area' => 'Oficina de Administración', 'ubicacion' => 'Primer Piso - Sección C', 'created_at' => '2024-11-24 21:54:33', 'updated_at' => '2024-11-24 21:54:33'],
            ['nombre_area' => 'Sala de Idioma de Francés', 'ubicacion' => 'Segundo Piso - Sección D', 'created_at' => '2024-11-24 21:54:33', 'updated_at' => '2024-11-24 21:54:33'],
            ['nombre_area' => 'Sala de Idioma de Inglés', 'ubicacion' => 'Segundo Piso - Sección E', 'created_at' => '2024-11-24 21:54:33', 'updated_at' => '2024-11-24 21:54:33'],
            ['nombre_area' => 'Sala de Cómputo Adicional', 'ubicacion' => 'Primer Piso - Sección F', 'created_at' => '2024-11-24 21:54:33', 'updated_at' => '2024-11-24 21:54:33'],
            ['nombre_area' => 'Bodega', 'ubicacion' => 'Primer Piso - Sección G', 'created_at' => '2024-11-24 21:54:33', 'updated_at' => '2024-11-24 21:54:33'],
            ['nombre_area' => 'Oficina de Informática', 'ubicacion' => 'Primer Piso - Sección H', 'created_at' => '2024-11-24 21:54:33', 'updated_at' => '2024-11-24 21:54:33'],
            ['nombre_area' => 'Módulo de Servicios Digitales', 'ubicacion' => 'Primer Piso - Sección I', 'created_at' => '2024-11-24 21:54:33', 'updated_at' => '2024-11-24 21:54:33'],
        ];

        foreach ($areas as $area) {
            Area::create($area);
        }
    }
}