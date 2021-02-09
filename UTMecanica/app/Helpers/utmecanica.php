<?php

use App\Models\SubMenuRol;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

if (!function_exists('isSuperAdmin')) {
    function isSuperAdmin() {
        Log::info(Session::get('rol_slug') == 'administrador');
        return Session::get('rol_slug') == 'administrador';
    }
}

if (!function_exists('getMenuDinamico')) {
    function getMenuDinamico () {
        dd(session()->get('rol_id'));
        $idRol = session()->get('rol_id');
        SubMenuRol::menuDinamico($idRol);
    }
}
