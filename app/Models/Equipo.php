<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Equipo extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre_equipo', 
        'descripcion', 
        'estado', 
        'fecha_adquisicion', 
        'area',   // Nombre de la columna 'area' (FK)
        'tipo_equipo' // Nombre de la columna 'tipo_equipo' (FK)
    ];

    protected $table = 'equipos'; // Especificar la tabla
    protected $primaryKey = 'id'; // Clave primaria
    public $timestamps = true; // Activar timestamps

    // Relación con el modelo Area
    public function area()
    {
        return $this->belongsTo(Area::class, 'area'); // FK con 'area'
    }

    // Relación con el modelo Tipo
    public function tipo()
    {
        return $this->belongsTo(Tipo::class, 'tipo_equipo'); // FK con 'tipo_equipo'
    }
}
