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
                            <label for="identificacion_docente" class="col-sm-3 col-form-label">Identificación</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="identificacion_docente" id="identificacion_docente" value="{{old("identificacion_docente", $data->identificacion_docente ?? '')}}" maxlength="10" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nombre_docente" class="col-sm-3 col-form-label">Nombre</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="nombre_docente" id="nombre_docente" value="{{old("nombre_docente", $data->nombre_docente ?? '')}}" maxlength="100" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="apellido_docente" class="col-sm-3 col-form-label">Apellido</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="apellido_docente" id="apellido_docente" value="{{old("apellido_docente", $data->apellido_docente ?? '')}}" maxlength="100" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group row">
                            <label for="correo_docente" class="col-sm-3 col-form-label">Correo</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="correo_docente" id="correo_docente" value="{{old("correo_docente", $data->correo_docente ?? '')}}" maxlength="255" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="celular" class="col-sm-3 col-form-label">Celular</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="celular" id="celular" value="{{old("celular", $data->celular ?? '')}}" maxlength="10" disabled>
                            </div>
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
