<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data :class="$store.theme && $store.theme.dark ? 'dark' : ''">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            [x-cloak] { display: none !important; }
        </style>

        <!-- Dark mode init — prevent flash -->
        <script>
            (function () {
                if (localStorage.getItem('theme') === 'dark') {
                    document.documentElement.classList.add('dark');
                }
            })();
        </script>

        <script>
            document.addEventListener('alpine:init', () => {
                if (!Alpine.store('theme')) {
                    Alpine.store('theme', {
                        dark: localStorage.getItem('theme') === 'dark',
                        toggle() {
                            this.dark = !this.dark;
                            localStorage.setItem('theme', this.dark ? 'dark' : 'light');
                        }
                    });
                }
            });
        </script>
    </head>
    <body class="font-sans text-gray-900 dark:text-gray-100 antialiased transition-colors duration-300">
        <div class="min-h-screen bg-gradient-to-br from-blue-50 to-indigo-100 dark:from-gray-950 dark:to-indigo-950 transition-colors duration-300">
                {{ $slot }}
        </div>
    </body>
</html>
