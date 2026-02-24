@extends('_layouts.main')

@section('body')
    <section class="max-w-3xl mx-auto px-6 py-20">

        {{-- Intro --}}
        <div class="mb-16">
            <p class="font-serif text-[18px] text-gray-700 dark:text-gray-300 leading-relaxed mb-6">
                Backend engineer. Writing about PHP, software architecture,
                and the craft of building reliable systems.
            </p>
            {{-- Category chips — quick way to browse by topic --}}
            @if ($categories->count())
                <div class="flex flex-wrap gap-2">
                    @foreach ($categories as $category)
                        @include('_components.category-badge', ['category' => $category->getFilename()])
                    @endforeach
                </div>
            @endif
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
