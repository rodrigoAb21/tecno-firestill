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
                        <li class="breadcrumb-item"><a href="{{url('imonitoreo/listaContratos')}}">Contratos</a></li>
                        <li class="breadcrumb-item"><a href="{{url('imonitoreo/verContrato/'.$sucursal->contrato_id)}}">{{$sucursal->contrato_id}}</a></li>
                        <li class="breadcrumb-item active">Sucursales</li>
                        <li class="breadcrumb-item"><a href="{{url('imonitoreo/verSucursal/'.$sucursal->id)}}">{{$sucursal->id}}</a></li>
                        <li class="breadcrumb-item active">Equipos</li>
                        <li class="breadcrumb-item active">{{$equipo->id}}</li>
                        <li class="breadcrumb-item active">Inspecciones</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="pb-2">
                        FICHAS DE INSPECCION COD EQUIPO: {{$equipo->id}}
                        <div class="float-right">
                            <a class="btn btn-success" href="{{url('imonitoreo/nuevaFicha/'.$equipo->id)}}">
                                <i class="fa fa-plus"></i>  Nueva
                            </a>

                        </div>
                    </h3>
                    <div class="row">
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered color-table info-table">
                                <thead>
                                <tr>
                                    <th class="text-center">COD</th>
                                    <th class="text-center">FECHA</th>
                                    <th class="text-center">INSPECTOR</th>
                                    <th class="text-center">RESULTADO</th>
                                    <th class="text-center">OPC</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($fichas as $ficha)
                                    <tr class="text-center">
                                        <td>{{$ficha->id}}</td>
                                        <td>{{Carbon\Carbon::createFromFormat('Y-m-d', $ficha->fecha)->format('d-m-Y')}}</td>
                                        <td>{{$ficha->trabajador->nombre}} {{$ficha->trabajador->apellido}}</td>
                                        <td>{{$ficha->resultado}}</td>
                                        <td>
                                            <a href="{{url('imonitoreo/verFicha/'.$ficha->id)}}">
                                                <button class="btn btn-secondary" title="Ver">
                                                    <i class="fa fa-eye"></i>
                                                </button>
                                            </a>
                                            <button type="button" class="btn btn-danger" title="Eliminar" onclick="modalEliminar('{{$ficha->id}}', '{{url('imonitoreo/eliminarFicha/'.$ficha -> id)}}')">
                                                <i class="fa fa-times"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                    <a href="{{url('imonitoreo/verSucursal/'.$equipo->sucursal_id)}}" class="btn btn-warning">Atras</a>
                </div>
        </div>
    </div>
        @include('vistas.modal')
        @push('scripts')
            <script>
                function modalEliminar(nombre, url) {
                    $('#modalEliminarForm').attr("action", url);
                    $('#metodo').val("delete");
                    $('#modalEliminarTitulo').html("Eliminar Ficha Tecnica");
                    $('#modalEliminarEnunciado').html("Realmente desea eliminar la ficha: " + nombre + "?");
                    $('#modalEliminar').modal('show');
                }
            </script>

    @endpush()
@endsection

