Formulario de creacion de libros

<form action="{{ url('/libro') }}" method="post">
@csrf


<label for="Nombre">Nombre</label>
<input type="text" name="Nombre" id="Nombre">
<br>

<label for="Tipo">Tipo</label>
<input type="text" name="Tipo" id="Tipo">
<br>

<label for="Editorial">Editorial</label>
<input type="text" name="Editorial" id="Editorial">
<br>

<label for="Año">Año</label>
<input type="text" name="Año" id="Año">
<br>

<input type="submit" value="Guardar datos">
<br>

</form>