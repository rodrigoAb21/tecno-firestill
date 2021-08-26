@extends('layouts.index')
@section('contenido')
    <div class="row">
        <div class="col-2">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item active">Visitas: {{$contador->contador}}</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="col-10">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Inicio</a></li>
                        <li class="breadcrumb-item active">Bajas</li>
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
                        Productos dados de baja
                        <div class="float-right">

                        </div>
                    </h2>

                    <div class="table-responsive">
                        <table class="table table-hover table-bordered color-table info-table">
                            <thead>
                            <tr>
                                <th class="text-center">COD</th>
                                <th class="text-center">PRODUCTO</th>
                                <th class="text-center">CANT</th>
                                <th class="text-center">FECHA</th>
                                <th class="text-center">MOTIVO</th>
                                <th class="text-center">OPC</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($bajas as $baja)
                                <tr class="text-center">
                                    <td>{{$baja->id}}</td>
                                    <td>{{$baja->producto->nombre}}</td>
                                    <td>{{$baja->cantidad}}</td>
                                    <td>{{Carbon\Carbon::createFromFormat('Y-m-d', $baja->fecha)->format('d-m-Y')}}</td>
                                    <td>{{$baja->motivo}}</td>
                                    <td>
                                        <button type="button" title="Eliminar" class="btn btn-danger" onclick="modalEliminar('{{$baja -> nombre}}', '{{url('inventario/anularBaja/'.$baja -> id)}}')">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{$bajas->links('pagination.default')}}
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
