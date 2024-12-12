<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

         // Llamar al seeder de la tabla 'usuarios' para insertar 10 registros (puedes cambiar el número)
         $this->call(UsuarioSeeder::class); // Llamar al seeder de usuarios
            // Seeder para la tabla de equipos
    }
}
