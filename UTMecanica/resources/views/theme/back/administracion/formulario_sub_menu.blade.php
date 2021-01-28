<div class="form-group row">
    <label for="descripcion" class="col-sm-2 col-form-label requerido">Descripción</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="descripcion" id="descripcion" value="{{old("descripcion", $data->descripcion ?? '')}}" maxlength="150" required>
    </div>
</div>
<div class="form-group row">
    <label for="menu_nombre" class="col-sm-2 col-form-label requerido">Nombre Submenú</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="sub_menu_nombre" id="sub_menu_nombre" value="{{old("sub_menu_nombre", $data->sub_menu_nombre ?? '')}}" maxlength="150" required>
    </div>
</div>
<div class="form-group row">
    <label for="icono" class="col-sm-2 col-form-label requerido">Icono Submenú</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="icono" id="icono" value="{{old("icono", $data->icono ?? '')}}" maxlength="150" required>
    </div>
</div>
<div class="form-group row">
    <label for="url" class="col-sm-2 col-form-label requerido">Ruta URL</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="url" id="url" value="{{old("url", $data->url ?? '')}}" maxlength="150">
    </div>
</div>

<div class="form-group row">
    <label for="url" class="col-sm-2 col-form-label requerido">Asignar a Menú</label>
    <div class="col-sm-10">
        <select name="menus_id" id="menus_id" class="form-control" required>
            <option value="">Seleccione el menú </option>
            @foreach ($menus as $id=>$nombre)
                <option value="{{$id}}" {{isset($data) ? (($id == $data->menus->id) ? 'selected' : '') : ''}} >
                {{$nombre}}
            </option>
            @endforeach
        </select>
    </div>
</div>
