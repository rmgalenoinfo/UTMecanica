<div class="form-group row">
    <label for="titulo" class="col-sm-2 col-form-label requerido">Título</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="titulo" id="titulo" value="{{old("titulo", $data->titulo ?? '')}}" maxlength="150" required>
    </div>
</div>
<div class="form-group row">
    <label for="decripcion" class="col-sm-2 col-form-label requerido">Descripción</label>
    <div class="col-sm-10">
        <textarea type="text" class="form-control" name="decripcion" id="decripcion" value="{{old("decripcion")}}" required>{{$data->decripcion ?? ''}}</textarea>
    </div>
</div>

<div class="form-group row">
    <label for="url" class="col-sm-2 col-form-label requerido">Docentes</label>
    <div class="col-sm-10">
        <select name="menus_id" id="menus_id" class="form-control" required>
            <option value="">Seleccione el docente </option>
            @foreach ($docentes as $docente)
                <option value="{{$docente->id}}" {{isset($data) ? (($docente->$id == $data->docentes_id) ? 'selected' : '') : ''}} >
                    {{$docente->apellido_docente}}&nbsp;{{$docente->nombre_docente}}
                </option>
            @endforeach
        </select>
    </div>
</div>

<div class="form-group row">
    <label for="url" class="col-sm-2 col-form-label requerido">Tipo</label>
    <div class="col-sm-10">
        <select name="menus_id" id="menus_id" class="form-control" required>
            <option value="">Seleccione el tipo </option>
            @foreach ($tipo as $id=>$nombre)
                <option value="{{$id}}" {{isset($data) ? (($id == $data->tipos_id) ? 'selected' : '') : ''}} >
                {{$nombre}}
            </option>
            @endforeach
        </select>
    </div>
</div>

<div class="offset-sm-2 col-sm-12 form-check">
    <input type="checkbox" class="form-check-input" name="habilitado" id="habilitado" value="{{isset($data) ? ($data->habilitado) : 0}}" @if (isset($data))  @if ($data->habilitado == 1) checked @endif @endif>
    <label for="form-check-label" for="habilitado">Habilitado</label>
</div>
