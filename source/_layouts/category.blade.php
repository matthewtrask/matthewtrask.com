@extends('_layouts.main')

@section('body')
    <section class="max-w-3xl mx-auto px-6 py-20">

        <a href="/categories" class="font-mono text-[12px] text-gray-400 dark:text-gray-600 hover:text-cyan-600 dark:hover:text-cyan-400 transition-colors mb-12 inline-block">
            ← topics
        </a>

        <div class="mb-16">
            {{-- Show a colored badge for this category --}}
            @include('_components.category-badge', ['category' => $page->getFilename()])

            <h1 class="font-sans font-bold text-gray-950 dark:text-gray-50 text-xl tracking-tight mt-4 mb-2">
                {{ $page->title }}
            </h1>
            <p class="font-mono text-[13px] text-gray-500 dark:text-gray-400">
                {{ $page->description }}
            </p>
        </div>

        <div class="space-y-1">
            @foreach ($page->posts($posts) as $post)
                <article class="group py-3.5 -mx-3 px-3 rounded-lg transition-colors duration-100 hover:bg-white dark:hover:bg-gray-900/60">
                    <div class="flex items-start gap-6 sm:gap-8">
                        <time class="font-mono text-[12px] text-gray-400 dark:text-gray-600 tabular-nums flex-shrink-0 w-[72px] mt-[3px]">
                            {{ date('M Y', $post->date) }}
                        </time>
                        <a href="{{ $post->getUrl() }}" class="flex-1 text-[16px] text-gray-800 dark:text-gray-200 group-hover:text-gray-950 dark:group-hover:text-gray-50 transition-colors duration-100 leading-snug">
                            {{ $post->title }}
                        </a>
                    </div>
                </article>
            @endforeach
        </div>

    </section>
@endsection
