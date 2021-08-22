@extends('layouts.index')

@section('contenido')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="pb-2">
                        Ver Asignacion - COD: {{$asignacion->id}}
                    </h3>
                    <div class="row">

                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label>Fecha</label>
                                <input readonly
                                       type="date"
                                       class="form-control"
                                       value="{{$asignacion->fecha}}"
                                       name="fecha">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label>Responsable</label>
                                <input readonly
                                       value="{{$asignacion->empleado->nombre}} {{$asignacion->empleado->apellido}}"
                                       type="text"
                                       class="form-control">
                            </div>
                        </div>

                    </div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered color-table info-table">
                            <thead>
                            <tr>
                                <th class="text-center">HERRAMIENTA</th>
                                <th class="text-center">CANTIDAD</th>
                            </tr>
                            </thead>
                            <tbody id="detalle">
                            @foreach($asignacion->detalles as $detalle)
                                <tr class="text-center">
                                    <td>{{$detalle->herramienta->nombre}}</td>
                                    <td>{{$detalle->cantidad}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>

                    <a href="{{url('herramientas/listaAsignaciones')}}" class="btn btn-warning">Atras</a>

                </div>
            </div>
        </div>
    </div>
@endsection
