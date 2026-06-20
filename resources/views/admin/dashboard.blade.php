@extends('layouts.admin')

@section('admin-content')
    <div class="grid gap-6 lg:grid-cols-[1.15fr_.85fr]">
        <div class="rounded-[1.75rem] border border-white/10 bg-white/5 p-6">
            <p class="text-xs uppercase tracking-[0.35em] text-slate-400">Ringkasan</p>
            <h2 class="mt-3 font-display text-4xl text-white">Meja redaksi Tirta.id</h2>
            <p class="mt-4 max-w-2xl text-sm leading-7 text-slate-300">
                Di sini redaksi mengelola naskah, memantau status terbit, dan memperbarui artikel yang tampil untuk pembaca.
            </p>

            <div class="mt-6 flex flex-wrap gap-3">
                <a href="{{ route('admin.posts.create') }}" class="rounded-full bg-amber-300 px-5 py-3 text-sm font-semibold text-slate-950">Buat posting baru</a>
                <a href="{{ route('home') }}" class="rounded-full border border-white/10 bg-white/5 px-5 py-3 text-sm font-semibold text-white">Lihat beranda</a>
            </div>

            <div class="mt-8 grid gap-4 sm:grid-cols-3">
                <div class="rounded-3xl border border-white/10 bg-white/5 p-5">
                    <p class="text-sm text-slate-400">Total naskah</p>
                    <p class="mt-2 font-display text-3xl text-white">{{ $postCount }}</p>
                </div>
                <div class="rounded-3xl border border-white/10 bg-white/5 p-5">
                    <p class="text-sm text-slate-400">Published</p>
                    <p class="mt-2 font-display text-3xl text-white">{{ $publishedCount }}</p>
                </div>
                <div class="rounded-3xl border border-white/10 bg-white/5 p-5">
                    <p class="text-sm text-slate-400">Draft</p>
                    <p class="mt-2 font-display text-3xl text-white">{{ $draftCount }}</p>
                </div>
            </div>
        </div>

        <div class="rounded-[1.75rem] border border-amber-300/20 bg-amber-300/10 p-6 text-amber-50">
            <p class="text-xs uppercase tracking-[0.35em] text-amber-200">Status sistem</p>
            <div class="mt-4 space-y-4 text-sm leading-7">
                <div class="rounded-2xl bg-slate-950/40 p-4">
                    <p class="font-semibold text-white">Database</p>
                    <p class="mt-1 text-slate-200">{{ $databaseName }}</p>
                </div>
                <div class="rounded-2xl bg-slate-950/40 p-4">
                    <p class="font-semibold text-white">Server data</p>
                    <p class="mt-1 text-slate-200">{{ $dbHost }}:{{ $dbPort }}</p>
                </div>
                <div class="rounded-2xl bg-slate-950/40 p-4">
                    <p class="font-semibold text-white">Mode</p>
                    <p class="mt-1 text-slate-200">Koneksi publikasi aktif.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-8 rounded-[1.75rem] border border-white/10 bg-white/5 p-6">
        <div class="flex items-center justify-between gap-4">
            <div>
                <p class="text-xs uppercase tracking-[0.35em] text-slate-400">Naskah terbaru</p>
                <h3 class="mt-2 font-display text-2xl text-white">Posting terbaru</h3>
            </div>
            <a href="{{ route('admin.posts.index') }}" class="rounded-full border border-white/10 bg-white/5 px-4 py-2 text-sm font-semibold text-white">Kelola semua</a>
        </div>

        <div class="mt-6 space-y-3">
            @forelse ($recentPosts as $post)
                <a href="{{ route('admin.posts.edit', $post) }}" class="block rounded-2xl border border-white/10 bg-white/5 p-4 transition hover:bg-white/10">
                    <div class="flex flex-wrap items-center justify-between gap-3">
                        <div>
                            <h4 class="font-semibold text-white">{{ $post->title }}</h4>
                            <p class="mt-1 text-sm text-slate-300">{{ $post->published_at ? 'Published' : 'Draft' }} · {{ $post->updated_at->diffForHumans() }}</p>
                        </div>
                        <span class="rounded-full px-3 py-1 text-xs font-semibold {{ $post->published_at ? 'bg-emerald-400/15 text-emerald-200' : 'bg-slate-400/15 text-slate-200' }}">
                            {{ $post->published_at ? 'Published' : 'Draft' }}
                        </span>
                    </div>
                </a>
            @empty
                <div class="rounded-2xl border border-dashed border-white/10 bg-white/5 p-6 text-sm text-slate-300">
                    Belum ada posting. Buat artikel pertama untuk mengisi beranda.
                </div>
            @endforelse
        </div>
    </div>
@endsection
