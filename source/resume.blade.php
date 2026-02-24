---
title: Resume
description: Matt Trask — Senior Software Engineer & Team Lead. PHP, Laravel, API design, distributed systems, and engineering leadership.
---
@extends('_layouts.main')

@section('body')
    <article class="max-w-3xl mx-auto px-6 py-20">

        {{-- Header --}}
        <div class="mb-16">
            <span class="font-mono text-[11px] uppercase tracking-widest text-cyan-600 dark:text-cyan-400">/resume</span>
            <h1 class="font-sans font-bold text-gray-950 dark:text-gray-50 text-2xl tracking-tight mt-3">Matt Trask</h1>
            <p class="font-mono text-[13px] text-gray-500 dark:text-gray-400 mt-1">Senior Software Engineer & Team Lead</p>
            <div class="flex flex-wrap items-center gap-4 font-mono text-[12px] text-gray-400 dark:text-gray-600 mt-3">
                <span>Nashville, TN</span>
                <span>·</span>
                <a href="mailto:mjftrask@gmail.com" class="text-cyan-600 dark:text-cyan-400 hover:underline underline-offset-2">mjftrask@gmail.com</a>
                <span>·</span>
                <a href="https://github.com/matthewtrask" class="hover:text-gray-700 dark:hover:text-gray-300 transition-colors">github</a>
                <span>·</span>
                <a href="https://twitter.com/matthewtrask" class="hover:text-gray-700 dark:hover:text-gray-300 transition-colors">twitter</a>
            </div>
        </div>

        <div class="space-y-16">

            {{-- Profile --}}
            <section id="profile">
                <h2 class="font-mono text-[11px] uppercase tracking-widest text-gray-400 dark:text-gray-600 mb-5">Profile</h2>
                <p class="font-serif text-[18px] text-gray-700 dark:text-gray-300 leading-[1.85]">
                    I am a passionate open source software engineer and team leader who loves improving old code bases and mentoring junior software engineers. I've scaled APIs to handle tens of millions of calls per day, led engineering teams, collaborated with fellow seniors &amp; leads on mission critical systems and mentored dozens of young engineers to help them achieve their professional goals. My work includes conference presentations, hosting podcasts, open source projects, and written articles to share knowledge and help others grow in their career.
                </p>
            </section>

            {{-- Skills --}}
            <section id="skills">
                <h2 class="font-mono text-[11px] uppercase tracking-widest text-gray-400 dark:text-gray-600 mb-5">Skills</h2>
                <div class="flex flex-wrap gap-2">
                    @php
                        $skills = [
                            'REST API Design',
                            'People Leadership',
                            'Project Management',
                            'Mentoring',
                            'Complex Problem Solving',
                            'Empathy',
                            'Critical Thinking',
                            'Interpersonal Communication',
                        ];
                    @endphp
                    @foreach ($skills as $skill)
                        <span class="inline-flex items-center px-2.5 py-1 rounded border font-mono text-[11px] text-gray-600 dark:text-gray-400 border-gray-200 dark:border-gray-800 bg-gray-50 dark:bg-gray-900">{{ $skill }}</span>
                    @endforeach
                </div>
            </section>

            {{-- Experience --}}
            <section id="experience">
                <h2 class="font-mono text-[11px] uppercase tracking-widest text-gray-400 dark:text-gray-600 mb-8">Experience</h2>
                <div class="space-y-12">

                    @php
                        $jobs = [
                            [
                                'title'    => 'Senior Software Engineer',
                                'company'  => 'Greater Good Health',
                                'location' => 'Remote — Los Angeles',
                                'dates'    => 'May 2025 — Present',
                                'bullets'  => [
                                    'Leveraged Lambdas to automate data file processing, increasing data integrity, removing manual interventions, and streamlined processing times.',
                                    'Integrated AWS Lambda with Salesforce Event Bus to ingest Change Data Capture (CDC) events, automating lead enrollment and reducing manual intervention.',
                                    'Leveraged Laravel and Livewire to rapidly build an AthenaHealth-integrated web app, bridging the gap between complex EHR data and intuitive clinical workflows for the clinical team.',
                                    'Systematically migrated distributed AWS Lambdas into a core Laravel environment, eliminating architectural complexity while enforcing modern PHP best practices and rigorous test coverage to accelerate feature velocity.',
                                    'Leveraged AWS CDK to automate infrastructure, moving the team away from manual console configuration toward a scalable, code-first architecture.',
                                ],
                            ],
                            [
                                'title'    => 'Team Lead',
                                'company'  => 'Ovia Health',
                                'location' => 'Remote — Massachusetts',
                                'dates'    => 'Mar 2022 — Apr 2025',
                                'bullets'  => [
                                    'Architected a query builder for AWS Neptune GraphDB, handling an estimated 9–12 million queries a day, replacing a memory-intensive flat-file PHP array caching system.',
                                    'Led and empowered a team of high-performing software engineers, fostering a collaborative environment that delivered complex projects on tight deadlines.',
                                    'Coordinated efforts building and maintaining APIs vital to iOS and Android app functionality, processing an average of 12 million requests a day conforming to modern REST and OpenAPI standards.',
                                    'Orchestrated cross-functional collaboration among backend engineering, iOS, Android, QA, and project management teams.',
                                    'Championed technical initiatives notably advocating for and implementing GraphDB technology in alignment with the software architect and director of backend engineering.',
                                    'Led adoption of PHP 8.0, PHP 8.1, Symfony 6, and Doctrine 2 across the engineering organisation.',
                                    'Spearheaded the migration from an in-house content platform to WordPress, empowering content and marketing teams with streamlined tooling.',
                                    'Led development of an email verification system, cutting spam sign-ups across all three apps.',
                                    'Improved codebase robustness by implementing PHPStan, PHPCS, and PHPUnit to improve pre-deployment quality checks.',
                                ],
                            ],
                            [
                                'title'    => 'Senior Software Engineer',
                                'company'  => 'Primitive',
                                'location' => 'Remote — Texas',
                                'dates'    => 'Aug 2019 — Feb 2022',
                                'bullets'  => [
                                    'Maintained and expanded a multi-family residential management back-office application built with Laravel and Vue.js.',
                                    'Orchestrated cross-functional collaboration between teams in Texas, Tennessee, and Belarus with a weekly architecture review board to decompose an aging monolith using microservices/SOA.',
                                    'Technically led engineers across various teams to align project timelines, resources, and technical solutions to meet client milestones.',
                                    'Led a cross-functional team building a drop-shipping platform integrated with a BigCommerce CMS front end.',
                                ],
                            ],
                            [
                                'title'    => 'Senior Software Engineer',
                                'company'  => 'MoreCommerce',
                                'location' => 'Nashville, TN',
                                'dates'    => 'Feb 2018 — Jul 2019',
                                'bullets'  => [
                                    'Optimized application performance by refactoring code, improving database queries, and leveraging caching.',
                                    'Built and automated an audit log to track changes across the product catalog using the Doctrine event handler.',
                                    'Developed features enabling the product team to dynamically control catalog pricing, driving a 30% increase in revenue.',
                                    'Developed back-office features for Marketing, Trust and Safety, Distribution, and other teams enabling better insights into the product catalog, merchants, and buyers.',
                                ],
                            ],
                            [
                                'title'    => 'Software Engineer',
                                'company'  => 'Bernard Health',
                                'location' => 'Nashville, TN',
                                'dates'    => 'Oct 2016 — Feb 2018',
                                'bullets'  => [
                                    'Led development and maintenance of an Applicant Tracking System integrated with an HR SaaS platform, streamlining onboarding into benefits, payment, and time-tracking services.',
                                    'Integrated the ATS with third-party APIs (Facebook, LinkedIn, Indeed) to automate job postings, significantly reducing HR and hiring manager workload.',
                                    'Implemented custom branded domain job postings for clients via AWS S3 static website hosting.',
                                    'Developed and automated API documentation for vendor integrations, facilitating seamless third-party connectivity.',
                                    'Mentored junior engineers and an offshore team in Jaipur, India on Laravel, PHP, REST, and JavaScript.',
                                ],
                            ],
                            [
                                'title'    => 'Software Developer',
                                'company'  => 'Tandum',
                                'location' => 'Remote',
                                'dates'    => 'May 2016 — Aug 2016',
                                'bullets'  => [
                                    'Refactored legacy code, improving reliability, scalability, and maintainability.',
                                    'Implemented internal API documentation using Swagger (now OpenAPI), improving communication between backend, frontend, and mobile teams.',
                                    'Automated API documentation generation with TravisCI on every release.',
                                    'Developed features based on venue feedback to enhance the ticket purchasing experience.',
                                ],
                            ],
                        ];
                    @endphp

                    @foreach ($jobs as $job)
                        <div>
                            <div class="flex flex-wrap items-baseline justify-between gap-2 mb-1">
                                <div>
                                    <span class="font-sans font-semibold text-[15px] text-gray-900 dark:text-gray-100">{{ $job['title'] }}</span>
                                    <span class="font-sans text-[15px] text-gray-500 dark:text-gray-400">, {{ $job['company'] }}</span>
                                </div>
                                <span class="font-mono text-[11px] text-gray-400 dark:text-gray-600">{{ $job['location'] }}</span>
                            </div>
                            <p class="font-mono text-[11px] text-gray-400 dark:text-gray-600 mb-4">{{ $job['dates'] }}</p>
                            <ul class="space-y-2">
                                @foreach ($job['bullets'] as $bullet)
                                    <li class="flex gap-3">
                                        <span class="font-mono text-[11px] text-cyan-500 dark:text-cyan-600 mt-[6px] flex-shrink-0">—</span>
                                        <span class="font-serif text-[16px] text-gray-700 dark:text-gray-300 leading-relaxed">{{ $bullet }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endforeach

                </div>
            </section>

            {{-- Community --}}
            <section id="community">
                <h2 class="font-mono text-[11px] uppercase tracking-widest text-gray-400 dark:text-gray-600 mb-8">Community</h2>
                <div class="space-y-10">

                    <div>
                        <h3 class="font-sans font-semibold text-[14px] text-gray-900 dark:text-gray-100 mb-4">Conference Speaker</h3>
                        <div class="space-y-2">
                            @php
                                $talks = [
                                    ['conf' => 'Longhorn PHP 2021',  'type' => 'Session',  'title' => 'What can OpenAPI do for you?'],
                                    ['conf' => 'Cascadia PHP 2019',  'type' => 'Session',  'title' => 'The PHP Community'],
                                    ['conf' => 'Sunshine PHP 2019',  'type' => 'Session',  'title' => 'Getting started with Vue.js'],
                                    ['conf' => 'Midwest PHP 2019',   'type' => 'Session',  'title' => 'Intro to OpenAPI'],
                                    ['conf' => 'Midwest PHP 2019',   'type' => 'Keynote',  'title' => 'Mental Health, you and me'],
                                    ['conf' => 'Longhorn PHP 2019',  'type' => 'Session',  'title' => 'Mental Health, you and me'],
                                    ['conf' => 'Underground JS 2019','type' => 'Keynote',  'title' => 'Mental Health, you and me'],
                                    ['conf' => 'Cascadia PHP 2019',  'type' => 'Keynote',  'title' => 'Welcome to the Community'],
                                    ['conf' => 'Cascadia PHP 2018',  'type' => 'Session',  'title' => 'Intro to OpenAPI'],
                                    ['conf' => 'Sunshine PHP 2017',  'type' => 'Session',  'title' => 'Getting started with the Symfony CLI'],
                                ];
                            @endphp
                            @foreach ($talks as $talk)
                                <div class="flex items-baseline gap-4 py-1.5 border-b border-gray-100 dark:border-gray-900 last:border-0">
                                    <span class="font-mono text-[11px] text-gray-400 dark:text-gray-600 w-[140px] flex-shrink-0">{{ $talk['conf'] }}</span>
                                    <span class="font-mono text-[10px] uppercase tracking-wide text-cyan-600 dark:text-cyan-500 w-[52px] flex-shrink-0">{{ $talk['type'] }}</span>
                                    <span class="font-serif text-[15px] text-gray-700 dark:text-gray-300">{{ $talk['title'] }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div>
                        <h3 class="font-sans font-semibold text-[14px] text-gray-900 dark:text-gray-100 mb-4">Organiser</h3>
                        <div class="space-y-2">
                            @php
                                $orgs = [
                                    ['name' => 'SoutheastPHP',  'type' => 'Conference'],
                                    ['name' => 'NashvillePHP',  'type' => 'User Group'],
                                    ['name' => 'AtlantaPHP',    'type' => 'User Group'],
                                ];
                            @endphp
                            @foreach ($orgs as $org)
                                <div class="flex items-baseline gap-4">
                                    <span class="font-sans text-[15px] font-medium text-gray-900 dark:text-gray-100 w-[140px] flex-shrink-0">{{ $org['name'] }}</span>
                                    <span class="font-mono text-[11px] text-gray-400 dark:text-gray-600">{{ $org['type'] }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div>
                        <h3 class="font-sans font-semibold text-[14px] text-gray-900 dark:text-gray-100 mb-4">Podcast Host</h3>
                        <div class="space-y-2">
                            <p class="font-serif text-[15px] text-gray-700 dark:text-gray-300">APIs You Won't Hate</p>
                            <p class="font-serif text-[15px] text-gray-700 dark:text-gray-300">PHP Town Hall</p>
                        </div>
                    </div>

                </div>
            </section>

            {{-- Education --}}
            <section id="education">
                <h2 class="font-mono text-[11px] uppercase tracking-widest text-gray-400 dark:text-gray-600 mb-5">Education</h2>
                <div class="flex flex-wrap items-baseline justify-between gap-2">
                    <span class="font-sans font-semibold text-[15px] text-gray-900 dark:text-gray-100">General Studies, Georgia Perimeter College</span>
                    <span class="font-mono text-[11px] text-gray-400 dark:text-gray-600">Dunwoody, GA</span>
                </div>
            </section>

        </div>

        {{-- Footer actions --}}
        <div class="mt-16 pt-8 border-t border-gray-100 dark:border-gray-900 flex items-center justify-between">
            <p class="font-mono text-[12px] text-gray-400 dark:text-gray-600">
                Last updated {{ date('F Y') }}
            </p>
            <a href="mailto:mjftrask@gmail.com" class="font-mono text-[12px] text-cyan-600 dark:text-cyan-400 hover:underline underline-offset-2">
                get in touch →
            </a>
        </div>

    </article>
@endsection
