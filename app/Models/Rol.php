<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    use HasFactory;

    protected $table = 'roles';

    public $timestamps = false;

    protected $primaryKey = 'id_rol';

    protected $fillable = [
        'nombre',
        'descripcion',
        'estado',
    ];

    public function menusPrincipales()
    {
        return $this->belongsToMany(MenuPrincipal::class, 'roles_menus_principales', 'id_rol', 'id_menu_principal');
    }
    // Relación con el modelo Usuario
    public function usuarios()
    {
        return $this->hasMany(Usuario::class, 'id_rol');
    }
}
