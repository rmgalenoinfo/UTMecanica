<div class="form-group row">
    <label for="descripcion" class="col-sm-2 col-form-label requerido">Descripción</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="descripcion" id="descripcion" value="{{old("descripcion", $data->descripcion ?? '')}}" maxlength="150" required>
    </div>
</div>
<div class="form-group row">
    <label for="menu_nombre" class="col-sm-2 col-form-label requerido">Nombre Menu</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="menu_nombre" id="menu_nombre" value="{{old("menu_nombre", $data->menu_nombre ?? '')}}" maxlength="150" required>
    </div>
</div>
<div class="form-group row">
    <label for="icono" class="col-sm-2 col-form-label requerido">Icono Menu</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="icono" id="icono" value="{{old("icono", $data->icono ?? '')}}" maxlength="150" required>
    </div>
</div>
<div class="form-group row">
    <label for="url" class="col-sm-2 col-form-label">Ruta URL</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="url" id="url" value="{{old("url", $data->url ?? '')}}" maxlength="150">
    </div>
</div>
