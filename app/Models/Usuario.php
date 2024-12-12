<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $table = 'usuarios'; // Nombre de la tabla en la base de datos
    protected $primaryKey = 'id'; // Clave primaria definida como 'id'
    public $timestamps = false; // Si no tienes columnas created_at y updated_at, desactívalo

    protected $fillable = [
        'nombre_usuario',
        'correo',
        'telefono',
        'rol',
    ];
}