@extends('layouts.gestion')

@section('content')
<div class="py-2">
    @if (Session::has('mensaje'))
        <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm rounded-3 d-flex align-items-center gap-2 mb-4" role="alert">
            <i class="fas fa-check-circle fs-5 text-success"></i>
            <div>{{ Session::get('mensaje') }}</div>
            <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Encabezado de página -->
    <div class="gestion-page-header d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
        <div>
            <div class="d-flex align-items-center gap-2 mb-1">
                <span class="badge bg-primary px-2.5 py-1 rounded-pill" style="font-size: 0.72rem; background-color: #00acc9 !important;">CRONOGRAMA ACADÉMICO</span>
            </div>
            <h1 class="gestion-title">Módulo de Eventos</h1>
            <p class="gestion-subtitle">Gestión de conferencias, talleres prácticos y ponencias de la VII Bienal</p>
        </div>
        <div>
            <a href="{{ route('evento.create') }}" class="btn-gestion-primary">
                <i class="fas fa-calendar-plus"></i> Registrar Evento
            </a>
        </div>
    </div>

    <!-- Tarjeta con Tabla de Eventos -->
    <div class="gestion-card">
        <div class="gestion-card-header">
            <h5 class="gestion-card-title">
                <i class="fas fa-calendar-alt text-primary"></i> Listado de Eventos
            </h5>
            <span class="badge bg-light text-muted border px-2.5 py-1 rounded-pill">
                Total: {{ $eventos->total() ?? count($eventos) }}
            </span>
        </div>

        <div class="table-responsive">
            <table class="table gestion-table">
                <thead>
                    <tr>
                        <th style="width: 10%;">Día</th>
                        <th style="width: 15%;">Horario</th>
                        <th style="width: 12%;">Tipo</th>
                        <th style="width: 33%;">Tema y Ubicación</th>
                        <th style="width: 18%;">Conferencista</th>
                        <th class="text-center" style="width: 12%;">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($eventos as $evento)
                        <tr>
                            <td>
                                <span class="badge-dia-pill">Día {{ $evento->dia }}</span>
                                <div class="small text-muted mt-0.5" style="font-size: 0.72rem;">{{ $evento->fecha }}</div>
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
                                <div class="mt-1">
                                    <span class="badge bg-light text-muted border" style="font-size: 0.7rem;">
                                        {{ $evento->programa ?? 'Sistemas' }}
                                    </span>
                                </div>
                            </td>
                            <td>
                                <div class="fw-bold text-dark">{{ $evento->tema }}</div>
                                @if($evento->lugar)
                                    <div class="small text-muted mt-0.5">
                                        <i class="fas fa-map-marker-alt me-1 text-danger"></i> {{ $evento->lugar }}
                                    </div>
                                @endif
                            </td>
                            <td>
                                @if($evento->conferencista)
                                    <div class="d-flex align-items-center gap-2">
                                        <span class="fi fi-{{ $evento->conferencista->pais }} shadow-sm rounded-1"></span>
                                        <span class="fw-medium text-dark">{{ $evento->conferencista->nombre }}</span>
                                    </div>
                                @else
                                    <span class="text-muted fst-italic small">Por asignar</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <div class="d-inline-flex gap-1">
                                    <a href="{{ route('evento.show', $evento->id) }}" class="btn-gestion-action btn-gestion-view" data-bs-toggle="tooltip" title="Vista previa">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('evento.edit', $evento->id) }}" class="btn-gestion-action btn-gestion-edit" data-bs-toggle="tooltip" title="Editar">
                                        <i class="fas fa-pen"></i>
                                    </a>
                                    <form action="{{ route('evento.destroy', $evento->id) }}" method="post" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-gestion-action btn-gestion-delete" onclick="return confirm('¿Está seguro de eliminar este evento?')" data-bs-toggle="tooltip" title="Eliminar">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
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

        @if ($eventos->hasPages())
            <div class="px-4 py-3 border-top d-flex justify-content-center">
                {!! $eventos->links() !!}
            </div>
        @endif
    </div>
</div>
@endsection