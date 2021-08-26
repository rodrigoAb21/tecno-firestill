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
                        <li class="breadcrumb-item"><a href="{{url('imonitoreo/listarFichas/'.$equipo->id)}}">Fichas</a></li>
                        <li class="breadcrumb-item active">Nueva</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="pb-2">Nueva Ficha Tecnica</h3>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="POST" action="{{url('imonitoreo/guardarFicha/'.$equipo->id)}}" autocomplete="off" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Fecha</label>
                                    <input required
                                           type="date"
                                           value="{{\Carbon\Carbon::now('America/La_Paz')->toDateString()}}"
                                           class="form-control"
                                           name="fecha">
                                </div>
                            </div>
                        </div>
                        <hr>
                        <br>
                        <div class="row text-center">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <h4>Estado del Caño de Pesca</h4>
                                <div class="radio radio-dark mb-2">
                                    <input type="radio" name="eCanioPesca" id="radio1" value="Bueno" checked>
                                    <label for="radio1">
                                        Bueno
                                    </label>
                                </div>

                                <div class="radio radio-dark mb-2">
                                    <input type="radio" name="eCanioPesca" id="radio2" value="Malo">
                                    <label for="radio2">
                                        Malo
                                    </label>
                                </div>
                            </div>


                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <h4>Estado del Zuncho</h4>
                                <div class="radio radio-dark mb-2">
                                    <input type="radio" name="eZuncho" id="radio3" value="Bueno" checked>
                                    <label for="radio3">
                                        Bueno
                                    </label>
                                </div>

                                <div class="radio radio-dark mb-2">
                                    <input type="radio" name="eZuncho" id="radio4" value="Malo">
                                    <label for="radio4">
                                        Malo
                                    </label>
                                </div>
                            </div>


                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <h4>Estado del Chasis</h4>
                                <div class="radio radio-dark mb-2">
                                    <input type="radio" name="eChasis" id="radio5" value="Bueno" checked>
                                    <label for="radio5">
                                        Bueno
                                    </label>
                                </div>

                                <div class="radio radio-dark mb-2">
                                    <input type="radio" name="eChasis" id="radio6" value="Malo">
                                    <label for="radio6">
                                        Malo
                                    </label>
                                </div>
                            </div>


                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <h4>Estado de la Rueda</h4>
                                <div class="radio radio-dark mb-2">
                                    <input type="radio" name="eRueda" id="radio7" value="Bueno" checked>
                                    <label for="radio7">
                                        Bueno
                                    </label>
                                </div>

                                <div class="radio radio-dark mb-2">
                                    <input type="radio" name="eRueda" id="radio8" value="Malo">
                                    <label for="radio8">
                                        Malo
                                    </label>
                                </div>
                            </div>




                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <h4>Estado de la Rosca</h4>
                                <div class="radio radio-dark mb-2">
                                    <input type="radio" name="eRosca" id="radio9" value="Bueno" checked>
                                    <label for="radio9">
                                        Bueno
                                    </label>
                                </div>

                                <div class="radio radio-dark mb-2">
                                    <input type="radio" name="eRosca" id="radio10" value="Malo">
                                    <label for="radio10">
                                        Malo
                                    </label>
                                </div>
                            </div>


                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <h4>Estado de la Manguera</h4>
                                <div class="radio radio-dark mb-2">
                                    <input type="radio" name="eManguera" id="radio11" value="Bueno" checked>
                                    <label for="radio11">
                                        Bueno
                                    </label>
                                </div>

                                <div class="radio radio-dark mb-2">
                                    <input type="radio" name="eManguera" id="radio12" value="Malo">
                                    <label for="radio12">
                                        Malo
                                    </label>
                                </div>
                            </div>



                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <h4>Estado de la Valvula</h4>
                                <div class="radio radio-dark mb-2">
                                    <input type="radio" name="eValvula" id="radio15" value="Bueno" checked>
                                    <label for="radio15">
                                        Bueno
                                    </label>
                                </div>

                                <div class="radio radio-dark mb-2">
                                    <input type="radio" name="eValvula" id="radio16" value="Malo">
                                    <label for="radio16">
                                        Malo
                                    </label>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <h4>Estado de la Tobera</h4>
                                <div class="radio radio-dark mb-2">
                                    <input type="radio" name="eTobera" id="radio17" value="Bueno" checked>
                                    <label for="radio17">
                                        Bueno
                                    </label>
                                </div>

                                <div class="radio radio-dark mb-2">
                                    <input type="radio" name="eTobera" id="radio18" value="Malo">
                                    <label for="radio18">
                                        Malo
                                    </label>
                                </div>
                            </div>


                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <h4>Estado del Robinete</h4>
                                <div class="radio radio-dark mb-2">
                                    <input type="radio" name="eRobinete" id="radio19" value="Bueno" checked>
                                    <label for="radio19">
                                        Bueno
                                    </label>
                                </div>

                                <div class="radio radio-dark mb-2">
                                    <input type="radio" name="eRobinete" id="radio20" value="Malo">
                                    <label for="radio20">
                                        Malo
                                    </label>
                                </div>
                            </div>


                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <h4>Estado de la Palanca</h4>
                                <div class="radio radio-dark mb-2">
                                    <input type="radio" name="ePalanca" id="radio21" value="Bueno" checked>
                                    <label for="radio21">
                                        Bueno
                                    </label>
                                </div>

                                <div class="radio radio-dark mb-2">
                                    <input type="radio" name="ePalanca" id="radio22" value="Malo">
                                    <label for="radio22">
                                        Malo
                                    </label>
                                </div>
                            </div>


                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <h4>Estado del Manometro</h4>
                                <div class="radio radio-dark mb-2">
                                    <input type="radio" name="eManometro" id="radio23" value="Bueno" checked>
                                    <label for="radio23">
                                        Bueno
                                    </label>
                                </div>

                                <div class="radio radio-dark mb-2">
                                    <input type="radio" name="eManometro" id="radio24" value="Malo">
                                    <label for="radio24">
                                        Malo
                                    </label>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <h4>Estado del Vastago</h4>
                                <div class="radio radio-dark mb-2">
                                    <input type="radio" name="eVastago" id="radio25" value="Bueno" checked>
                                    <label for="radio25">
                                        Bueno
                                    </label>
                                </div>

                                <div class="radio radio-dark mb-2">
                                    <input type="radio" name="eVastago" id="radio26" value="Malo">
                                    <label for="radio26">
                                        Malo
                                    </label>
                                </div>
                            </div>


                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <h4>Estado del Difusor</h4>
                                <div class="radio radio-dark mb-2">
                                    <input type="radio" name="eDifusor" id="radio27" value="Bueno" checked>
                                    <label for="radio27">
                                        Bueno
                                    </label>
                                </div>

                                <div class="radio radio-dark mb-2">
                                    <input type="radio" name="eDifusor" id="radio28" value="Malo">
                                    <label for="radio28">
                                        Malo
                                    </label>
                                </div>
                            </div>


                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <h4>Estado del Disco</h4>
                                <div class="radio radio-dark mb-2">
                                    <input type="radio" name="eDisco" id="radio13" value="Bueno" checked>
                                    <label for="radio13">
                                        Bueno
                                    </label>
                                </div>

                                <div class="radio radio-dark mb-2">
                                    <input type="radio" name="eDisco" id="radio14" value="Malo">
                                    <label for="radio14">
                                        Malo
                                    </label>
                                </div>
                            </div>
                        </div>
                        <br>
                        <hr>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label>Carga</label>
                                    <input
                                            type="number"
                                            step="0.01"
                                            class="form-control"
                                            name="carga">
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label>Resultado</label>
                                    <input required
                                            type="text"
                                            class="form-control"
                                            name="resultado">
                                </div>
                            </div>


                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Observaciones</label>
                                    <textarea name="observacion"
                                            class="form-control"
                                            rows="3"></textarea>
                                </div>
                            </div>
                        </div>
                        <a href="{{url('imonitoreo/editarSucursal/'.$sucursal->id)}}" class="btn btn-warning">Atras</a>
                        <button type="submit" class="btn btn-info">Guardar</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
