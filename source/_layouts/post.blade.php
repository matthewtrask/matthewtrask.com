@extends('_layouts.main')

@section('body')
    <article class="max-w-2xl mx-auto px-6 py-16">

        {{-- Back link --}}
        <a href="/blog" class="font-mono text-[12px] text-gray-400 dark:text-gray-600 hover:text-cyan-600 dark:hover:text-cyan-400 transition-colors mb-12 inline-block">
            ← writing
        </a>

        {{-- Post header --}}
        <header class="mb-12">
            <time class="font-mono text-[11px] text-gray-400 dark:text-gray-600 block mb-4 tracking-wide">
                {{ date('F j, Y', $page->date) }}
            </time>

            <h1 class="font-sans font-bold text-2xl sm:text-[28px] text-gray-950 dark:text-gray-50 leading-tight tracking-tight">
                {{ $page->title }}
            </h1>
        </header>

        {{-- Post content --}}
        <div class="
            prose prose-gray dark:prose-invert max-w-none

            [&_p]:font-serif [&_p]:text-[17px] [&_p]:leading-[1.85] [&_p]:text-gray-700 dark:[&_p]:text-gray-300
            [&_li]:font-serif [&_li]:text-[17px] [&_li]:leading-[1.8] [&_li]:text-gray-700 dark:[&_li]:text-gray-300
            [&_blockquote_p]:font-serif

            prose-headings:font-sans prose-headings:font-bold prose-headings:tracking-tight prose-headings:text-gray-900 dark:prose-headings:text-gray-100
            prose-h2:text-xl prose-h2:mt-12 prose-h2:mb-4
            prose-h3:text-lg prose-h3:mt-8 prose-h3:mb-3

            prose-a:text-cyan-600 dark:prose-a:text-cyan-400 prose-a:font-normal prose-a:no-underline hover:prose-a:underline prose-a:underline-offset-2

            prose-strong:text-gray-900 dark:prose-strong:text-gray-100 prose-strong:font-semibold

            prose-code:font-mono prose-code:text-[0.875em] prose-code:text-gray-800 dark:prose-code:text-gray-200 prose-code:bg-gray-100 dark:prose-code:bg-gray-900 prose-code:px-1.5 prose-code:py-0.5 prose-code:rounded prose-code:before:content-none prose-code:after:content-none

            prose-pre:bg-gray-950 dark:prose-pre:bg-black prose-pre:border prose-pre:border-gray-800 dark:prose-pre:border-gray-900 prose-pre:rounded-lg prose-pre:my-8

            prose-blockquote:border-l-2 prose-blockquote:border-cyan-400 prose-blockquote:pl-5 prose-blockquote:text-gray-600 dark:prose-blockquote:text-gray-400 prose-blockquote:not-italic

            prose-img:rounded-lg prose-img:border prose-img:border-gray-100 dark:prose-img:border-gray-900

            prose-hr:border-gray-100 dark:prose-hr:border-gray-900
        ">
            @yield('content')
        </div>

    </article>
@endsection
