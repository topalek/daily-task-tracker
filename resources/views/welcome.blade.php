<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>{{ config('app.name', 'Laravel') }}</title>

    @fonts
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="flex min-h-screen flex-col items-center bg-[#FDFDFC] p-6 text-[#1b1b18] lg:justify-center lg:p-8 dark:bg-[#0a0a0a]">
    <header class="mb-6 w-full max-w-[335px] text-sm lg:max-w-4xl">
        <nav class="flex items-center justify-end gap-4">
            <button
                type="button"
                id="theme-toggle"
                aria-label="Toggle theme"
                class="inline-flex h-9 w-9 items-center justify-center rounded-lg border border-transparent transition-colors hover:border-[#19140035] dark:hover:border-[#3E3E3A]"
            >
                <svg id="theme-icon-light" class="hidden h-5 w-5 text-[#1b1b18] dark:text-[#EDEDEC]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path>
                </svg>
                <svg id="theme-icon-dark" class="hidden h-5 w-5 text-[#1b1b18] dark:text-[#EDEDEC]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path>
                </svg>
            </button>
            @if (Route::has('login'))
                @auth
                    <a
                        href="{{ url('/dashboard') }}"
                        class="inline-block rounded-sm border border-[#19140035] px-5 py-1.5 text-sm leading-normal text-[#1b1b18] hover:border-[#1915014a] dark:border-[#3E3E3A] dark:text-[#EDEDEC] dark:hover:border-[#62605b]"
                    >
                        Dashboard
                    </a>
                @else
                    <a
                        href="{{ route('login') }}"
                        class="inline-block rounded-sm border border-transparent px-5 py-1.5 text-sm leading-normal text-[#1b1b18] hover:border-[#19140035] dark:text-[#EDEDEC] dark:hover:border-[#3E3E3A]"
                    >
                        Log in
                    </a>

                    @if (Route::has('register'))
                        <a
                            href="{{ route('register') }}"
                            class="inline-block rounded-sm border border-[#19140035] px-5 py-1.5 text-sm leading-normal text-[#1b1b18] hover:border-[#1915014a] dark:border-[#3E3E3A] dark:text-[#EDEDEC] dark:hover:border-[#62605b]"
                        >
                            Register
                        </a>
                    @endif
                @endauth
            @endif
        </nav>
    </header>
    <div class="flex w-full items-center justify-center opacity-100 transition-opacity duration-750 lg:grow starting:opacity-0">
        <main class="flex w-full max-w-[335px] flex-col-reverse lg:max-w-5xl lg:flex-col">
            <section class="py-12 text-center lg:py-20">
                <h1 class="mb-6 text-4xl font-bold tracking-tight lg:text-6xl dark:text-[#EDEDEC]">
                    Daily Task Tracker
                </h1>
                <p class="mx-auto mb-8 max-w-2xl text-lg leading-relaxed text-gray-600 lg:text-xl dark:text-gray-400">
                    Organize your day, track your progress, and achieve your goals. Simple, fast, and effective task
                    management for productive people.
                </p>
                <div class="flex flex-col items-center justify-center gap-4 sm:flex-row">
                    @auth
                        <a
                            href="{{ url('/dashboard') }}"
                            class="inline-block rounded-lg bg-[#1b1b18] px-8 py-3 text-sm font-medium text-white transition-opacity hover:opacity-90 dark:bg-[#EDEDEC] dark:text-[#0a0a0a]"
                        >
                            Go to Dashboard
                        </a>
                    @else
                        @if (Route::has('register'))
                            <a
                                href="{{ route('register') }}"
                                class="inline-block rounded-lg bg-[#1b1b18] px-8 py-3 text-sm font-medium text-white transition-opacity hover:opacity-90 dark:bg-[#EDEDEC] dark:text-[#0a0a0a]"
                            >
                                Get Started Free
                            </a>
                        @endif
                        @if (Route::has('login'))
                            <a
                                href="{{ route('login') }}"
                                class="inline-block rounded-lg border border-gray-300 px-8 py-3 text-sm font-medium text-[#1b1b18] transition-colors hover:border-gray-400 dark:border-gray-700 dark:text-[#EDEDEC] dark:hover:border-gray-600"
                            >
                                Log in
                            </a>
                        @endif
                    @endauth
                </div>
            </section>

            <section class="grid grid-cols-1 gap-6 border-t border-gray-200 py-8 md:grid-cols-3 dark:border-gray-800">
                <div class="p-6 text-center">
                    <div class="mx-auto mb-4 flex h-12 w-12 items-center justify-center rounded-full bg-gray-100 dark:bg-gray-800">
                        <svg class="h-6 w-6 text-[#1b1b18] dark:text-[#EDEDEC]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path>
                        </svg>
                    </div>
                    <h3 class="mb-2 text-lg font-semibold dark:text-[#EDEDEC]">Simple Tasks</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-400">
                        Create and manage your daily tasks with ease.
                    </p>
                </div>
                <div class="p-6 text-center">
                    <div class="mx-auto mb-4 flex h-12 w-12 items-center justify-center rounded-full bg-gray-100 dark:bg-gray-800">
                        <svg class="h-6 w-6 text-[#1b1b18] dark:text-[#EDEDEC]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <h3 class="mb-2 text-lg font-semibold dark:text-[#EDEDEC]">Fast & Lightweight</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-400">
                        No bloat, just what you need to stay productive.
                    </p>
                </div>
                <div class="p-6 text-center">
                    <div class="mx-auto mb-4 flex h-12 w-12 items-center justify-center rounded-full bg-gray-100 dark:bg-gray-800">
                        <svg class="h-6 w-6 text-[#1b1b18] dark:text-[#EDEDEC]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="mb-2 text-lg font-semibold dark:text-[#EDEDEC]">Track Progress</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-400">Monitor your daily achievements over time.</p>
                </div>
            </section>
        </main>
    </div>

    @if (Route::has('login'))
        <div class="hidden h-14.5 lg:block"></div>
    @endif
</body>
</html>
