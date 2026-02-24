@php
    /*
     * Color palette — these full class strings MUST stay in source so Tailwind compiles them.
     * To add a new category, add an entry to $assignment below.
     */
    $palette = [
        'cyan'    => 'bg-cyan-50 dark:bg-cyan-950 text-cyan-700 dark:text-cyan-400 border-cyan-200 dark:border-cyan-800',
        'amber'   => 'bg-amber-50 dark:bg-amber-950 text-amber-700 dark:text-amber-400 border-amber-200 dark:border-amber-800',
        'violet'  => 'bg-violet-50 dark:bg-violet-950 text-violet-700 dark:text-violet-400 border-violet-200 dark:border-violet-800',
        'emerald' => 'bg-emerald-50 dark:bg-emerald-950 text-emerald-700 dark:text-emerald-400 border-emerald-200 dark:border-emerald-800',
        'rose'    => 'bg-rose-50 dark:bg-rose-950 text-rose-700 dark:text-rose-400 border-rose-200 dark:border-rose-800',
        'sky'     => 'bg-sky-50 dark:bg-sky-950 text-sky-700 dark:text-sky-400 border-sky-200 dark:border-sky-800',
    ];
    $assignment = [
        'configuration' => 'cyan',
        'feature'       => 'amber',
        'php'           => 'violet',
        'laravel'       => 'rose',
        'architecture'  => 'emerald',
        'testing'       => 'emerald',
        'performance'   => 'amber',
        'tooling'       => 'sky',
        'api'           => 'sky',
        'devops'        => 'violet',
    ];
    $keys = array_keys($palette);
    $colorKey  = $assignment[$category] ?? $keys[abs(crc32($category)) % count($keys)];
    $classes   = $palette[$colorKey];
@endphp
<a href="/blog/categories/{{ $category }}"
   class="inline-flex items-center px-2 py-0.5 rounded border font-mono text-[11px] uppercase tracking-wide hover:opacity-75 transition-opacity {{ $classes }}">{{ $category }}</a>
