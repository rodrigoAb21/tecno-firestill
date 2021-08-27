@extends('layouts.index')
@section('contenido')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Inicio</a></li>
                        <li class="breadcrumb-item active">Reporte de Ventas</li>
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
                        <i class="fa fa-chart-bar"></i> Reporte de Ventas
                        <div class="float-right">
                            <form method="GET" action="{{url('reportes/reporteVenta')}}" autocomplete="off">
                                <select name="ano" class="form-control" onchange='this.form.submit();'>
                                    @foreach($anos as $aa)
                                        @if($ano == $aa)
                                            <option value="{{$aa}}" selected>{{$aa}}</option>
                                        @else
                                            <option value="{{$aa}}">{{$aa}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </form>
                        </div>
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4>
                        Top ventas anual
                    </h4>
                    <!-- end row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="chartjs-chart mb-3">
                                <canvas id="anual" height="125" class="mt-4"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="card">
                <div class="card-body">
                    <h4>
                        Enero
                    </h4>
                    <!-- end row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="chartjs-chart mb-3">
                                <canvas id="ene" height="225" class="mt-4"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="card">
                <div class="card-body">
                    <h4>
                        Febrero
                    </h4>
                    <!-- end row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="chartjs-chart mb-3">
                                <canvas id="feb" height="225" class="mt-4"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="card">
                <div class="card-body">
                    <h4>
                        Marzo
                    </h4>
                    <!-- end row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="chartjs-chart mb-3">
                                <canvas id="mar" height="225" class="mt-4"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="card">
                <div class="card-body">
                    <h4>
                        Abril
                    </h4>
                    <!-- end row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="chartjs-chart mb-3">
                                <canvas id="abr" height="225" class="mt-4"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="card">
                <div class="card-body">
                    <h4>
                        Mayo
                    </h4>
                    <!-- end row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="chartjs-chart mb-3">
                                <canvas id="may" height="225" class="mt-4"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="card">
                <div class="card-body">
                    <h4>
                        Junio
                    </h4>
                    <!-- end row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="chartjs-chart mb-3">
                                <canvas id="jun" height="225" class="mt-4"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="card">
                <div class="card-body">
                    <h4>
                        Julio
                    </h4>
                    <!-- end row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="chartjs-chart mb-3">
                                <canvas id="jul" height="225" class="mt-4"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="card">
                <div class="card-body">
                    <h4>
                        Agosto
                    </h4>
                    <!-- end row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="chartjs-chart mb-3">
                                <canvas id="ago" height="225" class="mt-4"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="card">
                <div class="card-body">
                    <h4>
                        Septiembre
                    </h4>
                    <!-- end row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="chartjs-chart mb-3">
                                <canvas id="sep" height="225" class="mt-4"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="card">
                <div class="card-body">
                    <h4>
                        Octubre
                    </h4>
                    <!-- end row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="chartjs-chart mb-3">
                                <canvas id="oct" height="225" class="mt-4"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="card">
                <div class="card-body">
                    <h4>
                        Noviembre
                    </h4>
                    <!-- end row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="chartjs-chart mb-3">
                                <canvas id="nov" height="225" class="mt-4"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="card">
                <div class="card-body">
                    <h4>
                        Diciembre
                    </h4>
                    <!-- end row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="chartjs-chart mb-3">
                                <canvas id="dic" height="225" class="mt-4"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script src="{{asset('plantilla/assets/libs/chart.js/Chart.bundle.min.js')}}"></script>
        <script>
            $( document ).ready(function() {
                var labels = [];
                var labels1 = [];
                var labels2 = [];
                var labels3 = [];
                var labels4 = [];
                var labels5 = [];
                var labels6 = [];
                var labels7 = [];
                var labels8 = [];
                var labels9 = [];
                var labels10 = [];
                var labels11 = [];
                var labels12 = [];

                var data = [];
                var data1 = [];
                var data2 = [];
                var data3 = [];
                var data4 = [];
                var data5 = [];
                var data6 = [];
                var data7 = [];
                var data8 = [];
                var data9 = [];
                var data10 = [];
                var data11 = [];
                var data12 = [];
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



                @foreach($ventasAno as $venta)
                data.push(parseInt('{{$venta->ventas}}'));
                labels.push('{{$venta->nombre}}');
                @endforeach


                var ctx = document.getElementById("anual").getContext("2d");

                var anual = new Chart(ctx, {
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

                //***********************************************************
                //--------------------------01------------------------------
                //***********************************************************

                @foreach($ene as $ee)
                data1.push(parseInt('{{$ee->ventas}}'));
                labels1.push('{{$ee->nombre}}');
                @endforeach


                var ctx1 = document.getElementById("ene").getContext("2d");

                var ene = new Chart(ctx1, {
                    type: 'bar',
                    data: {
                        labels: labels1,
                        datasets: [{
                            label: '# de ventas',
                            data: data1,
                            backgroundColor: colors1,
                            borderColor: colors2,
                            borderWidth: 1,
                            barPercentage: 0.8
                        }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                    }
                });

                //***********************************************************
                //--------------------------02------------------------------
                //***********************************************************

                @foreach($feb as $ff)
                data2.push(parseInt('{{$ff->ventas}}'));
                labels2.push('{{$ff->nombre}}');
                @endforeach


                var ctx2 = document.getElementById("feb").getContext("2d");

                var feb = new Chart(ctx2, {
                    type: 'bar',
                    data: {
                        labels: labels2,
                        datasets: [{
                            label: '# de ventas',
                            data: data2,
                            backgroundColor: colors1,
                            borderColor: colors2,
                            borderWidth: 1,
                            barPercentage: 0.8
                        }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                    }
                });

                //***********************************************************
                //--------------------------03------------------------------
                //***********************************************************

                @foreach($mar as $mr)
                data3.push(parseInt('{{$mr->ventas}}'));
                labels3.push('{{$mr->nombre}}');
                @endforeach


                var ctx3 = document.getElementById("mar").getContext("2d");

                var mar = new Chart(ctx3, {
                    type: 'bar',
                    data: {
                        labels: labels3,
                        datasets: [{
                            label: '# de ventas',
                            data: data3,
                            backgroundColor: colors1,
                            borderColor: colors2,
                            borderWidth: 1,
                            barPercentage: 0.8
                        }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                    }
                });

                //***********************************************************
                //--------------------------04------------------------------
                //***********************************************************

                @foreach($abr as $ab)
                data4.push(parseInt('{{$ab->ventas}}'));
                labels4.push('{{$ab->nombre}}');
                @endforeach


                var ctx4 = document.getElementById("abr").getContext("2d");

                var abril = new Chart(ctx4, {
                    type: 'bar',
                    data: {
                        labels: labels4,
                        datasets: [{
                            label: '# de ventas',
                            data: data4,
                            backgroundColor: colors1,
                            borderColor: colors2,
                            borderWidth: 1,
                            barPercentage: 0.8
                        }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                    }
                });

                //***********************************************************
                //--------------------------05------------------------------
                //***********************************************************

                @foreach($may as $my)
                data5.push(parseInt('{{$my->ventas}}'));
                labels5.push('{{$my->nombre}}');
                @endforeach


                var ctx5 = document.getElementById("may").getContext("2d");

                var mayo = new Chart(ctx5, {
                    type: 'bar',
                    data: {
                        labels: labels5,
                        datasets: [{
                            label: '# de ventas',
                            data: data5,
                            backgroundColor: colors1,
                            borderColor: colors2,
                            borderWidth: 1,
                            barPercentage: 0.8
                        }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                    }
                });

                //***********************************************************
                //--------------------------06------------------------------
                //***********************************************************

                @foreach($jun as $jn)
                data6.push(parseInt('{{$jn->ventas}}'));
                labels6.push('{{$jn->nombre}}');
                @endforeach


                var ctx6 = document.getElementById("jun").getContext("2d");

                var junio = new Chart(ctx6, {
                    type: 'bar',
                    data: {
                        labels: labels6,
                        datasets: [{
                            label: '# de ventas',
                            data: data6,
                            backgroundColor: colors1,
                            borderColor: colors2,
                            borderWidth: 1,
                            barPercentage: 0.8
                        }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                    }
                });

                //***********************************************************
                //--------------------------07------------------------------
                //***********************************************************

                @foreach($jul as $jl)
                data7.push(parseInt('{{$jl->ventas}}'));
                labels7.push('{{$jl->nombre}}');
                @endforeach


                var ctx7 = document.getElementById("jul").getContext("2d");

                var julio = new Chart(ctx7, {
                    type: 'bar',
                    data: {
                        labels: labels7,
                        datasets: [{
                            label: '# de ventas',
                            data: data7,
                            backgroundColor: colors1,
                            borderColor: colors2,
                            borderWidth: 1,
                            barPercentage: 0.8
                        }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                    }
                });

                //***********************************************************
                //--------------------------08------------------------------
                //***********************************************************

                @foreach($ago as $ag)
                data8.push(parseInt('{{$ag->ventas}}'));
                labels8.push('{{$ag->nombre}}');
                @endforeach


                var ctx8 = document.getElementById("ago").getContext("2d");

                var agosto = new Chart(ctx8, {
                    type: 'bar',
                    data: {
                        labels: labels8,
                        datasets: [{
                            label: '# de ventas',
                            data: data8,
                            backgroundColor: colors1,
                            borderColor: colors2,
                            borderWidth: 1,
                            barPercentage: 0.8,
                        }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                    }
                });

                //***********************************************************
                //--------------------------09------------------------------
                //***********************************************************

                @foreach($sep as $ss)
                data9.push(parseInt('{{$ss->ventas}}'));
                labels9.push('{{$ss->nombre}}');
                @endforeach


                var ctx9 = document.getElementById("sep").getContext("2d");

                var septiembre = new Chart(ctx9, {
                    type: 'bar',
                    data: {
                        labels: labels9,
                        datasets: [{
                            label: '# de ventas',
                            data: data9,
                            backgroundColor: colors1,
                            borderColor: colors2,
                            borderWidth: 1,
                            barPercentage: 0.8
                        }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                    }
                });

                //***********************************************************
                //--------------------------10------------------------------
                //***********************************************************

                @foreach($oct as $octu)
                data10.push(parseInt('{{$octu->ventas}}'));
                labels10.push('{{$octu->nombre}}');
                @endforeach


                var ctx10 = document.getElementById("oct").getContext("2d");

                var octubre = new Chart(ctx10, {
                    type: 'bar',
                    data: {
                        labels: labels10,
                        datasets: [{
                            label: '# de ventas',
                            data: data10,
                            backgroundColor: colors1,
                            borderColor: colors2,
                            borderWidth: 1,
                            barPercentage: 0.8
                        }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                    }
                });

                //***********************************************************
                //--------------------------11------------------------------
                //***********************************************************

                @foreach($nov as $nn)
                data11.push(parseInt('{{$nn->ventas}}'));
                labels11.push('{{$nn->nombre}}');
                @endforeach


                var ctx11 = document.getElementById("nov").getContext("2d");

                var noviembre = new Chart(ctx11, {
                    type: 'bar',
                    data: {
                        labels: labels11,
                        datasets: [{
                            label: '# de ventas',
                            data: data11,
                            backgroundColor: colors1,
                            borderColor: colors2,
                            borderWidth: 1,
                            barPercentage: 0.8
                        }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                    }
                });

                //***********************************************************
                //--------------------------12------------------------------
                //***********************************************************

                @foreach($dic as $dici)
                data12.push(parseInt('{{$dici->ventas}}'));
                labels12.push('{{$dici->nombre}}');
                @endforeach


                var ctx12 = document.getElementById("dic").getContext("2d");

                var anual = new Chart(ctx12, {
                    type: 'bar',
                    data: {
                        labels: labels12,
                        datasets: [{
                            label: '# de ventas',
                            data: data12,
                            backgroundColor: colors1,
                            borderColor: colors2,
                            borderWidth: 1,
                            barPercentage: 0.8
                        }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
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
