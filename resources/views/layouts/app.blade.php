<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? config('app.name', 'Tirta.id') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=manrope:400,500,600,700|fraunces:600,700" rel="stylesheet" />
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <style>
            :root {
                color-scheme: light;
            }

            html {
                scroll-behavior: smooth;
            }

            body {
                margin: 0;
                font-family: Manrope, ui-sans-serif, system-ui, sans-serif;
                background: #f8fafc;
                color: #0f172a;
            }

            a {
                color: inherit;
                text-decoration: none;
            }
        </style>
    @endif
</head>
<body class="min-h-screen bg-[radial-gradient(circle_at_top,_rgba(255,255,255,.92),_rgba(253,242,226,1)_40%,_rgba(241,245,249,1)_100%)] text-slate-950">
    <div class="absolute inset-x-0 top-0 -z-10 h-[24rem] bg-[radial-gradient(circle_at_top_left,_rgba(251,191,36,.28),_transparent_42%),radial-gradient(circle_at_top_right,_rgba(15,23,42,.18),_transparent_38%)]"></div>

    <header class="mx-auto flex w-full max-w-7xl items-center justify-between px-6 py-6 lg:px-10">
        <a href="{{ route('home') }}" class="flex items-center gap-3">
            <div class="flex h-11 w-11 items-center justify-center rounded-2xl bg-slate-950 text-sm font-bold text-amber-300 shadow-lg shadow-slate-950/20">T</div>
            <div>
                <p class="text-xs uppercase tracking-[0.35em] text-slate-500">Tirta.id</p>
                <p class="font-display text-lg font-semibold">Newsroom & blog</p>
            </div>
        </a>

        <div class="flex items-center gap-3">
            <a href="{{ route('home') }}" class="rounded-full border border-slate-900/10 bg-white/80 px-4 py-2 text-sm font-semibold text-slate-900 shadow-sm backdrop-blur">Home</a>
            @auth
                <a href="{{ route('admin.dashboard') }}" class="rounded-full bg-slate-950 px-4 py-2 text-sm font-semibold text-white shadow-lg shadow-slate-950/20">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="rounded-full bg-slate-950 px-4 py-2 text-sm font-semibold text-white shadow-lg shadow-slate-950/20">Admin login</a>
            @endauth
        </div>
    </header>

    <main class="mx-auto w-full max-w-7xl px-6 pb-16 lg:px-10">
        @yield('content')
    </main>
</body>
</html>