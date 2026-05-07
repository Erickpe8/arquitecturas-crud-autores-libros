@extends('layouts.app')

@section('title', 'Autores')

@section('content')
    <div class="mb-6 flex flex-wrap items-end justify-between gap-3">
        <div>
            <h1 class="text-2xl font-bold">Autores</h1>
            <p class="text-sm text-slate-600">Consulta y administra autores registrados.</p>
        </div>
        <a href="{{ route('autores.create') }}" class="rounded-lg bg-slate-900 px-4 py-2 text-sm font-medium text-white hover:bg-slate-700">
            Crear autor
        </a>
    </div>

    <form method="GET" class="mb-6 rounded-xl bg-white p-4 shadow">
        <div class="flex gap-3">
            <input type="text" name="search" value="{{ $search }}" placeholder="Buscar autor por nombre..."
                class="input-fixed w-full rounded-lg border border-slate-300 px-3 py-2 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-200">
            <button type="submit" class="text-fg-brand bg-neutral-primary border border-brand hover:bg-brand hover:text-white focus:ring-4 focus:ring-brand-subtle font-medium leading-5 rounded-base text-xs px-3 py-2 focus:outline-none">Buscar</button>
        </div>
    </form>

    <div class="overflow-hidden rounded-xl bg-white shadow">
        <table class="w-full text-left text-sm">
            <thead class="bg-slate-100 text-slate-700">
                <tr>
                    <th class="px-4 py-3">Nombre</th>
                    <th class="px-4 py-3">Nacionalidad</th>
                    <th class="px-4 py-3">Libros</th>
                    <th class="px-4 py-3 text-right">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($autores as $autor)
                    <tr class="border-t">
                        <td class="px-4 py-3">{{ $autor->nombre }}</td>
                        <td class="px-4 py-3">{{ $autor->nacionalidad ?? 'N/A' }}</td>
                        <td class="px-4 py-3">{{ $autor->libros_count }}</td>
                        <td class="px-4 py-3">
                            <div class="flex justify-end gap-2">
                                <a href="{{ route('autores.show', ['autor' => $autor->id]) }}" class="rounded-base border border-blue-600 bg-blue-50 px-3 py-2 text-xs font-medium leading-5 text-blue-700 transition hover:bg-blue-600 hover:text-white">Ver</a>
                                <a href="{{ route('autores.edit', ['autor' => $autor->id]) }}" class="rounded-base border border-amber-600 bg-amber-50 px-3 py-2 text-xs font-medium leading-5 text-amber-700 transition hover:bg-amber-600 hover:text-white">Editar</a>
                                <form action="{{ route('autores.destroy', ['autor' => $autor->id]) }}" method="POST" class="inline" onsubmit="return confirm('¿Eliminar autor?')">
                                @csrf
                                @method('DELETE')
                                    <button type="submit" class="rounded-base border border-rose-600 bg-rose-50 px-3 py-2 text-xs font-medium leading-5 text-rose-700 transition hover:bg-rose-600 hover:text-white">Eliminar</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-4 py-6 text-center text-slate-500">No hay autores registrados.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">{{ $autores->links() }}</div>
@endsection
