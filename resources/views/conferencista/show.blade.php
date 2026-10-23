@extends('layouts.main')

@section('content')
<div class="container py-5">
    <!-- Navegación de regreso -->
    <div class="mb-4">
        @auth
            <a href="{{ route('conferencista.index') }}" class="btn btn-sm btn-outline-secondary rounded-pill px-3">
                <i class="fas fa-arrow-left me-1"></i> Volver a Conferencistas
            </a>
        @else
            <a href="{{ route('welcome') }}" class="btn btn-sm btn-outline-secondary rounded-pill px-3">
                <i class="fas fa-arrow-left me-1"></i> Volver a la Programación
            </a>
        @endauth
    </div>

    <!-- Tarjeta Principal del Perfil -->
    <div class="gestion-card overflow-hidden mb-5">
        <div class="bg-primary p-4 text-white position-relative" style="background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%) !important;">
            <div class="row align-items-center g-4">
                <div class="col-12 col-md-auto text-center text-md-start">
                    <img src="{{ $conferencista->foto_url }}" alt="{{ $conferencista->nombre }}" class="rounded-circle border border-4 border-white shadow-lg" style="width: 140px; height: 140px; object-fit: cover;">
                </div>
                <div class="col-12 col-md">
                    <div class="d-flex align-items-center gap-2 mb-2 flex-wrap">
                        <span class="badge bg-info text-white rounded-pill px-3 py-1 fw-bold" style="background-color: #00acc9 !important; font-size: 0.78rem;">
                            INVITADO DESTACADO
                        </span>
                        <span class="badge bg-dark border text-white rounded-pill px-2.5 py-1 small d-inline-flex align-items-center gap-1.5">
                            <span class="fi fi-{{ $conferencista->pais }} rounded-1"></span>
                            <span class="text-uppercase">{{ $conferencista->pais }}</span>
                        </span>
                    </div>
                    <h1 class="h2 fw-bold text-white mb-2">{{ $conferencista->nombre }}</h1>
                    @if ($conferencista->correo)
                        <div class="mt-2">
                            <a href="mailto:{{ $conferencista->correo }}" class="text-white-50 text-decoration-none small hover-underline">
                                <i class="fas fa-envelope me-1.5 text-info"></i> {{ $conferencista->correo }}
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="card-body p-4 p-md-5">
            <div class="row g-5">
                <!-- Columna Izquierda: Perfil Académico -->
                <div class="col-12 col-lg-7">
                    <h4 class="fw-bold text-dark mb-3 pb-2 border-bottom d-flex align-items-center gap-2" style="font-size: 1.25rem;">
                        <i class="fas fa-user-graduate text-primary"></i> Perfil Profesional y Académico
                    </h4>
                    <div class="text-secondary lh-lg" style="font-size: 1.025rem; white-space: pre-line;">
                        {{ $conferencista->cv }}
                    </div>
                </div>

                <!-- Columna Derecha: Actividades asignadas -->
                <div class="col-12 col-lg-5">
                    <h4 class="fw-bold text-dark mb-3 pb-2 border-bottom d-flex align-items-center gap-2" style="font-size: 1.25rem;">
                        <i class="fas fa-calendar-alt text-primary"></i> Actividades en la Bienal
                    </h4>

                    @if($conferencista->eventos && $conferencista->eventos->count() > 0)
                        <div class="d-flex flex-column gap-3">
                            @foreach ($conferencista->eventos as $ev)
                                <div class="p-3 rounded-3 border bg-light">
                                    <div class="d-flex justify-content-between align-items-center mb-1.5">
                                        <span class="badge-dia-pill">Día {{ $ev->dia }}</span>
                                        <span class="badge-tipo-evento {{ $ev->tipoEvento == 'CONFERENCIA' ? 'badge-tipo-conferencia' : ($ev->tipoEvento == 'TALLER' ? 'badge-tipo-taller' : 'badge-tipo-ponencia') }}">
                                            {{ $ev->tipoEvento }}
                                        </span>
                                    </div>
                                    <h6 class="fw-bold text-dark mb-1">{{ $ev->tema }}</h6>
                                    <div class="small text-muted mb-1">
                                        <i class="far fa-clock me-1 text-primary"></i> {{ $ev->horario }}
                                    </div>
                                    @if ($ev->lugar)
                                        <div class="small text-muted">
                                            <i class="fas fa-map-marker-alt me-1 text-danger"></i> {{ $ev->lugar }}
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="p-4 text-center rounded-3 border bg-light text-muted">
                            <i class="far fa-calendar-times fs-3 d-block mb-2 text-secondary"></i>
                            <span class="small">No hay actividades vinculadas directamente aún.</span>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection