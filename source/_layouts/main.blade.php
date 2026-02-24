<!DOCTYPE html>
<html lang="{{ $page->language ?? 'en' }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="canonical" href="{{ $page->getUrl() }}">
    <meta name="description" content="{{ $page->description }}">
    <title>{{ $page->title ?  $page->title . ' | ' : '' }}{{ $page->siteName }}</title>

    {{-- Fonts: Syne (headings/brand), Source Serif 4 (body), JetBrains Mono (labels) --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:ital,wght@0,400;0,500;1,400&family=Source+Serif+4:ital,opsz,wght@0,8..60,300;0,8..60,400;0,8..60,600;1,8..60,300;1,8..60,400&family=Syne:wght@400;600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ mix('css/main.css', 'assets/build') }}">
    <script defer src="{{ mix('js/main.js', 'assets/build') }}"></script>

    {{-- Open Graph --}}
    <meta property="og:site_name" content="{{ $page->siteName }}">
    <meta property="og:type" content="website">
    <meta property="og:title" content="{{ $page->title ? $page->title . ' | ' . $page->siteName : $page->siteName }}">
    <meta property="og:description" content="{{ $page->description ?? $page->siteDescription }}">
    <meta property="og:url" content="{{ $page->getUrl() }}">

    {{-- Twitter Card --}}
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@matthewtrask">
    <meta name="twitter:title" content="{{ $page->title ? $page->title . ' | ' . $page->siteName : $page->siteName }}">
    <meta name="twitter:description" content="{{ $page->description ?? $page->siteDescription }}">

    {{-- RSS autodiscovery — feed readers pick this up automatically --}}
    <link rel="alternate" type="application/rss+xml" title="{{ $page->siteName }}" href="{{ $page->baseUrl }}/blog/feed.xml">

    {{-- WebSite structured data --}}
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "WebSite",
        "name": "{{ $page->siteName }}",
        "url": "{{ $page->baseUrl }}",
        "description": "{{ $page->siteDescription }}",
        "author": {
            "@type": "Person",
            "name": "{{ $page->siteAuthor }}",
            "url": "{{ $page->baseUrl }}"
        }
    }
    </script>

    {{-- Slot for page-specific meta (article tags, category feeds, og:image, etc.) --}}
    @yield('meta')
</head>
<body class="antialiased bg-gray-50 dark:bg-gray-950 text-gray-900 dark:text-gray-100 transition-colors duration-200 font-sans">

{{-- Signature gradient bar --}}
<div class="h-[2px] bg-gradient-to-r from-cyan-500 via-blue-500 to-indigo-500"></div>

{{-- Header --}}
<header class="border-b border-gray-100 dark:border-gray-900">
    <nav class="max-w-3xl mx-auto px-6 py-6">
        <div class="flex items-center justify-between">

            {{-- Brand --}}
            <a href="/" class="group flex items-center gap-2">
                <span class="font-sans font-bold text-[15px] tracking-tight text-gray-950 dark:text-gray-50">
                    Matthew Trask
                </span>
                <span class="w-1.5 h-1.5 rounded-full bg-cyan-400 opacity-60 group-hover:opacity-100 transition-opacity duration-150 flex-shrink-0"></span>
            </a>

            {{-- Nav --}}
            <div class="flex items-center gap-6">
                <a href="/blog" class="relative font-mono text-[13px] text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 transition-colors duration-150 group">
                    writing
                    <span class="absolute -bottom-0.5 left-0 right-0 h-px bg-cyan-400 scale-x-0 group-hover:scale-x-100 transition-transform duration-200 origin-left"></span>
                </a>
                <a href="/categories" class="relative font-mono text-[13px] text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 transition-colors duration-150 group">
                    topics
                    <span class="absolute -bottom-0.5 left-0 right-0 h-px bg-cyan-400 scale-x-0 group-hover:scale-x-100 transition-transform duration-200 origin-left"></span>
                </a>
                <a href="/about" class="relative font-mono text-[13px] text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 transition-colors duration-150 group">
                    about
                    <span class="absolute -bottom-0.5 left-0 right-0 h-px bg-cyan-400 scale-x-0 group-hover:scale-x-100 transition-transform duration-200 origin-left"></span>
                </a>
                <a href="/feeds" class="relative font-mono text-[13px] text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 transition-colors duration-150 group">
                    rss
                    <span class="absolute -bottom-0.5 left-0 right-0 h-px bg-cyan-400 scale-x-0 group-hover:scale-x-100 transition-transform duration-200 origin-left"></span>
                </a>
                <button id="theme-toggle" class="text-gray-400 dark:text-gray-500 hover:text-gray-700 dark:hover:text-gray-300 transition-colors" aria-label="Toggle dark mode">
                    {{-- Sun (shown in dark mode) --}}
                    <svg class="w-[17px] h-[17px] hidden dark:block" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path>
                    </svg>
                    {{-- Moon (shown in light mode) --}}
                    <svg class="w-[17px] h-[17px] dark:hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path>
                    </svg>
                </button>
            </div>

        </div>
    </nav>
</header>

{{-- Main Content --}}
<main>
    @yield('body')
</main>

{{-- Footer --}}
<footer class="border-t border-gray-100 dark:border-gray-900 mt-24">
    <div class="max-w-3xl mx-auto px-6 py-8 space-y-4">
        <div class="flex justify-between items-center">
            <span class="font-mono text-xs text-gray-400 dark:text-gray-600">
                &copy; {{ date('Y') }} Matthew Trask
            </span>
            <div class="flex items-center gap-4 font-mono text-xs">
                <a href="https://github.com/matthewtrask" class="text-gray-400 dark:text-gray-600 hover:text-gray-700 dark:hover:text-gray-300 transition-colors">github</a>
                <a href="https://twitter.com/matthewtrask" class="text-gray-400 dark:text-gray-600 hover:text-gray-700 dark:hover:text-gray-300 transition-colors">twitter</a>
                <a href="/feeds" class="text-gray-400 dark:text-gray-600 hover:text-gray-700 dark:hover:text-gray-300 transition-colors">rss</a>
            </div>
        </div>
        <div class="flex items-center gap-4 font-mono text-xs">
            <a href="/now" class="text-gray-400 dark:text-gray-600 hover:text-gray-700 dark:hover:text-gray-300 transition-colors">/now</a>
            <a href="/uses" class="text-gray-400 dark:text-gray-600 hover:text-gray-700 dark:hover:text-gray-300 transition-colors">/uses</a>
            <a href="/colophon" class="text-gray-400 dark:text-gray-600 hover:text-gray-700 dark:hover:text-gray-300 transition-colors">/colophon</a>
            <a href="/resume" class="text-gray-400 dark:text-gray-600 hover:text-gray-700 dark:hover:text-gray-300 transition-colors">/resume</a>
        </div>
    </div>
</footer>

<script>
    const themeToggle = document.getElementById('theme-toggle');
    const html = document.documentElement;

    const savedTheme = localStorage.getItem('theme');
    const systemPrefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;

    if (savedTheme === 'dark' || (!savedTheme && systemPrefersDark)) {
        html.classList.add('dark');
    }

    themeToggle?.addEventListener('click', () => {
        html.classList.toggle('dark');
        localStorage.setItem('theme', html.classList.contains('dark') ? 'dark' : 'light');
    });
</script>
</body>
</html>
