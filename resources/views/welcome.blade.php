<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }}</title>

        @fonts
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] flex p-6 lg:p-8 items-center lg:justify-center min-h-screen flex-col">
        <header class="w-full lg:max-w-4xl max-w-[335px] text-sm mb-6">
            <nav class="flex items-center justify-end gap-4">
                <button
                    type="button"
                    id="theme-toggle"
                    aria-label="Toggle theme"
                    class="inline-flex items-center justify-center w-9 h-9 rounded-lg border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] transition-colors"
                >
                    <svg id="theme-icon-light" class="hidden w-5 h-5 text-[#1b1b18] dark:text-[#EDEDEC]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path>
                    </svg>
                    <svg id="theme-icon-dark" class="hidden w-5 h-5 text-[#1b1b18] dark:text-[#EDEDEC]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path>
                    </svg>
                </button>
                @if (Route::has('login'))
                    @auth
                        <a
                            href="{{ url('/dashboard') }}"
                            class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal"
                        >
                            Dashboard
                        </a>
                    @else
                        <a
                            href="{{ route('login') }}"
                            class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] text-[#1b1b18] border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm text-sm leading-normal"
                        >
                            Log in
                        </a>

                        @if (Route::has('register'))
                            <a
                                href="{{ route('register') }}"
                                class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">
                                Register
                            </a>
                        @endif
                    @endauth
                @endif
            </nav>
        </header>
        <div class="flex items-center justify-center w-full transition-opacity opacity-100 duration-750 lg:grow starting:opacity-0">
            <main class="flex max-w-[335px] w-full flex-col-reverse lg:max-w-5xl lg:flex-col">
                <section class="text-center py-12 lg:py-20">
                    <h1 class="text-4xl lg:text-6xl font-bold mb-6 dark:text-[#EDEDEC] tracking-tight">
                        Daily Task Tracker
                    </h1>
                    <p class="text-lg lg:text-xl text-gray-600 dark:text-gray-400 mb-8 max-w-2xl mx-auto leading-relaxed">
                        Organize your day, track your progress, and achieve your goals. Simple, fast, and effective task management for productive people.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                        @auth
                            <a
                                href="{{ url('/dashboard') }}"
                                class="inline-block px-8 py-3 bg-[#1b1b18] dark:bg-[#EDEDEC] text-white dark:text-[#0a0a0a] rounded-lg text-sm font-medium hover:opacity-90 transition-opacity"
                            >
                                Go to Dashboard
                            </a>
                        @else
                            @if (Route::has('register'))
                                <a
                                    href="{{ route('register') }}"
                                    class="inline-block px-8 py-3 bg-[#1b1b18] dark:bg-[#EDEDEC] text-white dark:text-[#0a0a0a] rounded-lg text-sm font-medium hover:opacity-90 transition-opacity"
                                >
                                    Get Started Free
                                </a>
                            @endif
                            @if (Route::has('login'))
                                <a
                                    href="{{ route('login') }}"
                                    class="inline-block px-8 py-3 border border-gray-300 dark:border-gray-700 text-[#1b1b18] dark:text-[#EDEDEC] rounded-lg text-sm font-medium hover:border-gray-400 dark:hover:border-gray-600 transition-colors"
                                >
                                    Log in
                                </a>
                            @endif
                        @endauth
                    </div>
                </section>

                <section class="grid grid-cols-1 md:grid-cols-3 gap-6 py-8 border-t border-gray-200 dark:border-gray-800">
                    <div class="text-center p-6">
                        <div class="w-12 h-12 mx-auto mb-4 rounded-full bg-gray-100 dark:bg-gray-800 flex items-center justify-center">
                            <svg class="w-6 h-6 text-[#1b1b18] dark:text-[#EDEDEC]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold mb-2 dark:text-[#EDEDEC]">Simple Tasks</h3>
                        <p class="text-sm text-gray-600 dark:text-gray-400">Create and manage your daily tasks with ease.</p>
                    </div>
                    <div class="text-center p-6">
                        <div class="w-12 h-12 mx-auto mb-4 rounded-full bg-gray-100 dark:bg-gray-800 flex items-center justify-center">
                            <svg class="w-6 h-6 text-[#1b1b18] dark:text-[#EDEDEC]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold mb-2 dark:text-[#EDEDEC]">Fast & Lightweight</h3>
                        <p class="text-sm text-gray-600 dark:text-gray-400">No bloat, just what you need to stay productive.</p>
                    </div>
                    <div class="text-center p-6">
                        <div class="w-12 h-12 mx-auto mb-4 rounded-full bg-gray-100 dark:bg-gray-800 flex items-center justify-center">
                            <svg class="w-6 h-6 text-[#1b1b18] dark:text-[#EDEDEC]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold mb-2 dark:text-[#EDEDEC]">Track Progress</h3>
                        <p class="text-sm text-gray-600 dark:text-gray-400">Monitor your daily achievements over time.</p>
                    </div>
                </section>
            </main>
        </div>

        @if (Route::has('login'))
            <div class="h-14.5 hidden lg:block"></div>
        @endif
    </body>
</html>
