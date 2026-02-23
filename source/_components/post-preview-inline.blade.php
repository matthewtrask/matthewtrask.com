<article class="py-4">
    <a href="{{ $post->getUrl() }}" class="group flex items-baseline gap-5 sm:gap-8 -mx-2 px-2 rounded transition-colors duration-100 hover:bg-white dark:hover:bg-gray-900/60">
        <time class="font-mono text-[11px] text-gray-400 dark:text-gray-600 tabular-nums flex-shrink-0 w-[70px]">
            {{ $post->getDate()->format('M Y') }}
        </time>
        <div class="flex-1">
            <span class="text-[15px] text-gray-700 dark:text-gray-300 group-hover:text-gray-950 dark:group-hover:text-gray-50 transition-colors duration-100 leading-snug block">
                {{ $post->title }}
            </span>
            @if ($post->description)
                <span class="font-mono text-[12px] text-gray-400 dark:text-gray-600 block mt-1 leading-relaxed">
                    {{ $post->getReadTime() }}m read
                </span>
            @endif
        </div>
    </a>
</article>
