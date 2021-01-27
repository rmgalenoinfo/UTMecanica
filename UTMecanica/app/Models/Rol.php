<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    use HasFactory;
    protected $table = 'roles';
    protected $guarded = [];

    //relacion de muchos a muchos
    public function subsMenusRoles ()
    {
        return $this->belongsToMany(SubMenuRol::class, 'sub_menus_roles', 'sub_menus_id', 'roles_id');
    }

    // Relacion uno a muchos
    public function usuarios ()
    {
        return $this->hasMany(Usuario::class, 'roles_id');
    }
}
