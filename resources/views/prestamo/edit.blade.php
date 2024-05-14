@extends('layouts.main')
@section('contenido')

<form action="{{ url('/prestamo/'.$prestamo->id) }}" method="post">
@csrf
{{ method_field('PATCH')}}

@include('prestamo.form', ['prestamo' => $prestamo])

</form>

@endsection

