<div class="form-group row">
    <label for="descripcion" class="col-sm-2 col-form-label requerido">Estado</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="estado_tema" id="estado_tema" value="{{old("estado_tema", $data->estado_tema ?? '')}}" maxlength="150" required>
    </div>
</div>
