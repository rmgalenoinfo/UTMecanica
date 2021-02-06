<div class="form-group row">
    <label for="url" class="col-sm-2 col-form-label requerido">Escoger Submenú</label>
    <div class="col-sm-10">
        <select name="sub_menus_id" id="sub_menus_id" class="form-control" required>
            <option value="">Seleccione el Submenú </option>
            @foreach ($subMenus as $id=>$nombre)
                <option value="{{$id}}">
                {{$nombre}}
            </option>
            @endforeach
        </select>
    </div>
</div>

<div class="form-group row">
    <label for="url" class="col-sm-2 col-form-label requerido">Escoger Rol</label>
    <div class="col-sm-10">
        <select name="roles_id" id="roles_id" class="form-control" required>
            <option value="">Seleccione el rol</option>
            @foreach ($roles as $id=>$nombre)
                <option value="{{$id}}">
                {{$nombre}}
            </option>
            @endforeach
        </select>
    </div>
</div>

<div class="form-group row">
    <label for="url" class="col-sm-2 col-form-label requerido">Escoger Submenú</label>
    <div class="col-sm-10">
        <select name="sub_menus_id" id="sub_menus_id" class="form-control" required>
            <option value="">Seleccione el Submenú </option>
            @foreach ($subMenus as $id=>$nombre)
                <option value="{{$id}}">
                {{$nombre}}
            </option>
            @endforeach
        </select>
    </div>
</div>

<div class="form-group row">
    <label for="url" class="col-sm-2 col-form-label requerido">Escoger Rol</label>
    <div class="col-sm-10">
        <select name="roles_id" id="roles_id" class="form-control" required>
            <option value="">Seleccione el rol</option>
            @foreach ($roles as $id=>$nombre)
                <option value="{{$id}}">
                {{$nombre}}
            </option>
            @endforeach
        </select>
    </div>
</div>
