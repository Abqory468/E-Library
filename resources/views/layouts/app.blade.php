<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data :class="$store.theme.dark ? 'dark' : ''">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <style>
            [x-cloak] { display: none !important; }
        </style>
        
        <!-- Chart.js -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <!-- Dark mode init (before Alpine) — prevents flash -->
        <script>
            (function () {
                const saved = localStorage.getItem('theme');
                if (saved === 'dark') {
                    document.documentElement.classList.add('dark');
                }
            })();
        </script>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <script>
            document.addEventListener('alpine:init', () => {
                Alpine.store('sidebar', { open: false });
                Alpine.store('logout', { show: false });

                // Theme store
                Alpine.store('theme', {
                    dark: localStorage.getItem('theme') === 'dark',
                    toggle() {
                        this.dark = !this.dark;
                        localStorage.setItem('theme', this.dark ? 'dark' : 'light');
                    }
                });
            });
        </script>
    </head>
    <body class="font-sans antialiased text-gray-900 bg-gray-100 dark:bg-gray-950 dark:text-gray-100 transition-colors duration-300">

        
        <div class="min-h-screen flex {{ (auth()->user()->role ?? 'user') === 'user' ? 'flex-col' : '' }} bg-gray-100 dark:bg-gray-950 transition-colors duration-300">
            
            @if(auth()->user() && auth()->user()->role === 'admin')
                <!-- Sidebar Navigation -->
                @include('layouts.navigation')

                <!-- Overlay for mobile sidebar -->
                <div x-data x-show="$store.sidebar.open" 
                     x-transition:enter="transition-opacity ease-linear duration-300"
                     x-transition:enter-start="opacity-0" 
                     x-transition:enter-end="opacity-100"
                     x-transition:leave="transition-opacity ease-linear duration-300" 
                     x-transition:leave-start="opacity-100" 
                     x-transition:leave-end="opacity-0"
                     class="fixed inset-0 z-30 bg-gray-900/50 sm:hidden" x-cloak
                     @click="$store.sidebar.open = false"></div>
            @else
                <!-- Top Navigation for User -->
                @include('layouts.top-navigation')
            @endif

            <!-- Main Content Wrapper -->
            <div class="flex-1 flex flex-col min-w-0 {{ (auth()->user() && auth()->user()->role === 'admin') ? 'sm:ml-64' : '' }} transition-all duration-300">
                
                <!-- Top Header (Mobile Toggler & Page Heading) -->
                @if(auth()->user() && auth()->user()->role === 'admin')
                    <header class="bg-white dark:bg-gray-900 shadow z-20 relative">
                        <div class="flex items-center justify-between h-16 px-4 sm:hidden sm:px-6 lg:px-8">
                            <div class="flex items-center gap-4">
                                <!-- Mobile Hamburger -->
                                <button x-data @click="$store.sidebar.open = true" class="sm:hidden p-2 -ml-2 text-gray-500 rounded-md hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200">
                                    <span class="sr-only">Open sidebar</span>
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                                    </svg>
                                </button>

                                <!-- Page Heading -->
                                @isset($header)
                                    <div class="font-semibold text-xl text-gray-800 dark:text-gray-100 leading-tight truncate">
                                        {{ $header }}
                                    </div>
                                @endisset
                            </div>
                        </div>
                    </header>
                @endif

                <!-- Page Content -->
                <main class="">
                    {{ $slot }}
                </main>
            </div>
        </div>
        @include('layouts.logout-modal')
    </body>
</html>
