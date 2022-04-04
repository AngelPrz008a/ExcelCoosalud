@extends('Resources.Plantilla')
@section('extends')

<h5>{{ $user->name }}</h5>

@if (Auth::user()->role == 1 || Auth::user()->role == 2)
<a href="{{ url('work-create/'.$user->id) }}">Crear trabajo</a>
@endif


@foreach ($works as $work )
    <table>
        <tr>
            <td>
                {{ $work->name }}
            </td>
            <td>
                {{ $work->state }}
            </td>
            <td>
                {{ $work->dateCreate }}
            </td>
            @if (Auth::user()->role == 1 || Auth::user()->role == 2)
                <td>
                    <a href="{{ url('work-update/'.$work->id) }}">Modificar</a>
                </td>
            @else
                <td>
                    <a href="{{ url('work-show/'.$work->id) }}">Ver</a>
                </td>
            @endif
        </tr>
    </table>
@endforeach

@endsection
