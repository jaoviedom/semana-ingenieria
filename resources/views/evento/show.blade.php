@extends('layouts.main')

@section('content')
<div class="container py-5">
    <!-- Navegación de regreso -->
    <div class="mb-4">
        @auth
            <a href="{{ route('evento.index') }}" class="btn btn-sm btn-outline-secondary rounded-pill px-3">
                <i class="fas fa-arrow-left me-1"></i> Volver a Eventos
            </a>
        @else
            <a href="{{ route('welcome') }}" class="btn btn-sm btn-outline-secondary rounded-pill px-3">
                <i class="fas fa-arrow-left me-1"></i> Volver a la Programación
            </a>
        @endauth
    </div>

    <!-- Tarjeta Principal del Evento -->
    <div class="gestion-card overflow-hidden mb-5">
        <div class="p-4 p-md-5 text-white" style="background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%) !important;">
            <div class="d-flex align-items-center gap-2 mb-3 flex-wrap">
                <span class="badge-dia-pill text-dark bg-white">
                    <i class="fas fa-calendar-day me-1 text-primary"></i> Día {{ $evento->dia }} · {{ $evento->fecha }}
                </span>
                <span class="badge-tipo-evento {{ $evento->tipoEvento == 'CONFERENCIA' ? 'badge-tipo-conferencia' : ($evento->tipoEvento == 'TALLER' ? 'badge-tipo-taller' : 'badge-tipo-ponencia') }} bg-white">
                    {{ $evento->tipoEvento }}
                </span>
                <span class="badge bg-light text-dark rounded-pill px-2.5 py-1 small">
                    {{ $evento->programa ?? 'Ingeniería de Sistemas' }}
                </span>
            </div>

            <h1 class="h2 fw-bold text-white mb-3 lh-base">{{ $evento->tema }}</h1>

            <div class="d-flex align-items-center gap-4 text-white-50 small flex-wrap">
                <div><i class="far fa-clock me-1.5 text-info"></i> {{ $evento->horario }}</div>
                @if ($evento->lugar)
                    <div><i class="fas fa-map-marker-alt me-1.5 text-danger"></i> {{ $evento->lugar }}</div>
                @endif
                @if ($evento->colaborador)
                    <div><i class="fas fa-university me-1.5 text-warning"></i> {{ $evento->colaborador }}</div>
                @endif
            </div>
        </div>

        <div class="card-body p-4 p-md-5">
            <div class="row g-4">
                <!-- Columna: Conferencista asignado -->
                @if ($evento->conferencista)
                    <div class="col-12 col-md-7">
                        <h5 class="fw-bold text-dark mb-3 pb-2 border-bottom d-flex align-items-center gap-2">
                            <i class="fas fa-user-tie text-primary"></i> Ponente / Conferencista
                        </h5>
                        <div class="d-flex align-items-center gap-3 p-3 rounded-3 border bg-light">
                            <img src="{{ $evento->conferencista->foto_url }}" alt="{{ $evento->conferencista->nombre }}" class="rounded-circle border shadow-sm" style="width: 70px; height: 70px; object-fit: cover;">
                            <div>
                                <h6 class="fw-bold mb-1 d-flex align-items-center gap-2">
                                    {{ $evento->conferencista->nombre }}
                                    <span class="fi fi-{{ $evento->conferencista->pais }} shadow-sm rounded-1"></span>
                                </h6>
                                <p class="small text-muted mb-2 text-truncate" style="max-width: 380px;">
                                    {{ \Illuminate\Support\Str::limit($evento->conferencista->cv, 110) }}
                                </p>
                                <a href="{{ route('conferencista.show', $evento->conferencista->id) }}" class="btn btn-sm btn-outline-primary rounded-pill px-3">
                                    Ver perfil completo <i class="fas fa-arrow-right ms-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endif

                <!-- Columna: Enlaces y Acciones -->
                <div class="col-12 col-md-5">
                    <h5 class="fw-bold text-dark mb-3 pb-2 border-bottom d-flex align-items-center gap-2">
                        <i class="fas fa-info-circle text-primary"></i> Participación e Inscripción
                    </h5>
                    <div class="d-flex flex-column gap-3">
                        <a href="{{ route('inscripcion', $evento->id) }}" class="btn-inscribirse-action text-center py-2.5">
                            <i class="fas fa-ticket-alt me-1.5"></i> Inscribirse a esta actividad
                        </a>

                        @if ($evento->enlaceVirtual)
                            <a href="{{ $evento->enlaceVirtual }}" target="_blank" class="btn btn-outline-info rounded-pill py-2 text-dark fw-semibold">
                                <i class="fas fa-video me-1.5 text-info"></i> Enlace de Transmisión Virtual
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection