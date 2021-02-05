<!-- Inicio Formulario -->
<div class="card card-primary">
    <!-- Titulo Header -->
    <div class="card-header">
        <h3 class="card-title">Nuevo Estudiante</h3>
    </div>
    <!-- Fin Header -->

    <div class="card-body row">
    <!-- Fin formulario -->
        <div class="col-sm-6">
            <div class="form-group row">
                <label for="identificacion_estudiante" class="col-sm-3 col-form-label requerido">Identificación</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="identificacion_estudiante" id="identificacion_estudiante" value="{{old("identificacion_estudiante", $data->indentificacion_estudiante ?? '')}}" maxlength="10" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="nombre_estudiante" class="col-sm-3 col-form-label requerido">Nombre</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="nombre_estudiante" id="nombre_estudiante" value="{{old("nombre_estudiante", $data->nombre_estudiante ?? '')}}" maxlength="100" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="apellido_estudiante" class="col-sm-3 col-form-label requerido">Apellido</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="apellido_estudiante" id="apellido_estudiante" value="{{old("apellido_estudiante", $data->apellido_estudiante ?? '')}}" maxlength="100" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="correo_estudiante" class="col-sm-3 col-form-label requerido">Correo</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="correo_estudiante" id="correo_estudiante" value="{{old("correo_estudiante", $data->correo_estudiante ?? '')}}" maxlength="255" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="celular_estudiante" class="col-sm-3 col-form-label requerido">Celular</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="celular_estudiante" id="celular_estudiante" value="{{old("celular_estudiante", $data->celular_estudiante ?? '')}}" maxlength="10" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="periodo" class="col-sm-3 col-form-label requerido">Periodo</label>
                <div class="col-sm-9">
                    <input type="number" class="form-control" name="periodo" id="periodo" value="{{old("periodo", $data->periodo ?? '')}}" maxlength="10" required>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group row">
                <label for="observaciones" class="col-sm-3 col-form-label requerido">Observaciones</label>
                <div class="col-sm-9">
                    <textarea class="form-control" name="observaciones" id="observaciones" value="{{old("observaciones")}}" required>{{$data->observaciones ?? ''}}</textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="condiciones" class="col-sm-3 col-form-label requerido">Condiciones</label>
                <div class="col-sm-9">
                    <textarea class="form-control" name="condiciones" id="condiciones" value="{{old("condiciones", )}}" required>{{$data->condiciones ?? ''}}</textarea>
                </div>
            </div>
            <div class="offset-sm-3 col-sm-12 form-check">
                <input type="checkbox" class="form-check-input" name="egresado" id="egresado" value="{{isset($data) ? ($data->egresado) : 0}}" @if (isset($data))  @if ($data->egresado == 1) checked @endif @endif>
                <label for="form-check-label" for="egresado">Egresado</label>
            </div>
            <div class="offset-sm-3 col-sm-12 form-check">
                <input type="checkbox" class="form-check-input" name="graduado" id="graduado" value="{{isset($data) ? ($data->graduado) : 0}}" @if (isset($data))  @if ($data->graduado == 1) checked @endif @endif>
                <label for="form-check-label" for="graduado">Graduado</label>
            </div>
            <div class="offset-sm-3 col-sm-12 form-check">
                <input type="checkbox" class="form-check-input" name="rechazado" id="rechazado" value="{{isset($data) ? ($data->rechazado) : 0}}" @if (isset($data))  @if ($data->rechazado == 1) checked @endif @endif>
                <label for="form-check-label" for="rechazado">Rechazado</label>
            </div>
            <div class="offset-sm-3 col-sm-12 form-check">
                <input type="checkbox" class="form-check-input" name="habilitado" id="habilitado" value="{{isset($data) ? ($data->habilitado) : 0}}" @if (isset($data))  @if ($data->habilitado == 1) checked @endif @endif>
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
                <label for="email" class="col-sm-3 col-form-label requerido">Usuario Email</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="email" id="email" value="{{old("email", $data->usuario->email ?? '')}}" maxlength="100" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="fecha_caducidad" class="col-sm-4 col-form-label requerido">Fecha de Caducidad</label>
                <div class="col-sm-8">
                    <input type="date" class="form-control" name="fecha_caducidad" id="fecha_caducidad" value="{{old("fecha_caducidad", $data->usuario->fecha_caducidad ?? '')}}" required>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group row">
                <label for="email" class="col-sm-3 col-form-label @if ($requerido) requerido @endif">Contraseña</label>
                <div class="col-sm-9">
                    <input type="password" class="form-control" name="password" id="password" value="{{old("password")}}" maxlength="100" @if ($requerido) required @endif>
                </div>
            </div>
            <div class="offset-sm-3 col-sm-3 form-check">
                <input type="checkbox" class="form-check-input" name="estado" id="estado" value="{{isset($data) ? ($data->usuario->estado) : 0}}" @if (isset($data))  @if ($data->usuario->estado == 1) checked @endif @endif>
                <label for="form-check-label" for="estado">Estado</label>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <!-- Botón que guarda la información en la base de datos -->
        <button type="submit" class="btn btn-primary">Grabar</button>
        <!-- Botón que regresa al formulario de la tabla -->
        <a class="btn btn-default float-right" href="{{route("estudiantes")}}">Volver a Lista</a>
    </div>
</div>

