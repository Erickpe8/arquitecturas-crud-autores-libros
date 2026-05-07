<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Biblioteca · CQRS')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .text-fg-brand { color: #1e293b; }
        .bg-neutral-primary { background-color: #ffffff; }
        .bg-neutral-primary-soft { background-color: #f8fafc; }
        .border-brand { border-color: #334155; }
        .border-default { border-color: #e2e8f0; }
        .bg-brand { background-color: #2563eb; }
        .bg-brand-softer { background-color: #dbeafe; }
        .text-fg-brand-strong { color: #1e3a8a; }
        .border-brand-subtle { border-color: #93c5fd; }
        .text-heading { color: #0f172a; }
        .rounded-base { border-radius: 0.5rem; }
        .rounded-t-base { border-top-left-radius: 0.5rem; border-top-right-radius: 0.5rem; }
        .rounded-sm { border-radius: 0.25rem; }
        .shadow-xs { box-shadow: 0 1px 2px rgba(15, 23, 42, 0.08); }
        .hover\:bg-brand-strong:hover { background-color: #1d4ed8; }
        .hover\:bg-brand:hover { background-color: #334155; }
        .hover\:text-white:hover { color: #ffffff; }
        .focus\:ring-brand-medium:focus { box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.25); }
        .focus\:ring-brand-subtle:focus {
            box-shadow: 0 0 0 4px rgba(51, 65, 85, 0.2);
        }
        .input-fixed {
            height: 42px;
        }
        .text-scroll-invisible {
            height: 144px;
            resize: none;
            overflow-y: auto;
            scrollbar-width: thin;
            scrollbar-color: rgba(100, 116, 139, 0.28) transparent;
        }
        .text-scroll-invisible::-webkit-scrollbar {
            width: 8px;
        }
        .text-scroll-invisible::-webkit-scrollbar-track {
            background: transparent;
        }
        .text-scroll-invisible::-webkit-scrollbar-thumb {
            background-color: rgba(100, 116, 139, 0.28);
            border-radius: 9999px;
            border: 2px solid transparent;
            background-clip: content-box;
        }
    </style>
</head>
<body class="min-h-screen bg-slate-100 text-slate-900">
    <nav class="bg-neutral-primary fixed start-0 top-0 z-20 w-full border-b border-default shadow-xs">
        <div class="mx-auto flex max-w-7xl flex-wrap items-center justify-between p-4">
            <a href="{{ route('dashboard') }}" class="flex items-center space-x-3 rtl:space-x-reverse">
                <span class="flex h-8 w-8 items-center justify-center rounded-base bg-brand text-sm font-bold text-white">B</span>
                <span class="self-center whitespace-nowrap text-xl font-semibold text-heading">Biblioteca · CQRS</span>
            </a>
            <button id="navbar-toggle" type="button" class="inline-flex h-10 w-10 items-center justify-center rounded-base p-2 text-sm text-slate-600 hover:bg-slate-100 hover:text-slate-900 focus:outline-none focus:ring-2 focus:ring-slate-300 md:hidden" aria-controls="navbar-default" aria-expanded="false">
                <span class="sr-only">Abrir menu principal</span>
                <svg class="h-6 w-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M5 7h14M5 12h14M5 17h14"/></svg>
            </button>
            <div class="hidden w-full md:block md:w-auto" id="navbar-default">
                <ul class="mt-4 flex flex-col rounded-base border border-default bg-slate-50 p-4 font-medium md:mt-0 md:flex-row md:space-x-2 md:border-0 md:bg-transparent md:p-0">
                    <li>
                        <a href="{{ route('dashboard') }}" class="block rounded-base px-3 py-2 transition {{ request()->routeIs('dashboard') ? 'bg-brand text-white shadow-xs' : 'text-heading hover:bg-slate-200 hover:text-fg-brand' }}">Inicio</a>
                    </li>
                    <li>
                        <a href="{{ route('autores.index') }}" class="block rounded-base px-3 py-2 transition {{ request()->routeIs('autores.*') ? 'bg-brand text-white shadow-xs' : 'text-heading hover:bg-slate-200 hover:text-fg-brand' }}">Autores</a>
                    </li>
                    <li>
                        <a href="{{ route('libros.index') }}" class="block rounded-base px-3 py-2 transition {{ request()->routeIs('libros.*') ? 'bg-brand text-white shadow-xs' : 'text-heading hover:bg-slate-200 hover:text-fg-brand' }}">Libros</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="mx-auto w-full max-w-7xl px-4 pb-8 pt-28">
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
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const toggle = document.getElementById('navbar-toggle');
            const menu = document.getElementById('navbar-default');
            if (!toggle || !menu) return;

            toggle.addEventListener('click', function () {
                menu.classList.toggle('hidden');
            });
        });
    </script>
</body>
</html>
