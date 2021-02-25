<?php

//use Illuminate\Support\Facades\Session;

if (!function_exists('isSuperAdmin')) {
    function isSuperAdmin() {
        return $_SESSION['rol_slug'] == 'administrador';
    }
}

if (!function_exists('isCoordinar')) {
    function isCoordinar() {
        return $_SESSION['rol_slug'] == 'coordinador';
    }
}

if (!function_exists('isDocente')) {
    function isDocente() {
        return $_SESSION['rol_slug'] == 'docente';
    }
}

if (!function_exists('isTutor')) {
    function isTutor() {
        return $_SESSION['rol_slug'] == 'tutor';
    }
}

if (!function_exists('isEstudiante')) {
    function isEstudiante() {
        return $_SESSION['rol_slug'] == 'estudiante';
    }
}
