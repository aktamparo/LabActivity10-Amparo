@extends('layouts.app')

@section('title', 'Barangay Bulletin – Purok Amparo')

@section('content')
    <div class="mx-auto max-w-7xl px-6 py-10">
        <div class="mb-8">
            <p class="text-sm font-semibold uppercase tracking-wide text-blue-600">Community updates</p>
            <h1 class="mt-2 text-3xl font-bold tracking-tight text-slate-900">Barangay Bulletin</h1>
            <p class="mt-2 text-slate-600">News and announcements for Purok Amparo.</p>
        </div>

        <form method="GET" action="{{ route('posts.index') }}" class="mb-8 flex flex-col gap-2 sm:flex-row">
            <input
                name="q"
                value="{{ request('q') }}"
                placeholder="Search title"
                class="rounded-lg border border-slate-300 bg-white px-4 py-2 text-sm shadow-sm focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-200"
            >
            <select
                name="category"
                class="rounded-lg border border-slate-300 bg-white px-4 py-2 text-sm shadow-sm focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-200"
            >
                <option value="">All categories</option>
                @foreach ($categories as $category)
                    <option value="{{ $category }}" @selected(request('category') === $category)>
                        {{ $category }}
                    </option>
                @endforeach
            </select>
            <button type="submit" class="rounded-lg bg-blue-600 px-5 py-2 text-sm font-semibold text-white hover:bg-blue-700">
                Filter
            </button>
        </form>

        @forelse ($posts as $post)
            <article class="mb-4 rounded-xl bg-white p-6 shadow-sm ring-1 ring-slate-200">
                <div class="flex flex-wrap items-center gap-2 text-xs font-semibold uppercase tracking-wide">
                    <span class="rounded-full bg-blue-100 px-3 py-1 text-blue-700">{{ $post->category }}</span>
                    @if ($post->is_pinned)
                        <span class="rounded-full bg-amber-100 px-3 py-1 text-amber-700">Pinned</span>
                    @endif
                </div>
                <h2 class="mt-3 text-xl font-semibold text-slate-900">
                    <a href="{{ route('posts.show', $post->id) }}" class="hover:text-blue-700">
                        {{ $post->title }}
                    </a>
                </h2>
                <p class="mt-2 text-slate-600">{{ $post->body }}</p>
                <p class="mt-4 text-sm text-slate-500">
                    Published {{ $post->published_at->format('F j, Y') }} · {{ $post->views }} views
                </p>
            </article>
        @empty
            <p class="rounded-xl bg-white p-6 text-slate-600 shadow-sm ring-1 ring-slate-200">
                No posts match your search.
            </p>
        @endforelse

        <div class="mt-8">
            {{ $posts->links() }}
            <p class="mt-3 text-sm text-slate-500">
                Showing {{ $posts->firstItem() }}–{{ $posts->lastItem() }} of {{ $posts->total() }} posts
            </p>
        </div>
    </div>
@endsection
