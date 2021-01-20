<div class="form-group row">
    <label for="descripcion" class="col-sm-2 col-form-label requerido">Descripción</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="descripcion" id="descripcion" value="{{old("descripcion")}}" maxlength="150" required>
    </div>
</div>
<div class="form-group row">
    <label for="menu" class="col-sm-2 col-form-label requerido">Nombre Menu</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="menu" id="menu" value="{{old("menu")}}" maxlength="150" required>
    </div>
</div>
<div class="form-group row">
    <label for="icono" class="col-sm-2 col-form-label requerido">Icono Menu</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="icono" id="icono" value="{{old("icono")}}" maxlength="150" required>
    </div>
</div>
<div class="form-group row">
    <label for="url" class="col-sm-2 col-form-label">Ruta URL</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="url" id="url" value="{{old("url")}}" maxlength="150">
    </div>
</div>
