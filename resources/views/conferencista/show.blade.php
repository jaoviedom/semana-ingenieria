@extends('layouts.main')

@section('content')
    <h1 class="fw-titulo-conf py-5">Perfil del conferencista</h1>
    <div class="card shadow my-5">
        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <img src="{{ asset('storage') . '/' . $conferencista->foto }}" alt="Foto" class="img-fluid">
                </div>
                <div class="col-md-9">
                    <h3 class="mb-3">{{ $conferencista->nombre }} <span class="ms-3 fi fi-{{ $conferencista->pais }}"></span></h3>
                    <p class="text-muted">{{ $conferencista->cv }}</p>
                    <p><a href="mailto:{{ $conferencista->correo }}" class="text-decoration-none link-info"><i class="fas fa-envelope me-3"></i>{{ $conferencista->correo }}</a></p>
                </div>
            </div>
        </div>
    </div>
    @auth
        <a href="{{ url( 'conferencista/') }}" class="btn btn-primary" >Regresar</a> 
    @else
        <a href="{{ route('welcome') }}" class="btn btn-primary" >Regresar</a> 
    @endauth
    <br>
    <br>

@endsection