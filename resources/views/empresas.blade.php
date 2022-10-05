@extends('layouts.main')

@section('content')
<div class="content">
    <h2 class="py-5 fw-titulo-1">Aliados</h2>
    <div class="row g-4 pb-3">
        <div class="col-sm-4">
            <div class="card">
                <img src="{{ asset('images/empresas/empresa1.png') }}" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">ITMakers</h5>
                    <a href="https://www.itmakers.com.co" target="_blank" class="btn btn-primary">Ir al sitio</a>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card">
                <img src="{{ asset('images/empresas/empresa2.jpg') }}" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">Consultores Tecnológicos</h5>
                    <a href="https://consultorestecnologicos.com.co" target="_blank" class="btn btn-primary">Ir al sitio</a>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card">
                <img src="{{ asset('images/empresas/empresa3.png') }}" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">Lazarosoff</h5>
                    <a href="https://www.lazarosoftware.com/" target="_blank" class="btn btn-primary mb-3">Ir al sitio</a>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card">
                <img src="{{ asset('images/empresas/empresa4.png') }}" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">SysCafé</h5>
                    <a href="https://syscafe.com/" target="_blank" class="btn btn-primary">Ir al sitio</a>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card">
                <img src="{{ asset('images/empresas/empresa5.png') }}" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">CloudAPPi</h5>
                    <a href="https://cloudappi.net/" target="_blank" class="btn btn-primary">Ir al sitio</a>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card">
                <img src="{{ asset('images/empresas/empresa6.png') }}" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">SOAINT</h5>
                    <a href="https://soaint.com/" target="_blank"class="btn btn-primary">Ir al sitio</a>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card">
                <img src="{{ asset('images/empresas/empresa7.png') }}" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">Pixeling</h5>
                    <a href="https://pixeling.co/es/" class="btn btn-primary">Ir al sitio</a>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card">
                <img src="{{ asset('images/empresas/empresa8.jpg') }}" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">Manawa</h5>
                    <a href="http://manawac.com/" class="btn btn-primary">Ir al sitio</a>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card">
                <img src="{{ asset('images/empresas/empresa9.png') }}" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">Indra</h5>
                    <a href="https://www.indracompany.com/" class="btn btn-primary">Ir al sitio</a>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card">
                <img src="{{ asset('images/empresas/empresa10.png') }}" class="card-img-top" alt="Logo">
                <div class="card-body">
                    <h5 class="card-title">Tolintelligence</h5>
                    <a href="http://tolintelligence.com/" class="btn btn-primary">Ir al sitio</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection