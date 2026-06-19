@extends('layouts.admin')

@section('admin-content')
    <div class="max-w-4xl">
        <p class="text-xs uppercase tracking-[0.35em] text-slate-400">Admin Blog</p>
        <h2 class="mt-2 font-display text-4xl text-white">{{ $mode === 'create' ? 'Buat Post Baru' : 'Edit Post' }}</h2>

        <form method="POST" action="{{ $mode === 'create' ? route('admin.posts.store') : route('admin.posts.update', $post) }}" class="mt-8 grid gap-5 rounded-3xl border border-white/10 bg-white/5 p-6">
            @csrf
            @if ($mode === 'edit')
                @method('PUT')
            @endif

            <label class="grid gap-2">
                <span class="text-sm text-slate-300">Title</span>
                <input name="title" value="{{ old('title', $post->title) }}" class="rounded-2xl border border-white/10 bg-slate-950/60 px-4 py-3 text-white" required>
            </label>

            <label class="grid gap-2">
                <span class="text-sm text-slate-300">Slug</span>
                <input name="slug" value="{{ old('slug', $post->slug) }}" class="rounded-2xl border border-white/10 bg-slate-950/60 px-4 py-3 text-white">
            </label>

            <label class="grid gap-2">
                <span class="text-sm text-slate-300">Excerpt</span>
                <textarea name="excerpt" rows="3" class="rounded-2xl border border-white/10 bg-slate-950/60 px-4 py-3 text-white" required>{{ old('excerpt', $post->excerpt) }}</textarea>
            </label>

            <label class="grid gap-2">
                <span class="text-sm text-slate-300">Content</span>
                <textarea name="content" rows="10" class="rounded-2xl border border-white/10 bg-slate-950/60 px-4 py-3 text-white" required>{{ old('content', $post->content) }}</textarea>
            </label>

            <label class="inline-flex items-center gap-3 text-slate-200">
                <input type="checkbox" name="publish" value="1" @checked(old('publish', $post->published_at))>
                Publish immediately
            </label>

            <div class="flex gap-3">
                <button type="submit" class="rounded-full bg-amber-300 px-5 py-3 font-semibold text-slate-950">Simpan</button>
                <a href="{{ route('admin.posts.index') }}" class="rounded-full border border-white/15 px-5 py-3 font-semibold text-white">Batal</a>
            </div>
        </form>
    </div>
@endsection