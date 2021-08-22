@extends('layouts.index')
@section('contenido')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="pb-2">
                        Ingresos de Productos
                        <div class="float-right">
                            <a class="btn btn-success" href="{{url('inventario/nuevoIngreso')}}">
                                <i class="fa fa-plus"></i>  Nuevo
                            </a>
                        </div>
                    </h2>

                    @if(session()->has('message'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('message') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered color-table info-table">
                            <thead>
                            <tr>
                                <th class="text-center">COD</th>
                                <th class="text-center">FECHA</th>
                                <th class="text-center">NRO FACTURA</th>
                                <th class="text-center">PROVEEDOR</th>
                                <th class="text-center">TOTAL BS</th>
                                <th class="text-center">OPC</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($ingresos as $ingreso)
                                <tr class="text-center">
                                    <td>{{$ingreso->id}}</td>
                                    <td>{{Carbon\Carbon::createFromFormat('Y-m-d', $ingreso->fecha)->format('d-m-Y')}}</td>
                                    <td>{{$ingreso->nro_factura}}</td>
                                    <td>{{$ingreso->proveedor->nombre}}</td>
                                    <td>{{$ingreso->total}}</td>
                                    <td>
                                        <a href="{{url('inventario/verIngreso/'.$ingreso->id)}}">
                                            <button class="btn btn-secondary" title="Ver">
                                                <i class="fa fa-eye"></i>
                                            </button>
                                        </a>
                                        <button type="button" class="btn btn-danger" title="Eliminar" onclick="modalEliminar('{{$ingreso -> nombre}}', '{{url('inventario/eliminarIngreso/'.$ingreso -> id)}}')">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{$ingresos->links('pagination.default')}}
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
