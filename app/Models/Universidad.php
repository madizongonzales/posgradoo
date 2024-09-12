<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Universidad extends Model
{
    use HasFactory;

    protected $table = 'universidades';

    public $timestamps = false;

    protected $primaryKey = 'id_universidad';

    protected $fillable = [
        'nombre',
        'nombre_abreviado',
        'inicial',
        'estado',
    ];
}
