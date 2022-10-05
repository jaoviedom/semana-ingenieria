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
    <title>VI Semana Internacional de la Ingeniería UCC :: Conferencista</title>
</head>
<body>
    <header>
        <div>
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow">
                <div class="container">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="{{ route('welcome') }}">Página evento</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="{{ route('gestion.index') }}">Home</a>
                            </li>
                            @guest
                            <li class="ms-5 nav-item">
                                <a class="nav-link" href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i></a>
                            </li>
                            @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('conferencista.index') }}">Conferencistas</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('evento.index') }}">Eventos</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Generar QR Calificación
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    @foreach ($eventos as $evento)
                                        <li><a class="dropdown-item" href="{{ route('enlaceCalificacion', $evento->id) }}">{{ $evento->tipoEvento }} - {{ $evento->tema }}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Reportes
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="{{ route('exportarAsistencia') }}">Asistencia a eventos</a></li>
                                    <li><a class="dropdown-item" href="#">Evaluación de eventos</a></li>
                                </ul>
                            </li>
                            @endguest
                        </ul>
                        @auth
                        <a class="nav-link me-2" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Salir">
                            <i class="fas fa-sign-out-alt"></i>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                        @endauth
                    </div>
                </div>
            </nav>
        </div>

    </header>

    <main>
        <div class="container">
            @yield('content')
        </div>
    </main>

    <footer class="container-fluid pt-5 bg-azul-oscuro text-white">
        <div class="row">
            <div class="col-md"></div>
            <div class="col-md"></div>
            <div class="col-md py-3">
                <h3 class="footer-heading">Síguenos</h3>
                <a href="https://www.facebook.com/uccibaguespinal/" target="_blank" class="link-light me-2"><i class="fab fa-facebook-square fa-3x"></i></a>
                <a href="https://twitter.com/uccibaguespinal" target="_blank" class="link-light me-2"><i class="fab fa-twitter-square fa-3x"></i></a>
                <a href="https://www.youtube.com/channel/UCwLDxE0BoaD7tHL8ygbmNFw" target="_blank" class="link-light me-2"><i class="fab fa-youtube-square fa-3x"></i></a>
                <a href="https://www.flickr.com/photos/ucooperativadecolombia" target="_blank" class="link-light me-2"><i class="fab fa-flickr fa-3x"></i></a>
                <a href="https://www.instagram.com/ucc_ibaguespinal/" target="_blank" class="link-light me-2"><i class="fab fa-instagram fa-3x"></i></a>
            </div>
        </div>
        <div class="row text-center bg-azul-claro py-3">
            <div class="container">
                <p>Universidad Cooperativa de Colombia - Campus Ibagué, Espinal</p>
                <p>Otra creación de Jose Oviedo & Andrés Arciniegas
                    <a href="http://desarrollandoapps.net" target="_blank" class="text-decoration-none link-light">
                        <img src="{{ asset('images/logo-da.svg') }}" alt="Logo desarrollandoApps" class="logo-da ms-3">
                </a>
                </p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script>
        // Set the date we're counting down to
        var countDownDate = new Date("May 12, 2022 08:00:00").getTime();
        
        // Update the count down every 1 second
        var x = setInterval(function() {
        
          // Get today's date and time
          var now = new Date().getTime();
            
          // Find the distance between now and the count down date
          var distance = countDownDate - now;
            
          // Time calculations for days, hours, minutes and seconds
          var days = Math.floor(distance / (1000 * 60 * 60 * 24));
          var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
          var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
          var seconds = Math.floor((distance % (1000 * 60)) / 1000);
            
          // Output the result in an element 
          document.getElementById("dias").innerHTML = days;
          document.getElementById("horas").innerHTML = hours;
          document.getElementById("minutos").innerHTML = minutes;
          document.getElementById("segundos").innerHTML = seconds;
            
          // If the count down is over, write some text 
          if (distance < 0) {
            clearInterval(x);
            document.getElementById("demo").innerHTML = "EXPIRED";
          }
        }, 1000);
    </script>
    <script>
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })

    </script>

    @yield('scripts')
</body>
</html>