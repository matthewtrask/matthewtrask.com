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
                            <p class="font-sans text-[15px] font-medium text-gray-900 dark:text-gray-100">MacBook Air M2</p>
                            <ul>
                                <li class="font-serif text-[16px] text-gray-500 dark:text-gray-500 mt-0.5">16 GB Ram</li>
                                <li class="font-serif text-[16px] text-gray-500 dark:text-gray-500 mt-0.5">512 GB SSD</li>
                            </ul>
                        </div>
                    </div>
                    <div class="flex gap-6">
                        <span class="font-mono text-[12px] text-gray-400 dark:text-gray-600 w-[70px] flex-shrink-0 mt-0.5">monitor</span>
                        <div>
                            <p class="font-sans text-[15px] font-medium text-gray-900 dark:text-gray-100">A basic ass LG monitor I got from Best Buy</p>
                        </div>
                    </div>
                    <div class="flex gap-6">
                        <span class="font-mono text-[12px] text-gray-400 dark:text-gray-600 w-[70px] flex-shrink-0 mt-0.5">keyboard</span>
                        <div>
                            <p class="font-sans text-[15px] font-medium text-gray-900 dark:text-gray-100">Meko Blink</p>
                            <p class="font-serif text-[16px] text-gray-500 dark:text-gray-500 mt-0.5">60% layout to save space</p>
                            <p class="font-serif text-[16px] text-gray-500 dark:text-gray-500 mt-0.5">Cherry MX Red Switches</p>
                        </div>
                    </div>
                    <div class="flex gap-6">
                        <span class="font-mono text-[12px] text-gray-400 dark:text-gray-600 w-[70px] flex-shrink-0 mt-0.5">audio</span>
                        <div>
                            <p class="font-sans text-[15px] font-medium text-gray-900 dark:text-gray-100">Apple Airpods Max</p>
                            <br>
                            <p class="font-sans text-[15px] font-medium text-gray-900 dark:text-gray-100">Apple Airpods Pro</p>
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
                            <p class="font-sans text-[15px] font-medium text-gray-900 dark:text-gray-100">PHPStorm</p>
                            <p class="font-serif text-[16px] text-gray-500 dark:text-gray-500 mt-0.5">PSR-12 based standards. Dark Theme</p>
                            <br>
                            <p class="font-sans text-[15px] font-medium text-gray-900 dark:text-gray-100">Pycharm</p>
                            <p class="font-serif text-[16px] text-gray-500 dark:text-gray-500 mt-0.5">PEP 8 based standards. Dark Theme</p>
                        </div>
                    </div>
                    <div class="flex gap-6">
                        <span class="font-mono text-[12px] text-gray-400 dark:text-gray-600 w-[70px] flex-shrink-0 mt-0.5">terminal</span>
                        <div>
                            <p class="font-sans text-[15px] font-medium text-gray-900 dark:text-gray-100">Ghostty</p>
                            <p class="font-serif text-[16px] text-gray-500 dark:text-gray-500 mt-0.5">Oh My Zsh. Oh My Zsh "crunch" theme.</p>
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
                            <p class="font-sans text-[15px] font-medium text-gray-900 dark:text-gray-100">Safari</p>
                            <p class="font-serif text-[16px] text-gray-500 dark:text-gray-500 mt-0.5">1Password. Instapaper.</p>
                        </div>
                    </div>
                    <div class="flex gap-6">
                        <span class="font-mono text-[12px] text-gray-400 dark:text-gray-600 w-[70px] flex-shrink-0 mt-0.5">notes</span>
                        <div>
                            <p class="font-sans text-[15px] font-medium text-gray-900 dark:text-gray-100">Obsidian</p>
                            <p class="font-serif text-[16px] text-gray-500 dark:text-gray-500 mt-0.5">Perfect for brain dumping, structured notes, off the cuff notes, and keeping track of tasks.</p>
                        </div>
                    </div>
                    <div class="flex gap-6">
                        <span class="font-mono text-[12px] text-gray-400 dark:text-gray-600 w-[70px] flex-shrink-0 mt-0.5">api</span>
                        <div>
                            <p class="font-sans text-[15px] font-medium text-gray-900 dark:text-gray-100">RapidAPI</p>
                            <p class="font-serif text-[16px] text-gray-500 dark:text-gray-500 mt-0.5">Great for visualizing data in varoius ways.</p>
                        </div>
                        <div>
                            <p class="font-sans text-[15px] font-medium text-gray-900 dark:text-gray-100">Proxyman</p>
                            <p class="font-serif text-[16px] text-gray-500 dark:text-gray-500 mt-0.5">Great for intercepting web and app traffic locally.</p>
                        </div>
                    </div>
                    <div class="flex gap-6">
                        <span class="font-mono text-[12px] text-gray-400 dark:text-gray-600 w-[70px] flex-shrink-0 mt-0.5">db</span>
                        <div>
                            <p class="font-sans text-[15px] font-medium text-gray-900 dark:text-gray-100">TablePlus</p>
                            <p class="font-serif text-[16px] text-gray-500 dark:text-gray-500 mt-0.5">Perfect for both MySQL and Postgres.</p>
                        </div>
                    </div>
                    <div class="flex gap-6">
                        <span class="font-mono text-[12px] text-gray-400 dark:text-gray-600 w-[70px] flex-shrink-0 mt-0.5">standalone</span>
                        <div>
                            <p class="font-sans text-[15px] font-medium text-gray-900 dark:text-gray-100">Reeder</p>
                            <p class="font-serif text-[16px] text-gray-500 dark:text-gray-500 mt-0.5">RSS reader</p>
                        </div>
                        <div>
                            <p class="font-sans text-[15px] font-medium text-gray-900 dark:text-gray-100">NordVPN</p>
                            <p class="font-serif text-[16px] text-gray-500 dark:text-gray-500 mt-0.5">VPN Client for iOS and MacOS</p>
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
                        <span class="font-mono text-[12px] text-gray-400 dark:text-gray-600 w-[70px] flex-shrink-0 mt-0.5">lang</span>
                        <div>
                            <p class="font-sans text-[15px] font-medium text-gray-900 dark:text-gray-100">Python</p>
                            <p class="font-serif text-[16px] text-gray-500 dark:text-gray-500 mt-0.5">Secondary language. Mostly for AWS CDK and small lambdas.</p>
                        </div>
                    </div>
                    <div class="flex gap-6">
                        <span class="font-mono text-[12px] text-gray-400 dark:text-gray-600 w-[70px] flex-shrink-0 mt-0.5">infra</span>
                        <div>
                            <p class="font-sans text-[15px] font-medium text-gray-900 dark:text-gray-100">Digital Ocean</p>
                            <p class="font-serif text-[16px] text-gray-500 dark:text-gray-500 mt-0.5">Basic configurations for Laravel applications</p>
                        </div>
                        <div>
                            <p class="font-sans text-[15px] font-medium text-gray-900 dark:text-gray-100">Vercel</p>
                            <p class="font-serif text-[16px] text-gray-500 dark:text-gray-500 mt-0.5">Used to host this site.</p>
                        </div>
                    </div>
                </div>
            </section>
            <section>
                <h2 class="font-mono text-[11px] uppercase tracking-widest text-gray-400 dark:text-gray-600 mb-6">Physical Items</h2>
                <div class="space-y-5">
                    <!-- Replace / update with your actual setup -->
                    <div class="flex gap-6">
                        <span class="font-mono text-[12px] text-gray-400 dark:text-gray-600 w-[70px] flex-shrink-0 mt-0.5">backpack</span>
                        <div>
                            <p class="font-sans text-[15px] font-medium text-gray-900 dark:text-gray-100">Bellroy</p>
                            <ul>
                                <li class="font-serif text-[16px] text-gray-500 dark:text-gray-500 mt-0.5">Transit Workpack 20L</li>
                            </ul>
                        </div>
                    </div>
                    <div class="flex gap-6">
                        <span class="font-mono text-[12px] text-gray-400 dark:text-gray-600 w-[70px] flex-shrink-0 mt-0.5">notebook</span>
                        <div>
                            <p class="font-sans text-[15px] font-medium text-gray-900 dark:text-gray-100">Baronfig</p>
                            <ul>
                                <li class="font-serif text-[16px] text-gray-500 dark:text-gray-500 mt-0.5">Confidant Notebook</li>
                            </ul>
                        </div>
                    </div>
                    <div class="flex gap-6">
                        <span class="font-mono text-[12px] text-gray-400 dark:text-gray-600 w-[70px] flex-shrink-0 mt-0.5">pen</span>
                        <div>
                            <p class="font-sans text-[15px] font-medium text-gray-900 dark:text-gray-100">Grafton</p>
                            <ul>
                                <li class="font-serif text-[16px] text-gray-500 dark:text-gray-500 mt-0.5">Everyman EDC 0.7mm</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
        </div>

    </article>
@endsection
