@extends('layouts.gestion')

@section('content')
    <div class="container">

        <form action="{{ url( '/evento/' )}}" class="needs-validation" method="post" enctype="multipart/form-data" novalidate>
            @csrf
            @include('evento.form', [ 'modo' => 'Crear' ])
        </form>
    </div>
@endsection