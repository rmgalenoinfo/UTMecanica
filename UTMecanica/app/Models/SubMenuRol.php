<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

use function PHPUnit\Framework\isEmpty;

class SubMenuRol extends Model
{
    use HasFactory;
    protected $table = 'sub_menus_roles';
    protected $guarded = [];


    private function buscarMenus ($idRol){
        $menus = DB::table('menus')->select(['menus.id','menus.menu_nombre','menus.icono'])
        ->join('sub_menus','menus.id','=','sub_menus.menus_id')
        ->join('sub_menus_roles','sub_menus.id','=','sub_menus_roles.sub_menus_id')
        ->where('sub_menus_roles.sub_menus_id','=',$idRol)
        ->groupBy('menus.menu_nombre')->orderBy('menus.id')->get();
        return $menus;
    }

    private function buscarSubMenus ($idRol) {
        $subMenus = DB::table('sub_menus_roles')
        ->select(['sub_menus_roles.menus_id, sub_menus_roles.sub_menu_nombre','sub_menus_roles.icono','sub_menus_roles.url'])
        ->join('sub_menus_roles','sub_menus.id','=','sub_menus_roles.sub_menus_id')
        ->where('sub_menus_roles.sub_menus_id','=',$idRol)->orderBy('sub_menus_roles.menus_id')->get();
        return $subMenus;
    }

    private function crearMenus ($idRol) {
        $menuDinamico = [
            [
                'text' => 'search',
                'search' => true,
                'topnav' => true,
            ],
            [
                'text' => 'blog',
                'url'  => 'admin/blog',
                'can'  => 'manage-blog',
            ],
            [
                'text'        => 'Inicio',
                'url'         => 'Inicio',
                'icon'        => 'fas fa-home',
                'label_color' => 'success',
            ]
        ];

        $menus = $this->buscarMenus($idRol);
        $subMenus = $this->buscarSubMenus($idRol);

        for ($i = 0; $i<count($menus); ++$i) {
            $subMenuD = [];
            for ($j = 0; $j<count($subMenus);++$i) {
                if ($subMenus[$j]['menus_id'] == $menus[$i]['id']) {
                    $subMenu = $this->crearSubMenus($subMenus[$j]['menus_id']);
                    array_push($subMenuD, $subMenu);
                }
            }
            $menuD = [
                'text'    => $menus[$i]['menu_nombre'],
                'icon'    => $menus[$i]['icono'],
                'submenu' =>  $subMenuD
            ];
            array_push($menuDinamico, $menuD);
        }
        return $menuDinamico;
    }

    private function crearSubMenus ($subMenus) {
        $subMenu = [
            'text' => $subMenus['sub_menu_nombre'],
            'icon' => $subMenus['icono'],
            'url' => $subMenus['url']
        ];
        return $subMenu;
    }

    public static function menuDinamico ($idRol) {
        $crearMenu = new SubMenuRol();
        $menuDinamico = $crearMenu->crearMenus($idRol);
        return $menuDinamico;
    }

}
