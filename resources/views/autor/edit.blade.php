<!-- Formulario de edición de libros -->
@extends('layouts.main')
@section('contenido')

<form action="{{ url('/libro/'.$libro->id) }}" method="post">
@csrf
{{ method_field('PATCH')}}

@include('libro.form')

</form>

@endsection