---
title: Uses
description: The hardware, software, and tools I use day-to-day.
---
@extends('_layouts.main')

@section('body')
    <article class="max-w-3xl mx-auto px-6 py-20">

        <div class="mb-14">
            <span class="font-mono text-[11px] uppercase tracking-widest text-cyan-600 dark:text-cyan-400">/uses</span>
            <h1 class="font-sans font-bold text-gray-950 dark:text-gray-50 text-xl tracking-tight mt-3">What I use</h1>
            <p class="font-mono text-[12px] text-gray-400 dark:text-gray-600 mt-2">Hardware, software, and tools I rely on.</p>
        </div>

        <div class="space-y-14 max-w-2xl">

            <section>
                <h2 class="font-mono text-[11px] uppercase tracking-widest text-gray-400 dark:text-gray-600 mb-6">Hardware</h2>
                <div class="space-y-5">
                    <!-- Replace / update with your actual setup -->
                    <div class="flex gap-6">
                        <span class="font-mono text-[12px] text-gray-400 dark:text-gray-600 w-[70px] flex-shrink-0 mt-0.5">machine</span>
                        <div>
                            <p class="font-sans text-[15px] font-medium text-gray-900 dark:text-gray-100">MacBook Pro</p>
                            <p class="font-serif text-[16px] text-gray-500 dark:text-gray-500 mt-0.5">Your specs here — chip, RAM, storage.</p>
                        </div>
                    </div>
                    <div class="flex gap-6">
                        <span class="font-mono text-[12px] text-gray-400 dark:text-gray-600 w-[70px] flex-shrink-0 mt-0.5">monitor</span>
                        <div>
                            <p class="font-sans text-[15px] font-medium text-gray-900 dark:text-gray-100">Your monitor here</p>
                            <p class="font-serif text-[16px] text-gray-500 dark:text-gray-500 mt-0.5">Size, resolution, brand.</p>
                        </div>
                    </div>
                    <div class="flex gap-6">
                        <span class="font-mono text-[12px] text-gray-400 dark:text-gray-600 w-[70px] flex-shrink-0 mt-0.5">keyboard</span>
                        <div>
                            <p class="font-sans text-[15px] font-medium text-gray-900 dark:text-gray-100">Your keyboard here</p>
                            <p class="font-serif text-[16px] text-gray-500 dark:text-gray-500 mt-0.5">Switches, layout, feel.</p>
                        </div>
                    </div>
                    <div class="flex gap-6">
                        <span class="font-mono text-[12px] text-gray-400 dark:text-gray-600 w-[70px] flex-shrink-0 mt-0.5">audio</span>
                        <div>
                            <p class="font-sans text-[15px] font-medium text-gray-900 dark:text-gray-100">Your headphones/speakers here</p>
                            <p class="font-serif text-[16px] text-gray-500 dark:text-gray-500 mt-0.5">Brand, model, use case.</p>
                        </div>
                    </div>
                </div>
            </section>

            <section>
                <h2 class="font-mono text-[11px] uppercase tracking-widest text-gray-400 dark:text-gray-600 mb-6">Editor & Terminal</h2>
                <div class="space-y-5">
                    <div class="flex gap-6">
                        <span class="font-mono text-[12px] text-gray-400 dark:text-gray-600 w-[70px] flex-shrink-0 mt-0.5">editor</span>
                        <div>
                            <p class="font-sans text-[15px] font-medium text-gray-900 dark:text-gray-100">Your editor here</p>
                            <p class="font-serif text-[16px] text-gray-500 dark:text-gray-500 mt-0.5">Theme, key extensions, config notes.</p>
                        </div>
                    </div>
                    <div class="flex gap-6">
                        <span class="font-mono text-[12px] text-gray-400 dark:text-gray-600 w-[70px] flex-shrink-0 mt-0.5">terminal</span>
                        <div>
                            <p class="font-sans text-[15px] font-medium text-gray-900 dark:text-gray-100">Your terminal here</p>
                            <p class="font-serif text-[16px] text-gray-500 dark:text-gray-500 mt-0.5">Shell, prompt, plugins.</p>
                        </div>
                    </div>
                    <div class="flex gap-6">
                        <span class="font-mono text-[12px] text-gray-400 dark:text-gray-600 w-[70px] flex-shrink-0 mt-0.5">font</span>
                        <div>
                            <p class="font-sans text-[15px] font-medium text-gray-900 dark:text-gray-100">JetBrains Mono</p>
                            <p class="font-serif text-[16px] text-gray-500 dark:text-gray-500 mt-0.5">Ligatures on. Clean, readable, great for long sessions.</p>
                        </div>
                    </div>
                </div>
            </section>

            <section>
                <h2 class="font-mono text-[11px] uppercase tracking-widest text-gray-400 dark:text-gray-600 mb-6">Software</h2>
                <div class="space-y-5">
                    <!-- Replace / add your actual apps -->
                    <div class="flex gap-6">
                        <span class="font-mono text-[12px] text-gray-400 dark:text-gray-600 w-[70px] flex-shrink-0 mt-0.5">browser</span>
                        <div>
                            <p class="font-sans text-[15px] font-medium text-gray-900 dark:text-gray-100">Your browser here</p>
                            <p class="font-serif text-[16px] text-gray-500 dark:text-gray-500 mt-0.5">Extensions you can't live without.</p>
                        </div>
                    </div>
                    <div class="flex gap-6">
                        <span class="font-mono text-[12px] text-gray-400 dark:text-gray-600 w-[70px] flex-shrink-0 mt-0.5">notes</span>
                        <div>
                            <p class="font-sans text-[15px] font-medium text-gray-900 dark:text-gray-100">Your notes app here</p>
                            <p class="font-serif text-[16px] text-gray-500 dark:text-gray-500 mt-0.5">How you use it, what for.</p>
                        </div>
                    </div>
                    <div class="flex gap-6">
                        <span class="font-mono text-[12px] text-gray-400 dark:text-gray-600 w-[70px] flex-shrink-0 mt-0.5">api</span>
                        <div>
                            <p class="font-sans text-[15px] font-medium text-gray-900 dark:text-gray-100">Your API client here</p>
                            <p class="font-serif text-[16px] text-gray-500 dark:text-gray-500 mt-0.5">Hoppscotch, Insomnia, Postman, etc.</p>
                        </div>
                    </div>
                    <div class="flex gap-6">
                        <span class="font-mono text-[12px] text-gray-400 dark:text-gray-600 w-[70px] flex-shrink-0 mt-0.5">db</span>
                        <div>
                            <p class="font-sans text-[15px] font-medium text-gray-900 dark:text-gray-100">Your database GUI here</p>
                            <p class="font-serif text-[16px] text-gray-500 dark:text-gray-500 mt-0.5">TablePlus, DBngin, Sequel Pro, etc.</p>
                        </div>
                    </div>
                </div>
            </section>

            <section>
                <h2 class="font-mono text-[11px] uppercase tracking-widest text-gray-400 dark:text-gray-600 mb-6">Stack</h2>
                <div class="space-y-5">
                    <div class="flex gap-6">
                        <span class="font-mono text-[12px] text-gray-400 dark:text-gray-600 w-[70px] flex-shrink-0 mt-0.5">lang</span>
                        <div>
                            <p class="font-sans text-[15px] font-medium text-gray-900 dark:text-gray-100">PHP</p>
                            <p class="font-serif text-[16px] text-gray-500 dark:text-gray-500 mt-0.5">Primary language. Laravel for full-stack, standalone for tooling.</p>
                        </div>
                    </div>
                    <div class="flex gap-6">
                        <span class="font-mono text-[12px] text-gray-400 dark:text-gray-600 w-[70px] flex-shrink-0 mt-0.5">infra</span>
                        <div>
                            <p class="font-sans text-[15px] font-medium text-gray-900 dark:text-gray-100">Your hosting / infra here</p>
                            <p class="font-serif text-[16px] text-gray-500 dark:text-gray-500 mt-0.5">Where you deploy, what you run on.</p>
                        </div>
                    </div>
                </div>
            </section>

        </div>

    </article>
@endsection
