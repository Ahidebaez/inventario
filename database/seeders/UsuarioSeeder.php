<?php

namespace Database\Seeders;

use App\Models\Usuario;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsuarioSeeder extends Seeder
{
    public function run(): void
    {
        // Desactivar las verificaciones de claves foráneas
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Truncar la tabla usuarios
        Usuario::truncate();

        // Reactivar las verificaciones de claves foráneas
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Registros específicos proporcionados
        $usuarios = [
            [
                'nombre_usuario' => 'Norma Ahide Burciaga Baez',
                'correo' => 'l17430388@piedrasnegras.tecnm.mx',
                'telefono' => '8781380785',
                'rol' => 'Residente',
            ],
            [
                'nombre_usuario' => 'Rene Perez Mendez',
                'correo' => 'informatica@piedrassnegras.gob.mx',
                'telefono' => '8781155115',
                'rol' => 'Administrador',
            ],
            [
                'nombre_usuario' => 'Mariana García López',
                'correo' => 'informatica@piedrasneegras.gob.mx',
                'telefono' => '8781456723',
                'rol' => 'Usuario',
            ],
            [
                'nombre_usuario' => 'Carlos Eduardo Torres Ramos',
                'correo' => 'ctorres@pieedrasnegras.gob.mx',
                'telefono' => '8781234589',
                'rol' => 'Usuario',
            ],
            [
                'nombre_usuario' => 'Laura Isabel Mendoza Pérez',
                'correo' => 'lmendoza@infoteca.com.mx',
                'telefono' => '8781549876',
                'rol' => 'Usuario',
            ],
            [
                'nombre_usuario' => 'José Luis Hernández Muñoz',
                'correo' => 'jose.luis@educacion.org.mx',
                'telefono' => '8781765432',
                'rol' => 'Usuario',
            ],
            [
                'nombre_usuario' => 'Ana Patricia Herrera Velasco',
                'correo' => 'anaherrera@piedrasnegrass.edu.mx',
                'telefono' => '8781098765',
                'rol' => 'Usuario',
            ],
        ];

        // Insertar usuarios específicos
        foreach ($usuarios as $usuario) {
            Usuario::create($usuario);
        }

        // // Crear usuarios adicionales con el factory
        // Usuario::factory(10)->create();
    }
}