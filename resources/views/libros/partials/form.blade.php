<div class="grid gap-4 md:grid-cols-2">
    <div>
        <label class="mb-1 block text-sm font-medium">Título</label>
        <input type="text" name="titulo" value="{{ old('titulo', $libro->titulo ?? '') }}"
            class="input-fixed w-full rounded-lg border border-slate-300 px-3 py-2 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-200">
    </div>
    <div>
        <label class="mb-1 block text-sm font-medium">Autor</label>
        <select name="autor_id"
            class="input-fixed w-full rounded-lg border border-slate-300 px-3 py-2 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-200">
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
            class="input-fixed w-full rounded-lg border border-slate-300 px-3 py-2 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-200">
    </div>
    <div>
        <label class="mb-1 block text-sm font-medium">Género</label>
        <select name="genero"
            class="input-fixed w-full rounded-lg border border-slate-300 px-3 py-2 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-200">
            <option value="">Seleccione...</option>
            @foreach ($generos as $item)
                <option value="{{ $item }}" @selected(old('genero', $libro->genero ?? '') === $item)>{{ $item }}</option>
            @endforeach
        </select>
    </div>
    <div>
        <label class="mb-1 block text-sm font-medium">Fecha de publicación</label>
        <input type="date" name="fecha_publicacion" value="{{ old('fecha_publicacion', $libro->fecha_publicacion ?? '') }}"
            class="input-fixed w-full rounded-lg border border-slate-300 px-3 py-2 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-200">
    </div>
</div>

<div class="mt-4">
    <label class="mb-1 block text-sm font-medium">Descripción</label>
    <textarea name="descripcion" rows="5"
        class="text-scroll-invisible w-full rounded-lg border border-slate-300 px-3 py-2 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-200">{{ old('descripcion', $libro->descripcion ?? '') }}</textarea>
</div>

<div class="mt-4">
    <p class="mb-2 block text-sm font-medium">Portada</p>
    <div class="flex items-center justify-center w-full">
        <label for="dropzone-file" id="dropzone-label"
            class="flex h-64 w-full cursor-pointer flex-col items-center justify-center rounded-lg border border-dashed border-slate-400 bg-slate-100 hover:bg-slate-200">
            <div class="flex flex-col items-center justify-center pb-6 pt-5 text-slate-600">
                <svg class="mb-4 h-8 w-8" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h3a3 3 0 0 0 0-6h-.025a5.56 5.56 0 0 0 .025-.5A5.5 5.5 0 0 0 7.207 9.021C7.137 9.017 7.071 9 7 9a4 4 0 1 0 0 8h2.167M12 19v-9m0 0-2 2m2-2 2 2"/>
                </svg>
                <p class="mb-2 text-sm">
                    <span class="font-semibold">Click para subir</span> o arrastra y suelta
                </p>
                <p class="text-xs">PNG, JPG, JPEG o GIF (max 2MB)</p>
                <p id="dropzone-filename" class="mt-2 text-xs font-medium text-indigo-600"></p>
            </div>
            <input id="dropzone-file" type="file" name="portada" accept="image/*" class="hidden" />
        </label>
    </div>
    <p class="mt-1 text-xs text-slate-500">Si no subes imagen, se genera automaticamente una portada con el nombre del libro.</p>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const input = document.getElementById('dropzone-file');
        const label = document.getElementById('dropzone-label');
        const filename = document.getElementById('dropzone-filename');

        if (!input || !label || !filename) return;

        const updateName = () => {
            filename.textContent = input.files && input.files[0] ? `Archivo: ${input.files[0].name}` : '';
        };

        ['dragenter', 'dragover'].forEach((event) => {
            label.addEventListener(event, (e) => {
                e.preventDefault();
                label.classList.add('border-indigo-500', 'bg-indigo-50');
            });
        });

        ['dragleave', 'drop'].forEach((event) => {
            label.addEventListener(event, (e) => {
                e.preventDefault();
                label.classList.remove('border-indigo-500', 'bg-indigo-50');
            });
        });

        input.addEventListener('change', updateName);
    });
</script>

