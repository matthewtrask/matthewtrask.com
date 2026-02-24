@extends('_layouts.main')

@section('body')
    <section class="max-w-3xl mx-auto px-6 py-20">

        <div class="flex items-baseline justify-between mb-16">
            <h1 class="font-sans font-bold text-gray-950 dark:text-gray-50 text-xl tracking-tight">Writing</h1>
            <a href="/categories" class="font-mono text-[12px] text-gray-400 dark:text-gray-600 hover:text-cyan-600 dark:hover:text-cyan-400 transition-colors">browse topics →</a>
        </div>

        @php
            $grouped = collect($posts)->groupBy(function ($post) {
                return date('Y', $post->date);
            })->sortKeysDesc();
        @endphp

        <div class="space-y-14">
            @foreach ($grouped as $year => $yearPosts)
                <div>
                    {{-- Year label with cyan left border for a touch of color --}}
                    <div class="font-mono text-[12px] text-gray-500 dark:text-gray-400 mb-5 pl-3 border-l-2 border-cyan-400 dark:border-cyan-500 tracking-wider">
                        {{ $year }}
                    </div>

                    <div class="space-y-1">
                        @foreach ($yearPosts as $post)
                            <article class="group py-3.5 -mx-3 px-3 rounded-lg transition-colors duration-100 hover:bg-white dark:hover:bg-gray-900/60">
                                <div class="flex items-start gap-6 sm:gap-8">
                                    <time class="font-mono text-[12px] text-gray-400 dark:text-gray-600 tabular-nums flex-shrink-0 w-[52px] mt-[3px]">
                                        {{ date('M d', $post->date) }}
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
                </div>
            @endforeach
        </div>

    </section>
@endsection
