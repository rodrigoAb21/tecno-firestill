@extends('layouts.index')
@section('contenido')
    <!--
    *************************************************************************
     * Nombre........: create
     * Tipo..........: Vista
     * Descripcion...:
     * Fecha.........: 07-FEB-2021
     * Autor.........: Rodrigo Abasto Berbetty
     *************************************************************************
    -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="pb-2">
                        <i class="fa fa-user-tie"></i> Clientes
                        <div class="float-right">
                            <a class="btn btn-success" href="{{url('clientes/create')}}">
                                <i class="fa fa-plus"></i>  Nuevo
                            </a>
                        </div>
                    </h2>
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered color-table info-table">
                            <thead>
                            <tr>
                                <th class="text-center">COD</th>
                                <th class="text-center">NOMBRE</th>
                                <th class="text-center">CI/NIT</th>
                                <th class="text-center">TELEFONO</th>

                                <th class="text-center">OPC</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($clientes as $cliente)
                                <tr class="text-center">
                                    <td >{{$cliente->id}}</td>
                                    <td >{{$cliente->nombre_empresa}}</td>
                                    <td >{{$cliente->nit}}</td>
                                    <td >{{$cliente->telefono_empresa}}</td>
                                    <td>
                                        <a href="{{url('clientes/'.$cliente->id)}}">
                                            <button class="btn btn-secondary" title="Ver" >
                                                <i class="fa fa-eye"></i>
                                            </button>
                                        </a>
                                        <a href="{{url('clientes/'.$cliente->id.'/edit')}}">
                                            <button class="btn btn-warning" title="Editar">
                                                <i class="fa fa-pen"></i>
                                            </button>
                                        </a>
                                        <button type="button" class="btn btn-danger" title="Eliminar" onclick="modalEliminar('{{$cliente -> nombre_empresa}}', '{{url('clientes/'.$cliente -> id)}}')">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{$clientes->links('pagination.default')}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('vistas.modal')
    @push('scripts')
        <script>
            function modalEliminar(nombre, url) {
                $('#modalEliminarForm').attr("action", url);
                $('#metodo').val("delete");
                $('#modalEliminarTitulo').html("Eliminar Cliente");
                $('#modalEliminarEnunciado').html("Realmente desea eliminar al cliente: " + nombre + "?");
                $('#modalEliminar').modal('show');
            }
        </script>

    @endpush()
@endsection
