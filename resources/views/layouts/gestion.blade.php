<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('flag-icons/css/flag-icons.min.css') }}">
    <title>VII Bienal Internacional de Ingeniería :: Gestión</title>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark shadow-sm navbar-gestion">
            <div class="container">
                <a class="navbar-brand d-flex align-items-center gap-2" href="{{ route('gestion.index') }}">
                    <span class="badge rounded-1" style="font-size: 0.68rem; background-color: #00acc9 !important; padding: 0.25rem 0.45rem;">VII BIENAL</span>
                    <span>Panel de Gestión</span>
                </a>

                <button class="navbar-toggler py-1 px-2 border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon" style="width: 1.25em; height: 1.25em;"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-3 gap-lg-1">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('gestion.index') ? 'active fw-semibold text-white' : '' }}" href="{{ route('gestion.index') }}">
                                <i class="fas fa-th-large me-1 text-info"></i> Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('welcome') }}" target="_blank">
                                <i class="fas fa-external-link-alt me-1 opacity-75"></i> Ver Portal
                            </a>
                        </li>
                        @auth
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('conferencista*') ? 'active fw-semibold text-white' : '' }}" href="{{ route('conferencista.index') }}">
                                <i class="fas fa-user-tie me-1 text-info"></i> Conferencistas
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('evento*') ? 'active fw-semibold text-white' : '' }}" href="{{ route('evento.index') }}">
                                <i class="fas fa-calendar-alt me-1 text-info"></i> Eventos
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-qrcode me-1 text-info"></i> QR Calificación
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark shadow" aria-labelledby="navbarDropdown" style="max-height: 380px; overflow-y: auto;">
                                @forelse (($eventos ?? []) as $evento)
                                    <li><a class="dropdown-item py-2" href="{{ route('enlaceCalificacion', $evento->id) }}"><span class="badge bg-secondary me-1">{{ $evento->tipoEvento }}</span> {{ \Illuminate\Support\Str::limit($evento->tema, 45) }}</a></li>
                                @empty
                                    <li><span class="dropdown-item text-muted">No hay eventos registrados</span></li>
                                @endforelse
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownReportes" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-chart-bar me-1 text-info"></i> Reportes
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark shadow" aria-labelledby="navbarDropdownReportes">
                                <li><a class="dropdown-item py-2" href="{{ route('exportarAsistencia') }}"><i class="fas fa-file-excel me-2 text-success"></i> Asistencia a eventos</a></li>
                            </ul>
                        </li>
                        @endauth
                    </ul>

                    <div class="d-flex align-items-center gap-3">
                        @guest
                            <a class="btn btn-sm btn-outline-light rounded-pill px-3" href="{{ route('login') }}">
                                <i class="fas fa-sign-in-alt me-1"></i> Iniciar Sesión
                            </a>
                        @else
                            <span class="text-white-50 small d-none d-lg-inline">
                                <i class="fas fa-user-circle me-1"></i> {{ Auth::user()->name ?? 'Administrador' }}
                            </span>
                            <a class="btn btn-sm btn-outline-danger rounded-pill px-3" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Cerrar sesión">
                                <i class="fas fa-sign-out-alt me-1"></i> Salir
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        @endguest
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <main class="py-4 bg-light" style="min-height: calc(100vh - 160px);">
        <div class="container">
            @yield('content')
        </div>
    </main>

    <footer class="container-fluid bg-azul-oscuro text-white pt-4">
        <div class="container text-center py-3">
            <p class="mb-1 text-white-50">VII Bienal Internacional de Ingeniería · Universidad Cooperativa de Colombia - Campus Ibagué, Espinal</p>
            <p class="small text-white-50 mb-0">Panel de Gestión y Administración</p>
        </div>
    </footer>

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script>
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    </script>

    @yield('scripts')
</body>
</html>