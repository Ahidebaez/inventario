<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movimiento extends Model
{
    use HasFactory;

    // Si la tabla usa un nombre diferente a la convención (plural de 'movimiento')
    protected $table = 'movimientos';
   
    protected $fillable = [
        'fecha_movimiento', 'tipo_movimiento', 'usuario', 'equipo', 'observaciones',
    ];
    

    // Si los campos 'created_at' y 'updated_at' no existen en la tabla, desactiva la opción de timestamp
    public $timestamps = false;

    // Definir relación con la tabla usuarios
    // En Movimiento.php (Modelo)
public function usuario()
{
    return $this->belongsTo(Usuario::class, 'usuario'); // Asegúrate de que 'usuario' sea el nombre de la columna
}

public function equipo()
{
    return $this->belongsTo(Equipo::class, 'equipo'); // Asegúrate de que 'equipo' sea el nombre de la columna
}
}