@extends('_layouts.main')

@section('body')
    <section class="max-w-3xl mx-auto px-6 py-20">

        {{-- Intro --}}
        <div class="mb-16">

            {{-- Gradient rule — echoes the top bar --}}
            <div class="flex items-center gap-4 mb-8">
                <div class="h-[2px] w-8 bg-gradient-to-r from-cyan-500 via-blue-500 to-indigo-500 rounded-full"></div>
                <span class="font-mono text-[11px] text-gray-400 dark:text-gray-600 tracking-widest uppercase">backend engineer · writer</span>
            </div>

            {{-- One-liner --}}
            <p class="font-sans font-bold text-[18px] text-gray-600 dark:text-gray-400 leading-[1.75] mb-8 max-w-[540px]">
                Thoughts on programming, leadership, and systems — the things I wish I'd found when I was figuring them out.
            </p>

        </div>

        {{-- Recent posts --}}
        <div class="space-y-1">
            @foreach ($posts->take(10) as $post)
                <article class="group py-3.5 -mx-3 px-3 rounded-lg transition-colors duration-100 hover:bg-white dark:hover:bg-gray-900/60">
                    <div class="flex items-start gap-6 sm:gap-8">
                        <time class="font-mono text-[12px] text-gray-400 dark:text-gray-600 tabular-nums flex-shrink-0 w-[72px] mt-[3px]">
                            {{ date('M Y', $post->date) }}
                        </time>
                        <div class="flex-1">
                            <a href="{{ $post->getUrl() }}" class="text-[16px] text-gray-800 dark:text-gray-200 group-hover:text-gray-950 dark:group-hover:text-gray-50 transition-colors duration-100 leading-snug block mb-2">
                                {{ $post->title }}
                            </a>
                            @if ($post->categories)
                                <div class="flex flex-wrap gap-1.5">
                                    @foreach ($post->categories as $cat)
                                        @include('_components.category-badge', ['category' => $cat])
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                </article>
            @endforeach
        </div>

        {{-- All posts link --}}
        <div class="mt-10 pt-8 border-t border-gray-100 dark:border-gray-900">
            <a href="/blog" class="font-mono text-[13px] text-gray-500 dark:text-gray-400 hover:text-cyan-600 dark:hover:text-cyan-400 transition-colors">
                all posts →
            </a>
        </div>

    </section>
@endsection
