@extends('Resources.Plantilla')
@section('extends')

<form action="{{ url('work-update/'.$work->id) }}" method="post" enctype="multipart/form-data">
    @csrf

    <input type="text" name="name" value="{{ $work->name }}">

    <select name="state">
        <option {{ $work->state == "NUEVO" ? 'selected' : '' }} name="state" value="NUEVO">NUEVO</option>
        <option {{ $work->state == "POR EVALUAR" ? 'selected' : '' }} name="state" value="POR EVALUAR">POR EVALUAR</option>
        <option {{ $work->state == "FINALIZADO" ? 'selected' : '' }} name="state" value="FINALIZADO">FINALIZADO</option>
        <option {{ $work->state == "POR TERMINAR" ? 'selected' : '' }} name="state" value="POR TERMINAR">POR TERMINAR</option>
        <option {{ $work->state == "SUSPENDIDO" ? 'selected' : '' }} name="state" value="SUSPENDIDO">SUSPENDIDO</option>
    </select>

    <input type="file" name="document">

    <input type="submit" value="Enviar">
</form>

@if (!empty($excels))
{{-- <table>
    @foreach ($excels as $excel)
    <tr>
        <td>{{ $excel->system }}</td>
        <td>{{ $excel->state }}</td>
    </tr>
    @endforeach
</table> --}}

@include('Excel.show')

@else

<p>Sin datos</p>

@endif

@endsection
