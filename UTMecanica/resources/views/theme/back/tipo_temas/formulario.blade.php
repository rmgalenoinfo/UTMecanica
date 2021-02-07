<div class="form-group row">
    <label for="descripcion" class="col-sm-2 col-form-label requerido">Tipo</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="tipo_tema" id="tipo_tema" value="{{old("tipo_tema", $data->tipo_tema ?? '')}}" maxlength="150" required>
    </div>
</div>
