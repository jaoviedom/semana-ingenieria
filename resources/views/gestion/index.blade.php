@extends('layouts.gestion')

@section('content')
<div class="py-2">
    <!-- Encabezado del Dashboard -->
    <div class="gestion-page-header d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
        <div>
            <div class="d-flex align-items-center gap-2 mb-1">
                <span class="badge bg-primary px-2.5 py-1 rounded-pill" style="font-size: 0.72rem; background-color: #00acc9 !important;">UCC IBAGUÉ - ESPINAL</span>
                <span class="badge bg-light text-dark border px-2.5 py-1 rounded-pill" style="font-size: 0.72rem;">28, 29 y 30 de Octubre 2026</span>
            </div>
            <h1 class="gestion-title">Panel de Control y Gestión</h1>
            <p class="gestion-subtitle">Administración de conferencistas, agenda académica y monitoreo del evento</p>
        </div>
        <div class="d-flex align-items-center gap-2 flex-wrap">
            <a href="{{ route('conferencista.create') }}" class="btn-gestion-primary">
                <i class="fas fa-user-plus"></i> Nuevo Conferencista
            </a>
            <a href="{{ route('evento.create') }}" class="btn-gestion-secondary">
                <i class="fas fa-calendar-plus"></i> Nuevo Evento
            </a>
        </div>
    </div>

    <!-- Tarjetas de Estadísticas (KPIs) -->
    <div class="row g-3 mb-4">
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="gestion-stat-card">
                <div class="gestion-stat-icon stat-icon-blue">
                    <i class="fas fa-user-tie"></i>
                </div>
                <div>
                    <div class="gestion-stat-number">{{ $conferencistasCount ?? 0 }}</div>
                    <div class="gestion-stat-label">Conferencistas Registrados</div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <div class="gestion-stat-card">
                <div class="gestion-stat-icon stat-icon-cyan">
                    <i class="fas fa-chalkboard-teacher"></i>
                </div>
                <div>
                    <div class="gestion-stat-number">{{ $conferenciasCount ?? 0 }}</div>
                    <div class="gestion-stat-label">Conferencias Magistrales</div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <div class="gestion-stat-card">
                <div class="gestion-stat-icon stat-icon-emerald">
                    <i class="fas fa-laptop-code"></i>
                </div>
                <div>
                    <div class="gestion-stat-number">{{ $talleresCount ?? 0 }}</div>
                    <div class="gestion-stat-label">Talleres Prácticos</div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <div class="gestion-stat-card">
                <div class="gestion-stat-icon stat-icon-amber">
                    <i class="fas fa-id-card-alt"></i>
                </div>
                <div>
                    <div class="gestion-stat-number">{{ $inscripcionesCount ?? 0 }}</div>
                    <div class="gestion-stat-label">Inscripciones Registradas</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tabla Resumen de Actividades de la Agenda -->
    <div class="gestion-card">
        <div class="gestion-card-header">
            <h5 class="gestion-card-title">
                <i class="fas fa-calendar-check text-primary"></i> Agenda Académica General
            </h5>
            <div class="d-flex align-items-center gap-2">
                <a href="{{ route('evento.index') }}" class="btn btn-sm btn-outline-secondary rounded-pill px-3">
                    Ver todos los eventos <i class="fas fa-arrow-right ms-1"></i>
                </a>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table gestion-table">
                <thead>
                    <tr>
                        <th style="width: 10%;">Día</th>
                        <th style="width: 16%;">Horario</th>
                        <th style="width: 14%;">Tipo</th>
                        <th style="width: 32%;">Tema / Actividad</th>
                        <th style="width: 18%;">Conferencista</th>
                        <th class="text-center" style="width: 10%;">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($eventos as $evento)
                        <tr>
                            <td>
                                <span class="badge-dia-pill">Día {{ $evento->dia }}</span>
                            </td>
                            <td>
                                <span class="fw-semibold text-dark"><i class="far fa-clock text-muted me-1"></i> {{ $evento->horario }}</span>
                            </td>
                            <td>
                                @if($evento->tipoEvento == 'CONFERENCIA')
                                    <span class="badge-tipo-evento badge-tipo-conferencia">Conferencia</span>
                                @elseif($evento->tipoEvento == 'TALLER')
                                    <span class="badge-tipo-evento badge-tipo-taller">Taller</span>
                                @else
                                    <span class="badge-tipo-evento badge-tipo-ponencia">Ponencia</span>
                                @endif
                            </td>
                            <td>
                                <span class="fw-bold text-dark">{{ $evento->tema }}</span>
                                @if($evento->lugar)
                                    <div class="small text-muted mt-0.5"><i class="fas fa-map-marker-alt me-1 text-danger"></i> {{ $evento->lugar }}</div>
                                @endif
                            </td>
                            <td>
                                @if($evento->conferencista)
                                    <div class="d-flex align-items-center gap-2">
                                        <span class="fi fi-{{ $evento->conferencista->pais }} shadow-sm rounded-1"></span>
                                        <span class="fw-medium text-dark">{{ $evento->conferencista->nombre }}</span>
                                    </div>
                                @else
                                    <span class="text-muted fst-italic">Por asignar</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <div class="d-inline-flex gap-1">
                                    <a href="{{ route('evento.show', $evento->id) }}" class="btn-gestion-action btn-gestion-view" data-bs-toggle="tooltip" title="Ver detalles">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('evento.edit', $evento->id) }}" class="btn-gestion-action btn-gestion-edit" data-bs-toggle="tooltip" title="Editar">
                                        <i class="fas fa-pen"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="empty-state-cell">
                                <i class="far fa-calendar-times"></i>
                                <p class="mb-0 fw-medium">No hay eventos registrados en la base de datos.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection