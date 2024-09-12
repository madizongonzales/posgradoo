<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RolMenuPrincipal extends Model
{
    use HasFactory;

    protected $table = 'roles_menus_principales';

    public $timestamps = false;

    protected $primaryKey = 'id_rol_menu_principal';

    protected $fillable = [
        'id_rol',
        'id_menu_principal',
        'estado',
    ];

    public function rol()
    {
        return $this->belongsTo(Rol::class, 'id_rol');
    }

    public function menuPrincipal()
    {
        return $this->belongsTo(MenuPrincipal::class, 'id_menu_principal');
    }
}
