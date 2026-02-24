@extends('_layouts.main')

@section('body')
    <article class="max-w-3xl mx-auto px-6 py-20">

        <h1 class="font-sans font-bold text-gray-950 dark:text-gray-50 text-xl tracking-tight mb-14">About</h1>

        <div class="font-serif text-[18px] text-gray-700 dark:text-gray-300 leading-[1.85] space-y-6 max-w-2xl">
            <p>
                I'm a backend engineer focused on building reliable, maintainable systems. Most of my work involves PHP, Laravel, and various cloud platforms.
            </p>
            <p>
                I write to document what I learn and to help other engineers solve similar problems. The posts here cover software architecture, performance, infrastructure, and the occasional career reflection.
            </p>
            <p>
                Currently interested in API design, database optimization, event-driven systems, and developer tooling. When I'm not coding, I'm usually reading technical books or working on open source.
            </p>
        </div>

        <div class="mt-14 pt-8 border-t border-gray-100 dark:border-gray-900">
            <div class="flex items-center gap-6 font-mono text-[13px] text-gray-500 dark:text-gray-400">
                <a href="https://github.com/matthewtrask" class="hover:text-gray-900 dark:hover:text-gray-100 transition-colors">
                    github
                </a>
                <a href="https://bsky.app/profile/matthewtrask.com" class="hover:text-gray-900 dark:hover:text-gray-100 transition-colors">
                    bluesky
                </a>
                <a href="https://www.linkedin.com/in/matthew-trask/" class="hover:text-gray-900 dark:hover:text-gray-100 transition-colors">
                    linkedin
                </a>
                <a href="mailto:matt@matthewtrask.com" class="hover:text-gray-900 dark:hover:text-gray-100 transition-colors">
                    email
                </a>
            </div>
        </div>

    </article>
@endsection
