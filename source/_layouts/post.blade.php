@extends('_layouts.main')

@section('meta')
    {{-- Article-specific Open Graph --}}
    <meta property="og:type" content="article">
    <meta property="article:published_time" content="{{ date('c', $page->date) }}">
    <meta property="article:author" content="{{ $page->siteAuthor }}">
    @if ($page->categories)
        @foreach ($page->categories as $cat)
            <meta property="article:tag" content="{{ $cat }}">
        @endforeach
    @endif
    @if ($page->cover_image)
        <meta property="og:image" content="{{ $page->baseUrl }}{{ $page->cover_image }}">
        <meta name="twitter:image" content="{{ $page->baseUrl }}{{ $page->cover_image }}">
        <meta name="twitter:card" content="summary_large_image">
    @endif

    {{-- Per-category RSS autodiscovery --}}
    @if ($page->categories)
        @foreach ($page->categories as $cat)
            <link rel="alternate" type="application/rss+xml"
                  title="{{ $page->siteName }} – {{ $cat }}"
                  href="{{ $page->baseUrl }}/feeds/{{ $cat }}.xml">
        @endforeach
    @endif

    {{-- BlogPosting structured data --}}
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "BlogPosting",
        "headline": "{{ $page->title }}",
        "description": "{{ $page->description }}",
        "url": "{{ $page->getUrl() }}",
        "datePublished": "{{ date('c', $page->date) }}",
        "dateModified": "{{ date('c', $page->date) }}",
        "author": {
            "@type": "Person",
            "name": "{{ $page->siteAuthor }}",
            "url": "{{ $page->baseUrl }}"
        },
        "publisher": {
            "@type": "Person",
            "name": "{{ $page->siteAuthor }}",
            "url": "{{ $page->baseUrl }}"
        },
        "mainEntityOfPage": {
            "@type": "WebPage",
            "@id": "{{ $page->getUrl() }}"
        }@if ($page->cover_image),
        "image": "{{ $page->baseUrl }}{{ $page->cover_image }}"@endif
    }
    </script>
@endsection

@section('body')
    <article class="max-w-2xl mx-auto px-6 py-20">

        {{-- Back link --}}
        <a href="/blog" class="font-mono text-[12px] text-gray-400 dark:text-gray-600 hover:text-cyan-600 dark:hover:text-cyan-400 transition-colors mb-12 inline-block">
            ← writing
        </a>

        {{-- Post header --}}
        <header class="mb-14">
            <div class="flex items-center gap-3 mb-4">
                <time class="font-mono text-[12px] text-gray-400 dark:text-gray-600 tracking-wide">
                    {{ date('F j, Y', $page->date) }}
                </time>
                <span class="font-mono text-[12px] text-gray-300 dark:text-gray-700">·</span>
                <span class="font-mono text-[12px] text-gray-400 dark:text-gray-600">
                    {{ $page->getReadTime() }} min read
                </span>
            </div>

            <h1 class="font-sans font-bold text-3xl sm:text-[32px] text-gray-950 dark:text-gray-50 leading-tight tracking-tight mb-6">
                {{ $page->title }}
            </h1>

            @if ($page->categories)
                <div class="flex flex-wrap gap-2">
                    @foreach ($page->categories as $cat)
                        @include('_components.category-badge', ['category' => $cat])
                    @endforeach
                </div>
            @endif
        </header>

        {{-- Post content --}}
        <div class="prose prose-gray dark:prose-invert max-w-none post-content">
            @yield('content')
        </div>

    </article>
@endsection
