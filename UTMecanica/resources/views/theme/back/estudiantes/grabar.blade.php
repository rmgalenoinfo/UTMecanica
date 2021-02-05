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
            <form action="{{route("estudiantes.guardar")}}" id="form-general" method="POST">
                @csrf <!-- Genera el tocken de para el ingreso de datos -->
            <!-- Trae los componentes de otro formulario-->
                @include('theme.back.estudiantes.formulario')
            </form>

        </div>
    </div>
@stop

@section('css')
    <!-- CSS que muesta los campos obligatorios a llenar -->
    <link rel="stylesheet" href="{{asset("assets/back/css/utmecanica.css")}}">
@stop

@section('js')
    <script>
        $('#egresado').on('change', function(){
            this.value = this.checked ? '1' : '0';
        }).change();
        $('#graduado').on('change', function(){
            this.value = this.checked ? '1' : '0';
        }).change();
        $('#rechazado').on('change', function(){
            this.value = this.checked ? '1' : '0';
        }).change();
        $('#habilitado').on('change', function(){
            this.value = this.checked ? '1' : '0';
        }).change();
        $('#estado').on('change', function(){
            this.value = this.checked ? '1' : '0';
        }).change();
    </script>
@stop
