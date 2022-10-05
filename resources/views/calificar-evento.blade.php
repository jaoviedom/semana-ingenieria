@extends('layouts.main')

@section('content')
<div class="card shadow my-5">
    <div class="card-body">
        <div class="row">
            <h1 class="fw-titulo-conf pt-3 text-center">Calificación Evento</h1>
            <h2 class="fw-titulo-conf pt-3 text-center">{{ $evento->tema }}</h2>
            <form action="{{ route('calificarEvento') }}" method="POST" class="py-5 needs-validation" novalidate>
                @csrf
                <input type="hidden" class="form-control" name="evento" value={{ $evento->id }}>
                
                <h2 class="my-3">Organización</h2>
                <div class="form-floating mb-3">
                    <select class="form-select" aria-label="F" name="o1">
                        <option selected value="4">Excelente</option>
                        <option value="3">Bueno</option>
                        <option value="2">Aceptable</option>
                        <option value="1">Deficiente</option>
                    </select>
                    <label for="floatingSelect">Información sobre la fecha, hora, lugar y objetivos</label>
                </div>
                <div class="form-floating mb-3">
                    <select class="form-select" aria-label="F" name="o2">
                        <option selected value="4">Excelente</option>
                        <option value="3">Bueno</option>
                        <option value="2">Aceptable</option>
                        <option value="1">Deficiente</option>
                    </select>
                    <label for="floatingSelect">Lugar de evento</label>
                </div>
                <div class="form-floating mb-3">
                    <select class="form-select" aria-label="F" name="o3">
                        <option selected value="4">Excelente</option>
                        <option value="3">Bueno</option>
                        <option value="2">Aceptable</option>
                        <option value="1">Deficiente</option>
                    </select>
                    <label for="floatingSelect">Duración de evento</label>
                </div>
                <div class="form-floating mb-3">
                    <select class="form-select" aria-label="F" name="o4">
                        <option selected value="4">Excelente</option>
                        <option value="3">Bueno</option>
                        <option value="2">Aceptable</option>
                        <option value="1">Deficiente</option>
                    </select>
                    <label for="floatingSelect">Atención del personal de evento</label>
                </div>
                <h2 class="my-3">Expositor</h2>
                <div class="form-floating mb-3">
                    <select class="form-select" aria-label="F" name="e1">
                        <option selected value="4">Excelente</option>
                        <option value="3">Bueno</option>
                        <option value="2">Aceptable</option>
                        <option value="1">Deficiente</option>
                    </select>
                    <label for="floatingSelect">Conocimiento y dominio del tema</label>
                </div>
                <div class="form-floating mb-3">
                    <select class="form-select" aria-label="F" name="e2">
                        <option selected value="4">Excelente</option>
                        <option value="3">Bueno</option>
                        <option value="2">Aceptable</option>
                        <option value="1">Deficiente</option>
                    </select>
                    <label for="floatingSelect">Capacidad para comunicarse de manera clara y efectiva</label>
                </div>
                <div class="form-floating mb-3">
                    <select class="form-select" aria-label="F" name="e3">
                        <option selected value="4">Excelente</option>
                        <option value="3">Bueno</option>
                        <option value="2">Aceptable</option>
                        <option value="1">Deficiente</option>
                    </select>
                    <label for="floatingSelect">Desarrollo de los objetivos propuestos</label>
                </div>
                <div class="form-floating mb-3">
                    <select class="form-select" aria-label="F" name="e4">
                        <option selected value="4">Excelente</option>
                        <option value="3">Bueno</option>
                        <option value="2">Aceptable</option>
                        <option value="1">Deficiente</option>
                    </select>
                    <label for="floatingSelect">Metodología apropiada para desarrollar el tema</label>
                </div>
                <div class="form-floating mb-3">
                    <select class="form-select" aria-label="F" name="e5">
                        <option selected value="4">Excelente</option>
                        <option value="3">Bueno</option>
                        <option value="2">Aceptable</option>
                        <option value="1">Deficiente</option>
                    </select>
                    <label for="floatingSelect">Material de apoyo</label>
                </div>
                <h2 class="my-3">Resultados</h2>
                <div class="form-floating mb-3">
                    <select class="form-select" aria-label="F" name="r1">
                        <option selected value="4">Excelente</option>
                        <option value="3">Bueno</option>
                        <option value="2">Aceptable</option>
                        <option value="1">Deficiente</option>
                    </select>
                    <label for="floatingSelect">¿Cómo califica el evento?</label>
                </div>
                <div class="form-floating mb-3">
                    <select class="form-select" aria-label="F" name="r2">
                        <option selected value="4">Excelente</option>
                        <option value="3">Bueno</option>
                        <option value="2">Aceptable</option>
                        <option value="1">Deficiente</option>
                    </select>
                    <label for="floatingSelect">Aporta al crecimiento personal o profesional</label>
                </div>
                <div class="form-floating mb-3">
                    <select class="form-select" aria-label="F" name="r3">
                        <option selected value="4">Excelente</option>
                        <option value="3">Bueno</option>
                        <option value="2">Aceptable</option>
                        <option value="1">Deficiente</option>
                    </select>
                    <label for="floatingSelect">Califique su intención de participar en eventos similares</label>
                </div>
                <h2 class="my-3">Preferencia frente al tipo de actividades</h2>
                <div class="form-floating mb-3">
                    <select class="form-select" aria-label="F" name="p1">
                        <option selected value="4">Excelente</option>
                        <option value="3">Bueno</option>
                        <option value="2">Aceptable</option>
                        <option value="1">Deficiente</option>
                    </select>
                    <label for="floatingSelect">Cultural</label>
                </div>
                <div class="form-floating mb-3">
                    <select class="form-select" aria-label="F" name="p2">
                        <option selected value="4">Excelente</option>
                        <option value="3">Bueno</option>
                        <option value="2">Aceptable</option>
                        <option value="1">Deficiente</option>
                    </select>
                    <label for="floatingSelect">Académica</label>
                </div>
                <div class="form-floating mb-3">
                    <select class="form-select" aria-label="F" name="p3">
                        <option selected value="4">Excelente</option>
                        <option value="3">Bueno</option>
                        <option value="2">Aceptable</option>
                        <option value="1">Deficiente</option>
                    </select>
                    <label for="floatingSelect">Deportiva</label>
                </div>
                <div class="form-floating mb-3">
                    <select class="form-select" aria-label="F" name="p4">
                        <option selected value="4">Excelente</option>
                        <option value="3">Bueno</option>
                        <option value="2">Aceptable</option>
                        <option value="1">Deficiente</option>
                    </select>
                    <label for="floatingSelect">Social (fiestas, conciertos, et.)</label>
                </div>
                <div class="form-floating mb-3">
                    <select class="form-select" aria-label="F" name="p4">
                        <option selected value="4">Excelente</option>
                        <option value="3">Bueno</option>
                        <option value="2">Aceptable</option>
                        <option value="1">Deficiente</option>
                    </select>
                    <label for="floatingSelect">Social (fiestas, conciertos, et.)</label>
                </div>
                <div class="form-floating mb-3">
                    <textarea class="form-control" placeholder="Ingrese acá sus comentarios" name="observaciones"></textarea>
                    <label for="floatingTextarea">Observaciones</label>
                  </div>

                <button type="submit" class="btn btn-primary w-100">Enviar</button>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    function calificar(item) {
        let pregunta = item.id[1];
        let calificacion = item.id[2];
        document.getElementById('p' + pregunta).value = calificacion;
        for(let i = 1; i <= 5; i++) {
            document.getElementById('p' + pregunta + i).className = "far fa-star fa-2x";
            document.getElementById('p' + pregunta + i).style.color = "black";
        }
        for(let i = 1; i <= calificacion; i++) {
            document.getElementById('p' + pregunta + i).className = " fas fa-star fa-2x";
            document.getElementById('p' + pregunta + i).style.color = "orange";
        }
    }
</script>
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
@endsection
