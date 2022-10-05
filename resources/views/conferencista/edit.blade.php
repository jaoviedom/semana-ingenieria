@extends('layouts.gestion')

@section('content')
    <div class="container">
        <form action="{{ url( '/conferencista/' . $conferencista->id ) }}" class="needs-validation" method="POST"  enctype="multipart/form-data" novalidate>
            @csrf
            {{ method_field( 'PATCH' ) }}
            @include('conferencista.form', [ 'modo' => 'Editar' ])
        </form>

    </div>
@endsection