@extends('layouts.gestion')

@section('content')
    <div class="container py-5">
            @if ( Session::has( 'mensaje' ) )
                <br>
                <div class="alert alert-success alert-dismissible" role="alert">
                    {{ Session::get( 'mensaje') }}
                    {{-- 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    --}}
                </div>
            @endif

        <h1 class="fw-titulo-conf py-5">Módulo de Eventos</h1>
        <br>
        <a href="{{ url('evento/create') }}" class="btn btn-success">Registrar Evento</a>
        <br>
        <br>
        <table class="table table-light">
            <thead class="thead-light">
                <tr>
                    <th>Fecha</th>
                    <th>Horario</th>
                    <th>Tema</th>
                    <th>Conferencista</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($eventos as $evento )
                    <tr>
                        <td>{{ $evento->fecha }}</td>
                        <td>{{ $evento->horario}}</td>
                        <td>{{ $evento->tema}}</td>
                        <td>{{ $evento->conferencista}}</td>
                        <th>
                            <a href="{{ url( '/evento/' . $evento->id ) }}" class="btn btn-primary rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="Vista previa">
                                <i class="fas fa-eye"></i>
                            </a> 

                            <a href="{{ url( '/evento/' . $evento->id . '/edit' ) }}" class="btn btn-warning rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="Editar">
                                <i class="fas fa-edit"></i>
                            </a> 
                             
                            <form action="{{ url( '/evento/' . $evento->id ) }}" method="post" class="d-inline">
                                @csrf
                                {{ method_field( 'DELETE' ) }}
                                <button type="submit" class="btn btn-danger rounded-circle" onclick="return confirm( '¿Desea eliminar el evento?' )" data-bs-toggle="tooltip" data-bs-placement="top" title="Eliminar">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                                {{-- <input class="btn btn-danger rounded-circle" type="submit" value="Eliminar" onclick="return confirm( '¿Desea eliminar el conferencista?' )"> --}}
                            </form>
                        </th>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {!! $eventos->links() !!}
    </div>
@endsection