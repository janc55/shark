<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'UNIOR') }}</title>

    <link href="{{asset('assets/lib/font-awesome/css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{asset('assets/lib/Ionicons/css/ionicons.css')}}" rel="stylesheet">
    <link href="{{asset('assets/lib/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet">
    <link href="{{asset('assets/lib/jquery-switchbutton/jquery.switchButton.css')}}" rel="stylesheet">


    <link href="{{asset('assets/lib/datatables/jquery.dataTables.css')}}" rel="stylesheet">
    <link href="{{asset('assets/datatables/buttons.dataTables.min.css')}}" rel="stylesheet"/>

    <link href="{{asset('assets/lib/select2/css/select2.min.css')}}" rel="stylesheet">

    <link href="{{asset('assets/css/bracket.css')}}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <div class="br-logo"><a href="../UsuHome/"><img src="{{asset('images/unior.png')}}" class="img-fluid" alt="Unior"></a></div>

        <div class="br-sideleft overflow-y-auto">
        <label class="sidebar-label pd-x-15 mg-t-20">Menu</label>
        <div class="br-sideleft-menu">

            <a href="{{route ('home')}}" class="br-menu-link">
            <div class="br-menu-item">
                <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
                <span class="menu-item-label">Inicio</span>
            </div>
            </a>

            <a href="{{route ('credencial.index')}}" class="br-menu-link">
            <div class="br-menu-item">
                <i class="menu-item-icon icon ion-card tx-22"></i>
                <span class="menu-item-label">Credenciales</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
            </div>
            </a>
            <ul class="br-menu-sub nav flex-column">
                <li class="nav-item"><a href="{{route ('credencial.index')}}" class="nav-link">Administrativos</a></li>
                <li class="nav-item"><a href="{{route ('credencialestudiante.index')}}" class="nav-link">Estudiantes</a></li>
            </ul>

            <a href="{{route ('estudiante.index')}}" class="br-menu-link">
            <div class="br-menu-item">
                <i class="menu-item-icon icon ion-person-stalker tx-22"></i>
                <span class="menu-item-label">Estudiantes</span>
            </div>
            </a>
            

            <a href="{{route ('credencial.index')}}" class="br-menu-link">
                <div class="br-menu-item">
                    <i class="menu-item-icon icon fa fa-certificate tx-22"></i>
                    <span class="menu-item-label">Certificados</span>
                    <i class="menu-item-arrow fa fa-angle-down"></i>
                </div><!-- menu-item -->
            </a><!-- br-menu-link -->
            <ul class="br-menu-sub nav flex-column">
                <li class="nav-item"><a href="{{route ('curso.index')}}" class="nav-link">Cursos</a></li>
                <li class="nav-item"><a href="{{route ('instructor.index')}}" class="nav-link">Instructores</a></li>
                <li class="nav-item"><a href="{{route ('categoria.index')}}" class="nav-link">Categorias</a></li>
                <li class="nav-item"><a href="#" class="nav-link">Certificados</a></li>
            </ul>

            <a href="../UsuPerfil/" class="br-menu-link">
            <div class="br-menu-item">
                <i class="menu-item-icon icon ion-ios-gear-outline tx-22"></i>
                <span class="menu-item-label">Perfil</span>
            </div>
            </a>

            <a href="../html/Logout.php" class="br-menu-link">
            <div class="br-menu-item">
                <i class="menu-item-icon icon ion-power tx-20"></i>
                <span class="menu-item-label">Cerrar Sesion</span>
            </div>
            </a>
            

        </div>
        </div>
        <!-- MAIN HEADER -->
        <div class="br-header">
            <div class="br-header-left">
                <div class="navicon-left hidden-md-down"><a id="btnLeftMenu" href=""><i class="icon ion-navicon-round"></i></a></div>
                <div class="navicon-left hidden-lg-up"><a id="btnLeftMenuMobile" href=""><i class="icon ion-navicon-round"></i></a></div>
            </div>
            <div class="br-header-right">
                <nav class="nav">
                    <div class="dropdown">
                        @guest
                                @if (Route::has('login'))
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Ingresar') }}</a>
                                @endif
                        @else
                        <a href="" class="nav-link nav-link-profile" data-toggle="dropdown">
                            <span class="logged-name hidden-md-down">{{ Auth::user()->name }}</span>
                            <img src="http://via.placeholder.com/64x64" class="wd-32 rounded-circle" alt="">
                            <span class="square-10 bg-success"></span>
                        </a>
                        

                        <div class="dropdown-menu dropdown-menu-header wd-200">
                            <ul class="list-unstyled user-profile-nav">
                                <li><a href="../UsuPerfil/"><i class="icon ion-ios-gear"></i> Perfil</a></li>
                                <li><a class="" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();" ><i class="icon ion-power"></i>
                                            {{ __('Salir') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form></li>
                            </ul>
                        </div>
                        @endguest
                    </div>
                </nav>
            </div>
        </div> <!-- END MAIN HEADER -->

        <main class="">
            @yield('content')
        </main>
    </div>
    <script src="{{asset('assets/lib/jquery/jquery.js')}}"></script>
    <script src="{{asset('assets/lib/popper.js/popper.js')}}"></script>
    <script src="{{asset('assets/lib/bootstrap/bootstrap.js')}}"></script>
    <script src="{{asset('assets/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js')}}"></script>
    <script src="{{asset('assets/lib/moment/moment.js')}}"></script>
    <script src="{{asset('assets/lib/jquery-ui/jquery-ui.js')}}"></script>
    <script src="{{asset('assets/lib/jquery-switchbutton/jquery.switchButton.js')}}"></script>
    <script src="{{asset('assets/lib/peity/jquery.peity.js')}}"></script>
    <script src="{{asset('assets/js/bracket.js')}}"></script>

    <script src="{{asset('assets/lib/datatables/jquery.dataTables.js')}}"></script>
    <script src="{{asset('assets/lib/datatables-responsive/dataTables.responsive.js')}}"></script>
  
    <script src="{{asset('assets/datatables/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('assets/datatables/buttons.html5.min.js')}}"></script>
    <script src="{{asset('assets/datatables/buttons.colVis.min.js')}}"></script>
    <script src="{{asset('assets/datatables/jszip.min.js')}}"></script>

    <script src="{{asset('assets/lib/select2/js/select2.min.js')}}"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>
