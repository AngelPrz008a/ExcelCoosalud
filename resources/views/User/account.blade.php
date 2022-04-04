@extends('Resources.Plantilla')
@section('extends')

<form action="{{ url('account') }}" method="POST">
@csrf
    <input type="text" name="name" value="{{ Auth::user()->name }}">
    <input type="text" name="email" value="{{ Auth::user()->email }}">
    <input type="password" name="password" value="{{ decrypt( Auth::user()->password) }}">

    <input type="submit" value="Enviar">

</form>

Rol:

@switch( Auth::user()->role )
    @case(1)
        {{ $role = 'Adminsitrador Global' }}
    @break
    @case(2)
        {{ $role = 'Adminsitrador' }}
    @break
    @case(3)
        {{ $role = 'Digitador' }}
    @break
@endswitch


@endsection
