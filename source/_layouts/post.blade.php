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
        <div class="
            prose prose-gray dark:prose-invert max-w-none

            [&_p]:font-serif [&_p]:text-[18px] [&_p]:leading-[1.85] [&_p]:text-gray-700 dark:[&_p]:text-gray-300
            [&_li]:font-serif [&_li]:text-[18px] [&_li]:leading-[1.8] [&_li]:text-gray-700 dark:[&_li]:text-gray-300
            [&_blockquote_p]:font-serif

            prose-headings:font-sans prose-headings:font-bold prose-headings:tracking-tight prose-headings:text-gray-900 dark:prose-headings:text-gray-100
            prose-h2:text-[22px] prose-h2:mt-14 prose-h2:mb-4
            prose-h3:text-[18px] prose-h3:mt-10 prose-h3:mb-3

            prose-a:text-cyan-600 dark:prose-a:text-cyan-400 prose-a:font-normal prose-a:no-underline hover:prose-a:underline prose-a:underline-offset-2

            prose-strong:text-gray-900 dark:prose-strong:text-gray-100 prose-strong:font-semibold

            prose-code:font-mono prose-code:text-[0.875em] prose-code:text-gray-800 dark:prose-code:text-gray-200 prose-code:bg-gray-100 dark:prose-code:bg-gray-900 prose-code:px-1.5 prose-code:py-0.5 prose-code:rounded prose-code:before:content-none prose-code:after:content-none

            prose-pre:bg-gray-950 dark:prose-pre:bg-black prose-pre:border prose-pre:border-gray-800 dark:prose-pre:border-gray-900 prose-pre:rounded-xl prose-pre:my-8

            prose-blockquote:border-l-2 prose-blockquote:border-cyan-400 prose-blockquote:pl-5 prose-blockquote:text-gray-600 dark:prose-blockquote:text-gray-400 prose-blockquote:not-italic

            prose-img:rounded-xl prose-img:border prose-img:border-gray-100 dark:prose-img:border-gray-900

            prose-hr:border-gray-100 dark:prose-hr:border-gray-900
        ">
            @yield('content')
        </div>

    </article>
@endsection
