<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserView extends Model
{
    protected $table = 'users_view'; // Nombre de la vista en la base de datos

    // Definir las columnas que deseas proteger contra la asignación masiva
    protected $guarded = [];

    // Indicar que no tiene timestamps
    public $timestamps = false;
}
