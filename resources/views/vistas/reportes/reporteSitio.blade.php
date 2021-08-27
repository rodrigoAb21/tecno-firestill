@extends('layouts.index')
@section('contenido')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Inicio</a></li>
                        <li class="breadcrumb-item active">Reporte del Sitio</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="pb-2">
                        <i class="fa fa-chart-pie"></i> Reporte del Sitio: Lugares más visitados
                    </h2>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="mt-4 chartjs-chart mb-3">
                                <canvas id="pie-chart" height="125" class="mt-4"></canvas>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered color-table info-table">
                                <thead>
                                <tr>
                                    <th class="text-center">POS</th>
                                    <th class="text-center">NOMBRE</th>
                                    <th class="text-center">%</th>
                                    <th class="text-center">VISITAS</th>
                                    <th class="text-center">COLOR</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($casos as $caso)
                                    <tr class="text-center">
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$caso->caso_uso}}</td>
                                        <td>{{round($caso->visitas/$total*100,0)}} %</td>
                                        <td>{{$caso->visitas}}</td>
                                        <td style="background: {{$colors[$loop->index]}}"></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- end row -->

                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script src="{{asset('plantilla/assets/libs/chart.js/Chart.bundle.min.js')}}"></script>
        <script>
            $( document ).ready(function() {
                var labels = [];
                var data = [];
                var colors1 = [
                    'rgba(63,127,191,0.57)',
                    'rgba(63,99,191,0.52)',
                    'rgba(63,63,191,0.55)',
                    'rgba(127,63,191,0.56)',
                    'rgba(191,63,191,0.63)',
                    'rgba(191,63,127,0.6)',
                    'rgba(255,0,182,0.64)',
                    'rgba(191,63,63,0.53)',
                    'rgba(191,63,63,0.6)',
                    'rgba(191,127,63,0.51)',
                    'rgba(191,191,63,0.54)',
                    'rgba(127,191,63,0.57)',
                    'rgba(63,191,63,0.52)',
                    'rgba(63,191,127,0.49)',
                    'rgba(63,191,191,0.62)',
                ];

                var colors2 = [
                    '#3F7FBF',
                    '#3f63bf',
                    '#3F3FBF',
                    '#7F3FBF',
                    '#BF3FBF',
                    '#BF3F7F',
                    '#ff00b6',
                    '#BF3F3F',
                    '#bf3f3f',
                    '#BF7F3F',
                    '#BFBF3F',
                    '#7FBF3F',
                    '#3FBF3F',
                    '#3FBF7F',
                    '#3FBFBF',
                ];


                @foreach($casos as $caso)
                data.push(parseInt('{{$caso->visitas}}'));
                labels.push('{{$caso->caso_uso}}');
                @endforeach


                var ctx = document.getElementById("pie-chart").getContext("2d");

                var myPieChart = new Chart(ctx, {
                    type: 'pie',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: '# de visitas',
                            data: data,
                            backgroundColor: colors1,
                            borderColor: colors2,
                            borderWidth: 1
                        }]
                    }
                });

            });


        </script>
    @endpush()
@endsection
