@extends('layouts.main')

@section('content')
<div class="container py-5">
    <div class="text-center mb-5">
        <span class="badge rounded-pill px-3 py-1 fw-bold text-white mb-2" style="background-color: #00acc9; font-size: 0.78rem; letter-spacing: 0.05em;">
            RED INSTITUCIONAL Y GREMIAL
        </span>
        <h1 class="fw-titulo-1 mb-2">Entidades y Aliados Estratégicos</h1>
        <p class="text-muted mx-auto" style="max-width: 680px; font-size: 1.05rem;">
            Instituciones del sector público, académico y gremial que respaldan e impulsan la VII Bienal Internacional de Ingeniería.
        </p>
    </div>

    @php
        $aliados = [
            [
                'nombre' => 'Universidad Cooperativa de Colombia (UCC)',
                'sigla'  => 'UCC',
                'url'    => 'https://www.ucc.edu.co',
                'logo'   => 'images/empresas/ucc.png',
                'desc'   => 'Institución de Educación Superior anfitriona y organizadora del evento académico.'
            ],
            [
                'nombre' => 'Alcaldía de Ibagué',
                'sigla'  => 'Alcaldía de Ibagué',
                'url'    => 'https://www.ibague.gov.co',
                'logo'   => 'images/empresas/alcaldia_ibague.png',
                'desc'   => 'Administración municipal de Ibagué, impulsando la transformación digital y sostenibilidad territorial.'
            ],
            [
                'nombre' => 'Gobernación del Tolima',
                'sigla'  => 'Gobernación del Tolima',
                'url'    => 'https://www.tolima.gov.co',
                'logo'   => 'images/empresas/gobernacion_tolima.png',
                'desc'   => 'Entidad gubernamental departamental, promotora del desarrollo tecnológico y productivo regional.'
            ],
            [
                'nombre' => 'ACOFI (Asociación Colombiana de Facultades de Ingeniería)',
                'sigla'  => 'ACOFI',
                'url'    => 'https://www.acofi.edu.co',
                'logo'   => 'images/empresas/acofi.png',
                'desc'   => 'Asociación líder en el fomento y calidad de la formación de ingenieros en Colombia.'
            ],
            [
                'nombre' => 'ACIS (Asociación Colombiana de Ingenieros de Sistemas)',
                'sigla'  => 'ACIS',
                'url'    => 'https://www.acis.org.co',
                'logo'   => 'images/empresas/acis.png',
                'desc'   => 'Gremio representativo de los profesionales en Ingeniería de Sistemas y TI del país.'
            ],
            [
                'nombre' => 'REDIS (Red Colombiana de Programas de Ingeniería de Sistemas y Afines)',
                'sigla'  => 'REDIS',
                'url'    => 'https://www.acofi.edu.co/redis/',
                'logo'   => 'images/empresas/redis.png',
                'desc'   => 'Red académica para la articulación, investigación y desarrollo de las tecnologías de información.'
            ],
            [
                'nombre' => 'COPNIA (Consejo Profesional Nacional de Ingeniería)',
                'sigla'  => 'COPNIA',
                'url'    => 'https://www.copnia.gov.co',
                'logo'   => 'images/empresas/copnia.png',
                'desc'   => 'Órgano estatal encargado de vigilar y controlar el ejercicio ético y legal de la ingeniería.'
            ],
            [
                'nombre' => 'Alianza TIC',
                'sigla'  => 'Alianza TIC',
                'url'    => 'https://alianzatic.org',
                'logo'   => 'images/empresas/alianzatic.png',
                'desc'   => 'Iniciativa colaborativa para el fortalecimiento del ecosistema tecnológico y empresarial.'
            ],
            [
                'nombre' => 'Sociedad Tolimense de Ingenieros (STI / SCI)',
                'sigla'  => 'STI / SCI',
                'url'    => 'https://sci.org.co/regionales/',
                'logo'   => 'images/empresas/sociedad-ingenieros.png',
                'desc'   => 'Gremio de la ingeniería regional y regional de la Sociedad Colombiana de Ingenieros.'
            ],
        ];
    @endphp

    <div class="row g-4 pb-4">
        @foreach ($aliados as $item)
            <div class="col-12 col-md-6 col-lg-4 d-flex">
                <div class="gestion-card w-100 d-flex flex-column text-center p-4" style="transition: transform 0.25s ease, box-shadow 0.25s ease;">
                    <!-- Contenedor del Logo -->
                    <div class="d-flex align-items-center justify-content-center p-3 mb-3 bg-white rounded-3 border" style="height: 120px;">
                        <img src="{{ asset($item['logo']) }}" alt="{{ $item['nombre'] }}" class="img-fluid" style="max-height: 85px; max-width: 90%; object-fit: contain;">
                    </div>

                    <!-- Datos de la Entidad -->
                    <div class="d-flex flex-column flex-grow-1 justify-content-between">
                        <div>
                            <h5 class="fw-bold text-dark mb-2" style="font-size: 1.05rem; line-height: 1.35;">
                                {{ $item['nombre'] }}
                            </h5>
                            <p class="small text-muted mb-3" style="font-size: 0.86rem; line-height: 1.45;">
                                {{ $item['desc'] }}
                            </p>
                        </div>

                        <!-- Botón de Enlace -->
                        <div class="pt-2 border-top">
                            <a href="{{ $item['url'] }}" target="_blank" rel="noopener noreferrer" class="btn btn-sm btn-outline-primary rounded-pill px-3 py-1.5 fw-semibold d-inline-flex align-items-center gap-1.5" style="border-color: #00acc9; color: #008fa7;">
                                <span>Visitar sitio web</span>
                                <i class="fas fa-external-link-alt" style="font-size: 0.75rem;"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection