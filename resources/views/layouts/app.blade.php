<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Biblioteca MVC')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-slate-100 text-slate-900">
    <nav class="bg-slate-900 text-white shadow">
        <div class="mx-auto flex w-full max-w-7xl items-center justify-between px-4 py-4">
            <a href="{{ route('dashboard') }}" class="text-lg font-semibold">Biblioteca MVC</a>
            <div class="flex items-center gap-2 text-sm">
                <a href="{{ route('dashboard') }}" class="rounded px-3 py-2 hover:bg-slate-700">Inicio</a>
                <a href="{{ route('autores.index') }}" class="rounded px-3 py-2 hover:bg-slate-700">Autores</a>
                <a href="{{ route('libros.index') }}" class="rounded px-3 py-2 hover:bg-slate-700">Libros</a>
            </div>
        </div>
    </nav>

    <main class="mx-auto w-full max-w-7xl px-4 py-8">
        @if (session('success'))
            <div class="mb-6 rounded-lg border border-emerald-300 bg-emerald-50 px-4 py-3 text-sm text-emerald-700">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="mb-6 rounded-lg border border-rose-300 bg-rose-50 px-4 py-3 text-sm text-rose-700">
                <p class="font-semibold">Se encontraron errores:</p>
                <ul class="mt-2 list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')
    </main>
</body>
</html>
