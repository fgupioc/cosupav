<nav class="navbar">
    <div class="max-width">
        <div class="logo">
            <a href="/">cosupav<span>coaching.</span></a>
        </div>
        <ul class="menu">
            <li>
                <a href="/" class="menu-btn">Inicio</a>
            </li>
            <li>
                <a href="/#about" class="menu-btn">Nosotros</a>
            </li>
            <li>
                <a href="/#services" class="menu-btn">Servicios</a>
            </li>
            <li>
                <a href="/#contact" class="menu-btn">Contacto</a>
            </li>
            <li>
            <li class="menu-btn"><a href="{{ route('courses.index') }}">Cursos</a></li>
            </li>
            @auth
                <li class="dropdown-container">
                    <a href="#">My Perfil <i class="fa fa-angle-down"> </i></a>
                    <ul class="dropdown">
                        <li class="dropdown-item menu-btn"><a href="#">Mi Cuenta</a></li>
                        <li class="dropdown-item menu-btn"><a href="#">Mis Documentos</a></li>
                        <li class="dropdown-item menu-btn"><a href="#">Mis Recursos</a></li>
                        <li class="dropdown-item menu-btn"><a href="#">Mis Mensajes</a></li>
                        <li class="dropdown-item menu-btn"><a href="#">Mis Pagos</a></li>
                        <li class="dropdown-item menu-btn"><a href="#">Mis Trabajos</a></li>
                        <li class="dropdown-item menu-btn"><a href="#">Mis Comentarios</a></li>
                    </ul>
                </li>
            @endauth
           {{--
            <li>
                <a href="{{ route('blog.index') }}" class="menu-btn">Blog</a></li>
            --}}
            @guest
                <li>
                    <a href="javascript:;" data-toggle="modal" data-target="#modalLogin" class="menu-btn">Entrar</a>
                </li>
            @else
                <li>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="menu-btn">salir</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            @endguest
        </ul>
        <div class="menu-btn">
            <i class="fas fa-bars"></i>
        </div>
    </div>
</nav>
