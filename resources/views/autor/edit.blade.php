<!-- Formulario de edición de autores -->
@extends('layouts.main')
@section('contenido')

<form action="{{ url('/autor/'.$autor->id) }}" method="post">
@csrf
{{ method_field('PATCH')}}

@include('autor.form')

</form>

@endsection