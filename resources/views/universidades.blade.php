@extends('layouts.main')

@section('content')
<div class="content">
    <h2 class="py-5 fw-titulo-1">Universidades</h2>
    <div class="row g-4 mb-3">
        <div class="col-sm-4">
            <div class="card">
                <img src="{{ asset('images/universidades/universidad4.jpg') }}" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">Universidad Veracruzana</h5>
                    <a href="https://www.uv.mx/" target="_blank" class="btn btn-primary">Ir al sitio</a>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card">
                <img src="{{ asset('images/universidades/universidad5.png') }}" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">Universidad Tecnológica de Panamá</h5>
                    <a href="https://utp.ac.pa/" target="_blank" class="btn btn-primary">Ir al sitio</a>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card">
                <img src="{{ asset('images/universidades/universidad1.png') }}" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">Universidad de Ibagué</h5>
                    <a href="https://www.unibague.edu.co/" target="_blank" class="btn btn-primary">Ir al sitio</a>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card">
                <img src="{{ asset('images/universidades/universidad2.png') }}" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">UNAD</h5>
                    <a href="https://www.unad.edu.co/" target="_blank" class="btn btn-primary">Ir al sitio</a>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card">
                <img src="{{ asset('images/universidades/universidad3.png') }}" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">Universidad del Tolima</h5>
                    <a href="https://www.ut.edu.co/" target="_blank" class="btn btn-primary">Ir al sitio</a>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card">
                <img src="{{ asset('images/universidades/universidad6.png') }}" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">Universidad Autónoma de Bucaramanga</h5>
                    <a href="https://unab.edu.co/" target="_blank" class="btn btn-primary">Ir al sitio</a>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card">
                <img src="{{ asset('images/universidades/universidad7.png') }}" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">Unidades Tecnológicas de Santander</h5>
                    <a href="https://www.uts.edu.co/sitio/" target="_blank" class="btn btn-primary">Ir al sitio</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection