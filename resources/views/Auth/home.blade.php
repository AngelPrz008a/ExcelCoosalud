@extends('Resources.Plantilla')
@section('extends')

Bienvenido {{ Auth::user()->name }} -

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
