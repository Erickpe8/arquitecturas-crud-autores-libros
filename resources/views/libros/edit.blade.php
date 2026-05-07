@extends('layouts.app')

@section('title', 'Editar libro')

@section('content')
    <h1 class="mb-6 text-2xl font-bold">Editar libro</h1>

    <form action="{{ route('libros.update', $libro) }}" method="POST" enctype="multipart/form-data" class="rounded-xl bg-white p-6 shadow">
        @csrf
        @method('PUT')
        @include('libros.partials.form', ['libro' => $libro])
        <div class="mt-6">
            <button class="rounded-lg bg-indigo-600 px-4 py-2 text-sm font-medium text-white hover:bg-indigo-500">Actualizar</button>
        </div>
    </form>
@endsection
