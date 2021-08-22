@extends('layouts.index')
@section('contenido')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="pb-2">
                        <i class="fa fa-truck"></i> Proveedores
                        <div class="float-right">
                            <a class="btn btn-success" href="{{url('proveedores/create')}}">
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
                                <th class="text-center">TELEFONO</th>
                                <th class="text-center">EMAIL</th>
                                <th class="text-center">OPC</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($proveedores as $proveedor)
                                <tr class="text-center">
                                    <td >{{$proveedor->id}}</td>
                                    <td >{{$proveedor->nombre}}</td>
                                    <td >{{$proveedor->telefono}}</td>
                                    <td >{{$proveedor->email}}</td>

                                    <td>
                                        <a href="{{url('proveedores/'.$proveedor->id)}}">
                                            <button class="btn btn-secondary" title="Ver">
                                                <i class="fa fa-eye"></i>
                                            </button>
                                        </a>
                                        <a href="{{url('proveedores/'.$proveedor->id.'/edit')}}">
                                            <button class="btn btn-warning" title="Editar">
                                                <i class="fa fa-pen"></i>
                                            </button>
                                        </a>
                                        <button type="button" class="btn btn-danger" title="Eliminar" onclick="modalEliminar('{{$proveedor -> nombre}}', '{{url('proveedores/'.$proveedor -> id)}}')">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                        {{$proveedores->links('pagination.default')}}
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
                $('#modalEliminarTitulo').html("Eliminar");
                $('#modalEliminarEnunciado').html("Realmente lo desea eliminar?");
                $('#modalEliminar').modal('show');
            }

        </script>

    @endpush()
@endsection
