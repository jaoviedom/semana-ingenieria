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

        <h1 class="fw-titulo-conf py-5">Módulo de Conferencistas</h1>
        <br>
        <a href="{{ url('conferencista/create') }}" class="btn btn-success">Registrar conferencista</a>
        <br>
        <br>
        <table class="table table-light">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>Foto</th>
                    <th>País</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($conferencistas as $conferencista )
                    <tr>
                        <td>{{ $conferencista->id}}</td>
                        <td>
                            <img class="img-thumbnail img-fluid" src="{{ asset('storage') . '/' . $conferencista->foto }}" width="50" alt="">
                        </td>
                        <td><span class="fi fi-{{ $conferencista->pais }}"></span></td>
                        <td>{{ $conferencista->nombre}}</td>
                        <th>
                            <a href="{{ url( '/conferencista/' . $conferencista->id ) }}" class="btn btn-primary rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="Vista previa">
                                <i class="fas fa-eye"></i>
                            </a> 

                            <a href="{{ url( '/conferencista/' . $conferencista->id . '/edit' ) }}" class="btn btn-warning rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="Editar">
                                <i class="fas fa-edit"></i>
                            </a> 
                             
                            <form action="{{ url( '/conferencista/' . $conferencista->id ) }}" method="post" class="d-inline">
                                @csrf
                                {{ method_field( 'DELETE' ) }}
                                <button type="submit" class="btn btn-danger rounded-circle" onclick="return confirm( '¿Desea eliminar el conferencista?' )" data-bs-toggle="tooltip" data-bs-placement="top" title="Eliminar">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                                {{-- <input class="btn btn-danger rounded-circle" type="submit" value="Eliminar" onclick="return confirm( '¿Desea eliminar el conferencista?' )"> --}}
                            </form>
                        </th>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {!! $conferencistas->links() !!}
    </div>
@endsection