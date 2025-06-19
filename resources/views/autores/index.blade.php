<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Autores</title>
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
    <h1>Autores</h1>

    <nav>
        <a href="/" class="btn btn-azul">Inicio</a>
        <a href="{{ route('libros.index') }}" class="btn btn-azul">Ver Libros</a>
        <a href="{{ route('autores.create') }}" class="btn btn-verde">+ Crear Autor</a>
    </nav>

    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Número de Libros</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($autores as $autor)
                <tr>
                    <td>{{ $autor->nombre }} {{ $autor->apellido }}</td>
                    <td>{{ $autor->libros_count }}</td>
                    <td>
                        <a href="{{ route('autores.edit', $autor) }}" class="btn btn-amarillo">Editar</a>
                        <form action="{{ route('autores.destroy', $autor) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-rojo" onclick="return confirm('¿Eliminar autor?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

