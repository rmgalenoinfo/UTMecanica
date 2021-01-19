<?php

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

if (!function_exists('isSuperAdmin')) {
    function isSuperAdmin()
    {
        Log::info(Session::get('rol_slug') == 'administrador');
        return Session::get('rol_slug') == 'administrador';
    }
}
