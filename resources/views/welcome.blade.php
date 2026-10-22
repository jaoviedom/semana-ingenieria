@extends('layouts.main')

@section('content')
<div class="row py-5 border-bottom"">
    <p>La VII Bienal Internacional de Ingeniería constituye un escenario de encuentro académico, científico y profesional para compartir conocimiento, impulsar la innovación y fortalecer la relación entre la universidad, el sector público, las organizaciones y la sociedad. En este marco, la programación del programa de Ingeniería de Sistemas propone una agenda conectada con los principales desafíos de la transformación digital y con las oportunidades de desarrollo del Tolima y de Colombia.</p>
    <p>Las conferencias, talleres demostrativos y espacios de conversación contemplan temas de actualidad como inteligencia artificial, computación de alto desempeño, robótica, gobernanza de IA, accesibilidad web, analítica y visualización de datos, agentes inteligentes, prácticas MLOps, ciberseguridad, software libre y soberanía tecnológica. La combinación de reflexión conceptual y experiencias prácticas busca promover aprendizajes aplicables a proyectos académicos, empresariales e institucionales.</p>
    <p class="text-center fs-2">¡Bienvenidos!</p>
</div>
<div class="row" id="programacion">
    <h2 class="py-5 fw-titulo-1">Programación</h2>
    <div class="row my-4 justify-content-center g-4 dias-selector-container">
        <div class="col-12 col-md-4 d-flex justify-content-center">
            <button class="btn btn-dia-selector active" onclick="verDia(1)" id="btnDia1" type="button">
                <span class="dia-etiqueta"><i class="fas fa-calendar-day me-1"></i> Día 1 · Miércoles</span>
                <span class="dia-numero">28</span>
                <span class="dia-mes">Octubre 2026</span>
            </button>
        </div>
        <div class="col-12 col-md-4 d-flex justify-content-center">
            <button class="btn btn-dia-selector" onclick="verDia(2)" id="btnDia2" type="button">
                <span class="dia-etiqueta"><i class="fas fa-calendar-day me-1"></i> Día 2 · Jueves</span>
                <span class="dia-numero">29</span>
                <span class="dia-mes">Octubre 2026</span>
            </button>
        </div>
        <div class="col-12 col-md-4 d-flex justify-content-center">
            <button class="btn btn-dia-selector" onclick="verDia(3)" id="btnDia3" type="button">
                <span class="dia-etiqueta"><i class="fas fa-calendar-day me-1"></i> Día 3 · Viernes</span>
                <span class="dia-numero">30</span>
                <span class="dia-mes">Octubre 2026</span>
            </button>
        </div>
    </div>
</div>

<div class="row" id="programacion-dia">
    <div>
        <span id="sistemas">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span class="ms-3">Ingeniería de Sistemas</span>
    </div>
    <div class="mb-3">
        <span id="civil">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span class="ms-3">Ingeniería Civil</span>
    </div>
    <!-- Nav tabs -->
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="conferencias-tab" data-bs-toggle="tab" data-bs-target="#conferencias" type="button" role="tab" aria-controls="conferencias" aria-selected="true">Conferencias</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="talleres-tab" data-bs-toggle="tab" data-bs-target="#talleres" type="button" role="tab" aria-controls="talleres" aria-selected="false">Talleres</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="ponencias-tab" data-bs-toggle="tab" data-bs-target="#ponencias" type="button" role="tab" aria-controls="ponencias" aria-selected="false">Ponencias</button>
        </li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content my-4">
        <div class="tab-pane overflow-auto active" id="conferencias" role="tabpanel" aria-labelledby="conferencias-tab">
            <table class="table table-hover mt-3">
                <thead>
                    <tr>
                        <th>Horario</th>
                        <th>Tema</th>
                        <th>Conferencista</th>
                        <th>País</th>
                        <th>Inscripción</th>
                    </tr>
                </thead>
                <tbody class="visually-hidden" id="cUno">
                    @foreach ($cDia1 as $item)
                        <tr class="@if($item->programa == "Sistemas") bg-blue @else bg-yellow @endif">
                            <td>{{ $item->horario }}</td>
                            <td>{{ $item->tema }}</td>
                            <td>{{ $item->nombre }}<a href="{{ route('conferencista.show', $item->idConferencista) }}" class="ms-3"><i class="fas fa-eye"></i></a></td>
                            <td class="text-center">
                                <span class="fi fi-{{ $item->pais }}"></span>
                            </td>
                            <td class="text-center">
                                <a href="{{ route('inscripcion', $item->id) }}"><i class="fas fa-sign-in-alt fa-2x"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tbody class="visually-hidden" id="cDos">
                    @foreach ($cDia2 as $item)
                        <tr class="@if($item->programa == "Sistemas") bg-blue @else bg-yellow @endif">
                            <td>{{ $item->horario }}</td>
                            <td>{{ $item->tema }}</td>
                            <td>{{ $item->nombre }}<a href="{{ route('conferencista.show', $item->idConferencista) }}" class="ms-3"><i class="fas fa-eye"></i></a></td>
                            <td class="text-center">
                                <span class="fi fi-{{ $item->pais }}"></span>
                            </td>
                            <td class="text-center">
                                <a href="{{ route('inscripcion', $item->id) }}" class=""><i class="fas fa-sign-in-alt fa-2x"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tbody class="visually-hidden" id="cTres">
                    @foreach ($cDia3 as $item)
                        <tr class="@if($item->programa == "Sistemas") bg-blue @else bg-yellow @endif">
                            <td>{{ $item->horario }}</td>
                            <td>{{ $item->tema }}</td>
                            <td>{{ $item->nombre }}<a href="{{ route('conferencista.show', $item->idConferencista) }}" class="ms-3"><i class="fas fa-eye"></i></a></td>
                            <td class="text-center">
                                <span class="fi fi-{{ $item->pais }}"></span>
                            </td>
                            <td class="text-center">
                                <a href="{{ route('inscripcion', $item->id) }}" class=""><i class="fas fa-sign-in-alt fa-2x"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tbody class="visually-hidden" id="cCuatro">
                    @foreach ($cDia4 as $item)
                        <tr class="@if($item->programa == "Sistemas") bg-blue @else bg-yellow @endif">
                            <td>{{ $item->horario }}</td>
                            <td>{{ $item->tema }}</td>
                            <td>{{ $item->nombre }}<a href="{{ route('conferencista.show', $item->idConferencista) }}" class="ms-3"><i class="fas fa-eye"></i></a></td>
                            <td class="text-center">
                                <span class="fi fi-{{ $item->pais }}"></span>
                            </td>
                            <td class="text-center">
                                <a href="{{ route('inscripcion', $item->id) }}" class=""><i class="fas fa-sign-in-alt fa-2x"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="tab-pane" id="talleres" role="tabpanel" aria-labelledby="talleres-tab">
            <table class="table table-hover mt-3">
                <thead>
                    <tr>
                        <th>Horario</th>
                        <th>Tema</th>
                        <th>Tallerista</th>
                        <th>País</th>
                        <th>Inscripción</th>
                    </tr>
                </thead>
                <tbody class="visually-hidden" id="tUno">
                    @foreach ($tDia1 as $item)
                        <tr class="@if($item->programa == "Sistemas") bg-blue @else bg-yellow @endif">
                            <td>{{ $item->horario }}</td>
                            <td>{{ $item->tema }}</td>
                            <td>{{ $item->nombre }}<a href="{{ route('conferencista.show', $item->idConferencista) }}" class="ms-3"><i class="fas fa-eye"></i></a></td>
                            <td class="text-center">
                                <span class="fi fi-{{ $item->pais }}"></span>
                            </td>
                            <td class="text-center">
                                <a href="{{ route('inscripcion', $item->id) }}" class=""><i class="fas fa-sign-in-alt fa-2x"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tbody class="visually-hidden" id="tDos">
                    @foreach ($tDia2 as $item)
                        <tr class="@if($item->programa == "Sistemas") bg-blue @else bg-yellow @endif">
                            <td>{{ $item->horario }}</td>
                            <td>{{ $item->tema }}</td>
                            <td>{{ $item->nombre }}<a href="{{ route('conferencista.show', $item->idConferencista) }}" class="ms-3"><i class="fas fa-eye"></i></a></td>
                            <td class="text-center">
                                <span class="fi fi-{{ $item->pais }}"></span>
                            </td>
                            <td class="text-center">
                                <a href="{{ route('inscripcion', $item->id) }}" class=""><i class="fas fa-sign-in-alt fa-2x"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tbody class="visually-hidden" id="tTres">
                    @foreach ($tDia3 as $item)
                        <tr class="@if($item->programa == "Sistemas") bg-blue @else bg-yellow @endif">
                            <td>{{ $item->horario }}</td>
                            <td>{{ $item->tema }}</td>
                            <td>{{ $item->nombre }}<a href="{{ route('conferencista.show', $item->idConferencista) }}" class="ms-3"><i class="fas fa-eye"></i></a></td>
                            <td class="text-center">
                                <span class="fi fi-{{ $item->pais }}"></span>
                            </td>
                            <td class="text-center">
                                <a href="{{ route('inscripcion', $item->id) }}" class=""><i class="fas fa-sign-in-alt fa-2x"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tbody class="visually-hidden" id="tCuatro">
                    @foreach ($tDia4 as $item)
                        <tr class="@if($item->programa == "Sistemas") bg-blue @else bg-yellow @endif">
                            <td>{{ $item->horario }}</td>
                            <td>{{ $item->tema }}</td>
                            <td>{{ $item->nombre }}<a href="{{ route('conferencista.show', $item->idConferencista) }}" class="ms-3"><i class="fas fa-eye"></i></a></td>
                            <td class="text-center">
                                <span class="fi fi-{{ $item->pais }}"></span>
                            </td>
                            <td class="text-center">
                                <a href="{{ route('inscripcion', $item->id) }}" class=""><i class="fas fa-sign-in-alt fa-2x"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="tab-pane" id="ponencias" role="tabpanel" aria-labelledby="ponencias-tab">
            <table class="table table-hover mt-3">
                <thead>
                    <tr>
                        <th>Horario</th>
                        <th>Tema</th>
                        <th>Ponente</th>
                        <th>País</th>
                        <th>Inscripción</th>
                    </tr>
                </thead>
                <tbody class="visually-hidden" id="pUno">
                    @foreach ($pDia1 as $item)
                        <tr class="@if($item->programa == "Sistemas") bg-blue @else bg-yellow @endif">
                            <td>{{ $item->horario }}</td>
                            <td>{{ $item->tema }}</td>
                            <td>{{ $item->nombre }}</td>
                            <td class="text-center">
                                <span class="fi fi-{{ $item->pais }}"></span>
                            </td>
                            <td class="text-center">
                                <a href="" class=""><i class="fas fa-sign-in-alt fa-2x"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tbody class="visually-hidden" id="pDos">
                    @foreach ($pDia2 as $item)
                        <tr class="@if($item->programa == "Sistemas") bg-blue @else bg-yellow @endif">
                            <td>{{ $item->horario }}</td>
                            <td>{{ $item->tema }}</td>
                            <td>{{ $item->nombre }}</td>
                            <td class="text-center">
                                <span class="fi fi-{{ $item->pais }}"></span>
                            </td>
                            <td class="text-center">
                                <a href="" class=""><i class="fas fa-sign-in-alt fa-2x"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tbody class="visually-hidden" id="pTres">
                    @foreach ($pDia3 as $item)
                        <tr class="@if($item->programa == "Sistemas") bg-blue @else bg-yellow @endif">
                            <td>{{ $item->horario }}</td>
                            <td>{{ $item->tema }}</td>
                            <td>{{ $item->nombre }}</td>
                            <td class="text-center">
                                <span class="fi fi-{{ $item->pais }}"></span>
                            </td>
                            <td class="text-center">
                                <a href="" class=""><i class="fas fa-sign-in-alt fa-2x"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tbody class="visually-hidden" id="pCuatro">
                    @foreach ($pDia4 as $item)
                        <tr class="@if($item->programa == "Sistemas") bg-blue @else bg-yellow @endif">
                            <td>{{ $item->horario }}</td>
                            <td>{{ $item->tema }}</td>
                            <td>{{ $item->nombre }}</td>
                            <td class="text-center">
                                <span class="fi fi-{{ $item->pais }}"></span>
                            </td>
                            <td class="text-center">
                                <a href="" class=""><i class="fas fa-sign-in-alt fa-2x"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
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