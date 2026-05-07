@extends('layouts.app')

@section('title', 'Libros')

@section('content')
    <div class="mb-6 flex flex-wrap items-end justify-between gap-3">
        <div>
            <h1 class="text-2xl font-bold">Libros</h1>
            <p class="text-sm text-slate-600">Consulta, filtra y administra los libros.</p>
        </div>
        <a href="{{ route('libros.create') }}" class="rounded-lg bg-indigo-600 px-4 py-2 text-sm font-medium text-white hover:bg-indigo-500">
            Crear libro
        </a>
    </div>

    <form method="GET" class="mb-6 rounded-xl bg-white p-4 shadow">
        <div class="grid gap-3 md:grid-cols-3">
            <input type="text" name="search" value="{{ $search }}" placeholder="Buscar por título..."
                class="input-fixed rounded-lg border border-slate-300 px-3 py-2 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-200">
            <select name="genero"
                class="input-fixed rounded-lg border border-slate-300 px-3 py-2 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-200">
                <option value="">Todos los géneros</option>
                @foreach ($generos as $item)
                    <option value="{{ $item }}" @selected($genero === $item)>{{ $item }}</option>
                @endforeach
            </select>
            <button type="submit" class="text-fg-brand bg-neutral-primary border border-brand hover:bg-brand hover:text-white focus:ring-4 focus:ring-brand-subtle font-medium leading-5 rounded-base text-xs px-3 py-2 focus:outline-none">Filtrar</button>
        </div>
    </form>

    <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-3">
        @forelse ($libros as $libro)
            <div class="rounded-xl bg-white p-4 shadow">
                <div class="mb-3 h-44 overflow-hidden rounded-lg bg-slate-100">
                    <img src="{{ $libro->portada_url }}" class="h-full w-full object-cover" alt="{{ $libro->titulo }}">
                </div>
                <h3 class="font-semibold">{{ $libro->titulo }}</h3>
                <p class="mt-1 text-sm text-slate-600">{{ $libro->autor->nombre }}</p>
                <p class="mt-2 text-sm text-slate-500">{{ $libro->genero ?? 'Sin género' }}</p>
                <div class="mt-4 flex gap-2 text-sm">
                    <a href="{{ route('libros.show', $libro) }}" class="rounded-base border border-blue-600 bg-blue-50 px-3 py-2 text-xs font-medium leading-5 text-blue-700 transition hover:bg-blue-600 hover:text-white">Ver</a>
                    <a href="{{ route('libros.edit', $libro) }}" class="rounded-base border border-amber-600 bg-amber-50 px-3 py-2 text-xs font-medium leading-5 text-amber-700 transition hover:bg-amber-600 hover:text-white">Editar</a>
                    <form action="{{ route('libros.destroy', $libro) }}" method="POST" onsubmit="return confirm('¿Eliminar libro?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="rounded-base border border-rose-600 bg-rose-50 px-3 py-2 text-xs font-medium leading-5 text-rose-700 transition hover:bg-rose-600 hover:text-white">Eliminar</button>
                    </form>
                </div>
            </div>
        @empty
            <p class="text-slate-600">No se encontraron libros.</p>
        @endforelse
    </div>

    <div class="mt-4">{{ $libros->links() }}</div>
@endsection
