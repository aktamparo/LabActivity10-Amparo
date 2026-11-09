@extends('layouts.app')

@section('title', $post->title.' - Barangay Bulletin')

@section('content')
    <div class="mx-auto max-w-3xl px-6 py-10">
        <a href="{{ route('posts.index') }}" class="text-sm font-semibold text-blue-600 hover:text-blue-700">
            &larr; Back to posts
        </a>

        <article class="mt-6 rounded-xl bg-white p-8 shadow-sm ring-1 ring-slate-200">
            <div class="flex flex-wrap items-center gap-2 text-xs font-semibold uppercase tracking-wide">
                <span class="rounded-full bg-blue-100 px-3 py-1 text-blue-700">{{ $post->category }}</span>
                @if ($post->is_pinned)
                    <span class="rounded-full bg-amber-100 px-3 py-1 text-amber-700">Pinned</span>
                @endif
            </div>
            <h1 class="mt-4 text-3xl font-bold tracking-tight text-slate-900">{{ $post->title }}</h1>
            <p class="mt-3 text-sm text-slate-500">
                Published {{ $post->published_at->format('F j, Y') }} · {{ $post->views }} views
            </p>
            <div class="mt-8 whitespace-pre-line leading-7 text-slate-700">{{ $post->body }}</div>
        </article>
    </div>
@endsection
