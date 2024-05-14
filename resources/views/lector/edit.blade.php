<!-- Formulario de edición de lectores -->
@extends('layouts.main')
@section('contenido')

<form action="{{ url('/lector/'.$lector->NumSocio) }}" method="post">
@csrf
{{ method_field('PATCH')}}

@include('lector.form')

</form>

@endsection