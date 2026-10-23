@extends('layouts.gestion')

@section('content')
<div class="py-2">
    <form action="{{ route('conferencista.update', $conferencista->id) }}" method="post" class="needs-validation" enctype="multipart/form-data" novalidate>
        @csrf
        @method('PATCH')
        @include('conferencista.form', ['modo' => 'Editar'])
    </form>
</div>
@endsection