@extends('layouts.index')
@section('contenido')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="pb-2">
                        Contratos
                        <div class="float-right">
                            <a class="btn btn-success" href="{{url('imonitoreo/nuevoContrato')}}">
                                <i class="fa fa-plus"></i>  Nuevo
                            </a>

                        </div>
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
                                <th class="text-center">OPC</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($contratos as $contrato)
                                <tr class="text-center">
                                    <td>{{$contrato->id}}</td>
                                    <td>{{$contrato->cliente->nombre_empresa}}</td>
                                    <td>{{$contrato->estado}}</td>
                                    <td>{{Carbon\Carbon::createFromFormat('Y-m-d', $contrato->fecha_inicio)->format('d - m - Y')}}</td>
                                    <td>{{Carbon\Carbon::createFromFormat('Y-m-d', $contrato->fecha_fin)->format('d - m - Y')}}</td>
                                    <td>
                                        @if($contrato->edicion)

                                            <a href="{{url('imonitoreo/editarContrato/'.$contrato->id)}}">
                                                <button class="btn btn-warning"  title="Editar">
                                                    <i class="fa fa-pen"></i>
                                                </button>
                                            </a>
                                            <button type="button" class="btn btn-outline-danger"
                                                    title="Finalizar Edicion"
                                                    onclick="modalFinalizar('{{$contrato -> id}}', '{{url('imonitoreo/finalizarEdicion/'.$contrato -> id)}}')">
                                                <i class="fas fa-file-contract"></i>
                                            </button>
                                        @else
                                            <a href="{{url('imonitoreo/verContrato/'.$contrato->id)}}">
                                                <button class="btn btn-secondary"
                                                        title="Ver">
                                                    <i class="fa fa-eye"></i>
                                                </button>
                                            </a>

                                        @endif

                                        <button type="button"
                                                title="Eliminar"
                                                class="btn btn-danger"
                                                onclick="modalEliminar('{{$contrato -> id}}', '{{url('imonitoreo/eliminarContrato/'.$contrato -> id)}}')">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{$contratos->links('pagination.default')}}

                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('vistas.modal')
    @push('scripts')
        <script>
            function modalEliminar(nombre, url) {
                console.log(url);
                $('#modalEliminarForm').attr("action", url);
                $('#metodo').prop("delete");
                $('#modalEliminarTitulo').html("Eliminar");
                $('#modalEliminarEnunciado').html("Realmente lo desea eliminar?");
                $('#modalEliminar').modal('show');
            }

             function modalFinalizar(nombre, url) {
                $('#modalEliminarForm').attr("action", url);
                $('#metodo').prop("disabled", true);
                $('#modalEliminarTitulo').html("Finalizar edición");
                $('#modalEliminarEnunciado').html("Realmente desea finalizar la edición?");
                $('#btn_eliminar').html('Finalizar');
                $('#modalEliminar').modal('show');
            }


        </script>

    @endpush()
@endsection
