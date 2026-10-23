@extends('layouts.gestion')

@section('content')
<div class="py-2">
    <form action="{{ route('evento.store') }}" method="post" class="needs-validation" enctype="multipart/form-data" novalidate>
        @csrf
        @include('evento.form', ['modo' => 'Crear'])
    </form>
</div>
@endsection