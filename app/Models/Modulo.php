<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modulo extends Model
{
    use HasFactory;

    protected $table = 'modulos';

    public $timestamps = false;

    protected $primaryKey = 'id_modulo';

    protected $fillable = [
        'nombre',
        'estado',
    ];
}
