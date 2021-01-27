@extends('adminlte::page')

<!-- Contenido Principal -->
@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- Mensaje que confirma que se guardo la información en la base de datos -->
            @if ($mensaje = session("mensaje"))
                <x-alert tipo="success" :mensaje="$mensaje"></x-alert>
            @endif
             <!-- Mensaje que muestra un error al guardar la información de en la base de datos -->
            @if ($errors->any())
                <x-alert tipo="danger" :mensaje="$errors"></x-alert>
            @endif
            <!-- Formulario Horizontal -->
            <div class="card card-primary">
                <!-- Titulo Header -->
                <div class="card-header">
                    <h3 class="card-title">Nuevo Menu</h3>
                </div>
                <!-- Fin Header -->
                <!-- Inicio Formulario -->
                <form action="{{route("menu.guardar")}}" id="form-general" method="POST">

                    @csrf <!-- Genera el tocken de para el ingreso de datos -->
                    <div class="card-body">
                        <!-- Trae los componentes de otro formulario-->
                        @include('theme.back.administracion.formulario_menu')
                    </div>
                    <div class="card-footer">
                        <!-- Botón que guarda la información en la base de datos -->
                        <button type="submit" class="btn btn-primary">Grabar</button>
                        <!-- Botón que regresa al formulario de la tabla -->
                        <a class="btn btn-default float-right" href="{{route("menu")}}">Cancelar</a>
                    </div>
                </form>
                <!-- Fin formulario -->
            </div>
        </div>
    </div>
@stop

@section('css')
    <!-- CSS que muesta los campos obligatorios a llenar -->
    <link rel="stylesheet" href="{{asset("assets/back/css/utmecanica.css")}}">
@stop

@section('js')
@stop
