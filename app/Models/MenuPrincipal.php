<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuPrincipal extends Model
{
    use HasFactory;

    protected $table = 'menus_principales';

    public $timestamps = false;

    protected $primaryKey = 'id_menu_principal';

    protected $fillable = [
        'id_modulo', // Asegúrate de que este campo esté incluido en $fillable
        'nombre',
        'icono',
        'orden',
        'estado',
    ];

    // Relación con el modelo Modulo
    public function modulo()
    {
        return $this->belongsTo(Modulo::class, 'id_modulo');
    }
}
