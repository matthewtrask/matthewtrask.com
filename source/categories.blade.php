@extends('_layouts.main')

@section('body')
    <section class="max-w-3xl mx-auto px-6 py-20">

        <h1 class="font-sans font-bold text-gray-950 dark:text-gray-50 text-xl tracking-tight mb-3">Topics</h1>
        <p class="font-mono text-[13px] text-gray-500 dark:text-gray-400 mb-16">
            Browse all posts by category.
        </p>

        @php
            /*
             * Color palette — full class strings are present here so Tailwind compiles them.
             */
            $palette = [
                'cyan'    => ['dot' => 'bg-cyan-400',    'label' => 'text-cyan-700 dark:text-cyan-400',    'border' => 'border-cyan-100 dark:border-cyan-900',    'card' => 'bg-cyan-50/50 dark:bg-cyan-950/20'],
                'amber'   => ['dot' => 'bg-amber-400',   'label' => 'text-amber-700 dark:text-amber-400',   'border' => 'border-amber-100 dark:border-amber-900',   'card' => 'bg-amber-50/50 dark:bg-amber-950/20'],
                'violet'  => ['dot' => 'bg-violet-400',  'label' => 'text-violet-700 dark:text-violet-400',  'border' => 'border-violet-100 dark:border-violet-900',  'card' => 'bg-violet-50/50 dark:bg-violet-950/20'],
                'emerald' => ['dot' => 'bg-emerald-400', 'label' => 'text-emerald-700 dark:text-emerald-400', 'border' => 'border-emerald-100 dark:border-emerald-900', 'card' => 'bg-emerald-50/50 dark:bg-emerald-950/20'],
                'rose'    => ['dot' => 'bg-rose-400',    'label' => 'text-rose-700 dark:text-rose-400',    'border' => 'border-rose-100 dark:border-rose-900',    'card' => 'bg-rose-50/50 dark:bg-rose-950/20'],
                'sky'     => ['dot' => 'bg-sky-400',     'label' => 'text-sky-700 dark:text-sky-400',     'border' => 'border-sky-100 dark:border-sky-900',     'card' => 'bg-sky-50/50 dark:bg-sky-950/20'],
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

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            @foreach ($categories as $category)
                @php
                    $slug   = $category->getFilename();
                    $key    = $assignment[$slug] ?? $keys[abs(crc32($slug)) % count($keys)];
                    $colors = $palette[$key];
                    $count  = $category->posts($posts)->count();
                @endphp

                <a href="{{ $category->getUrl() }}"
                   class="group block p-6 rounded-xl border {{ $colors['border'] }} {{ $colors['card'] }} hover:shadow-sm transition-all duration-150">

                    {{-- Category label --}}
                    <div class="flex items-center gap-2 mb-4">
                        <span class="w-2 h-2 rounded-full {{ $colors['dot'] }} flex-shrink-0"></span>
                        <span class="font-mono text-[12px] uppercase tracking-widest {{ $colors['label'] }}">
                            {{ $category->title }}
                        </span>
                    </div>

                    {{-- Description --}}
                    <p class="font-serif text-[15px] text-gray-600 dark:text-gray-400 leading-relaxed mb-4">
                        {{ $category->description }}
                    </p>

                    {{-- Post count --}}
                    <span class="font-mono text-[11px] text-gray-400 dark:text-gray-600">
                        {{ $count }} {{ $count === 1 ? 'post' : 'posts' }}
                    </span>

                </a>
            @endforeach
        </div>

    </section>
@endsection
