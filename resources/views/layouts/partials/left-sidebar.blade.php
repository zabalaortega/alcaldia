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
                    <li><a href="javascript:void(0);"><i class="material-icons">person</i>Perfil</a></li>
                    <li role="separator" class="divider"></li>
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
                    <span>Home</span>
                </a>
            </li>

            <li class="header">Gestion Prestamos - (Entradas)</li>

            <li>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">input</i>
                    <span>Prestamos - Entradas</span>
                </a>
                <ul class="ml-menu">
                    <li>
                    <a href="{{route('prestamos.index')}}">
                            <span>Modulo Prestamos</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <span>Modulo Entradas</span>
                        </a>
                    </li>
                </ul>
            </li>
       
            <li class="header">Gestion Parametros</li>

            <li>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">settings</i>
                    <span>Parametros</span>
                </a>
                <ul class="ml-menu">
                    <li>
                        <a href="{{route('dependencias.index')}}">
                            <span>Modulo Dependencia</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('empleados.index')}}">
                            <span>Modulo Empleado</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('multimedias.index')}}">
                            <span>Modulo Herramienta - Multimedias</span>
                        </a>
                    </li>
                </ul>
            </li>
            

        </ul>
    </div>
    <!-- #Menu -->
    <!-- Footer -->
    <div class="legal">
        <div class="copyright">
            &copy; 2020 <a href="javascript:void(0);">Plataforma - Alcaldia</a>.
        </div>
        <div class="version">
            <b>Version: </b> 1.0.0
        </div>
    </div>
    <!-- #Footer -->
</aside>