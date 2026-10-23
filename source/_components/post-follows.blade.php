{{--
    Posts this one follows directly from, shown under the category badges:

        follows: congential-adrenal-hyperplasia
        follows: [congential-adrenal-hyperplasia, where-I-grew-up]

    One slug or a list; a list renders in the order written. Same slug rules as
    `related:` -- case-insensitive, .md optional. Drafts and unknown slugs
    render nothing, and ValidateRelatedPosts warns about them at build time.
--}}
@php
    $followsSetting = $page->follows;

    $followed = collect(is_iterable($followsSetting) ? $followsSetting : array_filter([$followsSetting], 'is_scalar'))
        ->map(fn ($slug) => collect($posts)
            ->keyBy(fn ($post) => strtolower($post->getFilename()))
            ->get(strtolower(pathinfo((string) $slug, PATHINFO_FILENAME))))
        ->filter()
        ->values();
@endphp

@if ($followed->isNotEmpty())
    <div class="mt-8 border-l-2 border-gray-200 dark:border-gray-800 pl-4 py-1">
        <span class="font-mono text-[11px] uppercase tracking-wide text-gray-400 dark:text-gray-600 block mb-1.5">
            follows
        </span>
        @foreach ($followed as $post)
            <a href="{{ $post->getUrl() }}"
               class="block text-[15px] text-gray-700 dark:text-gray-300 hover:text-cyan-700 dark:hover:text-cyan-400 leading-snug transition-colors duration-100 {{ $loop->last ? '' : 'mb-1' }}">
                {{ $post->title }}
            </a>
        @endforeach
    </div>
@endif
