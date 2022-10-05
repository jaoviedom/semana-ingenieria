@extends('layouts.gestion')

@section('content')
    <div class="container">
        <form action="{{ url( '/evento/' . $evento->id ) }}" method="POST"  enctype="multipart/form-data">
            @csrf
            {{ method_field( 'PATCH' ) }}
            @include('evento.form', [ 'modo' => 'Editar' ])
        </form>

    </div>
@endsection