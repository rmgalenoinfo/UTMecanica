<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function subMenus()
    {
        return $this->hasMany(SubMenuRol::class, 'menus_id');
    }

    private function getMenus()
    {
        return $this::all();
    }

    public static function getMenu()
    {
        $menus = new Menu();
        $menuAll = array($menus->getMenus());
        return $menuAll;
    }
}
