@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="mb-8 flex items-center justify-between">
        <div>
            <h1 class="text-3xl font-bold">Dashboard de Biblioteca</h1>
            <p class="mt-1 text-slate-600">Gestión básica de autores y libros con Laravel MVC.</p>
        </div>
        <div class="flex gap-2">
            <a href="{{ route('autores.create') }}" class="rounded-lg bg-slate-900 px-4 py-2 text-sm font-medium text-white hover:bg-slate-700">Nuevo autor</a>
            <a href="{{ route('libros.create') }}" class="rounded-lg bg-indigo-600 px-4 py-2 text-sm font-medium text-white hover:bg-indigo-500">Nuevo libro</a>
        </div>
    </div>

    <div class="grid gap-4 md:grid-cols-3">
        <div class="rounded-xl bg-white p-6 shadow">
            <p class="text-sm text-slate-500">Total de autores</p>
            <p class="mt-2 text-3xl font-bold">{{ $totalAutores }}</p>
        </div>
        <div class="rounded-xl bg-white p-6 shadow">
            <p class="text-sm text-slate-500">Total de libros</p>
            <p class="mt-2 text-3xl font-bold">{{ $totalLibros }}</p>
        </div>
        <div class="rounded-xl bg-white p-6 shadow">
            <p class="text-sm text-slate-500">Género más registrado</p>
            <p class="mt-2 text-2xl font-bold">{{ $generoMasRegistrado ?? 'Sin datos' }}</p>
        </div>
    </div>
@endsection
