<div class="grid gap-4 md:grid-cols-2">
    <div>
        <label class="mb-1 block text-sm font-medium">Título</label>
        <input type="text" name="titulo" value="{{ old('titulo', $libro->titulo ?? '') }}"
            class="w-full rounded-lg border border-slate-300 px-3 py-2 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-200">
    </div>
    <div>
        <label class="mb-1 block text-sm font-medium">Autor</label>
        <select name="autor_id"
            class="w-full rounded-lg border border-slate-300 px-3 py-2 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-200">
            <option value="">Seleccione...</option>
            @foreach ($autores as $id => $nombre)
                <option value="{{ $id }}" @selected(old('autor_id', $libro->autor_id ?? '') == $id)>{{ $nombre }}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="mt-4 grid gap-4 md:grid-cols-3">
    <div>
        <label class="mb-1 block text-sm font-medium">ISBN</label>
        <input type="text" name="isbn" value="{{ old('isbn', $libro->isbn ?? '') }}"
            class="w-full rounded-lg border border-slate-300 px-3 py-2 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-200">
    </div>
    <div>
        <label class="mb-1 block text-sm font-medium">Género</label>
        <input type="text" name="genero" value="{{ old('genero', $libro->genero ?? '') }}"
            class="w-full rounded-lg border border-slate-300 px-3 py-2 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-200">
    </div>
    <div>
        <label class="mb-1 block text-sm font-medium">Fecha de publicación</label>
        <input type="date" name="fecha_publicacion" value="{{ old('fecha_publicacion', $libro->fecha_publicacion ?? '') }}"
            class="w-full rounded-lg border border-slate-300 px-3 py-2 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-200">
    </div>
</div>

<div class="mt-4">
    <label class="mb-1 block text-sm font-medium">Descripción</label>
    <textarea name="descripcion" rows="5"
        class="w-full rounded-lg border border-slate-300 px-3 py-2 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-200">{{ old('descripcion', $libro->descripcion ?? '') }}</textarea>
</div>

<div class="mt-4">
    <label class="mb-1 block text-sm font-medium">Portada</label>
    <input type="file" name="portada" accept="image/*"
        class="w-full rounded-lg border border-slate-300 bg-white px-3 py-2 text-sm file:mr-3 file:rounded file:border-0 file:bg-slate-900 file:px-3 file:py-2 file:text-white hover:file:bg-slate-700">
</div>
