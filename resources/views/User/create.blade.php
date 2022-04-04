@extends('Resources.Plantilla')
@section('extends')

<form action="{{ url('create-user') }}" method="post">
@csrf
    <label for="">Nombre</label>
    <input type="text" name="name">

    <label for="">Correo</label>
    <input type="text" name="email">

    <label for="">Cargo</label>
    <select name="role">
        <option name="role" value="">Seleccione</option>
        <option name="role" value="1">Administrador Global</option>
        <option name="role" value="2">Adminsitrador</option>
        <option name="role" value="3">Digitadores</option>
    </select>

    <button type="submit">Enviar</button>
</form>

@endsection
