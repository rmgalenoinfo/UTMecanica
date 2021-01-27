<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubMenu extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function menus() {
        return $this->belongsTo(Menu__class::class);
    }

    public function subMenusRol()
    {
        return $this->hasMany(SubMenuRol::class, 'sub_menus_id');
    }

}
