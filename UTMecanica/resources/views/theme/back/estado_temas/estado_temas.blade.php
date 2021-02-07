@extends('adminlte::page')

@section('plugins.Datatables', true)

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Estado de la Tesis</h3>
                    <a href="{{route("estados.crear")}}" class="btn btn-success float-right">Nuevo Estado</a>
                </div>
                <div class="card-body">
                    <table id="datostabla" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Estado</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($estados as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->nombre}}</td>
                                    <td>
                                        <a href="{{route("estados.edit", $item->id)}}" class="btn btn-warning" title="Editar">
                                            <i class="far fa-edit"></i>
                                        </a>
                                        <form action="{{route("estados.eliminar", $item->id)}}"  class="form-eliminar-menu d-inline" method="POST">
                                            @csrf @method('delete')
                                            <button href="estados" class="btn btn-danger m-1 boton-eliminar-menu" title="Eliminar">
                                                <i class="far fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Cuadro de dialogo para confirmar la eliminación de datos -->
    <div class="modal fade" id="confirmar-eliminar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <!--Título de cuadro de dialogo -->
                    <h5 class="modal-title">Confime esta acción</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!--Mensaje del para confirmar la eliminación de la información de la base de datos -->
                <div class="modal-body">
                    ¿Seguro desea eliminar este Rol?
                </div>
                <div class="modal-footer">
                    <!-- Botón que cancela la eliminación de la información de la base de datos -->
                    <button type="button" class="btn btn-warning" data-dismiss="modal">No</button>
                    <!-- Botón que confirma la eliminación de la información de la base de datos -->
                    <button type="button" id="accion-eliminar" class="btn btn-danger">Si</button>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
<!-- Script que muestra el cuadro de dialogo para la eliminación de la información de la base de datos -->
<script src="{{asset("assets/back/js/pages/scripts/menu/eliminar.js")}}"></script>
<!-- Script para cargar los compones de paginación, busqueda, orden y responsive de la tabla  -->
<script>
    $(function () {
        $('#datostabla').DataTable({
            "responsive": true,
        });
    });
</script>
@stop
