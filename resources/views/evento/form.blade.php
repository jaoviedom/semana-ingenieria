<div class="row justify-content-center">
    <div class="col-12 col-lg-10">
        <!-- Encabezado del Formulario -->
        <div class="gestion-page-header d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
            <div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-1 small">
                        <li class="breadcrumb-item"><a href="{{ route('gestion.index') }}" class="text-decoration-none">Gestión</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('evento.index') }}" class="text-decoration-none">Eventos</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $modo }}</li>
                    </ol>
                </nav>
                <h1 class="gestion-title">{{ $modo }} Evento</h1>
                <p class="gestion-subtitle">Complete la información del evento para la agenda académica de la Bienal</p>
            </div>
            <div>
                <a href="{{ route('evento.index') }}" class="btn-gestion-secondary">
                    <i class="fas fa-arrow-left"></i> Volver al listado
                </a>
            </div>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show border-0 shadow-sm rounded-3 mb-4" role="alert">
                <div class="fw-bold mb-1"><i class="fas fa-exclamation-triangle me-2"></i>Por favor verifique los siguientes errores:</div>
                <ul class="mb-0 ps-3 small">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Tarjeta del Formulario -->
        <div class="gestion-form-card">
            <div class="row g-3">
                <!-- Tipo de Evento -->
                <div class="col-12 col-md-6">
                    <label for="tipoEvento" class="gestion-form-label">Tipo de Actividad <span class="text-danger">*</span></label>
                    <select class="form-select gestion-form-control @error('tipoEvento') is-invalid @enderror" name="tipoEvento" id="tipoEvento" required>
                        <option value="">Seleccione el tipo...</option>
                        <option value="CONFERENCIA" {{ old('tipoEvento', $evento->tipoEvento ?? '') == 'CONFERENCIA' ? 'selected' : '' }}>Conferencia</option>
                        <option value="TALLER" {{ old('tipoEvento', $evento->tipoEvento ?? '') == 'TALLER' ? 'selected' : '' }}>Taller</option>
                        <option value="PONENCIA" {{ old('tipoEvento', $evento->tipoEvento ?? '') == 'PONENCIA' ? 'selected' : '' }}>Ponencia</option>
                    </select>
                    <div class="invalid-feedback">Seleccione un tipo de evento.</div>
                </div>

                <!-- Programa Académico -->
                <div class="col-12 col-md-6">
                    <label for="programa" class="gestion-form-label">Programa Académico <span class="text-danger">*</span></label>
                    <select class="form-select gestion-form-control @error('programa') is-invalid @enderror" name="programa" id="programa" required>
                        <option value="Sistemas" {{ old('programa', $evento->programa ?? 'Sistemas') == 'Sistemas' ? 'selected' : '' }}>Ingeniería de Sistemas</option>
                        <option value="Civil" {{ old('programa', $evento->programa ?? '') == 'Civil' ? 'selected' : '' }}>Ingeniería Civil</option>
                    </select>
                    <div class="invalid-feedback">Seleccione el programa.</div>
                </div>

                <!-- Día del Evento -->
                <div class="col-12 col-md-6">
                    <label for="dia" class="gestion-form-label">Día de la Bienal <span class="text-danger">*</span></label>
                    <select class="form-select gestion-form-control @error('dia') is-invalid @enderror" name="dia" id="dia" required>
                        <option value="">Seleccione el día...</option>
                        @foreach ($dias as $item)
                            <option value="{{ $item->numero }}" {{ old('dia', $evento->dia ?? '') == $item->numero ? 'selected' : '' }}>
                                Día {{ $item->numero }} ({{ $item->fecha }})
                            </option>
                        @endforeach
                    </select>
                    <div class="invalid-feedback">Seleccione el día del evento.</div>
                </div>

                <!-- Horario -->
                <div class="col-12 col-md-6">
                    <label for="horario" class="gestion-form-label">Horario <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <span class="input-group-text bg-light text-muted"><i class="far fa-clock"></i></span>
                        <input type="text" class="form-control gestion-form-control @error('horario') is-invalid @enderror" name="horario" id="horario" value="{{ old('horario', $evento->horario ?? '') }}" placeholder="Ej: 10:00 AM - 11:00 AM" required>
                    </div>
                    <div class="invalid-feedback">El horario es requerido.</div>
                </div>

                <!-- Conferencista / Ponente -->
                <div class="col-12">
                    <label for="conferencista_id" class="gestion-form-label">Conferencista o Responsable <span class="text-danger">*</span></label>
                    <select class="form-select gestion-form-control @error('conferencista_id') is-invalid @enderror" name="conferencista_id" id="conferencista_id" required>
                        <option value="">Seleccione el conferencista...</option>
                        @foreach ($conferencistas as $item)
                            <option value="{{ $item->id }}" {{ old('conferencista_id', $evento->conferencista_id ?? '') == $item->id ? 'selected' : '' }}>
                                {{ $item->nombre }} ({{ strtoupper($item->pais) }})
                            </option>
                        @endforeach
                    </select>
                    <div class="invalid-feedback">Seleccione un conferencista.</div>
                </div>

                <!-- Tema / Título -->
                <div class="col-12">
                    <label for="tema" class="gestion-form-label">Tema o Título del Evento <span class="text-danger">*</span></label>
                    <textarea class="form-control gestion-form-control @error('tema') is-invalid @enderror" name="tema" id="tema" rows="3" placeholder="Ingrese el título o temática completa de la sesión..." required>{{ old('tema', $evento->tema ?? '') }}</textarea>
                    <div class="invalid-feedback">El tema del evento es requerido.</div>
                </div>

                <!-- Lugar Físico -->
                <div class="col-12 col-md-6">
                    <label for="lugar" class="gestion-form-label">Lugar / Espacio Físico <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <span class="input-group-text bg-light text-muted"><i class="fas fa-map-marker-alt"></i></span>
                        <input type="text" class="form-control gestion-form-control @error('lugar') is-invalid @enderror" name="lugar" id="lugar" value="{{ old('lugar', $evento->lugar ?? '') }}" placeholder="Ej: Auditorio Principal UCC, Sala de Cómputo..." required>
                    </div>
                    <div class="invalid-feedback">El lugar es requerido.</div>
                </div>

                <!-- Enlace Virtual -->
                <div class="col-12 col-md-6">
                    <label for="enlaceVirtual" class="gestion-form-label">Enlace Virtual (Opcional)</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light text-muted"><i class="fas fa-video"></i></span>
                        <input type="text" class="form-control gestion-form-control @error('enlaceVirtual') is-invalid @enderror" name="enlaceVirtual" id="enlaceVirtual" value="{{ old('enlaceVirtual', $evento->enlaceVirtual ?? '') }}" placeholder="https://meet.google.com/...">
                    </div>
                </div>

                <!-- Colaborador / Institución Aliada -->
                <div class="col-12">
                    <label for="colaborador" class="gestion-form-label">Institución Colaboradora o Aliada (Opcional)</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light text-muted"><i class="fas fa-university"></i></span>
                        <input type="text" class="form-control gestion-form-control @error('colaborador') is-invalid @enderror" name="colaborador" id="colaborador" value="{{ old('colaborador', $evento->colaborador ?? '') }}" placeholder="Ej: Universidad Veracruzana, UNLP, Skina IT Solutions...">
                    </div>
                </div>
            </div>

            <!-- Botones de Acción -->
            <div class="d-flex align-items-center justify-content-end gap-2 mt-4 pt-3 border-top">
                <a href="{{ route('evento.index') }}" class="btn-gestion-secondary">
                    Cancelar
                </a>
                <button type="submit" class="btn-gestion-primary">
                    <i class="fas fa-save"></i> Guardar Evento
                </button>
            </div>
        </div>
    </div>
</div>

@section('scripts')
    <script>
        (function () {
            'use strict'
            var forms = document.querySelectorAll('.needs-validation')
            Array.prototype.slice.call(forms).forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }
                    form.classList.add('was-validated')
                }, false)
            })
        })()
    </script>
@endsection