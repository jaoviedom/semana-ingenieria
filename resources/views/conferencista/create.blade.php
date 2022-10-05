@extends('layouts.gestion')

@section('content')
    <div class="container">

        <form action="{{ url( '/conferencista/' )}}" method="post" class="needs-validation" method="post" enctype="multipart/form-data" novalidate>
            @csrf
            @include('conferencista.form', [ 'modo' => 'Crear' ])
        </form>
    </div>
@endsection