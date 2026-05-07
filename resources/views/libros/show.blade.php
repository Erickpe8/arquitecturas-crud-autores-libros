@extends('layouts.app')

@section('title', $libro->titulo)

@section('content')
    <div class="grid gap-6 lg:grid-cols-3">
        <div class="rounded-xl bg-white p-4 shadow lg:col-span-1">
            <div class="h-72 overflow-hidden rounded-lg bg-slate-100">
                @if ($libro->portada)
                    <img src="{{ asset('storage/' . $libro->portada) }}" class="h-full w-full object-cover" alt="{{ $libro->titulo }}">
                @else
                    <div class="flex h-full items-center justify-center text-sm text-slate-500">Sin portada</div>
                @endif
            </div>
        </div>
        <div class="rounded-xl bg-white p-6 shadow lg:col-span-2">
            <h1 class="text-3xl font-bold">{{ $libro->titulo }}</h1>
            <p class="mt-1 text-slate-600">Autor: <a href="{{ route('autores.show', $libro->autor) }}" class="text-indigo-600 hover:underline">{{ $libro->autor->nombre }}</a></p>

            <div class="mt-4 grid gap-3 sm:grid-cols-2">
                <p><span class="font-semibold">ISBN:</span> {{ $libro->isbn }}</p>
                <p><span class="font-semibold">Género:</span> {{ $libro->genero ?? 'N/A' }}</p>
                <p><span class="font-semibold">Fecha publicación:</span> {{ $libro->fecha_publicacion ?? 'N/A' }}</p>
            </div>

            <p class="mt-5 text-slate-700">{{ $libro->descripcion ?? 'Sin descripción.' }}</p>

            <div class="mt-6 flex gap-3">
                <a href="{{ route('libros.edit', $libro) }}" class="rounded-lg bg-slate-900 px-4 py-2 text-sm font-medium text-white hover:bg-slate-700">Editar</a>
                <form action="{{ route('libros.destroy', $libro) }}" method="POST" onsubmit="return confirm('¿Eliminar libro?')">
                    @csrf
                    @method('DELETE')
                    <button class="rounded-lg bg-rose-600 px-4 py-2 text-sm font-medium text-white hover:bg-rose-500">Eliminar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
