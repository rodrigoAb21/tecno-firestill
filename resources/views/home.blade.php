@extends('layouts.index')

@section('contenido')
    <div class="row mt-3">
        <h3>Temas</h3>
        <div class="col-12 text-center">
            <div class="card-deck">
                <div class="card" >
                    <img src="{{'img/temas/nino.png'}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <a href="{{url('configView/tema/1')}}" class="btn btn-default stretched-link"></a>
                        <h3 class="card-title" style="font-family: 'Comic Sans MS', fantasy !important;"><b>Niño</b></h3>
                    </div>
                </div>
                <div class="card" >
                    <img src="{{'img/temas/joven.png'}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <a href="{{url('configView/tema/2')}}" class="btn btn-default stretched-link"></a>
                        <h3 class="card-title">Joven</h3>
                    </div>
                </div>
                <div class="card" >
                    <img src="{{'img/temas/adulto.png'}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <a href="{{url('configView/tema/3')}}" class="btn btn-default stretched-link"></a>
                        <h3 class="card-title" style="font-family: 'Courier New', Courier, monospace !important;"><b>Adulto</b></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <h3>Modo</h3>
        <div class="col-12 text-center">
            <div class="card-deck">
                <div class="card text-white bg-warning" >
                    <div class="card-body">

                        <a href="{{url('configView/modo/dia')}}" class="btn btn-default stretched-link"></a>
                        <h2 class="card-title"> <i class="fa fa-sun fa-2x"></i></h2>
                    </div>
                </div>
                <div class="card text-white bg-soft-dark" >
                    <div class="card-body">

                        <a href="{{url('configView/modo/noche')}}" class="btn btn-default stretched-link"></a>
                        <h2 class="card-title text-white"><i class="fa fa-moon fa-2x"></i></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
