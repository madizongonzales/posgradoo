<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;

    protected $table = 'areas';

    public $timestamps = false;

    protected $primaryKey = 'id_area';

    protected $fillable = [
        'id_universidad',  // Asegúrate de que este campo esté presente
        'nombre',
        'nombre_abreviado',
        'estado',
    ];

    // Definir la relación con Universidad
    public function universidad()
    {
        return $this->belongsTo(Universidad::class, 'id_universidad');
    }
}
