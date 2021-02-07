@extends('adminlte::page')

@section('plugins.Datatables', true)

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                @if ($mensaje = session("mensaje"))
                    <x-alert tipo="success" :mensaje="$mensaje"></x-alert>
                @endif
                <!-- Título del cuadro tipo tarjeta -->
                <div class="card-header">
                    <!--Título de la tarjeta -->
                    <h3 class="card-title">Docentes</h3>
                    <!--Botón para ir al formaulario para ingresar nuevos datos en la base de datos-->
                    <a href="{{route("docentes.crear")}}" class="btn btn-success float-right">Nuevo Docente</a>
                </div>
                <div class="card-body">
                    <!-- Tabla con el contenido de los datos de la base de datos -->
                    <table id="datostabla" class="table table-bordered table-hover">
                        <!--Títulos superior de los campos contiene las tablas de la base de datos-->
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Identificación</th>
                                <th>Apellido</th>
                                <th>Nombre</th>
                                <th>Correo</th>
                                <th>Teléfono</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Mustra la información de una tabla especifica de una base de datos -->
                            @foreach ($docentes as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->identificacion_docente}}</td>
                                    <td>{{$item->apellido_docente}}</td>
                                    <td>{{$item->nombre_docente}}</td>
                                    <td>{{$item->correo_docente}}</td>
                                    <td>{{$item->celular}}</td>
                                    <td>
                                        <!-- Se dirige al formulario para editar información de una tabla especifica de la base de datos -->
                                        <a href="{{route("docentes.ficha", $item->id)}}" class="btn btn-success" title="Ficha">
                                            <i class="far fa-eye"></i>
                                        </a>
                                        <!-- Se dirige al formulario para editar información de una tabla especifica de la base de datos -->
                                        <a href="{{route("docentes.edit", $item->id)}}" class="btn btn-warning" title="Edit">
                                            <i class="far m-1 fa-edit"></i>
                                        </a>
                                        <!-- Formulario para eliminar información de especifica de una tabla de la base de datos -->
                                        <form action="{{route("docentes.eliminar", $item->id)}}"  class="form-eliminar-menu d-inline" method="POST">
                                            @csrf @method('delete')
                                            <button href="docentes" title="Eliminar" class="btn btn-danger boton-eliminar-menu">
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
                    ¿Seguro desea eliminar a este Docente?
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
