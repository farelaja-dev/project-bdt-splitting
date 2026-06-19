@extends('layouts.app')

@section('content')
    <article class="mx-auto max-w-4xl py-10 lg:py-16">
        <p class="text-xs uppercase tracking-[0.35em] text-slate-500">{{ $post->published_at?->format('d M Y') }}</p>
        <h1 class="mt-4 font-display text-4xl leading-tight text-slate-950 md:text-6xl">{{ $post->title }}</h1>
        <p class="mt-5 max-w-3xl text-lg leading-8 text-slate-700">{{ $post->excerpt }}</p>

        <div class="mt-10 rounded-[2rem] border border-slate-900/10 bg-white/80 p-8 shadow-sm backdrop-blur lg:p-12">
            <div class="prose prose-slate max-w-none prose-headings:font-display prose-headings:text-slate-950 prose-p:leading-8">
                {!! nl2br(e($post->content)) !!}
            </div>
        </div>

        <div class="mt-8 flex flex-wrap gap-3">
            <a href="{{ route('home') }}" class="rounded-full bg-slate-950 px-6 py-3 text-sm font-semibold text-white">Kembali ke landing</a>
            <a href="{{ route('login') }}" class="rounded-full border border-slate-900/10 bg-white/80 px-6 py-3 text-sm font-semibold text-slate-900">Masuk admin</a>
        </div>
    </article>
@endsection