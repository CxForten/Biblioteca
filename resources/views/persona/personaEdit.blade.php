<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{url('autor', $autor->id)}}" method="POST">
        @csrf
        @method('put')
        <h3>Actualizar registro</h3>
        <label for="nombre">Nombre</label><br>
        <input type="text" id="nombre" name="nombre" value="{{$autor->nombre}}">
        <br>
        <hr>
        <button type="submit">Registrar</button>
    </form>
</body>
</html>