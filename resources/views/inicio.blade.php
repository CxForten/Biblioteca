<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{url('indexAutor')}}" method="get">
        @csrf
        <button>Autores</button>
    </form>
    <br>
    <form action="{{url('indexLibro')}}" method="get">
        @csrf
        <button>Libros</button>
    </form>
</body>
</html>