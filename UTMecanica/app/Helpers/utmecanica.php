<?php

use Illuminate\Support\Facades\Session;

if (!function_exists('isSuperAdmin')) {
    function isSuperAdmin() {
        return $_SESSION['rol_slug'] == 'administrador';
    }
}
