@extends('layouts.app')

@section('title', 'Crear libro')

@section('content')
    <h1 class="mb-6 text-2xl font-bold">Crear libro</h1>

    <form action="{{ route('libros.store') }}" method="POST" enctype="multipart/form-data" class="rounded-xl bg-white p-6 shadow">
        @csrf
        @include('libros.partials.form', ['libro' => null])
        <div class="mt-6">
            <button type="submit" class="text-fg-brand bg-neutral-primary border border-brand hover:bg-brand hover:text-white focus:ring-4 focus:ring-brand-subtle font-medium leading-5 rounded-base text-xs px-3 py-2 focus:outline-none">Guardar</button>
        </div>
    </form>
@endsection
