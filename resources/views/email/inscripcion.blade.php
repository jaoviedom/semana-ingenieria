<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Inscripción</title>
</head>
<body>
    <h1 class="text-center">VI Semana Internacional de la Ingeniería UCC</h1>
    <div class="card">
        <div class="card-body">
            <h3 class="card-title">Notificación de Inscripción a evento</h3>
            <p>El usuario {{ $inscripcion->nombre }}, se acaba de inscribir en {{ $inscripcion->tipoEvento }} cuyo tema es: "{{ $inscripcion->tema }}".</p>
            <p>El evento se llevará a cabo el día {{ $inscripcion->fecha }} en el horario {{ $inscripcion->horario }}.</p>
            <p>Podrá asistir al evento de manera presencial en {{ $inscripcion->lugar }} o de manera remota en el siguiente enlace: <a href="{{ $inscripcion->enlaceVirtual }}">{{ $inscripcion->enlaceVirtual }}</a></p>
            <div class="row mt-3 text-center">
                <div class="col-0 col-sm-4"></div>
                <div class="col-0 col-sm-4">
                    <img src="{{ asset($rutaArchivo) }}" alt="" class="img-fluid w-100">
                </div>
                <div class="col-0 col-sm-4"></div>
            </div>
            <div class="text-center">
                {{-- {!! QrCode::size(200)->generate('127.0.0.1:8000/registrar-asistencia/' . '{{ $inscripcion->token }}'); !!} --}}
                <p class="mt-3">Guarde esta imagen. Se solicitará al ingreso del evento.</p>
            </div>
            <p>Este correo es generado automáticamente, le rogamos no responder a esta dirección.</p>
        </div>
    </div>
</body>
</html>