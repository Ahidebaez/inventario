<?php

namespace Database\Seeders;

use App\Models\Movimiento;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MovimientoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Movimiento::factory(10)->create();  // Genera 10 registros de movimiento
    }
}
