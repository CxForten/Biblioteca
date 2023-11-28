<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{url('autor')}}" method="POST">
        @csrf
        <h3>Registro de autores</h3>
        <label for="nombre">Nombre</label><br>
        <input type="text" id="nombre" name="nombre">
        <br>
        <hr>
        <button type="submit">Registrar</button>
    </form>
    <br>
    <table border="1">
        <thead>
            <tr>
                <th>Id</th>
                <th>Autor</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($autores as $autor)
            <tr>
                <td>{{$autor->id}}</td>
                <td>{{$autor->nombre}}</td>
                <td>
                    <form action="{{url('autor', $autor->id)}}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit">Eliminar</button>
                    </form>
                </td>
                <td>
                    <form action="{{url('autor', $autor->id)}}" method="get">
                        @csrf
                        <button type="submit">Actualizar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>