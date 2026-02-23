@extends('_layouts.main')

@section('body')
    <section class="max-w-2xl mx-auto px-6 py-16">

        <h1 class="font-sans font-bold text-gray-950 dark:text-gray-50 text-lg tracking-tight mb-16">Writing</h1>

        @php
            $grouped = collect($posts)->groupBy(function ($post) {
                return date('Y', $post->date);
            })->sortKeysDesc();
        @endphp

        <div class="space-y-12">
            @foreach ($grouped as $year => $yearPosts)
                <div>
                    <div class="font-mono text-[11px] text-gray-400 dark:text-gray-600 mb-3 tracking-wider">
                        {{ $year }}
                    </div>
                    <div class="divide-y divide-gray-100 dark:divide-gray-900">
                        @foreach ($yearPosts as $post)
                            <article>
                                <a href="{{ $post->getUrl() }}" class="group flex items-baseline gap-5 sm:gap-8 py-3 -mx-2 px-2 rounded transition-colors duration-100 hover:bg-white dark:hover:bg-gray-900/60">
                                    <time class="font-mono text-[11px] text-gray-400 dark:text-gray-600 tabular-nums flex-shrink-0 w-[52px]">
                                        {{ date('M d', $post->date) }}
                                    </time>
                                    <span class="text-[15px] text-gray-700 dark:text-gray-300 group-hover:text-gray-950 dark:group-hover:text-gray-50 transition-colors duration-100 leading-snug">
                                        {{ $post->title }}
                                    </span>
                                </a>
                            </article>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>

    </section>
@endsection
