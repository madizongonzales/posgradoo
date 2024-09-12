<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facultad extends Model
{
    use HasFactory;

    // Especificar el nombre de la tabla
    protected $table = 'facultades';

    // Desactivar marcas de tiempo automáticas si no tienes created_at y updated_at
    public $timestamps = false;

    // Especificar la clave primaria
    protected $primaryKey = 'id_facultad';

    // Especificar los campos que pueden ser llenados masivamente
    protected $fillable = [
        'nombre',
        'nombre_abreviado',
        'direccion',
        'telefono',
        'telefono_interno',
        'fax',
        'email',
        'latitud',
        'longitud',
        'fecha_creacion',
        'escudo',
        'imagen',
        'estado_virtual',
        'estado',
        'id_area',
    ];

    // Relación con el modelo Area
    public function area()
    {
        return $this->belongsTo(Area::class, 'id_area');
    }
}
