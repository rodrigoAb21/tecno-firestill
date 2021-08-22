<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <title>Firestill & Armour Group</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('plantilla/assets/images/favicon.png')}}"/>

    <!-- Plugins css -->
    <link href="{{asset('plantilla/assets/libs/flatpickr/flatpickr.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('plantilla/assets/libs/selectize/css/selectize.bootstrap3.css')}}" rel="stylesheet" type="text/css" />
    <!-- App css -->
    <link href="{{asset('plantilla/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" id="bs-default-stylesheet" disabled/>
    <link href="{{asset('plantilla/assets/css/app.min.css')}}" rel="stylesheet" type="text/css" id="app-default-stylesheet" disabled/>

    <link href="{{asset('plantilla/assets/css/bootstrap-dark.min.css')}}" rel="stylesheet" type="text/css" id="bs-dark-stylesheet" />
    <link href="{{asset('plantilla/assets/css/app-dark.min.css')}}" rel="stylesheet" type="text/css" id="app-dark-stylesheet" />

    <!-- icons -->
    <link href="{{asset('plantilla/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />

    @stack('arriba')
</head>

<body data-sidebar-color="brand" data-topbar-color="light">

<!-- Begin page -->
<div id="wrapper">

    <!-- Topbar Start -->
    <div class="navbar-custom">
        <div class="container-fluid">
            <ul class="list-unstyled topnav-menu float-right mb-0">

                <li class="d-none d-lg-block">
                    <form class="app-search">
                        <div class="app-search-box dropdown">
                            <div class="input-group">
                                <input type="search" class="form-control" placeholder="Search..." id="top-search">
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
    <div class="left-side-menu">

        <div class="h-100" data-simplebar>

            <!--- Sidemenu -->
            <div id="sidebar-menu">

                <ul id="side-menu">

                    @if (!\Auth::guest())
                        @if(Auth::user()->tipo == 'Administrador')
                            <li class="{{ Request::is('trabajadores*') ? 'nav-item active' : 'nav-item' }}">
                                <a href="{{url('trabajadores')}}" >
                                    <i class="fa fa-id-card"></i>
                                    <span class="hide-menu"> Trabajadores</span>
                                </a>
                            </li>
                        @endif
                    @endif

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
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">UBold</a></li>
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                                    <li class="breadcrumb-item active">Starter</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
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

    </div>

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->


</div>
<!-- END wrapper -->

<!-- Vendor js -->
<script src="{{asset('plantilla/assets/js/vendor.min.js')}}"></script>

@stack('scripts')
</body>
</html>
