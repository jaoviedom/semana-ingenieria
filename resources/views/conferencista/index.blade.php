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
                <span class="badge bg-primary px-2.5 py-1 rounded-pill" style="font-size: 0.72rem; background-color: #00acc9 !important;">INVITADOS Y PONENTES</span>
            </div>
            <h1 class="gestion-title">Módulo de Conferencistas</h1>
            <p class="gestion-subtitle">Gestión de hojas de vida, país de procedencia y ponentes de la VII Bienal</p>
        </div>
        <div>
            <a href="{{ route('conferencista.create') }}" class="btn-gestion-primary">
                <i class="fas fa-user-plus"></i> Registrar Conferencista
            </a>
        </div>
    </div>

    <!-- Tarjeta con Tabla de Conferencistas -->
    <div class="gestion-card">
        <div class="gestion-card-header">
            <h5 class="gestion-card-title">
                <i class="fas fa-users text-primary"></i> Directorio de Conferencistas
            </h5>
            <span class="badge bg-light text-muted border px-2.5 py-1 rounded-pill">
                Total: {{ $conferencistas->total() ?? count($conferencistas) }}
            </span>
        </div>

        <div class="table-responsive">
            <table class="table gestion-table">
                <thead>
                    <tr>
                        <th style="width: 8%;">Foto</th>
                        <th style="width: 28%;">Nombre y Especialidad</th>
                        <th style="width: 14%;">País</th>
                        <th style="width: 25%;">Correo Electrónico</th>
                        <th class="text-center" style="width: 15%;">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($conferencistas as $conferencista)
                        <tr>
                            <td>
                                <img src="{{ $conferencista->foto_url }}" alt="{{ $conferencista->nombre }}" class="rounded-circle shadow-sm border" style="width: 48px; height: 48px; object-fit: cover;">
                            </td>
                            <td>
                                <div class="fw-bold text-dark">{{ $conferencista->nombre }}</div>
                                <div class="small text-muted text-truncate" style="max-width: 320px;">
                                    {{ \Illuminate\Support\Str::limit($conferencista->cv, 75) }}
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <span class="fi fi-{{ $conferencista->pais }} shadow-sm rounded-1" style="font-size: 1.25rem;"></span>
                                    <span class="small fw-semibold text-uppercase text-secondary">{{ $conferencista->pais }}</span>
                                </div>
                            </td>
                            <td>
                                <a href="mailto:{{ $conferencista->correo }}" class="text-decoration-none text-muted small">
                                    <i class="far fa-envelope me-1 text-primary"></i> {{ $conferencista->correo }}
                                </a>
                            </td>
                            <td class="text-center">
                                <div class="d-inline-flex gap-1">
                                    <a href="{{ route('conferencista.show', $conferencista->id) }}" class="btn-gestion-action btn-gestion-view" data-bs-toggle="tooltip" title="Vista previa pública">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('conferencista.edit', $conferencista->id) }}" class="btn-gestion-action btn-gestion-edit" data-bs-toggle="tooltip" title="Editar">
                                        <i class="fas fa-pen"></i>
                                    </a>
                                    <form action="{{ route('conferencista.destroy', $conferencista->id) }}" method="post" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-gestion-action btn-gestion-delete" onclick="return confirm('¿Está seguro de eliminar este conferencista?')" data-bs-toggle="tooltip" title="Eliminar">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="empty-state-cell">
                                <i class="far fa-user"></i>
                                <p class="mb-0 fw-medium">No hay conferencistas registrados.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if ($conferencistas->hasPages())
            <div class="px-4 py-3 border-top d-flex justify-content-center">
                {!! $conferencistas->links() !!}
            </div>
        @endif
    </div>
</div>
@endsection