@extends('layouts.app')

@section('title', 'Editar autor')

@section('content')
    <h1 class="mb-6 text-2xl font-bold">Editar autor</h1>

    <form action="{{ route('autores.update', ['autor' => $autor->id]) }}" method="POST" class="rounded-xl bg-white p-6 shadow">
        @csrf
        @method('PUT')
        @include('autores.partials.form', ['autor' => $autor])
        <div class="mt-6">
            <button type="submit" class="text-fg-brand bg-neutral-primary border border-brand hover:bg-brand hover:text-white focus:ring-4 focus:ring-brand-subtle font-medium leading-5 rounded-base text-xs px-3 py-2 focus:outline-none">Actualizar</button>
        </div>
    </form>
@endsection
