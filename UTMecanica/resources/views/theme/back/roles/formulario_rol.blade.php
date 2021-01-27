<div class="form-group row">
    <label for="descripcion" class="col-sm-2 col-form-label requerido">Nombre</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="nombre" id="nombre" value="{{old("nombre", $data->nombre ?? '')}}" maxlength="150" required>
    </div>
</div>
