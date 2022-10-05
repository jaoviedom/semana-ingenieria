@extends('layouts.main')

@section('content')
<div class="card shadow my-5">
    <div class="card-body">
        <div class="row">
                <h1 class="fw-titulo-conf pt-3 text-center">Calificación Evento</h1>
                <h2 class="fw-titulo-conf py-3 text-center">{{ $evento->tema }}</h2>
                <div class="col-md-3">
                    <img src="{{ asset('storage') . '/' . $evento->foto }}" alt="Foto" class="img-fluid">
                </div>
                <div class="col-md-9">
                    <h3 class="mb-3">{{ $evento->nombre }} <span class="ms-3 fi fi-{{ $evento->pais }}"></span></h3>
                </div>
            </div>
            <div class="row mt-3 text-center">
                <div class="col-0 col-sm-4"></div>
                <div class="col-0 col-sm-4">
                    <img src="{{ asset($rutaArchivo) }}" alt="" class="img-fluid w-100">
                </div>
                <div class="col-0 col-sm-4"></div>
            </div>
        </div>
    </div>
@endsection