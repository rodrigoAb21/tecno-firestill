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
                        <i class="fa fa-chart-bar"></i> Reporte de Ventas: Productos más vendidos
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
                                    <th class="text-center">VISITAS</th>
                                    <th class="text-center">COLOR</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($ventas as $venta)
                                    <tr class="text-center">
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$venta->nombre}}</td>
                                        <td>{{$venta->ventas}}</td>
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
                    'rgba(191,63,63,0.5)',
                    'rgba(231,139,28,0.5)',
                    'rgba(255,232,0,0.5)',
                    'rgba(26,146,26,0.5)',
                    'rgba(63,127,191,0.5)',
                ];

                var colors2 = [
                    '#bf3f3f',
                    '#e78b1c',
                    '#ffe800',
                    '#1a921a',
                    '#3F7FBF',
                ];


                @foreach($ventas as $venta)
                data.push(parseInt('{{$venta->ventas}}'));
                labels.push('{{$venta->nombre}}');
                @endforeach


                var ctx = document.getElementById("pie-chart").getContext("2d");

                var myBarChart = new Chart(ctx, {
                    type: 'horizontalBar',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: '# de ventas',
                            data: data,
                            backgroundColor: colors1,
                            borderColor: colors2,
                            borderWidth: 1,
                            barPercentage: 0.8
                        }]
                    },
                    options: {
                        scales: {
                            xAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                    }
                });

            });


        </script>
    @endpush()
@endsection
