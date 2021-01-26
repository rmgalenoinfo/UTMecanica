@extends('adminlte::page')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Roles del sistemas</h3>
                    <a href="{{route("roles.crear")}}" class="btn btn-success float-right">Nuevo Rol</a>
                </div>
                <div class="card-body">
                    <table id="datatable" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre Rol</th>
                                <th>Slug</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->nombre}}</td>
                                    <td>{{$item->slug}}</td>
                                    <td>
                                        <a href="{{route("roles.edit", $item->id)}}" class="btn btn-warning" title="Editar">
                                            <i class="far fa-edit"></i>
                                        </a>
                                        <a href="menu" class="btn btn-danger m-1" title="Eliminar">
                                            <i class="far fa-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
@stop
