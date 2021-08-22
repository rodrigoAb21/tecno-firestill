@extends('layouts.index')
@section('contenido')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="pb-2">
                        <i class="far fa-copyright"></i> Marcas
                        <div class="float-right">
                            <a class="btn btn-success" href="{{url('marcas/create')}}">
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
                                <th class="text-center">OPC</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($marcas as $marca)
                                <tr class="text-center">
                                    <td>{{$marca->id}}</td>
                                    <td>{{$marca->nombre}}</td>
                                    <td>
                                        <a href="{{url('marcas/'.$marca->id.'/edit')}}">
                                            <button class="btn btn-warning" title="Editar">
                                                <i class="fa fa-pen"></i>
                                            </button>
                                        </a>
                                        <button type="button" class="btn btn-danger" title="Eliminar" onclick="modalEliminar('{{$marca -> nombre}}', '{{url('marcas/'.$marca -> id)}}')">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{$marcas->links('pagination.default')}}
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
                $('#modalEliminarTitulo').html("Eliminar Marca");
                $('#modalEliminarEnunciado').html("Realmente desea eliminar la marca: " + nombre + "?");
                $('#modalEliminar').modal('show');
            }
        </script>
    @endpush()
@endsection
