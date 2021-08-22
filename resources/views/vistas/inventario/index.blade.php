@extends('layouts.index')
@section('contenido')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="pb-2">
                        <i class="fa fa-boxes"></i> Inventario de Productos
                        <div class="float-right">
                            <a class="btn btn-danger" href="{{url('inventario/reporte')}}">
                                <i class="fa fa-file-pdf"></i>  PDF
                            </a>
                            <a class="btn btn-success" href="{{url('inventario/create')}}">
                                <i class="fa fa-plus"></i>  Nuevo
                            </a>
                        </div>
                    </h2>
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered color-table info-table">
                            <thead>
                            <tr>
                                <th class="text-center">COD</th>
                                <th class="text-center">IMG</th>
                                <th class="text-center">NOMBRE</th>
                                <th class="text-center">CATEGORIA</th>
                                <th class="text-center">EXISTENCIAS</th>
                                <th class="text-center">OPC</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($productos as $producto)
                                <tr class="text-center">
                                    <td class="align-middle">{{$producto->id}}</td>
                                    <td class="align-middle"><img src="{{asset('img/productos/'.$producto->foto)}}" class="img-thumbnail" width="100px"></td>
                                    <td class="align-middle">{{$producto->nombre}}</td>
                                    <td class="align-middle">{{$producto->categoria->nombre}}</td>
                                    <td class="align-middle">{{$producto->cantidad}}</td>
                                    <td class="align-middle">
                                        <a href="{{url('inventario/'.$producto->id)}}">
                                            <button class="btn btn-secondary" title="Ver">
                                                <i class="fa fa-eye"></i>
                                            </button>
                                        </a>

                                        <a href="{{url('inventario/'.$producto->id.'/edit')}}">
                                            <button class="btn btn-warning" title="Editar">
                                                <i class="fa fa-pen"></i>
                                            </button>
                                        </a>

                                        @if($producto->cantidad>0)
                                            <a href="{{url('inventario/darBaja/'.$producto->id)}}">
                                                <button class="btn btn-outline-danger" title="Dar de baja">
                                                    <i class="fa fa-minus"></i>
                                                </button>
                                            </a>
                                        @endif
                                        <button type="button" class="btn btn-danger" onclick="modalEliminar('{{$producto -> nombre}}', '{{url('inventario/'.$producto -> id)}}')">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{$productos->links('pagination.default')}}
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
                $('#modalEliminarTitulo').html("Eliminar Categoria");
                $('#modalEliminarEnunciado').html("Realmente desea eliminar la producto: " + nombre + "?");
                $('#modalEliminar').modal('show');
            }
        </script>
    @endpush()
@endsection
