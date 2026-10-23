@extends('layouts.main')

@section('content')
<div class="row py-4 border-bottom"">
    <p class="text-center fs-5">La VII Bienal Internacional de Ingeniería constituye un escenario de encuentro académico, científico y profesional para compartir conocimiento, impulsar la innovación y fortalecer la relación entre la universidad, el sector público, las organizaciones y la sociedad. En este marco, la programación del programa de Ingeniería de Sistemas propone una agenda conectada con los principales desafíos de la transformación digital y con las oportunidades de desarrollo del Tolima y de Colombia.</p>
    <p class="text-center fs-5">Las conferencias, talleres demostrativos y espacios de conversación contemplan temas de actualidad como inteligencia artificial, computación de alto desempeño, robótica, gobernanza de IA, accesibilidad web, analítica y visualización de datos, agentes inteligentes, prácticas MLOps, ciberseguridad, software libre y soberanía tecnológica. La combinación de reflexión conceptual y experiencias prácticas busca promover aprendizajes aplicables a proyectos académicos, empresariales e institucionales.</p>
    <p class="text-center fs-2">¡Bienvenidos!</p>
</div>
<div class="row" id="programacion">
    <h2 class="py-5 fw-titulo-1">Programación</h2>
    <div class="row my-4 justify-content-center g-4 dias-selector-container">
        <div class="col-4 d-flex justify-content-center">
            <button class="btn btn-dia-selector active" onclick="verDia(1)" id="btnDia1" type="button">
                <span class="dia-etiqueta d-none d-md-inline"><i class="fas fa-calendar-day me-1"></i> Día 1 · Miércoles</span>
                <span class="dia-numero">28</span>
                <span class="dia-mes">Octubre 2026</span>
            </button>
        </div>
        <div class="col-4 d-flex justify-content-center">
            <button class="btn btn-dia-selector" onclick="verDia(2)" id="btnDia2" type="button">
                <span class="dia-etiqueta d-none d-md-inline"><i class="fas fa-calendar-day me-1"></i> Día 2 · Jueves</span>
                <span class="dia-numero">29</span>
                <span class="dia-mes">Octubre 2026</span>
            </button>
        </div>
        <div class="col-4 d-flex justify-content-center">
            <button class="btn btn-dia-selector" onclick="verDia(3)" id="btnDia3" type="button">
                <span class="dia-etiqueta d-none d-md-inline"><i class="fas fa-calendar-day me-1"></i> Día 3 · Viernes</span>
                <span class="dia-numero">30</span>
                <span class="dia-mes">Octubre 2026</span>
            </button>
        </div>
    </div>
</div>

<div class="row my-4" id="programacion-dia">
    <!-- Pestañas de Navegación -->
    <div class="col-12 mb-4">
        <ul class="nav nav-tabs nav-tabs-bienal" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="conferencias-tab" data-bs-toggle="tab" data-bs-target="#conferencias" type="button" role="tab" aria-controls="conferencias" aria-selected="true">
                    <i class="fas fa-chalkboard-teacher me-2"></i>Conferencias
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="talleres-tab" data-bs-toggle="tab" data-bs-target="#talleres" type="button" role="tab" aria-controls="talleres" aria-selected="false">
                    <i class="fas fa-laptop-code me-2"></i>Talleres
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="ponencias-tab" data-bs-toggle="tab" data-bs-target="#ponencias" type="button" role="tab" aria-controls="ponencias" aria-selected="false">
                    <i class="fas fa-project-diagram me-2"></i>Ponencias
                </button>
            </li>
        </ul>
    </div>

    <!-- Contenido de las Pestañas -->
    <div class="col-12">
        <div class="tab-content">
            <!-- PESTAÑA: CONFERENCIAS -->
            <div class="tab-pane fade show active" id="conferencias" role="tabpanel" aria-labelledby="conferencias-tab">
                <div class="tabla-actividades-card table-responsive">
                    <table class="table tabla-actividades table-hover">
                        <thead>
                            <tr>
                                <th class="col-horario">Horario</th>
                                <th class="col-tema">Tema</th>
                                <th class="d-none d-md-table-cell" style="width: 22%;">Conferencista</th>
                                <th class="text-center d-none d-md-table-cell" style="width: 8%;">País</th>
                                <th class="text-center d-none d-md-table-cell" style="width: 10%;">Acción</th>
                            </tr>
                        </thead>
                        <tbody class="visually-hidden" id="cUno">
                            @forelse ($cDia1 as $item)
                                <tr class="{{ $item->programa == 'Sistemas' ? 'row-programa-sistemas' : 'row-programa-civil' }}">
                                    <td class="col-horario-td">
                                        <span class="horario-badge"><i class="far fa-clock me-1 text-primary"></i> {{ $item->horario }}</span>
                                    </td>
                                    <td class="col-tema-td">
                                        <div class="tema-titulo">{{ $item->tema }}</div>
                                        <div class="d-flex flex-wrap align-items-center gap-2 mt-2">
                                            <span class="tema-programa-tag {{ $item->programa == 'Sistemas' ? 'tema-programa-sistemas' : 'tema-programa-civil' }}">
                                                {{ $item->programa ?? 'General' }}
                                            </span>
                                            <a href="{{ route('inscripcion', $item->id) }}" class="btn-inscribirse-action btn-inscribirse-mobile d-inline-flex d-md-none">
                                                <i class="fas fa-ticket-alt"></i> Inscribirse
                                            </a>
                                        </div>
                                        <div class="ponente-mobile-info d-flex align-items-center gap-2 mt-2 pt-1 border-top border-light d-md-none">
                                            <span class="fi fi-{{ $item->pais }} shadow-sm rounded-1" style="font-size: 1rem;"></span>
                                            <span class="small fw-semibold text-secondary text-truncate">{{ $item->nombre }}</span>
                                            <a href="{{ route('conferencista.show', $item->idConferencista) }}" class="btn-icon-perfil-sm ms-auto" data-bs-toggle="tooltip" title="Ver perfil del conferencista">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                        </div>
                                    </td>
                                    <td class="d-none d-md-table-cell">
                                        <div class="ponente-info">
                                            <span class="ponente-nombre">{{ $item->nombre }}</span>
                                            <a href="{{ route('conferencista.show', $item->idConferencista) }}" class="btn-icon-perfil" data-bs-toggle="tooltip" title="Ver perfil del conferencista">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                        </div>
                                    </td>
                                    <td class="text-center d-none d-md-table-cell">
                                        <span class="fi fi-{{ $item->pais }} shadow-sm rounded-1" style="font-size: 1.3rem;"></span>
                                    </td>
                                    <td class="text-center d-none d-md-table-cell">
                                        <a href="{{ route('inscripcion', $item->id) }}" class="btn-inscribirse-action">
                                            <i class="fas fa-ticket-alt"></i> Inscribirse
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="empty-state-cell">
                                        <i class="far fa-calendar-times"></i>
                                        <p class="mb-0 fw-medium">No hay conferencias programadas para este día.</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                        <tbody class="visually-hidden" id="cDos">
                            @forelse ($cDia2 as $item)
                                <tr class="{{ $item->programa == 'Sistemas' ? 'row-programa-sistemas' : 'row-programa-civil' }}">
                                    <td class="col-horario-td">
                                        <span class="horario-badge"><i class="far fa-clock me-1 text-primary"></i> {{ $item->horario }}</span>
                                    </td>
                                    <td class="col-tema-td">
                                        <div class="tema-titulo">{{ $item->tema }}</div>
                                        <div class="d-flex flex-wrap align-items-center gap-2 mt-2">
                                            <span class="tema-programa-tag {{ $item->programa == 'Sistemas' ? 'tema-programa-sistemas' : 'tema-programa-civil' }}">
                                                {{ $item->programa ?? 'General' }}
                                            </span>
                                            <a href="{{ route('inscripcion', $item->id) }}" class="btn-inscribirse-action btn-inscribirse-mobile d-inline-flex d-md-none">
                                                <i class="fas fa-ticket-alt"></i> Inscribirse
                                            </a>
                                        </div>
                                        <div class="ponente-mobile-info d-flex align-items-center gap-2 mt-2 pt-1 border-top border-light d-md-none">
                                            <span class="fi fi-{{ $item->pais }} shadow-sm rounded-1" style="font-size: 1rem;"></span>
                                            <span class="small fw-semibold text-secondary text-truncate">{{ $item->nombre }}</span>
                                            <a href="{{ route('conferencista.show', $item->idConferencista) }}" class="btn-icon-perfil-sm ms-auto" data-bs-toggle="tooltip" title="Ver perfil del conferencista">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                        </div>
                                    </td>
                                    <td class="d-none d-md-table-cell">
                                        <div class="ponente-info">
                                            <span class="ponente-nombre">{{ $item->nombre }}</span>
                                            <a href="{{ route('conferencista.show', $item->idConferencista) }}" class="btn-icon-perfil" data-bs-toggle="tooltip" title="Ver perfil del conferencista">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                        </div>
                                    </td>
                                    <td class="text-center d-none d-md-table-cell">
                                        <span class="fi fi-{{ $item->pais }} shadow-sm rounded-1" style="font-size: 1.3rem;"></span>
                                    </td>
                                    <td class="text-center d-none d-md-table-cell">
                                        <a href="{{ route('inscripcion', $item->id) }}" class="btn-inscribirse-action">
                                            <i class="fas fa-ticket-alt"></i> Inscribirse
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="empty-state-cell">
                                        <i class="far fa-calendar-times"></i>
                                        <p class="mb-0 fw-medium">No hay conferencias programadas para este día.</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                        <tbody class="visually-hidden" id="cTres">
                            @forelse ($cDia3 as $item)
                                <tr class="{{ $item->programa == 'Sistemas' ? 'row-programa-sistemas' : 'row-programa-civil' }}">
                                    <td class="col-horario-td">
                                        <span class="horario-badge"><i class="far fa-clock me-1 text-primary"></i> {{ $item->horario }}</span>
                                    </td>
                                    <td class="col-tema-td">
                                        <div class="tema-titulo">{{ $item->tema }}</div>
                                        <div class="d-flex flex-wrap align-items-center gap-2 mt-2">
                                            <span class="tema-programa-tag {{ $item->programa == 'Sistemas' ? 'tema-programa-sistemas' : 'tema-programa-civil' }}">
                                                {{ $item->programa ?? 'General' }}
                                            </span>
                                            <a href="{{ route('inscripcion', $item->id) }}" class="btn-inscribirse-action btn-inscribirse-mobile d-inline-flex d-md-none">
                                                <i class="fas fa-ticket-alt"></i> Inscribirse
                                            </a>
                                        </div>
                                        <div class="ponente-mobile-info d-flex align-items-center gap-2 mt-2 pt-1 border-top border-light d-md-none">
                                            <span class="fi fi-{{ $item->pais }} shadow-sm rounded-1" style="font-size: 1rem;"></span>
                                            <span class="small fw-semibold text-secondary text-truncate">{{ $item->nombre }}</span>
                                            <a href="{{ route('conferencista.show', $item->idConferencista) }}" class="btn-icon-perfil-sm ms-auto" data-bs-toggle="tooltip" title="Ver perfil del conferencista">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                        </div>
                                    </td>
                                    <td class="d-none d-md-table-cell">
                                        <div class="ponente-info">
                                            <span class="ponente-nombre">{{ $item->nombre }}</span>
                                            <a href="{{ route('conferencista.show', $item->idConferencista) }}" class="btn-icon-perfil" data-bs-toggle="tooltip" title="Ver perfil del conferencista">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                        </div>
                                    </td>
                                    <td class="text-center d-none d-md-table-cell">
                                        <span class="fi fi-{{ $item->pais }} shadow-sm rounded-1" style="font-size: 1.3rem;"></span>
                                    </td>
                                    <td class="text-center d-none d-md-table-cell">
                                        <a href="{{ route('inscripcion', $item->id) }}" class="btn-inscribirse-action">
                                            <i class="fas fa-ticket-alt"></i> Inscribirse
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="empty-state-cell">
                                        <i class="far fa-calendar-times"></i>
                                        <p class="mb-0 fw-medium">No hay conferencias programadas para este día.</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                        <tbody class="visually-hidden" id="cCuatro">
                            @forelse ($cDia4 as $item)
                                <tr class="{{ $item->programa == 'Sistemas' ? 'row-programa-sistemas' : 'row-programa-civil' }}">
                                    <td class="col-horario-td">
                                        <span class="horario-badge"><i class="far fa-clock me-1 text-primary"></i> {{ $item->horario }}</span>
                                    </td>
                                    <td class="col-tema-td">
                                        <div class="tema-titulo">{{ $item->tema }}</div>
                                        <div class="d-flex flex-wrap align-items-center gap-2 mt-2">
                                            <span class="tema-programa-tag {{ $item->programa == 'Sistemas' ? 'tema-programa-sistemas' : 'tema-programa-civil' }}">
                                                {{ $item->programa ?? 'General' }}
                                            </span>
                                            <a href="{{ route('inscripcion', $item->id) }}" class="btn-inscribirse-action btn-inscribirse-mobile d-inline-flex d-md-none">
                                                <i class="fas fa-ticket-alt"></i> Inscribirse
                                            </a>
                                        </div>
                                        <div class="ponente-mobile-info d-flex align-items-center gap-2 mt-2 pt-1 border-top border-light d-md-none">
                                            <span class="fi fi-{{ $item->pais }} shadow-sm rounded-1" style="font-size: 1rem;"></span>
                                            <span class="small fw-semibold text-secondary text-truncate">{{ $item->nombre }}</span>
                                            <a href="{{ route('conferencista.show', $item->idConferencista) }}" class="btn-icon-perfil-sm ms-auto" data-bs-toggle="tooltip" title="Ver perfil del conferencista">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                        </div>
                                    </td>
                                    <td class="d-none d-md-table-cell">
                                        <div class="ponente-info">
                                            <span class="ponente-nombre">{{ $item->nombre }}</span>
                                            <a href="{{ route('conferencista.show', $item->idConferencista) }}" class="btn-icon-perfil" data-bs-toggle="tooltip" title="Ver perfil del conferencista">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                        </div>
                                    </td>
                                    <td class="text-center d-none d-md-table-cell">
                                        <span class="fi fi-{{ $item->pais }} shadow-sm rounded-1" style="font-size: 1.3rem;"></span>
                                    </td>
                                    <td class="text-center d-none d-md-table-cell">
                                        <a href="{{ route('inscripcion', $item->id) }}" class="btn-inscribirse-action">
                                            <i class="fas fa-ticket-alt"></i> Inscribirse
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="empty-state-cell">
                                        <i class="far fa-calendar-times"></i>
                                        <p class="mb-0 fw-medium">No hay conferencias programadas para este día.</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- PESTAÑA: TALLERES -->
            <div class="tab-pane fade" id="talleres" role="tabpanel" aria-labelledby="talleres-tab">
                <div class="tabla-actividades-card table-responsive">
                    <table class="table tabla-actividades table-hover">
                        <thead>
                            <tr>
                                <th class="col-horario">Horario</th>
                                <th class="col-tema">Tema</th>
                                <th class="d-none d-md-table-cell" style="width: 22%;">Tallerista</th>
                                <th class="text-center d-none d-md-table-cell" style="width: 8%;">País</th>
                                <th class="text-center d-none d-md-table-cell" style="width: 10%;">Acción</th>
                            </tr>
                        </thead>
                        <tbody class="visually-hidden" id="tUno">
                            @forelse ($tDia1 as $item)
                                <tr class="{{ $item->programa == 'Sistemas' ? 'row-programa-sistemas' : 'row-programa-civil' }}">
                                    <td class="col-horario-td">
                                        <span class="horario-badge"><i class="far fa-clock me-1 text-primary"></i> {{ $item->horario }}</span>
                                    </td>
                                    <td class="col-tema-td">
                                        <div class="tema-titulo">{{ $item->tema }}</div>
                                        <div class="d-flex flex-wrap align-items-center gap-2 mt-2">
                                            <span class="tema-programa-tag {{ $item->programa == 'Sistemas' ? 'tema-programa-sistemas' : 'tema-programa-civil' }}">
                                                {{ $item->programa ?? 'General' }}
                                            </span>
                                            <a href="{{ route('inscripcion', $item->id) }}" class="btn-inscribirse-action btn-inscribirse-mobile d-inline-flex d-md-none">
                                                <i class="fas fa-ticket-alt"></i> Inscribirse
                                            </a>
                                        </div>
                                        <div class="ponente-mobile-info d-flex align-items-center gap-2 mt-2 pt-1 border-top border-light d-md-none">
                                            <span class="fi fi-{{ $item->pais }} shadow-sm rounded-1" style="font-size: 1rem;"></span>
                                            <span class="small fw-semibold text-secondary text-truncate">{{ $item->nombre }}</span>
                                            <a href="{{ route('conferencista.show', $item->idConferencista) }}" class="btn-icon-perfil-sm ms-auto" data-bs-toggle="tooltip" title="Ver perfil del tallerista">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                        </div>
                                    </td>
                                    <td class="d-none d-md-table-cell">
                                        <div class="ponente-info">
                                            <span class="ponente-nombre">{{ $item->nombre }}</span>
                                            <a href="{{ route('conferencista.show', $item->idConferencista) }}" class="btn-icon-perfil" data-bs-toggle="tooltip" title="Ver perfil del tallerista">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                        </div>
                                    </td>
                                    <td class="text-center d-none d-md-table-cell">
                                        <span class="fi fi-{{ $item->pais }} shadow-sm rounded-1" style="font-size: 1.3rem;"></span>
                                    </td>
                                    <td class="text-center d-none d-md-table-cell">
                                        <a href="{{ route('inscripcion', $item->id) }}" class="btn-inscribirse-action">
                                            <i class="fas fa-ticket-alt"></i> Inscribirse
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="empty-state-cell">
                                        <i class="far fa-calendar-times"></i>
                                        <p class="mb-0 fw-medium">No hay talleres programados para este día.</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                        <tbody class="visually-hidden" id="tDos">
                            @forelse ($tDia2 as $item)
                                <tr class="{{ $item->programa == 'Sistemas' ? 'row-programa-sistemas' : 'row-programa-civil' }}">
                                    <td class="col-horario-td">
                                        <span class="horario-badge"><i class="far fa-clock me-1 text-primary"></i> {{ $item->horario }}</span>
                                    </td>
                                    <td class="col-tema-td">
                                        <div class="tema-titulo">{{ $item->tema }}</div>
                                        <div class="d-flex flex-wrap align-items-center gap-2 mt-2">
                                            <span class="tema-programa-tag {{ $item->programa == 'Sistemas' ? 'tema-programa-sistemas' : 'tema-programa-civil' }}">
                                                {{ $item->programa ?? 'General' }}
                                            </span>
                                            <a href="{{ route('inscripcion', $item->id) }}" class="btn-inscribirse-action btn-inscribirse-mobile d-inline-flex d-md-none">
                                                <i class="fas fa-ticket-alt"></i> Inscribirse
                                            </a>
                                        </div>
                                        <div class="ponente-mobile-info d-flex align-items-center gap-2 mt-2 pt-1 border-top border-light d-md-none">
                                            <span class="fi fi-{{ $item->pais }} shadow-sm rounded-1" style="font-size: 1rem;"></span>
                                            <span class="small fw-semibold text-secondary text-truncate">{{ $item->nombre }}</span>
                                            <a href="{{ route('conferencista.show', $item->idConferencista) }}" class="btn-icon-perfil-sm ms-auto" data-bs-toggle="tooltip" title="Ver perfil del tallerista">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                        </div>
                                    </td>
                                    <td class="d-none d-md-table-cell">
                                        <div class="ponente-info">
                                            <span class="ponente-nombre">{{ $item->nombre }}</span>
                                            <a href="{{ route('conferencista.show', $item->idConferencista) }}" class="btn-icon-perfil" data-bs-toggle="tooltip" title="Ver perfil del tallerista">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                        </div>
                                    </td>
                                    <td class="text-center d-none d-md-table-cell">
                                        <span class="fi fi-{{ $item->pais }} shadow-sm rounded-1" style="font-size: 1.3rem;"></span>
                                    </td>
                                    <td class="text-center d-none d-md-table-cell">
                                        <a href="{{ route('inscripcion', $item->id) }}" class="btn-inscribirse-action">
                                            <i class="fas fa-ticket-alt"></i> Inscribirse
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="empty-state-cell">
                                        <i class="far fa-calendar-times"></i>
                                        <p class="mb-0 fw-medium">No hay talleres programados para este día.</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                        <tbody class="visually-hidden" id="tTres">
                            @forelse ($tDia3 as $item)
                                <tr class="{{ $item->programa == 'Sistemas' ? 'row-programa-sistemas' : 'row-programa-civil' }}">
                                    <td class="col-horario-td">
                                        <span class="horario-badge"><i class="far fa-clock me-1 text-primary"></i> {{ $item->horario }}</span>
                                    </td>
                                    <td class="col-tema-td">
                                        <div class="tema-titulo">{{ $item->tema }}</div>
                                        <div class="d-flex flex-wrap align-items-center gap-2 mt-2">
                                            <span class="tema-programa-tag {{ $item->programa == 'Sistemas' ? 'tema-programa-sistemas' : 'tema-programa-civil' }}">
                                                {{ $item->programa ?? 'General' }}
                                            </span>
                                            <a href="{{ route('inscripcion', $item->id) }}" class="btn-inscribirse-action btn-inscribirse-mobile d-inline-flex d-md-none">
                                                <i class="fas fa-ticket-alt"></i> Inscribirse
                                            </a>
                                        </div>
                                        <div class="ponente-mobile-info d-flex align-items-center gap-2 mt-2 pt-1 border-top border-light d-md-none">
                                            <span class="fi fi-{{ $item->pais }} shadow-sm rounded-1" style="font-size: 1rem;"></span>
                                            <span class="small fw-semibold text-secondary text-truncate">{{ $item->nombre }}</span>
                                            <a href="{{ route('conferencista.show', $item->idConferencista) }}" class="btn-icon-perfil-sm ms-auto" data-bs-toggle="tooltip" title="Ver perfil del tallerista">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                        </div>
                                    </td>
                                    <td class="d-none d-md-table-cell">
                                        <div class="ponente-info">
                                            <span class="ponente-nombre">{{ $item->nombre }}</span>
                                            <a href="{{ route('conferencista.show', $item->idConferencista) }}" class="btn-icon-perfil" data-bs-toggle="tooltip" title="Ver perfil del tallerista">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                        </div>
                                    </td>
                                    <td class="text-center d-none d-md-table-cell">
                                        <span class="fi fi-{{ $item->pais }} shadow-sm rounded-1" style="font-size: 1.3rem;"></span>
                                    </td>
                                    <td class="text-center d-none d-md-table-cell">
                                        <a href="{{ route('inscripcion', $item->id) }}" class="btn-inscribirse-action">
                                            <i class="fas fa-ticket-alt"></i> Inscribirse
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="empty-state-cell">
                                        <i class="far fa-calendar-times"></i>
                                        <p class="mb-0 fw-medium">No hay talleres programados para este día.</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                        <tbody class="visually-hidden" id="tCuatro">
                            @forelse ($tDia4 as $item)
                                <tr class="{{ $item->programa == 'Sistemas' ? 'row-programa-sistemas' : 'row-programa-civil' }}">
                                    <td class="col-horario-td">
                                        <span class="horario-badge"><i class="far fa-clock me-1 text-primary"></i> {{ $item->horario }}</span>
                                    </td>
                                    <td class="col-tema-td">
                                        <div class="tema-titulo">{{ $item->tema }}</div>
                                        <div class="d-flex flex-wrap align-items-center gap-2 mt-2">
                                            <span class="tema-programa-tag {{ $item->programa == 'Sistemas' ? 'tema-programa-sistemas' : 'tema-programa-civil' }}">
                                                {{ $item->programa ?? 'General' }}
                                            </span>
                                            <a href="{{ route('inscripcion', $item->id) }}" class="btn-inscribirse-action btn-inscribirse-mobile d-inline-flex d-md-none">
                                                <i class="fas fa-ticket-alt"></i> Inscribirse
                                            </a>
                                        </div>
                                        <div class="ponente-mobile-info d-flex align-items-center gap-2 mt-2 pt-1 border-top border-light d-md-none">
                                            <span class="fi fi-{{ $item->pais }} shadow-sm rounded-1" style="font-size: 1rem;"></span>
                                            <span class="small fw-semibold text-secondary text-truncate">{{ $item->nombre }}</span>
                                            <a href="{{ route('conferencista.show', $item->idConferencista) }}" class="btn-icon-perfil-sm ms-auto" data-bs-toggle="tooltip" title="Ver perfil del tallerista">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                        </div>
                                    </td>
                                    <td class="d-none d-md-table-cell">
                                        <div class="ponente-info">
                                            <span class="ponente-nombre">{{ $item->nombre }}</span>
                                            <a href="{{ route('conferencista.show', $item->idConferencista) }}" class="btn-icon-perfil" data-bs-toggle="tooltip" title="Ver perfil del tallerista">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                        </div>
                                    </td>
                                    <td class="text-center d-none d-md-table-cell">
                                        <span class="fi fi-{{ $item->pais }} shadow-sm rounded-1" style="font-size: 1.3rem;"></span>
                                    </td>
                                    <td class="text-center d-none d-md-table-cell">
                                        <a href="{{ route('inscripcion', $item->id) }}" class="btn-inscribirse-action">
                                            <i class="fas fa-ticket-alt"></i> Inscribirse
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="empty-state-cell">
                                        <i class="far fa-calendar-times"></i>
                                        <p class="mb-0 fw-medium">No hay talleres programados para este día.</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- PESTAÑA: PONENCIAS -->
            <div class="tab-pane fade" id="ponencias" role="tabpanel" aria-labelledby="ponencias-tab">
                <div class="tabla-actividades-card table-responsive">
                    <table class="table tabla-actividades table-hover">
                        <thead>
                            <tr>
                                <th class="col-horario">Horario</th>
                                <th class="col-tema">Tema</th>
                                <th class="d-none d-md-table-cell" style="width: 22%;">Ponente</th>
                                <th class="text-center d-none d-md-table-cell" style="width: 8%;">País</th>
                                <th class="text-center d-none d-md-table-cell" style="width: 10%;">Acción</th>
                            </tr>
                        </thead>
                        <tbody class="visually-hidden" id="pUno">
                            @forelse ($pDia1 as $item)
                                <tr class="{{ $item->programa == 'Sistemas' ? 'row-programa-sistemas' : 'row-programa-civil' }}">
                                    <td class="col-horario-td">
                                        <span class="horario-badge"><i class="far fa-clock me-1 text-primary"></i> {{ $item->horario }}</span>
                                    </td>
                                    <td class="col-tema-td">
                                        <div class="tema-titulo">{{ $item->tema }}</div>
                                        <div class="d-flex flex-wrap align-items-center gap-2 mt-2">
                                            <span class="tema-programa-tag {{ $item->programa == 'Sistemas' ? 'tema-programa-sistemas' : 'tema-programa-civil' }}">
                                                {{ $item->programa ?? 'General' }}
                                            </span>
                                            <a href="{{ route('inscripcion', $item->id) }}" class="btn-inscribirse-action btn-inscribirse-mobile d-inline-flex d-md-none">
                                                <i class="fas fa-ticket-alt"></i> Inscribirse
                                            </a>
                                        </div>
                                        <div class="ponente-mobile-info d-flex align-items-center gap-2 mt-2 pt-1 border-top border-light d-md-none">
                                            <span class="fi fi-{{ $item->pais }} shadow-sm rounded-1" style="font-size: 1rem;"></span>
                                            <span class="small fw-semibold text-secondary text-truncate">{{ $item->nombre }}</span>
                                        </div>
                                    </td>
                                    <td class="d-none d-md-table-cell">
                                        <div class="ponente-info">
                                            <span class="ponente-nombre">{{ $item->nombre }}</span>
                                        </div>
                                    </td>
                                    <td class="text-center d-none d-md-table-cell">
                                        <span class="fi fi-{{ $item->pais }} shadow-sm rounded-1" style="font-size: 1.3rem;"></span>
                                    </td>
                                    <td class="text-center d-none d-md-table-cell">
                                        <a href="{{ route('inscripcion', $item->id) }}" class="btn-inscribirse-action">
                                            <i class="fas fa-ticket-alt"></i> Inscribirse
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="empty-state-cell">
                                        <i class="far fa-calendar-times"></i>
                                        <p class="mb-0 fw-medium">No hay ponencias programadas para este día.</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                        <tbody class="visually-hidden" id="pDos">
                            @forelse ($pDia2 as $item)
                                <tr class="{{ $item->programa == 'Sistemas' ? 'row-programa-sistemas' : 'row-programa-civil' }}">
                                    <td class="col-horario-td">
                                        <span class="horario-badge"><i class="far fa-clock me-1 text-primary"></i> {{ $item->horario }}</span>
                                    </td>
                                    <td class="col-tema-td">
                                        <div class="tema-titulo">{{ $item->tema }}</div>
                                        <div class="d-flex flex-wrap align-items-center gap-2 mt-2">
                                            <span class="tema-programa-tag {{ $item->programa == 'Sistemas' ? 'tema-programa-sistemas' : 'tema-programa-civil' }}">
                                                {{ $item->programa ?? 'General' }}
                                            </span>
                                            <a href="{{ route('inscripcion', $item->id) }}" class="btn-inscribirse-action btn-inscribirse-mobile d-inline-flex d-md-none">
                                                <i class="fas fa-ticket-alt"></i> Inscribirse
                                            </a>
                                        </div>
                                        <div class="ponente-mobile-info d-flex align-items-center gap-2 mt-2 pt-1 border-top border-light d-md-none">
                                            <span class="fi fi-{{ $item->pais }} shadow-sm rounded-1" style="font-size: 1rem;"></span>
                                            <span class="small fw-semibold text-secondary text-truncate">{{ $item->nombre }}</span>
                                        </div>
                                    </td>
                                    <td class="d-none d-md-table-cell">
                                        <div class="ponente-info">
                                            <span class="ponente-nombre">{{ $item->nombre }}</span>
                                        </div>
                                    </td>
                                    <td class="text-center d-none d-md-table-cell">
                                        <span class="fi fi-{{ $item->pais }} shadow-sm rounded-1" style="font-size: 1.3rem;"></span>
                                    </td>
                                    <td class="text-center d-none d-md-table-cell">
                                        <a href="{{ route('inscripcion', $item->id) }}" class="btn-inscribirse-action">
                                            <i class="fas fa-ticket-alt"></i> Inscribirse
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="empty-state-cell">
                                        <i class="far fa-calendar-times"></i>
                                        <p class="mb-0 fw-medium">No hay ponencias programadas para este día.</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                        <tbody class="visually-hidden" id="pTres">
                            @forelse ($pDia3 as $item)
                                <tr class="{{ $item->programa == 'Sistemas' ? 'row-programa-sistemas' : 'row-programa-civil' }}">
                                    <td class="col-horario-td">
                                        <span class="horario-badge"><i class="far fa-clock me-1 text-primary"></i> {{ $item->horario }}</span>
                                    </td>
                                    <td class="col-tema-td">
                                        <div class="tema-titulo">{{ $item->tema }}</div>
                                        <div class="d-flex flex-wrap align-items-center gap-2 mt-2">
                                            <span class="tema-programa-tag {{ $item->programa == 'Sistemas' ? 'tema-programa-sistemas' : 'tema-programa-civil' }}">
                                                {{ $item->programa ?? 'General' }}
                                            </span>
                                            <a href="{{ route('inscripcion', $item->id) }}" class="btn-inscribirse-action btn-inscribirse-mobile d-inline-flex d-md-none">
                                                <i class="fas fa-ticket-alt"></i> Inscribirse
                                            </a>
                                        </div>
                                        <div class="ponente-mobile-info d-flex align-items-center gap-2 mt-2 pt-1 border-top border-light d-md-none">
                                            <span class="fi fi-{{ $item->pais }} shadow-sm rounded-1" style="font-size: 1rem;"></span>
                                            <span class="small fw-semibold text-secondary text-truncate">{{ $item->nombre }}</span>
                                        </div>
                                    </td>
                                    <td class="d-none d-md-table-cell">
                                        <div class="ponente-info">
                                            <span class="ponente-nombre">{{ $item->nombre }}</span>
                                        </div>
                                    </td>
                                    <td class="text-center d-none d-md-table-cell">
                                        <span class="fi fi-{{ $item->pais }} shadow-sm rounded-1" style="font-size: 1.3rem;"></span>
                                    </td>
                                    <td class="text-center d-none d-md-table-cell">
                                        <a href="{{ route('inscripcion', $item->id) }}" class="btn-inscribirse-action">
                                            <i class="fas fa-ticket-alt"></i> Inscribirse
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="empty-state-cell">
                                        <i class="far fa-calendar-times"></i>
                                        <p class="mb-0 fw-medium">No hay ponencias programadas para este día.</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                        <tbody class="visually-hidden" id="pCuatro">
                            @forelse ($pDia4 as $item)
                                <tr class="{{ $item->programa == 'Sistemas' ? 'row-programa-sistemas' : 'row-programa-civil' }}">
                                    <td class="col-horario-td">
                                        <span class="horario-badge"><i class="far fa-clock me-1 text-primary"></i> {{ $item->horario }}</span>
                                    </td>
                                    <td class="col-tema-td">
                                        <div class="tema-titulo">{{ $item->tema }}</div>
                                        <div class="d-flex flex-wrap align-items-center gap-2 mt-2">
                                            <span class="tema-programa-tag {{ $item->programa == 'Sistemas' ? 'tema-programa-sistemas' : 'tema-programa-civil' }}">
                                                {{ $item->programa ?? 'General' }}
                                            </span>
                                            <a href="{{ route('inscripcion', $item->id) }}" class="btn-inscribirse-action btn-inscribirse-mobile d-inline-flex d-md-none">
                                                <i class="fas fa-ticket-alt"></i> Inscribirse
                                            </a>
                                        </div>
                                        <div class="ponente-mobile-info d-flex align-items-center gap-2 mt-2 pt-1 border-top border-light d-md-none">
                                            <span class="fi fi-{{ $item->pais }} shadow-sm rounded-1" style="font-size: 1rem;"></span>
                                            <span class="small fw-semibold text-secondary text-truncate">{{ $item->nombre }}</span>
                                        </div>
                                    </td>
                                    <td class="d-none d-md-table-cell">
                                        <div class="ponente-info">
                                            <span class="ponente-nombre">{{ $item->nombre }}</span>
                                        </div>
                                    </td>
                                    <td class="text-center d-none d-md-table-cell">
                                        <span class="fi fi-{{ $item->pais }} shadow-sm rounded-1" style="font-size: 1.3rem;"></span>
                                    </td>
                                    <td class="text-center d-none d-md-table-cell">
                                        <a href="{{ route('inscripcion', $item->id) }}" class="btn-inscribirse-action">
                                            <i class="fas fa-ticket-alt"></i> Inscribirse
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="empty-state-cell">
                                        <i class="far fa-calendar-times"></i>
                                        <p class="mb-0 fw-medium">No hay ponencias programadas para este día.</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Leyenda de Programas -->
    <div class="pt-2 col-12">
        <div class="leyenda-programas-container justify-content-end">
            <span class="badge-programa-pill badge-programa-sistemas">
                <span class="dot-indicator"></span> Ingeniería de Sistemas
            </span>
            <span class="badge-programa-pill badge-programa-civil">
                <span class="dot-indicator"></span> Ingeniería Civil
            </span>
        </div>
    </div>
</div>

<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
    <div id="liveToast" class="toast  @if(Session::get('inscrito')) show @endif" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <strong class="me-auto">Semana Internacional de la Ingeniería UCC</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            Se ha inscrito satisfactoriamente al evento.
        </div>
    </div>
</div>
<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
    <div id="liveToast" class="toast  @if(Session::get('mensaje')) show @endif" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <strong class="me-auto">Semana Internacional de la Ingeniería UCC</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            {{ Session::get('mensaje') }}
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script>
        verDia(1);
        function verDia(dia) {
            // Actualizar estado activo en los botones de días
            [1, 2, 3].forEach(d => {
                const btn = document.getElementById('btnDia' + d);
                if (btn) {
                    if (d === dia) {
                        btn.classList.add('active');
                    } else {
                        btn.classList.remove('active');
                    }
                }
            });

            // Actualizar visibilidad de conferencias, talleres y ponencias
            const suffixMap = { 1: 'Uno', 2: 'Dos', 3: 'Tres', 4: 'Cuatro' };
            ['c', 't', 'p'].forEach(prefix => {
                [1, 2, 3, 4].forEach(d => {
                    const el = document.getElementById(prefix + suffixMap[d]);
                    if (el) {
                        if (d === dia) {
                            el.classList.remove('visually-hidden');
                        } else {
                            el.classList.add('visually-hidden');
                        }
                    }
                });
            });
        }
    </script>
@endsection