<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Model
{
    use Notifiable;

    protected $table = 'usuarios';  // Especifica la tabla 'usuarios'

    protected $fillable = [
        'username',
        'password',
        'id_rol',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function rol()
    {
        return $this->belongsTo(Rol::class, 'id_rol');
    }

    // Relación con la tabla de menús
    public function menu()
    {
        return $this->belongsToMany(Menu::class, 'roles_menus_principales', 'id_rol', 'id_menu_principal')
            ->where('roles_menus_principales.estado', 'S')
            ->where('menus.estado', 'S');
    }


    public function getAuthIdentifierName()
    {
        return 'id';
    }
}
