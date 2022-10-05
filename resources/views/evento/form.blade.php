<h1 class="fw-titulo-conf py-5">{{ $modo }} Evento</h1>

@if ( count( $errors ) > 0 )
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach ( $errors->all() as $error )
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="form-group">
    <div class="form-floating mb-3">
        <select class="form-select" id="floatingSelect" name="dia" aria-label="Floating label select example" required>
            <option value="">Seleccione...</option>
            @foreach ($dias as $item)
                <option value="{{ $item->id }}" @if(isset($evento->dia) && $item->numero == $evento->dia) selected @endif>{{ $item->numero }}: {{ $item->fecha }}</option>
            @endforeach
        </select>
        <label for="floatingSelect">Día</label>
    </div>

    <div class="form-floating mb-3">
        <input type="text" class="form-control" placeholder="" name="horario" id="horario" value="{{ isset( $evento->horario ) ? $evento->horario : old('horario') }}" required>
        <label for="horario">Horario</label>
    </div>

    <div class="form-floating mb-3">
        <textarea class="form-control" placeholder="" name="tema" id="tema" required>{{ isset( $evento->tema ) ? $evento->tema : old('tema') }}</textarea>
        <label for="tema">Tema </label>
    </div>

    <div class="form-floating mb-3">
        <select class="form-select" id="floatingSelect" name="conferencista_id" aria-label="Floating label select example" required>
            <option value="">Seleccione...</option>
            @foreach ($conferencistas as $item)
                <option value="{{ $item->id }}" @if(isset($evento->dia) && $item->id == $evento->conferencista_id) selected @endif>{{ $item->nombre }}</option>
            @endforeach
        </select>
        <label for="floatingSelect">Conferencista</label>
    </div>

    <div class="form-floating mb-3">
        <input type="text" class="form-control" placeholder="" name="lugar" id="lugar" value="{{ isset( $evento->lugar ) ? $evento->lugar : old('lugar') }}" required>
        <label for="lugar">Lugar </label>
    </div>

    <div class="form-floating mb-3">
        <input type="text" class="form-control" placeholder="" name="enlaceVirtual" id="enlaceVirtual" value="{{ isset( $evento->enlaceVirtual ) ? $evento->enlaceVirtual : old('enlaceVirtual') }}" required>
        <label for="enlaceVirtual">Enlace Virtual </label>
    </div>

    <div class="form-floating mb-3">
        <input type="text" class="form-control" placeholder="" name="colaborador" id="colaborador" value="{{ isset( $evento->colaborador ) ? $evento->colaborador : old('colaborador') }}">
        <label for="colaborador">Colaborador </label>
    </div>

    <div class="form-floating mb-3">
        <select class="form-select" id="floatingSelect" name="tipoEvento" aria-label="Floating label select example" required>
            <option value="">Seleccione...</option>
            <option value="CONFERENCIA" @if(isset($evento->dia) && $evento->tipoEvento == "CONFERENCIA") selected @endif>Conferencia</option>
            <option value="TALLER" @if(isset($evento->dia) && $evento->tipoEvento == "TALLER") selected @endif>Taller</option>
            <option value="PONENCIA" @if(isset($evento->dia) && $evento->tipoEvento == "PONENCIA") selected @endif>Ponencia</option>
        </select>
        <label for="floatingSelect">Tipo de evento</label>
    </div>

    <input type="submit" class="btn btn-success mb-3" value="{{ $modo }} evento">
    <a href="{{ url( 'evento/') }}" class="btn btn-primary mb-3" >Regresar</a>
</div>

@section('scripts')
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