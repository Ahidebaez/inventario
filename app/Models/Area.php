<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;

    // La tabla asociada al modelo
    protected $table = 'areas';

    // La clave primaria personalizada
    protected $primaryKey = 'id_area';

    // Los atributos asignables en masa
    protected $fillable = [
        'nombre_area',
        'ubicacion',
    ];

    public function equipos()
    {
        return $this->hasMany(Equipo::class, 'id_area'); // Relación 'hasMany' con 'Equipo'
    }
}