@extends('layouts.app')

@section('content')
    <section class="mx-auto max-w-md rounded-[2rem] border border-slate-900/10 bg-white/80 p-8 shadow-xl shadow-slate-950/10 backdrop-blur">
        <p class="text-xs uppercase tracking-[0.35em] text-slate-500">Admin login</p>
        <h1 class="mt-2 font-display text-4xl text-slate-950">Masuk dashboard</h1>

        @if ($errors->any())
            <div class="mt-5 rounded-2xl border border-rose-200 bg-rose-50 px-4 py-3 text-sm text-rose-700">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('login.store') }}" class="mt-6 space-y-5">
            @csrf

            <div>
                <label for="email" class="mb-2 block text-sm font-semibold text-slate-700">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email', env('ADMIN_EMAIL', 'admin@tirta.id')) }}" required class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-slate-950 outline-none focus:border-slate-950" />
            </div>

            <div>
                <label for="password" class="mb-2 block text-sm font-semibold text-slate-700">Password</label>
                <input id="password" type="password" name="password" required class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-slate-950 outline-none focus:border-slate-950" />
            </div>

            <label class="flex items-center gap-3 text-sm text-slate-700">
                <input type="checkbox" name="remember" value="1" class="h-4 w-4 rounded border-slate-300 text-slate-950 focus:ring-slate-950" />
                Ingat sesi login
            </label>

            <button type="submit" class="w-full rounded-2xl bg-slate-950 px-4 py-3 text-sm font-semibold text-white shadow-lg shadow-slate-950/20">Masuk dashboard</button>
        </form>

        <div class="mt-6 rounded-2xl bg-amber-50 px-4 py-3 text-sm text-slate-700">
            Demo credential: {{ env('ADMIN_EMAIL', 'admin@tirta.id') }} / {{ env('ADMIN_PASSWORD', 'password') }}
        </div>
    </section>
@endsection