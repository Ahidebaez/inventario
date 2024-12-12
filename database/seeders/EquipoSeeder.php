<?php
namespace Database\Seeders;

use App\Models\Equipo;
use App\Models\Area;
use App\Models\Tipo;
use Illuminate\Database\Seeder;

class EquipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Limpiar las tablas antes de agregar datos
        Equipo::truncate();
        Area::truncate();
        Tipo::truncate();

        // Crear datos de áreas
        $areas = Area::create([
            ['nombre_area' => 'Sala de Idioma de Francés'],
            ['nombre_area' => 'Sala de Idioma de Inglés'],
            ['nombre_area' => 'Sala de Cómputo'],
            ['nombre_area' => 'Biblioteca'],
            ['nombre_area' => 'Oficinas']
        ]);

        // Crear datos de tipos de equipo
        $tipos = Tipo::create([
            ['nombre_tipo' => 'Computadora'],
            ['nombre_tipo' => 'Impresora'],
            ['nombre_tipo' => 'Proyector']
        ]);

        // Crear equipos con datos relacionados
        Equipo::create([
            'nombre_equipo' => 'Computadora Dell',
            'descripcion' => 'Computadora asignada a la sala de lectura para tareas administrativas.',
            'estado' => 'Disponible',
            'fecha_adquisicion' => '2023-01-15',
            'area' => 1,  // Sala de Idioma de Francés
            'tipo_equipo' => 1,  // Computadora
        ]);

        Equipo::create([
            'nombre_equipo' => 'Proyector Epson',
            'descripcion' => 'Proyector para uso en capacitaciones y presentaciones.',
            'estado' => 'Asignado',
            'fecha_adquisicion' => '2022-10-20',
            'area' => 4,  // Biblioteca
            'tipo_equipo' => 2,  // Proyector
        ]);

        Equipo::create([
            'nombre_equipo' => 'Escritorio Ejecutivo',
            'descripcion' => 'Escritorio utilizado en la oficina administrativa.',
            'estado' => 'En reparación',
            'fecha_adquisicion' => '2021-05-10',
            'area' => 2,  // Sala de Idioma de Inglés
            'tipo_equipo' => 3,  // Proyector
        ]);

        // Puedes seguir agregando más equipos aquí...
    }
}

