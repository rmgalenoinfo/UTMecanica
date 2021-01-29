@extends('adminlte::page')


<!-- Contenido Principal -->
@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- Formulario Horizontal -->
            <div class="card card-primary">
                <!-- Titulo Header -->
                <div class="card-header">
                    <h3 class="card-title">Editar Menú</h3>
                </div>
                <!-- Fin Header -->
                <!-- Inicio Formulario -->
                <form action="{{route("menu.update", $data->id)}}" id="form-general" method="POST">
                    @csrf @method('put')
                    <div class="card-body">
                        @include('theme.back.administracion.formulario_menu')
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Grabar</button>
                        <a class="btn btn-default float-right" href="{{route("menu")}}">Cancelar</a>
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
    <link rel="stylesheet" href="{{asset("assets/back/js/page/scripts/menu/eliminar.js")}}">
@stop
