<div class="row justify-content-center">
    <div class="col-12 col-lg-10">
        <!-- Encabezado del Formulario -->
        <div class="gestion-page-header d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
            <div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-1 small">
                        <li class="breadcrumb-item"><a href="{{ route('gestion.index') }}" class="text-decoration-none">Gestión</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('conferencista.index') }}" class="text-decoration-none">Conferencistas</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $modo }}</li>
                    </ol>
                </nav>
                <h1 class="gestion-title">{{ $modo }} Conferencista</h1>
                <p class="gestion-subtitle">Complete la información del ponente para el directorio del evento</p>
            </div>
            <div>
                <a href="{{ route('conferencista.index') }}" class="btn-gestion-secondary">
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
                <!-- Nombre Completo -->
                <div class="col-12 col-md-8">
                    <label for="nombre" class="gestion-form-label">Nombre y Títulos Académicos <span class="text-danger">*</span></label>
                    <input type="text" class="form-control gestion-form-control @error('nombre') is-invalid @enderror" name="nombre" id="nombre" value="{{ old('nombre', $conferencista->nombre ?? '') }}" placeholder="Ej: Dra. Patricia Martínez Moreno" required>
                    <div class="invalid-feedback">El nombre es requerido.</div>
                </div>

                <!-- Código de País -->
                <div class="col-12 col-md-4">
                    <label for="pais" class="gestion-form-label">Código de País (ISO 2) <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <input type="text" class="form-control gestion-form-control @error('pais') is-invalid @enderror" name="pais" id="pais" maxlength="2" value="{{ old('pais', $conferencista->pais ?? '') }}" placeholder="co, mx, ar, es..." style="text-transform: lowercase;" required>
                        <span class="input-group-text bg-light text-muted small"><i class="fas fa-globe-americas"></i></span>
                    </div>
                    <div class="form-text small">Ej: <code>co</code> (Colombia), <code>mx</code> (México), <code>ar</code> (Argentina).</div>
                    <div class="invalid-feedback">El código de país es requerido.</div>
                </div>

                <!-- Correo Electrónico -->
                <div class="col-12">
                    <label for="correo" class="gestion-form-label">Correo Electrónico Institucional o de Contacto <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <span class="input-group-text bg-light text-muted"><i class="far fa-envelope"></i></span>
                        <input type="email" class="form-control gestion-form-control @error('correo') is-invalid @enderror" name="correo" id="correo" value="{{ old('correo', $conferencista->correo ?? '') }}" placeholder="correo@institucion.edu.co" required>
                    </div>
                    <div class="invalid-feedback">Ingrese un correo electrónico válido.</div>
                </div>

                <!-- Currículum / Perfil Profesional -->
                <div class="col-12">
                    <label for="cv" class="gestion-form-label">Perfil Profesional y Académico (CV) <span class="text-danger">*</span></label>
                    <textarea class="form-control gestion-form-control @error('cv') is-invalid @enderror" name="cv" id="cv" rows="5" placeholder="Formación académica, trayectoria, áreas de investigación y logros destacados..." required>{{ old('cv', $conferencista->cv ?? '') }}</textarea>
                    <div class="invalid-feedback">El perfil profesional es requerido.</div>
                </div>

                <!-- Fotografía -->
                <div class="col-12">
                    <label for="foto" class="gestion-form-label">Fotografía del Conferencista</label>
                    <div class="d-flex align-items-center gap-3 mb-2">
                        @if (isset($conferencista->foto_url))
                            <img src="{{ $conferencista->foto_url }}" alt="Foto actual" class="rounded-circle border shadow-sm" style="width: 60px; height: 60px; object-fit: cover;">
                            <div class="small text-muted">Foto actual registrada. Cargue una nueva imagen solo si desea reemplazarla.</div>
                        @endif
                    </div>
                    <input type="file" class="form-control gestion-form-control @error('foto') is-invalid @enderror" name="foto" id="foto" accept="image/*">
                    <div class="form-text small">Formatos admitidos: JPG, PNG, WEBP. Se mostrará en el perfil y landing page.</div>
                </div>
            </div>

            <!-- Botones de Acción -->
            <div class="d-flex align-items-center justify-content-end gap-2 mt-4 pt-3 border-top">
                <a href="{{ route('conferencista.index') }}" class="btn-gestion-secondary">
                    Cancelar
                </a>
                <button type="submit" class="btn-gestion-primary">
                    <i class="fas fa-save"></i> Guardar Conferencista
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