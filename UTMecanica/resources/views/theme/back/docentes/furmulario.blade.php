<!-- Inicio Formulario -->
<div class="card card-primary">
    <!-- Titulo Header -->
    <div class="card-header">
        <h3 class="card-title">Nuevo Docente</h3>
    </div>
    <!-- Fin Header -->

    <div class="card-body row">
    <!-- Fin formulario -->
        <div class="col-sm-6">
            <div class="form-group row">
                <label for="identificacion_docente" class="col-sm-3 col-form-label requerido">Identificación</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="identificacion_docente" id="identificacion_docente" value="{{old("identificacion_docente", $data->identificacion_docente ?? '')}}" maxlength="10" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="nombre_docente" class="col-sm-3 col-form-label requerido">Nombre</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="nombre_docente" id="nombre_docente" value="{{old("nombre_docente", $data->nombre_docente ?? '')}}" maxlength="100" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="apellido_docente" class="col-sm-3 col-form-label requerido">Apellido</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="apellido_docente" id="apellido_docente" value="{{old("apellido_docente", $data->apellido_docente ?? '')}}" maxlength="100" required>
                </div>
            </div>
        </div>
        <div class="col-sm-6">

            <div class="form-group row">
                <label for="correo_docente" class="col-sm-3 col-form-label requerido">Correo</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="correo_docente" id="correo_docente" value="{{old("correo_docente", $data->correo_docente ?? '')}}" maxlength="255" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="celular" class="col-sm-3 col-form-label requerido">Celular</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="celular" id="celular" value="{{old("celular", $data->celular ?? '')}}" maxlength="10" required>
                </div>
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
            <div class="col-sm-3 form-check">
                <input type="checkbox" class="form-check-input" name="estado" id="estado" value="{{isset($data) ? ($data->usuario->estado) : 0}}" @if (isset($data))  @if ($data->usuario->estado == 1) checked @endif @endif>
                <label for="form-check-label" for="estado">Estado</label>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group row">
                <label for="email" class="col-sm-3 col-form-label @if ($requerido) requerido @endif">Contraseña</label>
                <div class="col-sm-9">
                    <input type="password" class="form-control" name="password" id="password" value="{{old("password")}}" maxlength="100" @if ($requerido) required @endif>
                </div>
            </div>
            <div class="form-group row">
                <label for="url" class="col-sm-3 col-form-label requerido">Rol</label>
                <div class="col-sm-9">
                    <select name="roles_id" id="roles_id" class="form-control" required>
                        <option value="">Seleccione el Rol</option>
                        @foreach ($roles as $id=>$nombre)
                            <option value="{{$id}}" {{isset($data) ? (($id == $data->roles_id->id) ? 'selected' : '') : ''}}>
                                {{$nombre}}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <!-- Botón que guarda la información en la base de datos -->
        <button type="submit" class="btn btn-primary">Grabar</button>
        <!-- Botón que regresa al formulario de la tabla -->
        <a class="btn btn-default float-right" href="{{route("docentes")}}">Volver a Lista</a>
    </div>
</div>
