@extends('layouts.admin')

@section('admin-content')
    <div class="flex flex-wrap items-center justify-between gap-4">
        <div>
            <p class="text-xs uppercase tracking-[0.35em] text-slate-400">Blog CRUD</p>
            <h2 class="mt-2 font-display text-4xl text-white">Daftar Post</h2>
        </div>
        <a href="{{ route('admin.posts.create') }}" class="rounded-full bg-amber-300 px-5 py-3 text-sm font-semibold text-slate-950">+ Post Baru</a>
    </div>

    <div class="mt-6 rounded-3xl border border-white/10 bg-white/5 p-6 text-sm text-slate-300">
        <p class="font-semibold text-white">PG Pool II indicator</p>
        <p class="mt-2">Endpoint: {{ $dbHost }}:{{ $dbPort }}</p>
        <p>PGPool II menentukan node baca/tulis di belakang layar.</p>
    </div>

    <div class="mt-6 grid gap-4">
        @forelse ($posts as $post)
            <article class="rounded-3xl border border-white/10 bg-slate-900/70 p-6">
                <div class="flex flex-wrap items-start justify-between gap-4">
                    <div>
                        <p class="text-xs uppercase tracking-[0.25em] text-amber-200">{{ $post->published_at ? 'Published' : 'Draft' }}</p>
                        <h3 class="mt-2 text-2xl font-bold text-white">{{ $post->title }}</h3>
                        <p class="mt-2 max-w-3xl text-slate-300">{{ $post->excerpt }}</p>
                    </div>
                    <div class="flex gap-2">
                        <a href="{{ route('admin.posts.edit', $post) }}" class="rounded-full border border-white/15 px-4 py-2 text-sm font-semibold text-white">Edit</a>
                        <form method="POST" action="{{ route('admin.posts.destroy', $post) }}" onsubmit="return confirm('Hapus post ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="rounded-full bg-rose-500 px-4 py-2 text-sm font-semibold text-white">Hapus</button>
                        </form>
                    </div>
                </div>
            </article>
        @empty
            <div class="rounded-3xl border border-dashed border-white/15 p-8 text-slate-300">Belum ada posting.</div>
        @endforelse
    </div>
@endsection