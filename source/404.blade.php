@extends('_layouts.main')

@section('body')
    <section class="max-w-2xl mx-auto px-6 py-24">

        <div class="font-mono text-[11px] text-gray-400 dark:text-gray-600 mb-5 tracking-widest">
            404
        </div>

        <h1 class="font-sans font-bold text-lg text-gray-950 dark:text-gray-50 mb-4 tracking-tight">
            Page not found
        </h1>

        <p class="font-serif text-[16px] text-gray-600 dark:text-gray-400 leading-relaxed mb-10">
            This page doesn't exist. You might have mistyped the address, or the page has moved.
        </p>

        <a href="/" class="font-mono text-[12px] text-gray-400 dark:text-gray-600 hover:text-cyan-600 dark:hover:text-cyan-400 transition-colors">
            ← home
        </a>

    </section>
@endsection
