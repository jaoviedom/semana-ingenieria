@extends('layouts.main')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6">
            <div class="gestion-card text-center p-4 p-md-5">
                <div class="mb-3">
                    <span class="badge rounded-pill px-3 py-1 fw-bold text-white" style="background-color: #00acc9; font-size: 0.78rem;">
                        EVALUACIÓN DEL EVENTO
                    </span>
                </div>

                <h2 class="h3 fw-bold text-dark mb-2">{{ $evento->tema }}</h2>

                @if ($evento->nombre)
                    <p class="text-muted fw-medium mb-4">
                        <i class="fas fa-user-tie me-1 text-primary"></i> {{ $evento->nombre }}
                        @if ($evento->pais)
                            <span class="ms-1 fi fi-{{ $evento->pais }}"></span>
                        @endif
                    </p>
                @endif

                <!-- Contenedor del Código QR -->
                <div class="p-4 bg-white rounded-4 border shadow-sm d-inline-block mx-auto mb-4" style="max-width: 320px;">
                    <img src="{{ asset($rutaArchivo) }}" alt="Código QR de Calificación" class="img-fluid w-100" style="min-width: 240px;">
                </div>

                <p class="text-muted small mb-4">
                    Escanee este código QR con la cámara de su celular para calificar la conferencia o taller.
                </p>

                <!-- Acciones Rápidas -->
                <div class="d-flex justify-content-center gap-2 flex-wrap">
                    <button type="button" class="btn btn-outline-secondary rounded-pill px-4" onclick="window.print()">
                        <i class="fas fa-print me-1"></i> Imprimir QR
                    </button>
                    <a href="{{ route('verCalificarEvento', $evento->id) }}" target="_blank" class="btn-gestion-primary">
                        <i class="fas fa-external-link-alt"></i> Abrir Formulario
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection