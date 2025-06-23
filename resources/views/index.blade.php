<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Autores y Libros</title>
    <style>
        body {
            font-family: sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-image: url('https://i.pinimg.com/736x/22/ac/68/22ac689a687ac634266194fec016ab87.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            min-height: 100vh;
            margin: 0;
        }

        .contenedor {
            text-align: center;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px #ccc;
        }

        h1 {
            margin-bottom: 20px;
        }

        a {
            display: inline-block;
            margin: 10px;
            padding: 10px 20px;
            background: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        a:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>
    <div class="contenedor">
        <h1>Crud con arquitectura DDD</h1>
        <h1>Bienvenido</h1>
        <p>Selecciona el módulo al que deseas entrar:</p>
        <a href="{{ route('autores.index') }}">CRUD de Autores</a>
        <a href="{{ route('libros.index') }}">CRUD de Libros</a>
    </div>
</body>
</html>