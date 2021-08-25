@extends('layouts.index')

@section('contenido')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="{{url('inventario/listaIngresos')}}">Ingresos</a></li>

                        <li class="breadcrumb-item active">{{$ingreso->id}}</li>
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
                        Ver Ingreso: {{$ingreso->id}}
                    </h3>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label>Fecha</label>
                                        <input readonly
                                               type="date"
                                               class="form-control"
                                               value="{{$ingreso->fecha}}"
                                               name="fecha">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label>Nro Factura</label>
                                        <input readonly
                                               type="text"
                                               value="{{$ingreso->nro_factura}}"
                                               class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label>Total Bs</label>
                                        <input readonly
                                               value="{{$ingreso->total}}"
                                               type="text"
                                               class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label>Proveedor</label>
                                        <input type="text" class="form-control" readonly value="{{$ingreso->proveedor->nombre}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 text-center">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <img src="{{asset('img/ingresoProducto/'.$ingreso->foto_factura)}}" class="img-thumbnail" height="200px" width="200px" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>


                        <div class="table-responsive">
                            <table class="table table-hover table-bordered color-table info-table">
                                <thead>
                                <tr>
                                    <th class="text-center w-50">PRODUCTO</th>
                                    <th class="text-center">CANT</th>
                                    <th class="text-center">COSTO U. Bs</th>
                                    <th class="text-center">SUBTOTAL</th>
                                </tr>
                                </thead>
                                <tbody id="detalle">
                                @foreach($ingreso->detalles as $detalle)
                                    <tr class="text-center">
                                        <td>{{$detalle->producto->nombre}}</td>
                                        <td>{{$detalle->cantidad}}</td>
                                        <td>{{$detalle->costo}}</td>
                                        <td>{{$detalle->costo * $detalle->cantidad}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr class="text-center">
                                    <td></td>
                                    <td></td>
                                    <td><b>TOTAL</b></td>
                                    <td><span id="total">{{$ingreso->total}}</span> Bs</td>
                                </tr>
                                </tfoot>
                            </table>

                        </div>

                        <a href="{{url('inventario/listaIngresos')}}" class="btn btn-warning">Atras</a>
                </div>
            </div>
        </div>
    </div>
@endsection