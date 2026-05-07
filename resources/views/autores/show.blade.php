@extends('layouts.app')

@section('title', $autor->nombre)

@section('content')
    <div class="mb-6 flex items-start justify-between">
        <div>
            <h1 class="text-3xl font-bold">{{ $autor->nombre }}</h1>
            <p class="mt-1 text-slate-600">{{ $autor->nacionalidad ?? 'Nacionalidad no especificada' }}</p>
        </div>
        <a href="{{ route('autores.edit', ['autor' => $autor->id]) }}" class="rounded-lg bg-slate-900 px-4 py-2 text-sm font-medium text-white hover:bg-slate-700">Editar</a>
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
            <div class="bg-neutral-primary-soft block max-w-sm border border-default rounded-base shadow-xs">
                <a href="{{ route('libros.show', $libro) }}">
                    <img class="rounded-t-base h-48 w-full object-cover" src="{{ $libro->portada_url }}" alt="{{ $libro->titulo }}" />
                </a>
                <div class="p-6 text-center">
                    <span class="inline-flex items-center bg-brand-softer border border-brand-subtle text-fg-brand-strong text-xs font-medium px-1.5 py-0.5 rounded-sm">
                        <svg class="w-3 h-3 me-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.122 17.645a7.185 7.185 0 0 1-2.656 2.495 7.06 7.06 0 0 1-3.52.853 6.617 6.617 0 0 1-3.306-.718 6.73 6.73 0 0 1-2.54-2.266c-2.672-4.57.287-8.846.887-9.668A4.448 4.448 0 0 0 8.07 6.31 4.49 4.49 0 0 0 7.997 4c1.284.965 6.43 3.258 5.525 10.631 1.496-1.136 2.7-3.046 2.846-6.216 1.43 1.061 3.985 5.462 1.754 9.23Z"/></svg>
                        {{ $libro->genero ?? 'Sin genero' }}
                    </span>
                    <a href="{{ route('libros.show', $libro) }}">
                        <h5 class="mt-3 mb-6 text-2xl font-semibold tracking-tight text-heading">{{ $libro->titulo }}</h5>
                    </a>
                    <a href="{{ route('libros.show', $libro) }}" class="inline-flex items-center text-white bg-brand box-border border border-transparent hover:bg-brand-strong focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">
                        Ver detalle
                        <svg class="w-4 h-4 ms-1.5 rtl:rotate-180 -me-0.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 12H5m14 0-4 4m4-4-4-4"/></svg>
                    </a>
                </div>
            </div>
        @empty
            <p class="text-slate-600">Este autor aún no tiene libros registrados.</p>
        @endforelse
    </div>
@endsection
