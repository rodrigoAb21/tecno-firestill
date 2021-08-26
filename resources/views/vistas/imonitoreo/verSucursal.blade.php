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

                        <li class="breadcrumb-item active">{{$sucursal->id}}</li>
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
                        Ver Sucursal: {{$sucursal->id}}
                    </h3>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Nombre</label>
                                    <input readonly
                                           type="text"
                                           value="{{$sucursal->nombre}}"
                                           class="form-control"
                                           name="nombre">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Direccion</label>
                                    <input readonly
                                           type="text"
                                           value="{{$sucursal->direccion}}"
                                           class="form-control"
                                           name="direccion">
                                </div>
                            </div>
                        </div>
                        <a href="{{url('imonitoreo/verContrato/'.$sucursal->contrato_id)}}" class="btn btn-warning">Atras</a>


                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="pb-2">
                        Equipos
                    </h3>
                    <div class="row">
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered color-table info-table">
                                <thead>
                                <tr>
                                    <th class="text-center">COD</th>
                                    <th class="text-center">NRO SERIE</th>
                                    <th class="text-center">CAPACIDAD</th>
                                    <th class="text-center">TIPO</th>
                                    <th class="text-center">MARCA</th>
                                    <th class="text-center">OPC</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($sucursal->equipos as $equipo)
                                    <tr class="text-center">
                                        <td>{{$equipo->id}}</td>
                                        <td>{{$equipo->nro_serie}}</td>
                                        <td>{{$equipo->capacidad}} {{$equipo->unidad_medida}}</td>
                                        <td>{{$equipo->tipo->nombre}}</td>
                                        <td>{{$equipo->marca->nombre}}</td>
                                        <td>
                                            <a href="{{url('imonitoreo/listarFichas/'.$equipo->id)}}">
                                                <button class="btn btn-warning" title="Ver fichas">
                                                    <i class="fas fa-file-archive"></i>
                                                </button>
                                            </a>
                                            <a href="{{asset('img/equipos/codigos/'.$equipo->id.'.png')}}" download>
                                                <button class="btn btn-primary" title="Descargar QR">
                                                    <i class="fas fa-qrcode"></i>
                                                </button>
                                            </a>
                                            <a href="{{url('imonitoreo/verEquipo/'.$equipo->id)}}">
                                                <button class="btn btn-secondary" title="Ver Equipo">
                                                    <i class="fa fa-eye"></i>
                                                </button>
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
    </div>
@endsection

