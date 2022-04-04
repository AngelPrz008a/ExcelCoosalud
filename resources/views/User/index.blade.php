@extends('Resources.Plantilla')
@section('extends')

<table>
    <h5>Administradores Globales</h5>
    @foreach($ags as $ag)
        <tr>
            <td>{{ $ag->name }}</td>
            <td>
                <a href="{{ url('update-user/'.$ag->id) }}">edit</a>
            </td>
            <td>
                <a href="{{ url('work-user/'.$ag->id) }}">Trabajos</a>
            </td>
        </tr>
    @endforeach
</table>

<table>
    <h5>Administradores</h5>
    @foreach($as as $a)
    <tr>
        <td>{{ $a->name }}</td>
        <td>
            <a href="{{ url('update-user/'.$a->id) }}">edit</a>
        </td>
        <td>
            <a href="{{ url('work-user/'.$a->id) }}">Trabajos</a>
        </td>
    </tr>
    @endforeach
</table>

<table>
    <h5>Digitadores</h5>
    @foreach($ds as $d)
    <tr>
        <td>{{ $d->name }}</td>
        <td>
            <a href="{{ url('update-user/'.$d->id) }}">edit</a>
        </td>
        <td>
            <a href="{{ url('work-user/'.$d->id) }}">Trabajos</a>
        </td>
    </tr>
    @endforeach
</table>



<a href="{{ url('create-user') }}">Crear Usuario</a>

@endsection
