@extends('layouts.app')

@section('content')
    <div class="rounded-[2rem] border border-slate-900/10 bg-slate-950 p-6 text-white shadow-2xl shadow-slate-950/20 lg:p-8">
        <div class="flex items-center justify-between gap-4 border-b border-white/10 pb-5">
            <div>
                <p class="text-xs uppercase tracking-[0.35em] text-slate-400">Ruang redaksi</p>
                <h1 class="mt-2 font-display text-3xl font-semibold text-white">Tirta.id</h1>
            </div>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="rounded-full bg-amber-300 px-4 py-2 text-sm font-semibold text-slate-950">Keluar</button>
            </form>
        </div>

        <div class="mt-8">
            @if (session('status'))
                <div class="mb-6 rounded-2xl border border-emerald-400/20 bg-emerald-400/10 px-4 py-3 text-sm text-emerald-100">
                    {{ session('status') }}
                </div>
            @endif

            @yield('admin-content')
        </div>
    </div>
@endsection
