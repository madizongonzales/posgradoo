<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    protected $table = 'usuarios';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'username', 'password', 'id_rol'
    ];
}
