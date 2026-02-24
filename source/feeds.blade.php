@extends('_layouts.main')

@section('body')
    <section class="max-w-3xl mx-auto px-6 py-20">

        <h1 class="font-sans font-bold text-gray-950 dark:text-gray-50 text-xl tracking-tight mb-3">RSS Feeds</h1>
        <p class="font-mono text-[13px] text-gray-500 dark:text-gray-400 mb-16 leading-relaxed">
            Subscribe in any feed reader. Tag a post with a category and it<br class="hidden sm:inline">
            appears in that category's feed automatically.
        </p>

        <div class="space-y-10">

            {{-- Global feed --}}
            <div class="pb-10 border-b border-gray-100 dark:border-gray-900">
                <div class="flex items-center gap-2 mb-3">
                    <span class="w-2 h-2 rounded-full bg-cyan-400 flex-shrink-0"></span>
                    <span class="font-mono text-[12px] uppercase tracking-widest text-gray-950 dark:text-gray-50">All Posts</span>
                </div>
                <p class="font-serif text-[15px] text-gray-600 dark:text-gray-400 leading-relaxed mb-4">
                    Every post, regardless of category.
                </p>
                <a href="/blog/feed.xml"
                   class="font-mono text-[13px] text-cyan-600 dark:text-cyan-400 hover:underline underline-offset-2 break-all">
                    {{ $page->baseUrl }}/blog/feed.xml
                </a>
            </div>

            {{-- Per-category feeds --}}
            @php
                /*
                 * Color palette — full class strings must be present for Tailwind to compile them.
                 */
                $palette = [
                    'cyan'    => ['dot' => 'bg-cyan-400',    'text' => 'text-cyan-700 dark:text-cyan-400'],
                    'amber'   => ['dot' => 'bg-amber-400',   'text' => 'text-amber-700 dark:text-amber-400'],
                    'violet'  => ['dot' => 'bg-violet-400',  'text' => 'text-violet-700 dark:text-violet-400'],
                    'emerald' => ['dot' => 'bg-emerald-400', 'text' => 'text-emerald-700 dark:text-emerald-400'],
                    'rose'    => ['dot' => 'bg-rose-400',    'text' => 'text-rose-700 dark:text-rose-400'],
                    'sky'     => ['dot' => 'bg-sky-400',     'text' => 'text-sky-700 dark:text-sky-400'],
                ];
                $assignment = [
                    'configuration' => 'cyan',
                    'feature'       => 'amber',
                    'php'           => 'violet',
                    'laravel'       => 'rose',
                    'architecture'  => 'emerald',
                    'testing'       => 'emerald',
                    'performance'   => 'amber',
                    'tooling'       => 'sky',
                    'api'           => 'sky',
                    'devops'        => 'violet',
                ];
                $keys = array_keys($palette);
            @endphp

            <div>
                <h2 class="font-sans font-bold text-[15px] text-gray-950 dark:text-gray-50 tracking-tight mb-6">By Category</h2>

                <div class="space-y-8">
                    @foreach ($categories as $category)
                        @php
                            $slug   = $category->getFilename();
                            $key    = $assignment[$slug] ?? $keys[abs(crc32($slug)) % count($keys)];
                            $colors = $palette[$key];
                            $count  = $category->posts($posts)->count();
                            $feedUrl = $page->baseUrl . '/feeds/' . $slug . '.xml';
                        @endphp

                        <div>
                            <div class="flex items-center gap-2 mb-2">
                                <span class="w-2 h-2 rounded-full {{ $colors['dot'] }} flex-shrink-0"></span>
                                <span class="font-mono text-[12px] uppercase tracking-widest {{ $colors['text'] }}">
                                    {{ $category->title }}
                                </span>
                                <span class="font-mono text-[11px] text-gray-400 dark:text-gray-600">
                                    · {{ $count }} {{ $count === 1 ? 'post' : 'posts' }}
                                </span>
                            </div>
                            <a href="{{ $feedUrl }}"
                               class="font-mono text-[13px] text-cyan-600 dark:text-cyan-400 hover:underline underline-offset-2 break-all pl-4">
                                {{ $feedUrl }}
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>

        {{-- RSS primer --}}
        <div class="mt-16 pt-8 border-t border-gray-100 dark:border-gray-900">
            <p class="font-mono text-[12px] text-gray-400 dark:text-gray-600 leading-relaxed">
                New to RSS?
                <a href="https://aboutfeeds.com" target="_blank" rel="noopener"
                   class="text-cyan-600 dark:text-cyan-400 hover:underline underline-offset-2">
                    Learn how feed readers work →
                </a>
            </p>
        </div>

    </section>
@endsection
