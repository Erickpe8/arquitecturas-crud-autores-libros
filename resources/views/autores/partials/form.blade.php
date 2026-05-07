<div class="grid gap-4 md:grid-cols-2">
    <div>
        <label class="mb-1 block text-sm font-medium">Nombre</label>
        <input type="text" name="nombre" value="{{ old('nombre', $autor->nombre ?? '') }}"
            class="w-full rounded-lg border border-slate-300 px-3 py-2 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-200">
    </div>
    <div>
        <label class="mb-1 block text-sm font-medium">Nacionalidad</label>
        <input type="text" name="nacionalidad" value="{{ old('nacionalidad', $autor->nacionalidad ?? '') }}"
            class="w-full rounded-lg border border-slate-300 px-3 py-2 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-200">
    </div>
</div>
<div class="mt-4">
    <label class="mb-1 block text-sm font-medium">Fecha de nacimiento</label>
    <input type="date" name="fecha_nacimiento" value="{{ old('fecha_nacimiento', $autor->fecha_nacimiento ?? '') }}"
        class="w-full rounded-lg border border-slate-300 px-3 py-2 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-200">
</div>
<div class="mt-4">
    <label class="mb-1 block text-sm font-medium">Biografía</label>
    <textarea name="biografia" rows="5"
        class="w-full rounded-lg border border-slate-300 px-3 py-2 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-200">{{ old('biografia', $autor->biografia ?? '') }}</textarea>
</div>
