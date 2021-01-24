<?php

namespace App\Console\Commands;

use App\Models\Menu;
use App\Models\Rol;
use App\Models\SubMenu;
use App\Models\Usuario;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class Instalador extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'UTMecanica:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Instalador inical del proyecto';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        if (!$this -> verificar()){
            $menu = $this->crearMenu();
            $subMenus = $this->crearSubMenus();
            $rol = $this->crearRolAdministrador();
            $rol->subsMenusRoles()->attach($subMenus);
            $usuario = $this->crearUsuarioAdmin();
            $this -> line('El instalador se ejecuto correctamente');
        }else{
            $this -> error('No se puede ejecutar el instalador');
        }
    }

    private function verificar()
    {
        return Rol::find(1);
    }

    private function crearRolAdministrador()
    {
        $rol = "Administrador";
        return Rol::create([
            'nombre'=> $rol,
            'slug' => Str::slug($rol,'-')
        ]);
    }

    private function crearMenu()
    {
        return Menu::create([
            'descripcion' => 'Menu de pagina de inicio',
            'menu_nombre' => 'Inicio',
            'icono' => 'icono',
            'url' => 'ruta Inicio'
        ]);
    }

    private function crearSubMenus()
    {
        return SubMenu::create([
            'menus_id' => 1,
            'descripcion'=> 'Menus principal',
            'sub_menu_nombre'=> 'Menus',
            'icono' => 'icono menu',
            'url' => 'ruta_menu'
        ]);
    }

    private function crearUsuarioAdmin()
    {
        return Usuario::create([
            'roles_id' => 1,
            'email' => 'admin@mail.com',
            'password' => Hash::make('admin123'),
            'fecha_caducidad' => '2022-12-31',
            'estado' => 1
        ]);
    }
}
