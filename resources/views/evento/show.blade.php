@extends('layouts.main')

@section('content')
    <h1 class="fw-titulo-conf py-5">Datos del evento</h1>
    <div class="card shadow my-5">
        <div class="card-body">
            <div class="row">
                <div class=""">
                    <h3 class="mb-3">{{ $evento->tema }}</h3>
                    <p class="text-muted">{{ $evento->fecha }}</p>
                    <p class="text-muted">{{ $evento->horario }}</p>
                    <p class="text-muted">{{ $evento->lugar }}</p>
                </div>
            </div>
        </div>
    </div>
    <a href="{{ url( 'evento/') }}" class="btn btn-primary" >Regresar</a>
    <br>
    <br>

@endsection