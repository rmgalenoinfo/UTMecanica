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
                    <h3 class="card-title">Nuevo rol</h3>
                </div>
                <!-- Fin Header -->
                <!-- Inicio Formulario -->
                <form action="{{route("roles.guardar")}}" id="form-general" method="POST">
                    @csrf
                    <div class="card-body">
                        @include('theme.back.roles.formulario_rol')
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Grabar</button>
                        <a class="btn btn-default float-right" href="{{route("roles")}}">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="{{asset("assets/back/css/utmecanica.css")}}">
@stop

@section('js')
@stop
