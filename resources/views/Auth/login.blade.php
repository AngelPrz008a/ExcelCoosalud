@extends('Resources.Plantilla')
@section('extends')

<form action="{{ url('login') }}" method="post">
@csrf

<input type="text" name="email" placeholder="Correo">

<input type="password" name="password" placeholder="Clave">

<input type="submit" value="Iniciar Sesión">

</form>

@endsection
