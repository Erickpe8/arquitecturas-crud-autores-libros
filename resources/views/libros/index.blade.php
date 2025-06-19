<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Libros</title>
    <style>
        body {
            font-family: sans-serif;
            padding: 20px;
            background-color: #f8f9fa;
        }

        h1 {
            margin-bottom: 20px;
        }

        nav {
            margin-bottom: 20px;
        }

        a.btn, button {
            padding: 8px 15px;
            margin: 5px 5px 5px 0;
            text-decoration: none;
            border-radius: 4px;
            border: none;
            color: white;
            display: inline-block;
            cursor: pointer;
        }

        .btn-azul {
            background-color: #007bff;
        }

        .btn-verde {
            background-color: #28a745;
        }

        .btn-amarillo {
            background-color: #ffc107;
            color: black;
        }

        .btn-rojo {
            background-color: #dc3545;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        table, th, td {
            border: 1px solid #ccc;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        form {
            display: inline;
        }
    </style>
</head>
<body>
    <h1>Libros</h1>

    <nav>
        <a href="/" class="btn btn-azul">Inicio</a>
        <a href="{{ route('autores.index') }}" class="btn btn-azul">Ver Autores</a>
        <a href="{{ route('libros.create') }}" class="btn btn-verde">+ Crear Libro</a>
    </nav>

    <table>
        <thead>
            <tr>
                <th>Título</th>
                <th>Género</th>
                <th>Autor</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($libros as $libro)
                <tr>
                    <td>{{ $libro->titulo }}</td>
                    <td>{{ $libro->genero }}</td>
                    <td>{{ $libro->autor->nombre }} {{ $libro->autor->apellido }}</td>
                    <td>
                        <a href="{{ route('libros.edit', $libro) }}" class="btn btn-amarillo">Editar</a>
                        <form action="{{ route('libros.destroy', $libro) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-rojo" onclick="return confirm('¿Eliminar libro?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
