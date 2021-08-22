@extends('layouts.index')
@section('contenido')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="pb-2">
                        Herramientas dadas de Baja
                        <div class="float-right">

                        </div>
                    </h2>

                    <div class="table-responsive">
                        <table class="table table-hover table-bordered color-table info-table">
                            <thead>
                            <tr>
                                <th class="text-center">COD</th>
                                <th class="text-center">HERRAMIENTA</th>
                                <th class="text-center">RESPONSABLE</th>
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
                                    <td>{{$baja->herramienta->nombre}}</td>
                                    <td>{{$baja->empleado->nombre}}</td>
                                    <td>{{$baja->cantidad}}</td>
                                    <td>{{Carbon\Carbon::createFromFormat('Y-m-d', $baja->fecha)->format('d-m-Y')}}</td>
                                    <td>{{$baja->motivo}}</td>
                                    <td>
                                        <button type="button" class="btn btn-danger" title="Eliminar" onclick="modalEliminar('{{$baja -> nombre}}', '{{url('herramientas/anularBaja/'.$baja -> id)}}')">
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
