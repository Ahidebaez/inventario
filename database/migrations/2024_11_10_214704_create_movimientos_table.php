<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('movimientos', function (Blueprint $table) {
            // Agregar la columna de ID
            $table->id();
            
            // Agregar la fecha y tipo de movimiento
            $table->timestamp('fecha_movimiento')->useCurrent();
            $table->enum('tipo_movimiento', ['Entrada', 'Salida']);
            
            // Claves foráneas para relacionar con las tablas usuarios y equipos
            $table->foreignId('id_usuario')->constrained()->onDelete('cascade'); // No es necesario especificar la tabla 'usuarios'
            $table->foreignId('id_equipo')->constrained()->onDelete('cascade'); // No es necesario especificar la tabla 'equipos'
            
            // Agregar columna para observaciones
            $table->text('observaciones')->nullable();
            
            // Agregar timestamps si se requiere
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Eliminar la tabla si es necesario revertir la migración
        Schema::dropIfExists('movimientos');
    }
};
