<h1>Form</h1>

<form action="{{ url('import') }}" method="post" enctype="multipart/form-data">

@csrf

    <input type="file" name="document">
    <br>
    <button type="submit">Activar</button>

</form>

