@extends('Resources.Plantilla')
@section('extends')

<form action="{{ url('work-create') }}" method="post"  enctype="multipart/form-data">
    @csrf

    <input type="text" name="id" value="{{ $user }}" style="display: none">

    <input type="text" name="name">

    <input type="file" name="document">

    <input type="submit" value="Enviar">
</form>

@endsection
