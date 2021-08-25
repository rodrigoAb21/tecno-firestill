@extends('layouts.index')
@section('contenido')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Inicio</a></li>
                        <li class="breadcrumb-item active">Ventas</li>

                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="pb-2">
                        <i class="fas fa-dollar-sign"></i> Ventas
                        <div class="float-right">
                            <a class="btn btn-success" href="{{url('ventas/nuevaVenta')}}">
                                <i class="fa fa-plus"></i>  Nueva
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
                                <th class="text-center">CLIENTE</th>
                                <th class="text-center">TRABAJADOR</th>
                                <th class="text-center">TOTAL BS</th>
                                <th class="text-center">OPC</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($ventas as $venta)
                                <tr class="text-center">
                                    <td>{{$venta->id}}</td>
                                    <td>{{Carbon\Carbon::createFromFormat('Y-m-d', $venta->fecha)->format('d-m-Y')}}</td>
                                    <td>{{$venta->cliente->nombre_empresa}}</td>
                                    <td>{{$venta->trabajador->nombre}} {{$venta->trabajador->apellido}}</td>
                                    <td>{{$venta->total}}</td>
                                    <td>
                                        <a href="{{url('ventas/verVenta/'.$venta->id)}}">
                                            <button class="btn btn-secondary" title="Ver">
                                                <i class="fa fa-eye"></i>
                                            </button>
                                        </a>
                                        <button type="button" class="btn btn-danger" title="Eliminar" onclick="modalEliminar('{{$venta -> id}}', '{{url('ventas/eliminarVenta/'.$venta -> id)}}')">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{$ventas->links('pagination.default')}}
                        </table>

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
