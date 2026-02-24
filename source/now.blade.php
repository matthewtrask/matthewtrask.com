---
title: Now
description: What I'm currently focused on.
---
@extends('_layouts.main')

@section('body')
    <article class="max-w-3xl mx-auto px-6 py-20">

        <div class="mb-14">
            <span class="font-mono text-[11px] uppercase tracking-widest text-cyan-600 dark:text-cyan-400">/now</span>
            <h1 class="font-sans font-bold text-gray-950 dark:text-gray-50 text-xl tracking-tight mt-3">What I'm doing now</h1>
            <p class="font-mono text-[12px] text-gray-400 dark:text-gray-600 mt-2">Updated {{ date('F Y') }} · Nashville, TN</p>
        </div>

        <div class="space-y-14 max-w-2xl">

            <section>
                <h2 class="font-mono text-[11px] uppercase tracking-widest text-gray-400 dark:text-gray-600 mb-5">Working on</h2>
                <div class="font-serif text-[18px] text-gray-700 dark:text-gray-300 leading-[1.85] space-y-4">
                    <p>
                        <!-- Replace with what you're currently building/working on -->
                        Building out this site and writing more consistently. Working on open source PHP tooling and contributing to projects in the Laravel ecosystem.
                    </p>
                </div>
            </section>

            <section>
                <h2 class="font-mono text-[11px] uppercase tracking-widest text-gray-400 dark:text-gray-600 mb-5">Reading</h2>
                <div class="space-y-3">
                    <!-- Replace with what you're reading -->
                    <div class="flex items-baseline gap-4">
                        <span class="font-mono text-[12px] text-gray-400 dark:text-gray-600 flex-shrink-0">book</span>
                        <span class="font-serif text-[17px] text-gray-700 dark:text-gray-300">
                            <em>A Philosophy of Software Design</em> — John Ousterhout
                        </span>
                    </div>
                    <div class="flex items-baseline gap-4">
                        <span class="font-mono text-[12px] text-gray-400 dark:text-gray-600 flex-shrink-0">book</span>
                        <span class="font-serif text-[17px] text-gray-700 dark:text-gray-300">
                            <em>Staff Engineer</em> — Will Larson
                        </span>
                    </div>
                </div>
            </section>

            <section>
                <h2 class="font-mono text-[11px] uppercase tracking-widest text-gray-400 dark:text-gray-600 mb-5">Learning</h2>
                <div class="font-serif text-[18px] text-gray-700 dark:text-gray-300 leading-[1.85] space-y-4">
                    <p>
                        <!-- Replace with what you're learning/exploring -->
                        Digging deeper into event-driven architecture patterns, and exploring Rust for systems-level tooling.
                    </p>
                </div>
            </section>

            <section>
                <h2 class="font-mono text-[11px] uppercase tracking-widest text-gray-400 dark:text-gray-600 mb-5">Listening to</h2>
                <div class="space-y-3">
                    <!-- Replace with what you're listening to -->
                    <div class="flex items-baseline gap-4">
                        <span class="font-mono text-[12px] text-gray-400 dark:text-gray-600 flex-shrink-0">podcast</span>
                        <span class="font-serif text-[17px] text-gray-700 dark:text-gray-300">Laravel Podcast</span>
                    </div>
                    <div class="flex items-baseline gap-4">
                        <span class="font-mono text-[12px] text-gray-400 dark:text-gray-600 flex-shrink-0">podcast</span>
                        <span class="font-serif text-[17px] text-gray-700 dark:text-gray-300">Software Engineering Daily</span>
                    </div>
                </div>
            </section>

        </div>

        <div class="mt-16 pt-8 border-t border-gray-100 dark:border-gray-900">
            <p class="font-mono text-[12px] text-gray-400 dark:text-gray-600">
                This is a <a href="https://nownownow.com/about" class="text-cyan-600 dark:text-cyan-400 hover:underline underline-offset-2">/now page</a>. Everyone should have one.
            </p>
        </div>

    </article>
@endsection
