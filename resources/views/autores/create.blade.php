<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Autor</title>
    <style>
        body { font-family: sans-serif; padding: 20px; background-color: #f8f9fa; }
        a.btn, button {
            padding: 8px 15px; margin: 5px 5px 5px 0;
            border: none; border-radius: 4px; text-decoration: none;
            color: white; display: inline-block; cursor: pointer;
        }
        .btn-azul { background-color: #007bff; }
        .btn-verde { background-color: #28a745; }
        form div { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; }
        input[type="text"] { padding: 6px; width: 300px; }
    </style>
</head>
<body>
    <h1>Crear Autor</h1>

    <a href="{{ route('autores.index') }}" class="btn btn-azul">← Volver</a>

    <form action="{{ route('autores.store') }}" method="POST">
        @csrf
        <div>
            <label for="nombre">Nombre del autor:</label>
            <input type="text" name="nombre" id="nombre" required>
        </div>
        <div>
        <label for="apellido">Apellido del autor:</label>
        <input type="text" name="apellido" id="apellido" required>
    </div>

        <button type="submit" class="btn btn-verde">Guardar</button>
    </form>
</body>
</html>