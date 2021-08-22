@extends('layouts.index')
@section('contenido')
    <!--
    *************************************************************************
     * Nombre........: create
     * Tipo..........: Vista
     * Descripcion...:
     * Fecha.........: 07-FEB-2021
     * Autor.........: Rodrigo Abasto Berbetty
     *************************************************************************
    -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="pb-2">
                        <i class="fa fa-cube"></i> Categorias
                        <div class="float-right">
                            <a class="btn btn-success" href="{{url('categorias/create')}}">
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
                            @foreach($categorias as $categoria)
                                <tr class="text-center">
                                    <td>{{$categoria->id}}</td>
                                    <td>{{$categoria->nombre}}</td>
                                    <td>
                                        <a href="{{url('categorias/'.$categoria->id.'/edit')}}">
                                            <button class="btn btn-warning" title="Editar" >
                                                <i class="fa fa-pen"></i>
                                            </button>
                                        </a>
                                        <button type="button" class="btn btn-danger" title="Eliminar"  onclick="modalEliminar('{{$categoria -> nombre}}', '{{url('categorias/'.$categoria -> id)}}')">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{$categorias->links('pagination.default')}}
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
                $('#modalEliminarTitulo').html("Eliminar Categoria");
                $('#modalEliminarEnunciado').html("Realmente desea eliminar la categoria: " + nombre + "?");
                $('#modalEliminar').modal('show');
            }
        </script>
    @endpush()
@endsection
