<div class="grid gap-4 md:grid-cols-2">
    <div>
        <label class="mb-1 block text-sm font-medium">Nombre</label>
        <input type="text" name="nombre" value="{{ old('nombre', $autor->nombre ?? '') }}"
            class="input-fixed w-full rounded-lg border border-slate-300 px-3 py-2 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-200">
    </div>
    <div>
        <label class="mb-1 block text-sm font-medium">Nacionalidad</label>
        @php
            $nacionalidades = ['Argentina', 'Britanica', 'Chilena', 'Checa', 'Colombiana', 'Española', 'Estadounidense', 'Francesa', 'Italiana', 'Mexicana', 'Peruana', 'Portuguesa', 'Uruguaya', 'Venezolana'];
        @endphp
        <select name="nacionalidad"
            class="input-fixed w-full rounded-lg border border-slate-300 px-3 py-2 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-200">
            <option value="">Seleccione una nacionalidad...</option>
            @foreach ($nacionalidades as $nacionalidad)
                <option value="{{ $nacionalidad }}" @selected(old('nacionalidad', $autor->nacionalidad ?? '') === $nacionalidad)>{{ $nacionalidad }}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="mt-4">
    <label class="mb-1 block text-sm font-medium">Fecha de nacimiento</label>
    <input type="date" name="fecha_nacimiento" value="{{ old('fecha_nacimiento', $autor->fecha_nacimiento ?? '') }}"
        class="input-fixed w-full rounded-lg border border-slate-300 px-3 py-2 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-200">
</div>
<div class="mt-4">
    <label class="mb-1 block text-sm font-medium">Biografía</label>
    <textarea name="biografia" rows="5"
        class="text-scroll-invisible w-full rounded-lg border border-slate-300 px-3 py-2 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-200">{{ old('biografia', $autor->biografia ?? '') }}</textarea>
</div>
