@extends('layouts.app')

@section('title', 'Crear autor')

@section('content')
    <h1 class="mb-6 text-2xl font-bold">Crear autor</h1>

    <form action="{{ route('autores.store') }}" method="POST" class="rounded-xl bg-white p-6 shadow">
        @csrf
        @include('autores.partials.form', ['autor' => null])
        <div class="mt-6">
            <button class="rounded-lg bg-slate-900 px-4 py-2 text-sm font-medium text-white hover:bg-slate-700">Guardar</button>
        </div>
    </form>
@endsection
