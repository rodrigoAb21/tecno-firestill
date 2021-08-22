@extends('layouts.index')
@section('contenido')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="pb-2">
                        <i class="fa fa-tools"></i> Herramientas
                        <div class="float-right">
                            <a class="btn btn-danger" href="{{url('herramientas/reporte')}}">
                                <i class="fa fa-file-pdf"></i>  PDF
                            </a>
                            <a class="btn btn-success" href="{{url('herramientas/create')}}">
                                <i class="fa fa-plus"></i>  Nueva
                            </a>
                        </div>
                    </h2>
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered color-table info-table">
                            <thead>
                            <tr>
                                <th class="text-center">COD</th>
                                <th class="text-center">NOMBRE</th>
                                <th class="text-center">TALLER</th>
                                <th class="text-center">ASIGNADAS</th>
                                <th class="text-center">TOTAL</th>
                                <th class="text-center">OPC</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($herramientas as $herramienta)
                                <tr class="text-center">
                                    <td>{{$herramienta->id}}</td>
                                    <td>{{$herramienta->nombre}}</td>
                                    <td>{{$herramienta->cantidad_taller}}</td>
                                    <td>{{$herramienta->cantidad_asignada}}</td>
                                    <td>{{$herramienta->cantidad_total}}</td>
                                    <td>
                                        <a href="{{url('herramientas/'.$herramienta->id.'/edit')}}">
                                            <button class="btn btn-warning" title="Editar">
                                                <i class="fa fa-pen"></i>
                                            </button>
                                        </a>
                                        @if($herramienta->cantidad_taller>0)
                                            <a href="{{url('herramientas/darBaja/'.$herramienta->id)}}">
                                                <button class="btn btn-outline-danger" title="Dar de Baja">
                                                    <i class="fa fa-minus"></i>
                                                </button>
                                            </a>
                                        @endif
                                        <button type="button" class="btn btn-danger" title="Eliminar" onclick="modalEliminar('{{$herramienta -> nombre}}', '{{url('herramientas/'.$herramienta -> id)}}')">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{$herramientas->links('pagination.default')}}
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
                $('#modalEliminarTitulo').html("Eliminar Herramienta");
                $('#modalEliminarEnunciado').html("Realmente desea eliminar la herramienta?");
                $('#modalEliminar').modal('show');
            }

        </script>

    @endpush()
@endsection
