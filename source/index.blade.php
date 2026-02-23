@extends('_layouts.main')

@section('body')
    <section class="max-w-2xl mx-auto px-6 py-16">

        {{-- Intro --}}
        <p class="font-mono text-[13px] text-gray-500 dark:text-gray-400 leading-relaxed mb-16">
            Backend engineer. Writing about PHP, software architecture,<br class="hidden sm:inline">
            and the craft of building reliable systems.
        </p>

        {{-- Recent posts --}}
        <div class="divide-y divide-gray-100 dark:divide-gray-900">
            @foreach ($posts->take(10) as $post)
                <article>
                    <a href="{{ $post->getUrl() }}" class="group flex items-baseline gap-5 sm:gap-8 py-3.5 -mx-2 px-2 rounded transition-colors duration-100 hover:bg-white dark:hover:bg-gray-900/60">
                        <time class="font-mono text-[11px] text-gray-400 dark:text-gray-600 tabular-nums flex-shrink-0 w-[70px]">
                            {{ date('M Y', $post->date) }}
                        </time>
                        <span class="text-[15px] text-gray-700 dark:text-gray-300 group-hover:text-gray-950 dark:group-hover:text-gray-50 transition-colors duration-100 leading-snug">
                            {{ $post->title }}
                        </span>
                    </a>
                </article>
            @endforeach
        </div>

        {{-- All posts link --}}
        <div class="mt-10">
            <a href="/blog" class="font-mono text-[12px] text-gray-400 dark:text-gray-600 hover:text-cyan-600 dark:hover:text-cyan-400 transition-colors">
                all posts →
            </a>
        </div>

    </section>
@endsection
