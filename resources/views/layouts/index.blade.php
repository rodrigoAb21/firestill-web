<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" href="{{asset('img/firestill-logo2.png')}}"/>
    <title>Firestill & Armour Group</title>
    <!-- Bootstrap Core CSS -->
    <link href="{{asset('plantilla/assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet"/>
    <!-- Custom CSS -->
    <link href="{{asset('plantilla/material/css/style.css')}}" rel="stylesheet"/>
    <!-- You can change the theme colors from here -->
    <link href="{{asset('plantilla/material/css/colors/blue.css')}}" id="theme" rel="stylesheet">
    <style rel="stylesheet">
        td{
            white-space: nowrap;
        }
    </style>
    <!-- You can change the theme colors from here

    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <script>

        var pusher = new Pusher('b7e5f831a0dbf97652df', {
            cluster: 'us2'
        });
/*
        var channel = pusher.subscribe('alertaCanal');
        channel.bind('alertaEvent', function(data) {
            var x = document.getElementById("alerta");
            if (x.style.display === "none") {
                x.style.display = "block";
            }
        });
*/
    </script>

    -->

    <link href="{{asset('plantilla/assets/plugins/datatables/dataTables.bootstrap4.css')}}" id="theme" rel="stylesheet">

    @stack('arriba')
</head>

<body class="fix-header card-no-border">
<!-- ============================================================== -->
<!-- Preloader - style you can find in spinners.css -->
<!-- ============================================================== -->
<div class="preloader">
    <svg class="circular" viewBox="25 25 50 50">
        <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
</div>
<!-- ============================================================== -->
<!-- Main wrapper - style you can find in pages.scss -->
<!-- ============================================================== -->
<div id="main-wrapper">
    <!-- ============================================================== -->
    <!-- Topbar header - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <header class="topbar">
        <nav class="navbar top-navbar navbar-expand-md navbar-light">
            <!-- ============================================================== -->
            <!-- Logo -->
            <!-- ============================================================== -->
            <div class="navbar-header">
                <a class="navbar-brand light" href="{{url('/')}}">
                    <!-- Logo icon -->

                        <img src="{{asset('img/firestill-logo.png')}}" height="50px">

                    <!--End Logo icon -->
                    <!-- Logo text -->
                    <span><b class="light-logo"> FIRESTILL</b></span>
                </a>
            </div>
            <!-- ============================================================== -->
            <!-- End Logo -->
            <!-- ============================================================== -->
            <div class="navbar-collapse">
                <!-- ============================================================== -->
                <!-- toggle and nav items -->
                <!-- ============================================================== -->
                <ul class="navbar-nav mr-auto mt-md-0">
                    <!-- This is  -->
                    <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0);"><i class="mdi mdi-menu"></i></a> </li>
                    <li class="nav-item"> <a class="nav-link sidebartoggler hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0);"><i class="ti-menu"></i></a> </li>



                </ul>
                <!-- ============================================================== -->
                <!-- User profile and search -->
                <!-- ============================================================== -->
                <ul class="navbar-nav my-lg-0">
                    <!-- ============================================================== -->
                    <!-- Profile -->
                    <!-- ============================================================== -->
                <!--

                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fas fa-bell"></i>
                            <div class="notify" id="alerta" style="display: block">
                                <span class="heartbit"></span>
                                <span class="point"></span>
                            </div>


                        </a>
                    </li>

                -->
                    @if (!\Auth::guest())
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{\Auth::user()->nombre }} {{\Auth::user()->apellido }}</a>
                            <div class="dropdown-menu dropdown-menu-right scale-up">
                                <ul class="dropdown-user">
                                    <li>
                                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();" class="cerrar">
                                            <i class="fa fa-power-off"></i>
                                            Cerrar Sesión
                                        </a>

                                        <form id="logout-form" action="{{route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    @endif
                </ul>
            </div>
        </nav>
    </header>
    <!-- ============================================================== -->
    <!-- End Topbar header -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <aside class="left-sidebar">
        <!-- Sidebar scroll-->
        <div class="scroll-sidebar">
            <!-- User profile -->

            <nav class="sidebar-nav">
                <ul id="sidebarnav">
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


                    <li class="{{ Request::is('herramientas*') ? 'nav-item active' : 'nav-item' }}">
                        <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false">
                            <i class="fa fa-tools"></i>
                            <span class="hide-menu"> Herramientas</span>
                        </a>
                        <ul aria-expanded="false" class="collapse">
                            <li class="{{ Request::is('herramientas*') ? 'nav-item active' : 'nav-item' }}">
                                <a href="{{url('herramientas')}}" >

                                    <span>  Lista</span>
                                </a>
                            </li>
                            <li class="{{ Request::is('herramientas/listaIngresos*') ? 'nav-item active' : 'nav-item' }}">
                                <a href="{{url('herramientas/listaIngresos')}}" >

                                    <span>  Ingresos</span>
                                </a>
                            </li>
                            <li class="{{ Request::is('herramientas/listaAsignaciones*') ? 'nav-item active' : 'nav-item' }}">
                                <a href="{{url('herramientas/listaAsignaciones')}}" >

                                    <span>  Asignaciones</span>
                                </a>
                            </li>
                            <li class="{{ Request::is('herramientas/listaBajas*') ? 'nav-item active' : 'nav-item' }}">
                                <a href="{{url('herramientas/listaBajas')}}" >

                                    <span>  Bajas</span>
                                </a>
                            </li>

                        </ul>
                    </li>
                    <li class="{{ Request::is('inventario*') ? 'nav-item active' : 'nav-item' }}">
                        <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false">
                            <i class="fa fa-boxes"></i>
                            <span class="hide-menu"> Inventario</span>
                        </a>
                        <ul aria-expanded="false" class="collapse">
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
                    </li>

                    <li class="{{ Request::is('ventas*') ? 'nav-item active' : 'nav-item' }}">
                        <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false">
                            <i class="fas fa-dollar-sign"></i>
                            <span class="hide-menu"> Ventas y Servicios</span>
                        </a>
                        <ul aria-expanded="false" class="collapse">
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
                    </li>
                    <li class="{{ Request::is('imonitoreo*') ? 'nav-item active' : 'nav-item' }}">
                        <a href="{{url('imonitoreo/listaContratos')}}" >
                            <i class="fas fa-fire-extinguisher"></i>
                            <span class="hide-menu"> Insp. & Monitoreo </span>
                        </a>
                    </li>

                    <li class="{{ Request::is('categorias*') ? 'nav-item active' : 'nav-item' }}">
                        <a href="{{url('categorias')}}" >
                            <i class="fa fa-cube"></i>
                            <span class="hide-menu"> Categorías de Prod</span>
                        </a>
                    </li>

                    <li class="{{ Request::is('tipos*') ? 'nav-item active' : 'nav-item' }}">
                        <a href="{{url('tipos')}}" >
                            <i class="fas fa-sitemap"></i>
                            <span class="hide-menu"> Tipo Clasificación</span>
                        </a>
                    </li>

                    <li class="{{ Request::is('marcas*') ? 'nav-item active' : 'nav-item' }}">
                        <a href="{{url('marcas')}}" >
                            <i class="far fa-copyright"></i>
                            <span class="hide-menu"> Marca Clasificación</span>
                        </a>
                    </li>







                </ul>
            </nav>
            <!-- End Sidebar navigation -->
        </div>
        <!-- End Sidebar scroll-->
    </aside>
    <!-- ============================================================== -->
    <!-- End Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
    <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid pt-3">
            <!-- Start Page Content -->
            <!-- ============================================================== -->
        @yield('contenido')
        <!-- ============================================================== -->
            <!-- End PAge Content -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Page wrapper  -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->

<script src="{{asset('plantilla/assets/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="{{asset('plantilla/assets/plugins/bootstrap/js/popper.min.js')}}"></script>
<script src="{{asset('plantilla/assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
<!-- slimscrollbar scrollbar JavaScript -->
<script src="{{asset('plantilla/material/js/jquery.slimscroll.js')}}"></script>
<!--Wave Effects -->
<script src="{{asset('plantilla/material/js/waves.js')}}"></script>
<!--Menu sidebar -->
<script src="{{asset('plantilla/material/js/sidebarmenu.js')}}"></script>
<!--stickey kit -->
<script src="{{asset('plantilla/assets/plugins/sticky-kit-master/dist/sticky-kit.min.js')}}"></script>
<script src="{{asset('plantilla/assets/plugins/sparkline/jquery.sparkline.min.js')}}"></script>
<!--Custom JavaScript -->
<script src="{{asset('plantilla/material/js/custom.js')}}"></script>
<!-- ============================================================== -->
<!-- Chart JS -->

<script src="{{asset('plantilla/assets/plugins/Chart.js/Chart.min.js')}}"></script>
<!-- Style switcher -->
<!-- ============================================================== -->
<script src="{{asset('plantilla/assets/plugins/styleswitcher/jQuery.style.switcher.js')}}"></script>

<script type="text/javascript" charset="utf8" src="{{asset('plantilla/assets/plugins/datatables/datatables.min.js')}}"></script>
@stack('scripts')
</body>

</html>
