---
title: Books
description: Books I've read — a running index for myself and anyone curious.
---
@extends('_layouts.main')

@section('body')
    <article class="max-w-3xl mx-auto px-6 py-20">

        <div class="mb-14">
            <span class="font-mono text-[11px] uppercase tracking-widest text-cyan-600 dark:text-cyan-400">/books</span>
            <h1 class="font-sans font-bold text-gray-950 dark:text-gray-50 text-xl tracking-tight mt-3">Books I've read</h1>
            <p class="font-mono text-[12px] text-gray-400 dark:text-gray-600 mt-2">A running index — for me, and for anyone curious.</p>
        </div>

        <div class="space-y-14 max-w-2xl">

            <section>
                <h2 class="font-mono text-[11px] uppercase tracking-widest text-gray-400 dark:text-gray-600 mb-6">Currently Reading</h2>
                <div class="space-y-5">

                    <div class="flex gap-6">
                        <span class="font-mono text-[12px] text-gray-400 dark:text-gray-600 w-[60px] flex-shrink-0 mt-0.5">reading</span>
                        <div>
                            <p class="font-serif text-[17px] text-gray-900 dark:text-gray-100"><em>1776</em></p>
                            <p class="font-mono text-[12px] text-gray-400 dark:text-gray-600 mt-1">David McCullough</p>
                        </div>
                    </div>

                    <div class="flex gap-6">
                        <span class="font-mono text-[12px] text-gray-400 dark:text-gray-600 w-[60px] flex-shrink-0 mt-0.5">reading</span>
                        <div>
                            <p class="font-serif text-[17px] text-gray-900 dark:text-gray-100"><em>Staff Engineer</em></p>
                            <p class="font-mono text-[12px] text-gray-400 dark:text-gray-600 mt-1">Will Larson</p>
                        </div>
                    </div>

                </div>
            </section>
            <section>
                <h2 class="font-mono text-[11px] uppercase tracking-widest text-gray-400 dark:text-gray-600 mb-6">Read</h2>
                <div class="space-y-5">

                    <div class="flex gap-6">
                        <div>
                            <p class="font-serif text-[17px] text-gray-900 dark:text-gray-100"><em>Almost Everything - Notes On Hope</em></p>
                            <p class="font-mono text-[12px] text-gray-400 dark:text-gray-600 mt-1">Anne Lamott</p>
                            <p class="font-mono text-[12px] text-gray-400 dark:text-gray-600 mt-1">Non-fiction</p>
                        </div>
                        <div>
                            <p class="font-serif text-[17px] text-gray-900 dark:text-gray-100"><em>Bird By Bird</em></p>
                            <p class="font-mono text-[12px] text-gray-400 dark:text-gray-600 mt-1">Non-fiction</p>
                        </div>
                    </div>

                    <div class="flex gap-6">
                        <span class="font-mono text-[12px] text-gray-400 dark:text-gray-600 w-[60px] flex-shrink-0 mt-0.5">reading</span>
                        <div>
                            <p class="font-serif text-[17px] text-gray-900 dark:text-gray-100"><em>Staff Engineer</em></p>
                            <p class="font-mono text-[12px] text-gray-400 dark:text-gray-600 mt-1">Will Larson</p>
                        </div>
                    </div>

                </div>
            </section>


        </div>

    </article>
@endsection
