<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Libro</title>
    <style>
        body { font-family: sans-serif; padding: 20px; background-color: #f8f9fa; }
        a.btn, button {
            padding: 8px 15px; margin: 5px 5px 5px 0;
            border: none; border-radius: 4px; text-decoration: none;
            color: white; display: inline-block; cursor: pointer;
        }
        .btn-azul { background-color: #007bff; }
        .btn-amarillo { background-color: #ffc107; color: black; }
        form div { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; }
        input[type="text"], select { padding: 6px; width: 300px; }
    </style>
</head>
<body>
    <h1>Editar Libro</h1>

    <a href="{{ route('libros.index') }}" class="btn btn-azul">← Volver</a>

    <form action="{{ route('libros.update', $libro) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="titulo">Título:</label>
            <input type="text" name="titulo" id="titulo" value="{{ old('titulo', $libro->titulo) }}" required>
        </div>

        <div class="mb-3">
            <label for="genero" class="form-label">Género</label>
            <select name="genero" id="genero" class="form-select" required>
                <option value="">Selecciona un género</option>
                <option value="Novela" {{ old('genero', $libro->genero ?? '') == 'Novela' ? 'selected' : '' }}>Novela</option>
                <option value="Poesía" {{ old('genero', $libro->genero ?? '') == 'Poesía' ? 'selected' : '' }}>Poesía</option>
                <option value="Drama" {{ old('genero', $libro->genero ?? '') == 'Drama' ? 'selected' : '' }}>Drama</option>
                <option value="Ensayo" {{ old('genero', $libro->genero ?? '') == 'Ensayo' ? 'selected' : '' }}>Ensayo</option>
            </select>
        </div>

        <div>
            <label for="autor_id">Autor:</label>
            <select name="autor_id" id="autor_id" required>
                @foreach($autores as $autor)
                    <option value="{{ $autor->id }}" {{ $libro->autor_id == $autor->id ? 'selected' : '' }}>
                        {{ $autor->nombre }} {{ $autor->apellido }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-amarillo">Actualizar</button>
    </form>
</body>
</html>