@extends('layouts.gestion')

@section('content')
<div class="py-2">
    <form action="{{ route('evento.update', $evento->id) }}" method="post" class="needs-validation" enctype="multipart/form-data" novalidate>
        @csrf
        @method('PATCH')
        @include('evento.form', ['modo' => 'Editar'])
    </form>
</div>
@endsection