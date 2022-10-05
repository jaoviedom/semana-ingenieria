<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('flag-icons/css/flag-icons.min.css') }}">
    <title>VI Semana Internacional de la Ingeniería UCC :: Inscripción</title>
</head>
<body>
    <div class="d-flex justify-content-center align-items-center alto-100 bg-deg">
        <div class="card min-w-50 shadow">
            <div class="card-body">
                <h5 class="text-center mb-3">Inscripción</h5>
                <hr>
                <form action="{{ route('inscripcion.store') }}" method="POST" class="needs-validation" novalidate>
                    @csrf
                    <input type="hidden" name="evento" value="{{ $evento->id }}">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control text-center" id="floatingInput" value="{{ $evento->tema }}" readonly>
                        <label for="floatingInput">Evento</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text"name="nombre" class="form-control" id="floatingInput" placeholder="Nombre" required>
                        <label for="floatingInput">Nombre</label>
                        <div class="invalid-feedback">
                            Ingrese su nombre.
                        </div>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com" required>
                        <label for="floatingInput">Correo electrónico</label>
                        <div class="invalid-feedback">
                            Correo electrónico inválido.
                        </div>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="tel" name="celular" class="form-control" id="floatingInput" placeholder="123">
                        <label for="floatingInput">Celular</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" name="institucion" class="form-control" id="floatingInput" placeholder="institucion" required>
                        <label for="floatingInput">Institución / Empresa</label>
                        <div class="invalid-feedback">
                            Ingrese su institución.
                        </div>
                    </div>
                    <div class="form-floating mb-3">
                        <select class="form-select" id="floatingSelect" name="nivelFormacion" required>
                          <option selected value="">Seleccione...</option>
                          <option value="Estudiante">Estudiante</option>
                          <option value="Profesional">Profesional</option>
                          <option value="Maestría">Maestría</option>
                          <option value="Doctorado">Doctorado</option>
                          <option value="Post-doctorado">Post-doctorado</option>
                        </select>
                        <div class="invalid-feedback">
                            Seleccione su nivel de formación.
                        </div>
                        <label for="floatingSelect">Nivel de formación</label>
                      </div>
                    <button type="submit" class="btn btn-primary w-100">Inscribirme</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function () {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
            .forEach(function (form) {
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

    {{-- TODO: Poner indicador de que está trabajando en la inscripcion --}}
</body>
</html>