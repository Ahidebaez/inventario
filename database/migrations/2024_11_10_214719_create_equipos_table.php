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
        Schema::create('equipos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_equipo');
            $table->text('descripcion');
            $table->enum('estado', ['Disponible', 'En reparación', 'Asignado']);
            $table->date('fecha_adquisicion');
            $table->unsignedBigInteger('area');  // FK a 'areas'
            $table->unsignedBigInteger('tipo_equipo');  // FK a 'tipos'
            $table->timestamps();

            // Agregar claves foráneas
            $table->foreign('area')->references('id')->on('areas')->onDelete('cascade');
            $table->foreign('tipo_equipo')->references('id')->on('tipos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipos');
    }
};
