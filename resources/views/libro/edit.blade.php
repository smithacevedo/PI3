<!-- Formulario de edición de libros -->

<form action="{{ url('/libro/'.$libro->id) }}" method="post">
@csrf
{{ method_field('PATCH')}}

@include('libro.form')

</form>