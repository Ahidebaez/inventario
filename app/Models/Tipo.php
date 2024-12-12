<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipo extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nombre_tipo',
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tipos';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id_tipo_equipo';

    /**
     * Indicates if the primary key is auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;

    /**
     * The type of the primary key.
     *
     * @var string
     */
    protected $keyType = 'int'; // Si tu clave primaria es un entero, asegúrate de que sea 'int'.

    /**
     * Definir la relación con el modelo Equipo.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function equipos()
    {
        return $this->hasMany(Equipo::class, 'id_tipo_equipo');
    }
}