<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <title>Firestill & Armour Group</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <!-- App favicon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('plantilla/assets/images/favicon.png')}}"/>

    <!-- Plugins css -->
    <link href="{{asset('plantilla/assets/libs/flatpickr/flatpickr.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('plantilla/assets/libs/selectize/css/selectize.bootstrap3.css')}}" rel="stylesheet" type="text/css" />
    <!-- App css -->
    @if (!\Auth::guest())
        @if(Auth::user()->config->noche)
            <link href="{{asset('plantilla/assets/css/bootstrap-dark.min.css')}}" rel="stylesheet" type="text/css"/>
            <link href="{{asset('plantilla/assets/css/app-dark.min.css')}}" rel="stylesheet" type="text/css"/>
        @else
            <link href="{{asset('plantilla/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
            <link href="{{asset('plantilla/assets/css/app.min.css')}}" rel="stylesheet" type="text/css"/>
        @endif
    @endif





    <!-- icons -->
    <link href="{{asset('plantilla/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />


    @if (!\Auth::guest())
        @if(Auth::user()->config->tema == 1)
            <style>
                a {
                    font-family: "Comic Sans MS", fantasy !important;
                    font-style: italic;
                    font-size: 20px !important;
                }
                h1, h2, h3, h4, h5 {
                    font-family: "Comic Sans MS", fantasy !important;
                }
            </style>
        @elseif (Auth::user()->config->tema == 3)
            <style>
                a {
                    font-family: 'Courier New', Courier, monospace !important;
                    font-size: 20px !important;
                }
                h1, h2, h3, h4, h5 {
                    font-family: 'Courier New', Courier, monospace !important;
                    font-weight: bold;
                }
            </style>
        @endif
    @endif

    @stack('arriba')
</head>



@if (!\Auth::guest())
    <!-- nino -->
    @if(Auth::user()->config->tema == 1)
        <body data-sidebar-color="gradient" data-topbar-color="light" style="font-family:'Comic Sans MS',fantasy; font-size: 20px;">
        <!-- joven -->
        @elseif (Auth::user()->config->tema == 2)
            <body data-sidebar-color="brand" data-topbar-color="dark">
            <!-- adulto -->
            @else
                <body data-sidebar-color="light" data-topbar-color="dark" style="font-family:'Courier New', Courier, monospace; font-size: 20px;">
                @endif
                @endif

                <!-- Begin page -->
                <div id="wrapper">

                    <!-- Topbar Start -->
                    <div class="navbar-custom">
                        <div class="container-fluid">
                            <ul class="list-unstyled topnav-menu float-right mb-0">

                                <li class="d-none d-lg-block">
                                    <form method="POST" action="{{url('busqueda')}}" class="app-search">
                                        {{csrf_field()}}
                                        <div class="app-search-box dropdown">
                                            <div class="input-group">
                                                <input type="search" class="form-control" placeholder="Search..." id="top-search" name="textoBusqueda" required>
                                                <div class="input-group-append">
                                                    <button class="btn" type="submit">
                                                        <i class="fe-search"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </li>

                                <li class="dropdown d-inline-block d-lg-none">
                                    <a class="nav-link dropdown-toggle arrow-none waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                        <i class="fe-search noti-icon"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-lg dropdown-menu-right p-0">
                                        <form class="p-3">
                                            <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                                        </form>
                                    </div>
                                </li>
                                <li class="dropdown notification-list">
                                    <a href="javascript:void(0);" class="nav-link right-bar-toggle waves-effect waves-light" data-toggle="modal" data-target="#tema">
                                        <i class="fe-settings noti-icon"></i>
                                    </a>
                                </li>


                                <li class="dropdown notification-list topbar-dropdown">
                                    <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">

                        <span class="pro-user-name ml-1">
                                    {{\Auth::user()->nombre }} {{\Auth::user()->apellido }} <i class="mdi mdi-chevron-down"></i>
                                </span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right profile-dropdown ">

                                        <a href="{{ route('logout') }}" class="dropdown-item notify-item" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                                            <i class="fa fa-power-off"></i>
                                            Cerrar Sesion
                                        </a>

                                        <form id="logout-form" action="{{route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </div>
                                </li>


                            </ul>

                            <!-- LOGO -->
                            <div class="logo-box">
                                <a href="{{url('/')}}" class="logo logo-dark text-center">
                    <span class="logo-sm">
                                <i class="fa fa-fire fa-2x" style="color:#F40009;"></i>
                    </span>
                                    <span class="logo-lg">
                       <i class="fa fa-fire fa-2x" style="color:#F40009;"></i>
                        <span class="logo-lg-text-light">FIRESTILL</span>
                    </span>
                                </a>

                                <a href="{{url('/')}}" class="logo logo-light text-center">
                            <span class="logo-sm">
                                <i class="fa fa-fire fa-2x" style="color:#F40009;"></i>
                            </span>
                                    <span class="logo-lg">
                        <i class="fa fa-fire fa-2x" style="color:#F40009;"></i>
                        <span class="logo-lg-text-light">FIRESTILL</span>
                    </span>
                                </a>
                            </div>

                            <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
                                <li>
                                    <button class="button-menu-mobile waves-effect waves-light">
                                        <i class="fe-menu"></i>
                                    </button>
                                </li>

                                <li>
                                    <!-- Mobile menu toggle (Horizontal Layout)-->
                                    <a class="navbar-toggle nav-link" data-toggle="collapse" data-target="#topnav-menu-content">
                                        <div class="lines">
                                            <span></span>
                                            <span></span>
                                            <span></span>
                                        </div>
                                    </a>
                                    <!-- End mobile menu toggle-->
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <!-- end Topbar -->

                    <!-- ========== Left Sidebar Start ========== -->
                    <div class="left-side-menu" >

                        <div class="h-100" data-simplebar>

                            <!--- Sidemenu -->
                            <div id="sidebar-menu">

                                <ul id="side-menu" >

                                    @if (!\Auth::guest())
                                        @if(Auth::user()->tipo == 'Administrador')
                                            <li class="{{ Request::is('trabajadores*') ? 'nav-item active' : 'nav-item' }}">
                                                <a href="{{url('trabajadores')}}" >
                                                    <i class="fa fa-id-card"></i>
                                                    <span class="hide-menu"> Trabajadores</span>
                                                </a>
                                            </li>
                                            <li class="{{ Request::is('proveedores*') ? 'nav-item active' : 'nav-item' }}">
                                                <a href="{{url('proveedores')}}" >
                                                    <i class="fa fa-truck"></i>
                                                    <span class="hide-menu"> Proveedores</span>
                                                </a>
                                            </li>

                                            <li class="{{ Request::is('clientes*') ? 'nav-item active' : 'nav-item' }}">
                                                <a href="{{url('clientes')}}" >
                                                    <i class="fa fa-user-tie"></i>
                                                    <span class="hide-menu"> Clientes</span>
                                                </a>
                                            </li>


                                            <li class="{{ Request::is('inventario*') ? 'nav-item active' : 'nav-item' }}">
                                                <a href="#sidebarInventario" data-toggle="collapse">
                                                    <i class="fa fa-boxes"></i>
                                                    <span class="hide-menu"> Inventario</span>
                                                    <span class="menu-arrow"></span>
                                                </a>
                                                <div class="collapse" id="sidebarInventario">
                                                    <ul class="nav-second-level">
                                                        <li class="{{ Request::is('inventario*') ? 'nav-item active' : 'nav-item' }}">
                                                            <a href="{{url('inventario/')}}" >

                                                                <span>  Lista</span>
                                                            </a>
                                                        </li>
                                                        <li class="{{ Request::is('inventario/listaIngresos*') ? 'nav-item active' : 'nav-item' }}">
                                                            <a href="{{url('inventario/listaIngresos')}}" >

                                                                <span>  Ingresos</span>
                                                            </a>
                                                        </li>
                                                        <li class="{{ Request::is('inventario/listaBajas*') ? 'nav-item active' : 'nav-item' }}">
                                                            <a href="{{url('inventario/listaBajas')}}" >

                                                                <span>  Bajas</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </li>

                                            <li class="{{ Request::is('ventas*') ? 'nav-item active' : 'nav-item' }}">
                                                <a href="#sidebarVenta" data-toggle="collapse">
                                                    <i class="fas fa-dollar-sign"></i>
                                                    <span class="hide-menu"> Ventas y Servicios</span>
                                                    <span class="menu-arrow"></span>
                                                </a>
                                                <div class="collapse" id="sidebarVenta">
                                                    <ul class="nav-second-level">
                                                        <li class="{{ Request::is('ventas/ventas*') ? 'nav-item active' : 'nav-item' }}">
                                                            <a href="{{url('ventas/ventas')}}" >

                                                                <span>  Ventas</span>
                                                            </a>
                                                        </li>
                                                        <li class="{{ Request::is('ventas/servicios*') ? 'nav-item active' : 'nav-item' }}">
                                                            <a href="{{url('ventas/servicios')}}" >

                                                                <span>  Servicios</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </li>


                                            <li class="{{ Request::is('imonitoreo*') ? 'nav-item active' : 'nav-item' }}">
                                                <a href="{{url('imonitoreo/listaContratos')}}" >
                                                    <i class="fa fa-fire-extinguisher"></i>
                                                    <span class="hide-menu"> Inspeccion</span>
                                                </a>
                                            </li>

                                            <li class="{{ Request::is('categorias*') ? 'nav-item active' : 'nav-item' }}">
                                                <a href="{{url('categorias')}}" >
                                                    <i class="fa fa-cube"></i>
                                                    <span class="hide-menu"> Categorias de Prod</span>
                                                </a>
                                            </li>

                                            <li class="{{ Request::is('tipos*') ? 'nav-item active' : 'nav-item' }}">
                                                <a href="{{url('tipos')}}" >
                                                    <i class="fas fa-sitemap"></i>
                                                    <span class="hide-menu"> Tipo Clasificacion</span>
                                                </a>
                                            </li>

                                            <li class="{{ Request::is('marcas*') ? 'nav-item active' : 'nav-item' }}">
                                                <a href="{{url('marcas')}}" >
                                                    <i class="far fa-copyright"></i>
                                                    <span class="hide-menu"> Marca Clasificacion</span>
                                                </a>
                                            </li>

                                            <li class="{{ Request::is('reportes*') ? 'nav-item active' : 'nav-item' }}">
                                                <a href="#sidebarReporte" data-toggle="collapse">
                                                    <i class="fas fa-chart-pie"></i>
                                                    <span class="hide-menu"> Reportes</span>
                                                    <span class="menu-arrow"></span>
                                                </a>
                                                <div class="collapse" id="sidebarReporte">
                                                    <ul class="nav-second-level">
                                                        <li class="{{ Request::is('reportes/reporteSitio*') ? 'nav-item active' : 'nav-item' }}">
                                                            <a href="{{url('reportes/reporteSitio')}}" >

                                                                <span>  Reporte del Sitio</span>
                                                            </a>
                                                        </li>
                                                        <li class="{{ Request::is('reportes/reporteVenta*') ? 'nav-item active' : 'nav-item' }}">
                                                            <a href="{{url('reportes/reporteVenta')}}" >

                                                                <span>  Reporte de Ventas</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </li>
                                        @endif
                                    @endif

                                    @if (!\Auth::guest())
                                        @if(Auth::user()->tipo == 'Tecnico')
                                                <li class="{{ Request::is('imonitoreo*') ? 'nav-item active' : 'nav-item' }}">
                                                    <a href="{{url('imonitoreo/listaContratos')}}" >
                                                        <i class="fa fa-fire-extinguisher"></i>
                                                        <span class="hide-menu"> Inspeccion</span>
                                                    </a>
                                                </li>

                                            @endif
                                    @endif

                                    @if (!\Auth::guest())
                                        @if(Auth::user()->tipo == 'Venta')

                                                <li class="{{ Request::is('clientes*') ? 'nav-item active' : 'nav-item' }}">
                                                    <a href="{{url('clientes')}}" >
                                                        <i class="fa fa-user-tie"></i>
                                                        <span class="hide-menu"> Clientes</span>
                                                    </a>
                                                </li>


                                                <li class="{{ Request::is('inventario*') ? 'nav-item active' : 'nav-item' }}">
                                                    <a href="#sidebarInventario" data-toggle="collapse">
                                                        <i class="fa fa-boxes"></i>
                                                        <span class="hide-menu"> Inventario</span>
                                                        <span class="menu-arrow"></span>
                                                    </a>
                                                    <div class="collapse" id="sidebarInventario">
                                                        <ul class="nav-second-level">
                                                            <li class="{{ Request::is('inventario*') ? 'nav-item active' : 'nav-item' }}">
                                                                <a href="{{url('inventario/')}}" >

                                                                    <span>  Lista</span>
                                                                </a>
                                                            </li>
                                                            <li class="{{ Request::is('inventario/listaIngresos*') ? 'nav-item active' : 'nav-item' }}">
                                                                <a href="{{url('inventario/listaIngresos')}}" >

                                                                    <span>  Ingresos</span>
                                                                </a>
                                                            </li>
                                                            <li class="{{ Request::is('inventario/listaBajas*') ? 'nav-item active' : 'nav-item' }}">
                                                                <a href="{{url('inventario/listaBajas')}}" >

                                                                    <span>  Bajas</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </li>

                                                <li class="{{ Request::is('ventas*') ? 'nav-item active' : 'nav-item' }}">
                                                    <a href="#sidebarVenta" data-toggle="collapse">
                                                        <i class="fas fa-dollar-sign"></i>
                                                        <span class="hide-menu"> Ventas y Servicios</span>
                                                        <span class="menu-arrow"></span>
                                                    </a>
                                                    <div class="collapse" id="sidebarVenta">
                                                        <ul class="nav-second-level">
                                                            <li class="{{ Request::is('ventas/ventas*') ? 'nav-item active' : 'nav-item' }}">
                                                                <a href="{{url('ventas/ventas')}}" >

                                                                    <span>  Ventas</span>
                                                                </a>
                                                            </li>
                                                            <li class="{{ Request::is('ventas/servicios*') ? 'nav-item active' : 'nav-item' }}">
                                                                <a href="{{url('ventas/servicios')}}" >

                                                                    <span>  Servicios</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </li>

                                                <li class="{{ Request::is('imonitoreo*') ? 'nav-item active' : 'nav-item' }}">
                                                    <a href="{{url('imonitoreo/listaContratos')}}" >
                                                        <i class="fa fa-fire-extinguisher"></i>
                                                        <span class="hide-menu"> Inspeccion</span>
                                                    </a>
                                                </li>

                                            @endif
                                    @endif



                                </ul>

                            </div>
                            <!-- End Sidebar -->

                            <div class="clearfix"></div>

                        </div>
                        <!-- Sidebar -left -->

                    </div>
                    <!-- Left Sidebar End -->

                    <!-- ============================================================== -->
                    <!-- Start Page Content here -->
                    <!-- ============================================================== -->

                    <div class="content-page">
                        <div class="content">

                            <!-- Start Content-->
                            <div class="container-fluid">

                                <!-- start page title -->

                                <!-- end page title -->

                                @yield('contenido')

                            </div> <!-- container -->

                        </div> <!-- content -->

                        <!-- Footer Start -->
                        <footer class="footer">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-12">
                                        2021 UAGRM - Tecnologia Web
                                    </div>
                                </div>
                            </div>
                        </footer>
                        <!-- end Footer -->
                        <!-- Modal -->
                        <div class="modal fade" id="tema" tabindex="-1" aria-labelledby="temaLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        @if (!\Auth::guest())
                                            <p>{{\Auth::user()->config->topbar}}</p>
                                            <p>{{\Auth::user()->config->sidebar}}</p>
                                            <p>{{\Auth::user()->config->sidebar}}</p>
                                        @endif
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- ============================================================== -->
                    <!-- End Page content -->
                    <!-- ============================================================== -->


                </div>
                <!-- END wrapper -->

                <!-- Vendor js -->
                <script src="{{asset('plantilla/assets/js/vendor.min.js')}}"></script>
                <script src="{{asset('plantilla/assets/js/app.js')}}"></script>


                @stack('scripts')

                </body>
</html>
