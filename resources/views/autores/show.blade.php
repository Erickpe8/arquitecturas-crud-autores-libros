@extends('layouts.app')

@section('title', $autor->nombre)

@section('content')
    <div class="mb-6 flex items-start justify-between">
        <div>
            <h1 class="text-3xl font-bold">{{ $autor->nombre }}</h1>
            <p class="mt-1 text-slate-600">{{ $autor->nacionalidad ?? 'Nacionalidad no especificada' }}</p>
        </div>
        <a href="{{ route('autores.edit', $autor) }}" class="rounded-lg bg-slate-900 px-4 py-2 text-sm font-medium text-white hover:bg-slate-700">Editar</a>
    </div>

    <div class="mb-6 rounded-xl bg-white p-6 shadow">
        <p class="text-sm text-slate-500">Fecha de nacimiento</p>
        <p class="font-medium">{{ $autor->fecha_nacimiento ?? 'N/A' }}</p>
        <p class="mt-4 text-sm text-slate-500">Biografía</p>
        <p>{{ $autor->biografia ?? 'Sin biografía registrada.' }}</p>
    </div>

    <h2 class="mb-3 text-xl font-semibold">Libros de este autor</h2>
    <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-3">
        @forelse ($autor->libros as $libro)
            <a href="{{ route('libros.show', $libro) }}" class="rounded-xl bg-white p-4 shadow transition hover:-translate-y-1 hover:shadow-md">
                <h3 class="font-semibold">{{ $libro->titulo }}</h3>
                <p class="mt-2 text-sm text-slate-600">{{ $libro->genero ?? 'Sin género' }}</p>
            </a>
        @empty
            <p class="text-slate-600">Este autor aún no tiene libros registrados.</p>
        @endforelse
    </div>
@endsection
