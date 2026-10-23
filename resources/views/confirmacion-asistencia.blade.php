<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <title>VI Semana Internacional de la Ingeniería UCC :: Conferencista</title>
</head>
<body>
    <main class="alto-100 d-flex justify-content-center align-items-center">
        @if(Session::get('asistio') == 1) 
            <div class="alert alert-success" role="alert">
                ¡Se ha registrado la asistencia! 
            </div>
        @elseif (Session::get('asistio') == 2)
            <div class="alert alert-warning" role="alert">
                ¡El usuario ya había registrado su asistencia! 
            </div>
        @else
            <div class="alert alert-danger" role="alert">
                ¡El usuario no se ha inscrito al evento!
            </div>
        @endif
    </main>
</body>
</html>
