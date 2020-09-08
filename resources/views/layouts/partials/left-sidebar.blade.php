<aside id="leftsidebar" class="sidebar">
    <!-- User Info -->
    <div class="user-info">
        <div class="image">
            <img src="{{ asset('images/user.png') }}" width="48" height="48" alt="User" />
        </div>
        <div class="info-container">
            <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}</div>
            <div class="email">{{ Auth::user()->email }}</div>
            <div class="btn-group user-helper-dropdown">
                <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                <ul class="dropdown-menu pull-right">
                    <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();"><i class="material-icons">input</i>Cerrar Sesion</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- #User Info -->
   
    <!-- Menu -->
    <div class="menu">
        <ul class="list">

            <li>
                <a href="{{route('home')}}">
                    <i class="material-icons">home</i>
                    <span>Inicio</span>
                </a>
            </li>

            <li class="header">Solicitud - (Entradas)</li>

            <li>
                <a href="#" class="menu-toggle">
                    <i class="material-icons">input</i>
                    <span>Solicitud - Entradas</span>
                </a>
                <ul class="ml-menu">
                    <li>
                    <a href="{{route('solicitud_equipos_multimedias.index')}}">
                            <span>Solicitud De Equipos Multimedias</span>
                        </a>
                    </li>
                </ul>
            </li>
                  
           <li>
                <a href="{{route('multimedias.index')}}">
                    <i class="material-icons">laptop</i>
                    <span>Modulo Herramienta - Multimedias</span>
                </a>
            </li>
            <li>
                <a href="{{route('dependencias.index')}}">
                    <i class="material-icons">domain</i>
                    <span>Modulo Dependencia</span>
                </a>
            </li>
           {{-- <li>
                <a href="{{route('usuarios.index')}}">
                    <span>Modulo Usuarios</span>
                </a>
            </li> --}}
    
        </ul>
    </div>
    <!-- #Menu -->
    <!-- Footer -->
    <div class="legal">
        <div class="copyright">
            &copy; 2020 <a href="javascript:void(0);">Alcaldia - Sincelejo </a>.
        </div>
        <div class="version">
            <b>Version: </b> 1.0.0
        </div>
    </div>
    <!-- #Footer -->
</aside>