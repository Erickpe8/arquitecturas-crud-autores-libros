@extends('layouts.app')

@section('title', 'Editar autor')

@section('content')
    <h1 class="mb-6 text-2xl font-bold">Editar autor</h1>

    <form action="{{ route('autores.update', $autor) }}" method="POST" class="rounded-xl bg-white p-6 shadow">
        @csrf
        @method('PUT')
        @include('autores.partials.form', ['autor' => $autor])
        <div class="mt-6">
            <button class="rounded-lg bg-slate-900 px-4 py-2 text-sm font-medium text-white hover:bg-slate-700">Actualizar</button>
        </div>
    </form>
@endsection
