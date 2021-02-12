<?php

namespace App\Providers;

use App\Models\SubMenuRol;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $rolId = 0;
       // dd(isset($_SESSION['rol_id']));
        if (isset($_SESSION['rol_id'])){
            //dd($rolId);
            $menu = cache()->tags('Menu')->rememberForever('MenuPrincipal.rolid', function () {
                $rolId = $_SESSION['rol_id'];
                return SubMenuRol::menuDinamico($rolId);
            });
            config(['adminlte.menu' => $menu]);
        }
    }
}
