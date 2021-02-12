<div class="form-group row">
    <label for="url" class="col-sm-2 col-form-label requerido">Estudiante</label>
    <div class="col-sm-10">
        <select name="estudiantes_id" id="estudiantes_id" class="form-control" required>
            <option value="">Seleccione el Estudiante</option>
            @foreach ($estudiantes as $estudiante)
                <option value="{{$estudiante->id}}" {{isset($data) ? (($estudiante->id == $data->estudiantes_id) ? 'selected' : '') : ''}}>
                {{$estudiante->apellido_estudiante}}&nbsp;{{$estudiante->nombre_estudiante}}
            </option>
            @endforeach
        </select>
    </div>
</div>

<div class="form-group row">
    <label for="url" class="col-sm-2 col-form-label requerido">Docentes</label>
    <div class="col-sm-10">
        <select name="docentes_id" id="docentes_id" class="form-control" required>
            <option value="">Seleccione el Docentes</option>
            @foreach ($docentes as $docente)
                <option value="{{$docente->id}}" {{isset($data) ? (($docente->id == $data->docentes_id) ? 'selected' : '') : ''}}>
                {{$docente->apellido_docente}}&nbsp;{{$docente->nombre_docente}}
            </option>
            @endforeach
        </select>
    </div>
</div>

<div class="form-group row">
    <label for="url" class="col-sm-2 col-form-label requerido">Temas</label>
    <div class="col-sm-10">
        <select name="temas_id" id="temas_id" class="form-control" required>
            <option value="">Seleccione el Tema</option>
            @foreach ($temas as $id=>$nombre)
                <option value="{{$id}}" {{isset($data) ? (($id == $data->temas_id) ? 'selected' : '') : ''}}>
                {{$nombre}}
            </option>
            @endforeach
        </select>
    </div>
</div>

<div class="form-group row">
    <label for="url" class="col-sm-2 col-form-label requerido">Estado</label>
    <div class="col-sm-10">
        <select name="estado_tema_id" id="estado_tema_id" class="form-control" required>
            <option value="">Seleccione el estado</option>
            @foreach ($estados as $id=>$nombre)
                <option value="{{$id}}" {{isset($data) ? (($id == $data->estado_tema_id) ? 'selected' : '') : ''}}>
                {{$nombre}}
            </option>
            @endforeach
        </select>
    </div>
</div>
