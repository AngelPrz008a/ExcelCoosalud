@extends('Resources.Plantilla')
@section('extends')


@foreach ($user as $u )
<form action="{{ url('update-user/'.$u->id) }}" method="post">
@csrf


    <label for="">Nombre</label>
    <input type="text" name="name" value="{{ $u->name }}">

    <label for="">Correo</label>
    <input type="text" name="email" value="{{ $u->email }}">

    <label for="">Cargo</label>
    <select name="role">
        <option name="role" value="">Seleccione</option>
        <option name="role" value="1" {{ $u->role == "1" ? 'selected' :  ''}}>Administrador Global</option>
        <option name="role" value="2" {{ $u->role == "2" ? 'selected' :  ''}}>Adminsitrador</option>
        <option name="role" value="3" {{ $u->role == "3" ? 'selected' :  ''}}>Digitadores</option>
    </select>

    <label for="">Estado</label>
    <select name="state">
        <option {{ $u->state == "1" ? 'selected' : '' }} name="state" value="1">ACTIVO</option>
        <option {{ $u->state == "2" ? 'selected' : '' }} name="state" value="2">SUSPENDIDO</option>
        <option {{ $u->state == "3" ? 'selected' : '' }} name="state" value="3">BLOQUEADO</option>
    </select>

    <label for="">Clave</label>
    <input type="text" name="password" value="{{ decrypt($u->password) }}">

    <button type="sub mit">Enviar</button>


</form>
@endforeach



@endsection
