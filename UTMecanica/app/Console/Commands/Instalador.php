<?php

namespace App\Console\Commands;

use App\Models\Docente;
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
            $docente = $this->crearDocente();
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
            'descripcion' => 'Menú Administrador',
            'menu_nombre' => 'Administrar',
            'icono' => 'fas fa-tools'
        ],[
            'descripcion' => 'Menú Gestionar',
            'menu_nombre' => 'Gestión',
            'icono' => 'fas fa-users-cog'
        ],[
            'descripcion' => 'Menú Usuarios',
            'menu_nombre' => 'Usuarios',
            'icono' => 'fas fa-users'
        ],[
            'descripcion' => 'Impresión de reportes',
            'menu_nombre' => 'Reportes',
            'icono' => 'fas fa-chart-bar'
        ]);
    }

    private function crearSubMenus()
    {
        return SubMenu::create([
            'menus_id' => 1,
            'descripcion'=> 'Menus principal',
            'sub_menu_nombre'=> 'Menús',
            'icono' => 'fas fa-bars',
            'url' => 'administrar/menu'
        ],[
            'menus_id' => 1,
            'descripcion'=> 'Creación de los menús del sistema',
            'sub_menu_nombre'=> 'Submenús',
            'icono' => 'fas fa-stream',
            'url' => 'administrar/sub_menu'
        ],[
            'menus_id' => 1,
            'descripcion'=> 'Crear los roles',
            'sub_menu_nombre'=> 'Roles',
            'icono' => 'fas fa-user-lock',
            'url' => 'administrar/roles'
        ],[
            'menus_id' => 1,
            'descripcion'=> 'Asigna al submenú al rol del usuario',
            'sub_menu_nombre'=> 'Asignar Menú',
            'icono' => 'far fa-address-card',
            'url' => 'administrar/asignar_menu'
        ],[
            'menus_id' => 2,
            'descripcion'=> 'Agregar los tipos de temas de tesis',
            'sub_menu_nombre'=> 'Tipos temas',
            'icono' => 'fab fa-tumblr-square',
            'url' => 'administrar/tipo_tema'
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

    private function crearDocente () {
        return Docente::create([
            'usuario_id' => 1,
            'identificacion_docente' => '12345678910',
            'nombre_docente' => 'Docente',
            'apellido_docente' => 'Administrador',
            'correo_docente' => 'correo@mail.com',
            'celular' => '0984561258',
            'habilitado' => true
        ]);
    }
}
