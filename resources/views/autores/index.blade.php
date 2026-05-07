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
                class="w-full rounded-lg border border-slate-300 px-3 py-2 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-200">
            <button class="rounded-lg bg-indigo-600 px-4 py-2 text-sm font-medium text-white hover:bg-indigo-500">Buscar</button>
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
                        <td class="px-4 py-3 text-right">
                            <a href="{{ route('autores.show', $autor) }}" class="text-indigo-600 hover:underline">Ver</a>
                            <a href="{{ route('autores.edit', $autor) }}" class="ml-3 text-slate-700 hover:underline">Editar</a>
                            <form action="{{ route('autores.destroy', $autor) }}" method="POST" class="ml-3 inline" onsubmit="return confirm('¿Eliminar autor?')">
                                @csrf
                                @method('DELETE')
                                <button class="text-rose-600 hover:underline">Eliminar</button>
                            </form>
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
