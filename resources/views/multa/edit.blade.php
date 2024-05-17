@extends('layouts.main')
@section('contenido')
    <!-- Mensajes de errores -->
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <!-- -->

    <form action="{{ url('/multa/' . $multa->id) }}" method="post">
        @csrf
        {{ method_field('PATCH') }}

        @include('multa.form', ['multa' => $multa])

    </form>

@endsection
