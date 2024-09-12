<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Configuracion extends Model
{
    use HasFactory;

    protected $table = 'configuraciones';

    public $timestamps = false;

    protected $primaryKey = 'id_configuracion';

    protected $fillable = [
        'id_universidad',
        'tipo',
        'descripcion',
        'estado',
    ];

    public function universidad()
    {
        return $this->belongsTo(Universidad::class, 'id_universidad');
    }
}
