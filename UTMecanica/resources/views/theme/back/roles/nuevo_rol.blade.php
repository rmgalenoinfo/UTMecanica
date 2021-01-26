@extends('adminlte::page')

<!-- Contenido Principal -->
@section('content')
    <div class="row">
        <div class="col-md-12">
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
