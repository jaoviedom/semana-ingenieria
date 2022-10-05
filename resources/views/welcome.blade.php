@extends('layouts.main')

@section('content')
<div class="row py-5 border-bottom"">
    <p>La Semana Internacional de Ingenierías, se ha convertido a lo largo de sus versiones anuales en un referente académico para los estudiantes y público externo relacionados o vinculados con la Ingeniería civil y la Ingeniería de sistemas, siendo estos programas activos en el Campus Ibagué-El Espinal, de la Universidad Cooperativa de Colombia.</p>
    <p>En este marco académico se desarrollan conferencias en temas de vanguardia con invitados de orden nacional e internacional, se desarrollan talleres en temas específicos para distintos públicos, concursos de corte académico para los estudiantes, presentación de ponencias de los semilleros de investigación, presentación de posters de los trabajos finales de curso, en fin, bastantes actividades para convertir a la "VI Semana Internacional de Ingenierías", en un evento que nos muestre la importancia de las disciplinas en el entorno global al cual pertenecemos.</p>
    <p class="text-center fs-2">¡Bienvenidos!</p>
</div>
<div class="row" id="programacion">
    <h2 class="py-5 fw-titulo-1">Programación</h2>
    <div class="row my-4 px-0 mx-0 pb-md-4">
        <div class="col-6 col-md-3 text-center mb-4 mb-md-0">
            <button class="btn btn-outline-info lh-1 me-3" onclick="verDia(1)" id="btnDia1">
                <span class="d-block">17</span>
                <span class="d-block fs-6">Mayo</span>
            </button>
        </div>
        <div class="col-6 col-md-3 text-center mb-4 mb-md-0">
            <button class="btn btn-outline-info lh-1 me-3" onclick="verDia(2)" id="btnDia2">
                <span class="d-block">18</span>
                <span class="d-block fs-6">Mayo</span>
            </button>
        </div>
        <div class="col-6 col-md-3 text-center mb-4 mb-md-0">
            <button class="btn btn-outline-info lh-1 me-3" onclick="verDia(3)" id="btnDia3">
                <span class="d-block">19</span>
                <span class="d-block fs-6">Mayo</span>
            </button>
        </div>
        <div class="col-6 col-md-3 text-center">
            <button class="btn btn-outline-info lh-1 me-3" onclick="verDia(4)" id="btnDia4">
                <span class="d-block">20</span>
                <span class="d-block fs-6">Mayo</span>
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
            switch(dia) {
                case 1:
                    document.getElementById('btnDia1').classList.add('active');
                    document.getElementById('btnDia2').classList.remove('active');
                    document.getElementById('btnDia3').classList.remove('active');
                    document.getElementById('btnDia4').classList.remove('active');
                    document.getElementById('cUno').classList.remove('visually-hidden');
                    document.getElementById('cDos').classList.add('visually-hidden');
                    document.getElementById('cTres').classList.add('visually-hidden');
                    document.getElementById('cCuatro').classList.add('visually-hidden');
                    document.getElementById('tUno').classList.remove('visually-hidden');
                    document.getElementById('tDos').classList.add('visually-hidden');
                    document.getElementById('tTres').classList.add('visually-hidden');
                    document.getElementById('tCuatro').classList.add('visually-hidden');
                    document.getElementById('pUno').classList.remove('visually-hidden');
                    document.getElementById('pDos').classList.add('visually-hidden');
                    document.getElementById('pTres').classList.add('visually-hidden');
                    document.getElementById('pCuatro').classList.add('visually-hidden');
                    break;
                case 2:
                    document.getElementById('btnDia2').classList.add('active');
                    document.getElementById('btnDia1').classList.remove('active');
                    document.getElementById('btnDia3').classList.remove('active');
                    document.getElementById('btnDia4').classList.remove('active');
                    document.getElementById('cDos').classList.remove('visually-hidden');
                    document.getElementById('cUno').classList.add('visually-hidden');
                    document.getElementById('cTres').classList.add('visually-hidden');
                    document.getElementById('cCuatro').classList.add('visually-hidden');
                    document.getElementById('tDos').classList.remove('visually-hidden');
                    document.getElementById('tUno').classList.add('visually-hidden');
                    document.getElementById('tTres').classList.add('visually-hidden');
                    document.getElementById('tCuatro').classList.add('visually-hidden');
                    document.getElementById('pDos').classList.remove('visually-hidden');
                    document.getElementById('pUno').classList.add('visually-hidden');
                    document.getElementById('pTres').classList.add('visually-hidden');
                    document.getElementById('pCuatro').classList.add('visually-hidden');
                    break;
                case 3:
                    document.getElementById('btnDia3').classList.add('active');
                    document.getElementById('btnDia2').classList.remove('active');
                    document.getElementById('btnDia1').classList.remove('active');
                    document.getElementById('btnDia4').classList.remove('active');
                    document.getElementById('cTres').classList.remove('visually-hidden');
                    document.getElementById('cDos').classList.add('visually-hidden');
                    document.getElementById('cUno').classList.add('visually-hidden');
                    document.getElementById('cCuatro').classList.add('visually-hidden');
                    document.getElementById('tTres').classList.remove('visually-hidden');
                    document.getElementById('tDos').classList.add('visually-hidden');
                    document.getElementById('tUno').classList.add('visually-hidden');
                    document.getElementById('tCuatro').classList.add('visually-hidden');
                    document.getElementById('pTres').classList.remove('visually-hidden');
                    document.getElementById('pDos').classList.add('visually-hidden');
                    document.getElementById('pUno').classList.add('visually-hidden');
                    document.getElementById('pCuatro').classList.add('visually-hidden');
                    break;
                case 4:
                    document.getElementById('btnDia4').classList.add('active');
                    document.getElementById('btnDia2').classList.remove('active');
                    document.getElementById('btnDia3').classList.remove('active');
                    document.getElementById('btnDia1').classList.remove('active');
                    document.getElementById('cCuatro').classList.remove('visually-hidden');
                    document.getElementById('cDos').classList.add('visually-hidden');
                    document.getElementById('cTres').classList.add('visually-hidden');
                    document.getElementById('cUno').classList.add('visually-hidden');
                    document.getElementById('tCuatro').classList.remove('visually-hidden');
                    document.getElementById('tDos').classList.add('visually-hidden');
                    document.getElementById('tTres').classList.add('visually-hidden');
                    document.getElementById('tUno').classList.add('visually-hidden');
                    document.getElementById('pCuatro').classList.remove('visually-hidden');
                    document.getElementById('pDos').classList.add('visually-hidden');
                    document.getElementById('pTres').classList.add('visually-hidden');
                    document.getElementById('pUno').classList.add('visually-hidden');
                    break;
            }
        }
    </script>
@endsection