<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inscripción &bull; {{ $evento->tema }} &bull; VII Bienal de Ingeniería</title>
    
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('flag-icons/css/flag-icons.min.css') }}">
</head>
<body class="inscripcion-body">
    <div class="inscripcion-page-wrapper">
        <div class="inscripcion-container">
            <!-- Barra superior con botón volver -->
            <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
                <a href="{{ route('welcome') }}" class="btn-inscripcion-back">
                    <i class="fas fa-arrow-left"></i>
                    <span>Volver a la programación</span>
                </a>
                <span class="text-white-50 small fw-medium d-none d-sm-inline">
                    <i class="fas fa-university me-1 text-info"></i> Universidad Cooperativa de Colombia
                </span>
            </div>

            <!-- Tarjeta principal -->
            <div class="inscripcion-card">
                <div class="row g-0">
                    <!-- Columna Izquierda: Información del Evento -->
                    <div class="col-lg-5">
                        <div class="inscripcion-summary-panel">
                            <div>
                                <!-- Badges de tipo y programa -->
                                <div class="d-flex flex-wrap align-items-center gap-2 mb-3">
                                    <span class="inscripcion-event-badge">
                                        <i class="fas fa-bookmark"></i>
                                        {{ ucfirst(strtolower($evento->tipoEvento)) }}
                                    </span>
                                    <span class="inscripcion-event-badge {{ $evento->programa == 'Civil' ? 'tag-civil' : '' }}">
                                        <i class="fas fa-graduation-cap"></i>
                                        {{ $evento->programa ?? 'General' }}
                                    </span>
                                </div>

                                <!-- Título del Evento -->
                                <h2 class="inscripcion-event-title">{{ $evento->tema }}</h2>

                                <!-- Metadatos y Detalles -->
                                <div class="inscripcion-detail-item">
                                    <i class="far fa-clock"></i>
                                    <div>
                                        <div class="fw-semibold text-white">Horario</div>
                                        <span>{{ $evento->horario }}</span>
                                    </div>
                                </div>

                                <div class="inscripcion-detail-item">
                                    <i class="far fa-calendar-alt"></i>
                                    <div>
                                        <div class="fw-semibold text-white">Día y Fecha</div>
                                        <span>Día {{ $evento->dia }} &bull; {{ $evento->fecha }}</span>
                                    </div>
                                </div>

                                <div class="inscripcion-detail-item">
                                    <i class="fas fa-map-marker-alt"></i>
                                    <div>
                                        <div class="fw-semibold text-white">Lugar / Modalidad</div>
                                        <span>{{ $evento->lugar ?? 'Campus UCC Ibagué / Auditorio' }}</span>
                                    </div>
                                </div>

                                <!-- Conferencista si aplica -->
                                @if($evento->conferencista)
                                    <div class="inscripcion-ponente-box">
                                        @if(!empty($evento->conferencista->foto) && file_exists(public_path($evento->conferencista->foto)))
                                            <img src="{{ asset($evento->conferencista->foto) }}" alt="{{ $evento->conferencista->nombre }}" class="inscripcion-ponente-avatar">
                                        @else
                                            <div class="inscripcion-ponente-avatar-placeholder">
                                                <i class="fas fa-user-tie"></i>
                                            </div>
                                        @endif
                                        <div class="flex-grow-1 overflow-hidden">
                                            <div class="text-white-50 small text-uppercase fw-bold" style="font-size: 0.7rem; letter-spacing: 0.05em;">
                                                {{ $evento->tipoEvento == 'TALLER' ? 'Tallerista' : 'Conferencista' }}
                                            </div>
                                            <div class="fw-bold text-white text-truncate">{{ $evento->conferencista->nombre }}</div>
                                            <div class="d-flex align-items-center gap-2 mt-1">
                                                <span class="fi fi-{{ $evento->conferencista->pais }} shadow-sm rounded-1" style="font-size: 0.95rem;"></span>
                                                <a href="{{ route('conferencista.show', $evento->conferencista->id) }}" target="_blank" class="text-info text-decoration-none small">
                                                    Ver perfil <i class="fas fa-external-link-alt ms-1" style="font-size: 0.7rem;"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>

                            <!-- Nota al pie informativa -->
                            <div class="alert-inscripcion-info">
                                <i class="fas fa-qrcode me-2 text-info"></i>
                                <span>Al inscribirte se generará tu acreditación digital con código QR para registrar tu ingreso.</span>
                            </div>
                        </div>
                    </div>

                    <!-- Columna Derecha: Formulario de Registro -->
                    <div class="col-lg-7">
                        <div class="inscripcion-form-panel">
                            <div class="mb-4">
                                <h3 class="fw-bold text-slate-800 mb-1" style="color: #0f172a; font-size: 1.5rem;">Registro de Asistencia</h3>
                                <p class="text-muted small mb-0">Completa el formulario con tus datos para asegurar tu cupo en esta actividad.</p>
                            </div>

                            <form action="{{ route('inscripcion.store') }}" method="POST" id="formInscripcion" class="needs-validation" novalidate>
                                @csrf
                                <input type="hidden" name="evento" value="{{ $evento->id }}">

                                <!-- Nombre Completo -->
                                <div class="inscripcion-form-group">
                                    <label for="nombre">
                                        <i class="far fa-user text-primary"></i> Nombre y Apellidos completos <span class="text-danger">*</span>
                                    </label>
                                    <div class="inscripcion-input-group">
                                        <i class="far fa-user inscripcion-input-icon"></i>
                                        <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Ej: María Paula Gómez" required>
                                        <div class="invalid-feedback">
                                            Por favor ingresa tu nombre completo.
                                        </div>
                                    </div>
                                </div>

                                <!-- Correo Electrónico -->
                                <div class="inscripcion-form-group">
                                    <label for="email">
                                        <i class="far fa-envelope text-primary"></i> Correo electrónico <span class="text-danger">*</span>
                                    </label>
                                    <div class="inscripcion-input-group">
                                        <i class="far fa-envelope inscripcion-input-icon"></i>
                                        <input type="email" name="email" class="form-control" id="email" placeholder="nombre@correo.com" required>
                                        <div class="invalid-feedback">
                                            Ingresa un correo electrónico válido.
                                        </div>
                                    </div>
                                    <div class="form-text text-muted small">A esta dirección enviaremos la confirmación y el código QR de acceso.</div>
                                </div>

                                <!-- Celular -->
                                <div class="inscripcion-form-group">
                                    <label for="celular">
                                        <i class="fas fa-mobile-alt text-primary"></i> Número de Celular / WhatsApp
                                    </label>
                                    <div class="inscripcion-input-group">
                                        <i class="fas fa-mobile-alt inscripcion-input-icon"></i>
                                        <input type="tel" name="celular" class="form-control" id="celular" placeholder="Ej: 310 123 4567">
                                    </div>
                                </div>

                                <!-- Institución / Empresa -->
                                <div class="inscripcion-form-group">
                                    <label for="institucion">
                                        <i class="far fa-building text-primary"></i> Institución, Universidad o Empresa <span class="text-danger">*</span>
                                    </label>
                                    <div class="inscripcion-input-group">
                                        <i class="far fa-building inscripcion-input-icon"></i>
                                        <input type="text" name="institucion" class="form-control" id="institucion" placeholder="Ej: Universidad Cooperativa de Colombia" required>
                                        <div class="invalid-feedback">
                                            Ingresa tu institución, universidad o lugar de trabajo.
                                        </div>
                                    </div>
                                </div>

                                <!-- Nivel de Formación -->
                                <div class="inscripcion-form-group">
                                    <label for="nivelFormacion">
                                        <i class="fas fa-graduation-cap text-primary"></i> Nivel de formación académica <span class="text-danger">*</span>
                                    </label>
                                    <div class="inscripcion-input-group">
                                        <i class="fas fa-graduation-cap inscripcion-input-icon"></i>
                                        <select class="form-select" id="nivelFormacion" name="nivelFormacion" required>
                                            <option selected value="">Selecciona tu nivel de formación...</option>
                                            <option value="Estudiante">Estudiante de Pregrado</option>
                                            <option value="Profesional">Profesional / Graduado</option>
                                            <option value="Maestría">Estudiante / Graduado de Maestría</option>
                                            <option value="Doctorado">Doctorado</option>
                                            <option value="Post-doctorado">Post-doctorado</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Selecciona tu nivel de formación.
                                        </div>
                                    </div>
                                </div>

                                <!-- Botón Submit -->
                                <button type="submit" id="btnSubmit" class="btn-submit-inscripcion">
                                    <i class="fas fa-ticket-alt me-2"></i> Confirmar Inscripción
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer sutil -->
            <div class="text-center mt-4 text-white-50 small">
                &copy; {{ date('Y') }} Universidad Cooperativa de Colombia &bull; Facultad de Ingeniería
            </div>
        </div>
    </div>

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script>
        (function () {
            'use strict';
            var form = document.getElementById('formInscripcion');
            var btn = document.getElementById('btnSubmit');

            if (form) {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                    } else {
                        // Indicador de que está procesando la inscripción
                        btn.disabled = true;
                        btn.innerHTML = '<i class="fas fa-circle-notch fa-spin me-2"></i> Procesando inscripción...';
                    }
                    form.classList.add('was-validated');
                }, false);
            }
        })();
    </script>
</body>
</html>