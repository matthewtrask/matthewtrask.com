---
title: Colophon
description: How this site is built, what it runs on, and the tools behind it.
---
@extends('_layouts.main')

@section('body')
    <article class="max-w-3xl mx-auto px-6 py-20">

        <div class="mb-14">
            <span class="font-mono text-[11px] uppercase tracking-widest text-cyan-600 dark:text-cyan-400">/colophon</span>
            <h1 class="font-sans font-bold text-gray-950 dark:text-gray-50 text-xl tracking-tight mt-3">How this site is made</h1>
            <p class="font-mono text-[12px] text-gray-400 dark:text-gray-600 mt-2">The tools, stack, and decisions behind matthewtrask.com.</p>
        </div>

        <div class="space-y-14 max-w-2xl">

            <section>
                <h2 class="font-mono text-[11px] uppercase tracking-widest text-gray-400 dark:text-gray-600 mb-6">Generator</h2>
                <div class="flex gap-6">
                    <span class="font-mono text-[12px] text-gray-400 dark:text-gray-600 w-[70px] flex-shrink-0 mt-0.5">engine</span>
                    <div>
                        <p class="font-sans text-[15px] font-medium text-gray-900 dark:text-gray-100">
                            <a href="https://jigsaw.tighten.com" class="text-cyan-600 dark:text-cyan-400 hover:underline underline-offset-2">Jigsaw</a>
                        </p>
                        <p class="font-serif text-[16px] text-gray-500 dark:text-gray-500 leading-relaxed mt-1">
                            A static site generator built on Laravel's Blade templating engine. Lets me write PHP logic in templates, use collections, and generate static HTML — no runtime server required.
                        </p>
                    </div>
                </div>
            </section>

            <section>
                <h2 class="font-mono text-[11px] uppercase tracking-widest text-gray-400 dark:text-gray-600 mb-6">Styling</h2>
                <div class="space-y-5">
                    <div class="flex gap-6">
                        <span class="font-mono text-[12px] text-gray-400 dark:text-gray-600 w-[70px] flex-shrink-0 mt-0.5">css</span>
                        <div>
                            <p class="font-sans text-[15px] font-medium text-gray-900 dark:text-gray-100">
                                <a href="https://tailwindcss.com" class="text-cyan-600 dark:text-cyan-400 hover:underline underline-offset-2">Tailwind CSS v3</a>
                            </p>
                            <p class="font-serif text-[16px] text-gray-500 dark:text-gray-500 leading-relaxed mt-1">
                                Utility-first CSS. Dark mode via the <code class="font-mono text-[0.875em] bg-gray-100 dark:bg-gray-900 px-1.5 py-0.5 rounded text-gray-800 dark:text-gray-200">class</code> strategy. The <code class="font-mono text-[0.875em] bg-gray-100 dark:bg-gray-900 px-1.5 py-0.5 rounded text-gray-800 dark:text-gray-200">@tailwindcss/typography</code> plugin handles prose content.
                            </p>
                        </div>
                    </div>
                    <div class="flex gap-6">
                        <span class="font-mono text-[12px] text-gray-400 dark:text-gray-600 w-[70px] flex-shrink-0 mt-0.5">fonts</span>
                        <div>
                            <p class="font-sans text-[15px] font-medium text-gray-900 dark:text-gray-100">Syne · Source Serif 4 · JetBrains Mono</p>
                            <p class="font-serif text-[16px] text-gray-500 dark:text-gray-500 leading-relaxed mt-1">
                                Syne for headings and brand — geometric, distinctive. Source Serif 4 for long-form body text — readable at any weight. JetBrains Mono for code, metadata, and labels — ligatures on. All loaded from Google Fonts.
                            </p>
                        </div>
                    </div>
                </div>
            </section>

            <section>
                <h2 class="font-mono text-[11px] uppercase tracking-widest text-gray-400 dark:text-gray-600 mb-6">Assets</h2>
                <div class="space-y-5">
                    <div class="flex gap-6">
                        <span class="font-mono text-[12px] text-gray-400 dark:text-gray-600 w-[70px] flex-shrink-0 mt-0.5">build</span>
                        <div>
                            <p class="font-sans text-[15px] font-medium text-gray-900 dark:text-gray-100">Laravel Mix (Webpack)</p>
                            <p class="font-serif text-[16px] text-gray-500 dark:text-gray-500 leading-relaxed mt-1">
                                Compiles and versions CSS and JavaScript. PostCSS handles Tailwind, nesting, and imports. Source maps in development, minified in production.
                            </p>
                        </div>
                    </div>
                    <div class="flex gap-6">
                        <span class="font-mono text-[12px] text-gray-400 dark:text-gray-600 w-[70px] flex-shrink-0 mt-0.5">syntax</span>
                        <div>
                            <p class="font-sans text-[15px] font-medium text-gray-900 dark:text-gray-100">
                                <a href="https://highlightjs.org" class="text-cyan-600 dark:text-cyan-400 hover:underline underline-offset-2">highlight.js</a>
                            </p>
                            <p class="font-serif text-[16px] text-gray-500 dark:text-gray-500 leading-relaxed mt-1">
                                Client-side syntax highlighting. Using the GitHub Dark Dimmed theme. Languages registered: PHP, JavaScript, CSS, Bash, JSON, YAML, Markdown, SCSS, HTML.
                            </p>
                        </div>
                    </div>
                </div>
            </section>

            <section>
                <h2 class="font-mono text-[11px] uppercase tracking-widest text-gray-400 dark:text-gray-600 mb-6">Deployment</h2>
                <div class="space-y-5">
                    <div class="flex gap-6">
                        <span class="font-mono text-[12px] text-gray-400 dark:text-gray-600 w-[70px] flex-shrink-0 mt-0.5">ci</span>
                        <div>
                            <p class="font-sans text-[15px] font-medium text-gray-900 dark:text-gray-100">GitHub Actions</p>
                            <p class="font-serif text-[16px] text-gray-500 dark:text-gray-500 leading-relaxed mt-1">
                                Pushing to <code class="font-mono text-[0.875em] bg-gray-100 dark:bg-gray-900 px-1.5 py-0.5 rounded text-gray-800 dark:text-gray-200">develop</code> triggers a build. The workflow installs dependencies, compiles assets with <code class="font-mono text-[0.875em] bg-gray-100 dark:bg-gray-900 px-1.5 py-0.5 rounded text-gray-800 dark:text-gray-200">npm run prod</code>, runs Jigsaw's build, then uses <code class="font-mono text-[0.875em] bg-gray-100 dark:bg-gray-900 px-1.5 py-0.5 rounded text-gray-800 dark:text-gray-200">git subtree split</code> to publish only the <code class="font-mono text-[0.875em] bg-gray-100 dark:bg-gray-900 px-1.5 py-0.5 rounded text-gray-800 dark:text-gray-200">build_production/</code> directory to the <code class="font-mono text-[0.875em] bg-gray-100 dark:bg-gray-900 px-1.5 py-0.5 rounded text-gray-800 dark:text-gray-200">main</code> branch.
                            </p>
                        </div>
                    </div>
                    <div class="flex gap-6">
                        <span class="font-mono text-[12px] text-gray-400 dark:text-gray-600 w-[70px] flex-shrink-0 mt-0.5">host</span>
                        <div>
                            <p class="font-sans text-[15px] font-medium text-gray-900 dark:text-gray-100">GitHub Pages</p>
                            <p class="font-serif text-[16px] text-gray-500 dark:text-gray-500 leading-relaxed mt-1">
                                Serves the static build from the <code class="font-mono text-[0.875em] bg-gray-100 dark:bg-gray-900 px-1.5 py-0.5 rounded text-gray-800 dark:text-gray-200">main</code> branch. Zero server maintenance, free, fast.
                            </p>
                        </div>
                    </div>
                </div>
            </section>

            <section>
                <h2 class="font-mono text-[11px] uppercase tracking-widest text-gray-400 dark:text-gray-600 mb-6">Features</h2>
                <div class="space-y-3">
                    @php
                        $features = [
                            'Dark mode'           => 'System preference detected, toggleable, persisted in localStorage.',
                            'Per-category RSS'    => 'Each topic has its own feed. Subscribe to only what you want.',
                            'Reading time'        => 'Estimated on every post. Calculated server-side at build time.',
                            'Code copy button'    => 'Appears on hover over any code block. Copies to clipboard.',
                            'Open Graph tags'     => 'Every page and post has full OG + Twitter Card meta.',
                            'RSS autodiscovery'   => 'Feed readers find per-category feeds automatically via <link> tags.',
                        ];
                    @endphp
                    @foreach ($features as $name => $description)
                        <div class="flex gap-6 py-2.5 border-b border-gray-100 dark:border-gray-900 last:border-0">
                            <span class="font-mono text-[12px] text-gray-900 dark:text-gray-100 w-[140px] flex-shrink-0">{{ $name }}</span>
                            <span class="font-serif text-[16px] text-gray-500 dark:text-gray-500">{{ $description }}</span>
                        </div>
                    @endforeach
                </div>
            </section>

        </div>

        <div class="mt-16 pt-8 border-t border-gray-100 dark:border-gray-900">
            <p class="font-mono text-[12px] text-gray-400 dark:text-gray-600">
                Source available on <a href="https://github.com/matthewtrask/matthewtrask.com" class="text-cyan-600 dark:text-cyan-400 hover:underline underline-offset-2">GitHub</a>.
            </p>
        </div>

    </article>
@endsection
