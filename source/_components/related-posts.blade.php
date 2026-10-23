{{--
    "Keep reading" links at the foot of a post.

    Front matter decides what shows up:

        related: [where-I-grew-up, the-social-death]   hand-picked, in this order
        related: false                                 no section at all
        (omitted)                                      posts sharing a category

    Slugs are post filenames, case-insensitive, with or without .md
--}}
@php
    $relatedSetting = $page->related;

    if ($relatedSetting === false) {
        $related = collect();
    } elseif (is_iterable($relatedSetting)) {
        $bySlug = collect($posts)->keyBy(fn ($post) => strtolower($post->getFilename()));

        $related = collect($relatedSetting)
            ->map(fn ($slug) => $bySlug->get(strtolower(pathinfo((string) $slug, PATHINFO_FILENAME))))
            ->filter()
            ->values();
    } else {
        // Front matter arrays arrive as Jigsaw IterableObjects, so compare via collections.
        $myCategories = collect($page->categories);

        // The `follows:` post is already highlighted in the header, so don't
        // repeat it down here.
        $alreadyShown = collect([$page->getFilename()])
            ->merge(is_iterable($page->follows) ? $page->follows : [$page->follows])
            ->filter()
            ->map(fn ($slug) => strtolower(pathinfo((string) $slug, PATHINFO_FILENAME)));

        $related = collect($posts)
            ->reject(fn ($post) => $alreadyShown->contains(strtolower($post->getFilename())))
            ->map(fn ($post) => [
                'post' => $post,
                'shared' => collect($post->categories)->intersect($myCategories)->count(),
            ])
            ->filter(fn ($entry) => $entry['shared'] > 0)
            ->sortByDesc(fn ($entry) => [$entry['shared'], $entry['post']->date])
            ->take(3)
            ->pluck('post')
            ->values();

        // Nothing shares a category yet -- fall back to a neighbour by date.
        // config.php sorts newest-first, so the next one down is the older one;
        // the oldest post has nobody below it, so it looks up instead.
        if ($related->isEmpty()) {
            $ordered = collect($posts)->values();
            $index = $ordered->search(fn ($post) => $post->getFilename() === $page->getFilename());

            $related = $index === false
                ? collect()
                : collect([$ordered->get($index + 1) ?? $ordered->get($index - 1)])->filter();
        }
    }
@endphp

@if ($related->isNotEmpty())
    <nav class="mt-20 pt-10 border-t border-gray-200 dark:border-gray-800">
        <h2 class="font-mono text-[12px] text-gray-400 dark:text-gray-600 tracking-wide mb-2">
            keep reading
        </h2>
        @foreach ($related as $post)
            @include('_components.post-preview-inline', ['post' => $post])
        @endforeach
    </nav>
@endif
