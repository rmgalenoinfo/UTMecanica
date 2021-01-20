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

    private function getMenuPadres($fornt)
    {
    }

    private function getMenusHijos($padres, $line)
    {
    }

    private static function getMenu()
    {
    }
}
