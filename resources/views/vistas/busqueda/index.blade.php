@extends('layouts.index')
@section('contenido')

    <div class="row" xmlns="http://www.w3.org/1999/html">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                    </ol>
                </div>
            </div>
        </div>
    </div>
    @if($vacio==true)
        <h3>No se encontraron coincidencias con el texto ingresado</h3>
    @else
@if(count($datos['trabajador'][0]))
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="pb-2">
                        <i class="fa fa-id-card"></i> Trabajadores
                    </h2>
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered color-table info-table">
                            <thead>
                            <tr>
                                <th class="text-center">COD</th>
                                <th class="text-center">NOMBRE</th>
                                <th class="text-center">APELLIDOS</th>
                                <th class="text-center">EDAD</th>
                                <th class="text-center">TIPO</th>
                                <th class="text-center">TELEFONO</th>
                                <th class="text-center">OPC</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($datos['trabajador'][0] as $empleado)
                                <tr class="text-center">
                                    <td >{{$empleado->id}}</td>
                                    <td >{{$empleado->nombre}}</td>
                                    <td >{{$empleado->apellido}}</td>
                                    <td >{{$empleado->edad}}</td>
                                    <td >{{$empleado->tipo}}</td>
                                    <td >{{$empleado->telefono}}</td>
                                    <td>
                                        <a href="{{url('trabajadores/'.$empleado->id)}}">
                                            <button class="btn btn-secondary" title="Ver">
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
@endif
@if(count($datos['proveedor'][0]))
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="pb-2">
                        <i class="fa fa-truck"></i> Proveedores
                    </h2>
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered color-table info-table">
                            <thead>
                            <tr>
                                <th class="text-center">COD</th>
                                <th class="text-center">NOMBRE</th>
                                <th class="text-center">TELEFONO</th>
                                <th class="text-center">EMAIL</th>
                                <th class="text-center">OPC</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($datos['proveedor'][0] as $proveedor)
                                <tr class="text-center">
                                    <td >{{$proveedor->id}}</td>
                                    <td >{{$proveedor->nombre}}</td>
                                    <td >{{$proveedor->telefono}}</td>
                                    <td >{{$proveedor->email}}</td>
                                    <td>
                                        <a href="{{url('proveedores/'.$proveedor->id)}}">
                                            <button class="btn btn-secondary" title="Ver">
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
@endif
@if(count($datos['cliente'][0]))
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="pb-2">
                        <i class="fa fa-user-tie"></i> Clientes
                    </h2>
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered color-table info-table">
                            <thead>
                            <tr>
                                <th class="text-center">COD</th>
                                <th class="text-center">NOMBRE</th>
                                <th class="text-center">CI/NIT</th>
                                <th class="text-center">TELEFONO</th>

                                <th class="text-center">OPC</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($datos['cliente'][0] as $cliente)
                                <tr class="text-center">
                                    <td >{{$cliente->id}}</td>
                                    <td >{{$cliente->nombre_empresa}}</td>
                                    <td >{{$cliente->nit}}</td>
                                    <td >{{$cliente->telefono_empresa}}</td>
                                    <td>
                                        <a href="{{url('clientes/'.$cliente->id)}}">
                                            <button class="btn btn-secondary" title="Ver" >
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
@endif
@if(count($datos['producto'][0]))
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="pb-2">
                        <i class="fa fa-boxes"></i> Inventario de Productos
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
                            @foreach($datos['producto'][0] as $producto)
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
@endif
@if(count($datos['ingresoProducto'][0]))
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="pb-2">
                        Ingresos de Productos
                    </h2>
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
                            @foreach($datos['ingresoProducto'][0] as $ingreso)
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
@endif
@if(count($datos['bajaProducto'][0]))
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="pb-2">
                        Productos dados de baja
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
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($datos['bajaProducto'][0] as $baja)
                                <tr class="text-center">
                                    <td>{{$baja->id}}</td>
                                    <td>{{$baja->producto->nombre}}</td>
                                    <td>{{$baja->cantidad}}</td>
                                    <td>{{Carbon\Carbon::createFromFormat('Y-m-d', $baja->fecha)->format('d-m-Y')}}</td>
                                    <td>{{$baja->motivo}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
@if(count($datos['notaVenta'][0]))
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="pb-2">
                        <i class="fas fa-dollar-sign"></i> Ventas
                    </h2>
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
                            @foreach($datos['notaVenta'][0] as $venta)
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
@endif
@if(count($datos['contrato'][0]))
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="pb-2">
                        Contratos
                    </h2>
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered color-table info-table">
                            <thead>
                            <tr>
                                <th class="text-center">COD</th>
                                <th class="text-center">CLIENTE</th>
                                <th class="text-center">ESTADO</th>
                                <th class="text-center">F. INICIO</th>
                                <th class="text-center">F. FIN</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($datos['contrato'][0] as $contrato)
                                <tr class="text-center">
                                    <td>{{$contrato->id}}</td>
                                    <td>{{$contrato->cliente->nombre_empresa}}</td>
                                    <td>{{$contrato->estado}}</td>
                                    <td>{{Carbon\Carbon::createFromFormat('Y-m-d', $contrato->fecha_inicio)->format('d - m - Y')}}</td>
                                    <td>{{Carbon\Carbon::createFromFormat('Y-m-d', $contrato->fecha_fin)->format('d - m - Y')}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
@if(count($datos['sucursal'][0]))
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h3 class="pb-2">
                    Sucursales
                </h3>
                <div class="row">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered color-table info-table">
                            <thead>
                            <tr>
                                <th class="text-center">COD</th>
                                <th class="text-center">NOMBRE</th>
                                <th class="text-center">DIRECCION</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($datos['sucursal'][0] as $sucursal)
                                <tr class="text-center">
                                    <td>{{$sucursal->id}}</td>
                                    <td>{{$sucursal->nombre}}</td>
                                    <td>{{$sucursal->direccion}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endif
@if(count($datos['equipo'][0]))
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
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($datos['equipo'][0] as $equipo)
                                        <tr class="text-center">
                                            <td>{{$equipo->id}}</td>
                                            <td>{{$equipo->nro_serie}}</td>
                                            <td>{{$equipo->capacidad}} {{$equipo->unidad_medida}}</td>
                                            <td>{{$equipo->tipo->nombre}}</td>
                                            <td>{{$equipo->marca->nombre}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
@endif

@if(count($datos['categoria'][0]))
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="pb-2">
                        <i class="fa fa-cube"></i> Categorias
                    </h2>
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered color-table info-table">
                            <thead>
                            <tr>
                                <th class="text-center">COD</th>
                                <th class="text-center">NOMBRE</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($datos['categoria'][0] as $categoria)
                                <tr class="text-center">
                                    <td>{{$categoria->id}}</td>
                                    <td>{{$categoria->nombre}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
@if(count($datos['tipoClasificacion'][0]))
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="pb-2">
                        <i class="fas fa-sitemap"></i> Tipos
                    </h2>
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered color-table info-table">
                            <thead>
                            <tr>
                                <th class="text-center">COD</th>
                                <th class="text-center">NOMBRE</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($datos['tipoClasificacion'][0] as $tipo)
                                <tr class="text-center">
                                    <td>{{$tipo->id}}</td>
                                    <td>{{$tipo->nombre}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
@if(count($datos['marcaClasificacion'][0]))
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="pb-2">
                        <i class="far fa-copyright"></i> Marcas
                    </h2>
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered color-table info-table">
                            <thead>
                            <tr>
                                <th class="text-center">COD</th>
                                <th class="text-center">NOMBRE</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($datos['marcaClasificacion'][0] as $marca)
                                <tr class="text-center">
                                    <td>{{$marca->id}}</td>
                                    <td>{{$marca->nombre}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
    @endif
@endsection
