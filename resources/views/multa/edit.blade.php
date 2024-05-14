@extends('layouts.main')
@section('contenido')

<form action="{{ url('/multa/'.$multa->id) }}" method="post">
@csrf
{{ method_field('PATCH')}}

@include('multa.form', ['multa' => $multa])

</form>

@endsection

