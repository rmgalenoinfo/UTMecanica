@extends('adminlte::page')

@section('plugins.Datatables', true)

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Menus del sistemas</h3>
            <a href="{{route("menu.crear")}}" class="btn btn-success float-right">Nuevo Menu</a>
        </div>
        <div class="card-body">
            <table id="datatable" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Descripción</th>
                        <th>Nombre Menu</th>
                        <th>Icono</th>
                        <th>Rutal URL</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($menus as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->descripcion}}</td>
                            <td>{{$item->menu_nombre}}</td>
                            <td><i class="{{$item->icono}}"></td>
                            <td>{{$item->url}}</td>
                            <td>
                                <a href="menu" class="btn btn-warning" title="Editar">
                                    <i class="far fa-edit"></i>
                                </a>
                                <a href="menu" class="btn btn-danger m-2" title="Eliminar">
                                    <i class="far fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
@stop
