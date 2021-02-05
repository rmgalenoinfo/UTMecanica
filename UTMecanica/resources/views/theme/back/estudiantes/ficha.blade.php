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
            <!-- Inicio Formulario -->
            <div class="card card-info">
                <!-- Titulo Header -->
                <div class="card-header">
                    <h3 class="card-title">Ficha del Estudiante</h3>
                </div>
                <!-- Fin Header -->

                <div class="card-body row">
                <!-- Fin formulario -->
                    <div class="col-sm-6">
                        <div class="form-group row">
                            <label for="identificacion_estudiante" class="col-sm-3 col-form-label">Identificación</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="indentificacion_estudiante" id="indentificacion_estudiante" value="{{old("indentificacion_estudiante", $data->indentificacion_estudiante ?? '')}}" maxlength="10" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nombre_estudiante" class="col-sm-3 col-form-label">Nombre</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="nombre_estudiante" id="nombre_estudiante" value="{{old("nombre_estudiante", $data->nombre_estudiante ?? '')}}" maxlength="100" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="apellido_estudiante" class="col-sm-3 col-form-label">Apellido</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="apellido_estudiante" id="apellido_estudiante" value="{{old("apellido_estudiante", $data->apellido_estudiante ?? '')}}" maxlength="100" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="correo_estudiante" class="col-sm-3 col-form-label">Correo</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="correo_estudiante" id="correo_estudiante" value="{{old("correo_estudiante", $data->correo_estudiante ?? '')}}" maxlength="255" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="celular_estudiante" class="col-sm-3 col-form-label">Celular</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="celular_estudiante" id="celular_estudiante" value="{{old("celular_estudiante", $data->celular_estudiante ?? '')}}" maxlength="10" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="periodo" class="col-sm-3 col-form-label">Periodo</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" name="periodo" id="periodo" value="{{old("periodo", $data->periodo ?? '')}}" maxlength="10" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group row">
                            <label for="observaciones" class="col-sm-3 col-form-label">Observaciones</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="observaciones" id="observaciones" value="{{old("observaciones")}}" disabled>{{$data->observaciones ?? ''}}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="condiciones" class="col-sm-3 col-form-label">Condiciones</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="condiciones" id="condiciones" value="{{old("condiciones")}}" disabled>{{$data->condiciones ?? ''}}</textarea>
                            </div>
                        </div>
                        <div class="offset-sm-3 col-sm-12 form-check">
                            <input type="checkbox" class="form-check-input" name="egresado" id="egresado" value="{{$data->egresado}}" @if ($data->egresado == 1) checked @endif disabled>
                            <label for="form-check-label" for="egresado">Egresado</label>
                        </div>
                        <div class="offset-sm-3 col-sm-12 form-check">
                            <input type="checkbox" class="form-check-input" name="graduado" id="graduado" value="{{$data->graduado}}" @if ($data->graduado == 1) checked @endif disabled>
                            <label for="form-check-label" for="graduado">graduado</label>
                        </div>
                        <div class="offset-sm-3 col-sm-12 form-check">
                            <input type="checkbox" class="form-check-input" name="rechazado" id="rechazado" value="{{$data->rechazado}}" @if ($data->rechazado == 1) checked @endif disabled>
                            <label for="form-check-label" for="rechazado">Rechazado</label>
                        </div>
                        <div class="offset-sm-3 col-sm-12 form-check">
                            <input type="checkbox" class="form-check-input" name="habilitado" id="habilitado" value="{{$data->habilitado}}" @if ($data->habilitado == 1) checked @endif disabled>
                            <label for="form-check-label" for="habilitado">Habilitado</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Usuario</h3>
                </div>
                <div class="card-body row">
                    <div class="col-sm-6">
                        <div class="form-group row">
                            <label for="email" class="col-sm-3 col-form-label">Usuario Email</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="email" id="email" value="{{old("email", $data->usuario->email ?? '')}}" maxlength="100" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="fecha_caducidad" class="col-sm-4 col-form-label">Fecha de Caducidad</label>
                            <div class="col-sm-8">
                                <input type="date" class="form-control" name="fecha_caducidad" id="fecha_caducidad" value="{{old("fecha_caducidad", $data->usuario->fecha_caducidad ?? '')}}" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group row">
                            <label for="email" class="col-sm-3 col-form-label">Contraseña</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" name="password" id="password" value="{{old("password", $data->password ?? '')}}" maxlength="100" disabled>
                            </div>
                        </div>
                        <div class="offset-sm-3 col-sm-3 form-check">
                            <input type="checkbox" class="form-check-input" name="estado" id="estado" value="{{old("estado")}}" @if ($data->usuario->estado == 1) checked @endif disabled>
                            <label for="form-check-label" for="estado">Estado</label>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <!-- Botón que guarda la información en la base de datos -->
                    <a class="btn btn-success" href="{{route("estudiantes.edit", $data->id)}}">Editar</a>
                    <!-- Botón que regresa al formulario de la tabla -->
                    <a class="btn btn-default float-right" href="{{route("estudiantes")}}">Volver a Lista</a>
                </div>
            </div>

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
