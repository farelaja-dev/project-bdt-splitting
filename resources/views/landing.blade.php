@extends('layouts.app')

@section('content')
    <section class="grid gap-8 py-10 lg:grid-cols-[1.15fr_.85fr] lg:items-center lg:py-16">
        <div class="space-y-6">
            <div class="inline-flex items-center gap-2 rounded-full border border-slate-900/10 bg-white/70 px-4 py-2 text-sm font-medium text-slate-700 shadow-sm backdrop-blur">
                <span class="h-2 w-2 rounded-full bg-amber-500"></span>
                Tirta.id hari ini
            </div>

            <div class="space-y-4">
                <h1 class="font-display max-w-3xl text-5xl leading-none tracking-tight text-slate-950 md:text-7xl">
                    Kabar air, kota, dan lingkungan dari ruang redaksi Tirta.id.
                </h1>
                <p class="max-w-2xl text-lg leading-8 text-slate-700">
                    Kami merangkum isu air bersih, banjir, ruang kota, dan kebijakan lingkungan dalam bahasa yang ringkas, jernih, dan mudah diikuti pembaca.
                </p>
            </div>

            <div class="flex flex-wrap gap-3">
                <a href="#latest" class="rounded-full bg-slate-950 px-6 py-3 text-sm font-semibold text-white shadow-lg shadow-slate-950/20">Lihat posting terbaru</a>
                <a href="{{ route('login') }}" class="rounded-full border border-slate-900/10 bg-white/80 px-6 py-3 text-sm font-semibold text-slate-900 backdrop-blur">Ruang redaksi</a>
            </div>

            <div class="grid gap-4 sm:grid-cols-3">
                <div class="rounded-3xl border border-slate-900/10 bg-white/70 p-5 shadow-sm backdrop-blur">
                    <p class="text-sm text-slate-500">Artikel terbit</p>
                    <p class="mt-2 font-display text-3xl font-semibold">{{ $publishedCount }}</p>
                </div>
                <div class="rounded-3xl border border-slate-900/10 bg-white/70 p-5 shadow-sm backdrop-blur">
                    <p class="text-sm text-slate-500">Topik utama</p>
                    <p class="mt-2 font-display text-3xl font-semibold">Kota</p>
                </div>
                <div class="rounded-3xl border border-slate-900/10 bg-white/70 p-5 shadow-sm backdrop-blur">
                    <p class="text-sm text-slate-500">Fokus</p>
                    <p class="mt-2 font-display text-3xl font-semibold">Air</p>
                </div>
            </div>
        </div>

        <div class="relative">
            <div class="absolute inset-0 -z-10 translate-x-8 translate-y-8 rounded-[2rem] bg-amber-300/40 blur-3xl"></div>
            <div class="rounded-[2rem] border border-slate-900/10 bg-slate-950 p-6 text-slate-100 shadow-2xl shadow-slate-950/20">
                <div class="flex items-center justify-between border-b border-white/10 pb-4">
                    <div>
                        <p class="text-xs uppercase tracking-[0.35em] text-slate-400">Pilihan redaksi</p>
                        <p class="font-display text-2xl text-white">Publikasi terbaru</p>
                    </div>
                    <span class="rounded-full bg-amber-300/15 px-3 py-1 text-xs font-semibold text-amber-200">Editorial</span>
                </div>

                <div class="space-y-4 pt-5">
                    @forelse ($posts->take(3) as $post)
                        <article class="rounded-2xl border border-white/10 bg-white/5 p-4">
                            <div class="flex items-center justify-between gap-4">
                                <div>
                                    <h2 class="font-display text-xl text-white">{{ $post->title }}</h2>
                                    <p class="mt-2 text-sm leading-6 text-slate-300">{{ $post->excerpt }}</p>
                                </div>
                                <a href="{{ route('blog.show', $post) }}" class="shrink-0 rounded-full border border-white/10 px-4 py-2 text-xs font-semibold text-white">Baca</a>
                            </div>
                        </article>
                    @empty
                        <div class="rounded-2xl border border-dashed border-white/15 bg-white/5 p-6 text-sm text-slate-300">
                            Belum ada artikel yang dipublikasikan.
                        </div>
                    @endforelse
                </div>

                <div class="mt-6 rounded-2xl bg-amber-300 p-4 text-slate-950">
                    <p class="text-xs uppercase tracking-[0.35em] text-slate-700">Catatan redaksi</p>
                    <p class="mt-2 text-sm leading-6 text-slate-900">
                        Tirta.id mengikuti isu air dan lingkungan dari data, laporan warga, serta kebijakan terbaru.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section id="latest" class="py-8">
        <div class="mb-6 flex items-end justify-between gap-4">
            <div>
                <p class="text-xs uppercase tracking-[0.35em] text-slate-500">Latest stories</p>
                <h2 class="font-display text-3xl text-slate-950">Artikel terbaru</h2>
            </div>
            <p class="max-w-xl text-sm leading-6 text-slate-600">
                Baca laporan terbaru seputar air bersih, drainase kota, sungai, dan inisiatif lingkungan warga.
            </p>
        </div>

        <div class="grid gap-5 md:grid-cols-2 xl:grid-cols-3">
            @forelse ($posts as $post)
                <a href="{{ route('blog.show', $post) }}" class="group rounded-[1.75rem] border border-slate-900/10 bg-white/80 p-6 shadow-sm backdrop-blur transition hover:-translate-y-1 hover:shadow-xl">
                    <p class="text-xs uppercase tracking-[0.35em] text-slate-500">{{ $post->published_at?->format('d M Y') }}</p>
                    <h3 class="mt-4 font-display text-2xl text-slate-950">{{ $post->title }}</h3>
                    <p class="mt-3 text-sm leading-6 text-slate-600">{{ $post->excerpt }}</p>
                    <span class="mt-5 inline-flex items-center gap-2 text-sm font-semibold text-slate-950">Buka artikel <span class="transition group-hover:translate-x-1">→</span></span>
                </a>
            @empty
                <div class="rounded-[1.75rem] border border-dashed border-slate-300 bg-white/70 p-8 text-sm text-slate-600 md:col-span-2 xl:col-span-3">
                    Belum ada artikel yang dipublikasikan.
                </div>
            @endforelse
        </div>
    </section>
@endsection
