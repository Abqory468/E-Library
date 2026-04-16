<nav x-data="{ open: false, searchOpen: false }" class="bg-white dark:bg-gray-900 border-b border-gray-100 dark:border-gray-800 z-50 sticky top-0 shadow-sm transition-colors duration-300">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center">
                <!-- Logo -->
                <div class="shrink-0 flex items-center mr-8">
                    <a href="{{ route('home') }}" class="flex items-center gap-2">
                        <x-application-logo class="block h-9 w-auto fill-current text-indigo-600" />
                        <span class="text-xl font-bold text-gray-800 dark:text-white self-center whitespace-nowrap">E-Library</span>
                    </a>
                </div>

                <!-- Desktop Navigation Links -->
                <div class="hidden lg:flex lg:space-x-4">
                    <button class="inline-flex items-center px-3 py-4 text-sm font-medium leading-5 text-gray-500 dark:text-gray-300 hover:text-gray-700 dark:hover:text-white focus:outline-none transition duration-150 ease-in-out">
                        <a href="{{ route('home') }}">{{ __('Home') }}</a>
                    </button>

                    <!-- Katalog (Dropdown) -->
                    <x-dropdown align="left" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-3 py-4 text-sm font-medium leading-5 text-gray-500 dark:text-gray-300 hover:text-gray-700 dark:hover:text-white focus:outline-none transition duration-150 ease-in-out">
                                <div>{{ __('Catalog') }}</div>
                                <div class="ml-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>
                        <x-slot name="content">
                            <x-dropdown-link :href="route('allBooks')">{{ __('All Books') }}</x-dropdown-link>
                            <x-dropdown-link href="{{ route('allBooks', ['sort' => 'latest']) }}">{{ __('Latest Books') }}</x-dropdown-link>
                            <x-dropdown-link href="{{ route('allBooks', ['sort' => 'popular']) }}">{{ __('Popular Books') }}</x-dropdown-link>
                        </x-slot>
                    </x-dropdown>

                    <!-- Kategori (Dropdown) -->
                    <x-dropdown align="left" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-3 py-4 text-sm font-medium leading-5 text-gray-500 dark:text-gray-300 hover:text-gray-700 dark:hover:text-white focus:outline-none transition duration-150 ease-in-out">
                                <div>{{ __('Category') }}</div>
                                <div class="ml-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>
                        <x-slot name="content">
                            <x-dropdown-link href="{{ route('allBooks', ['kategori' => 'Novel']) }}">{{ __('Novel') }}</x-dropdown-link>
                            <x-dropdown-link href="{{ route('allBooks', ['kategori' => 'Sejarah']) }}">{{ __('History') }}</x-dropdown-link>
                            <x-dropdown-link href="{{ route('allBooks', ['kategori' => 'Teknologi']) }}">{{ __('Technology') }}</x-dropdown-link>
                            <x-dropdown-link href="{{ route('allBooks', ['kategori' => 'Pendidikan']) }}">{{ __('Education') }}</x-dropdown-link>
                            <x-dropdown-link href="{{ route('allBooks', ['kategori' => 'Biografi']) }}">{{ __('Biography') }}</x-dropdown-link>
                            <x-dropdown-link href="{{ route('allBooks', ['kategori' => 'Komik']) }}">{{ __('Comic') }}</x-dropdown-link>
                        </x-slot>
                    </x-dropdown>

                    <!-- Dashboard (Dropdown - Auth) -->
                    @auth
                    <x-dropdown align="left" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-3 py-4 text-sm font-medium leading-5 text-gray-500 dark:text-gray-300 hover:text-gray-700 dark:hover:text-white focus:outline-none transition duration-150 ease-in-out">
                                <div>{{ __('Dashboard') }}</div>
                                <div class="ml-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>
                        <x-slot name="content">
                            <x-dropdown-link :href="route('dashboard')">{{ __('Summary') }}</x-dropdown-link>
                            <x-dropdown-link :href="route('my-loans')">{{ __('Borrowed Books') }}</x-dropdown-link>
                            <x-dropdown-link :href="route('wishlist')">{{ __('Wishlist / Favorite') }}</x-dropdown-link>
                        </x-slot>
                    </x-dropdown>
                    @endauth

                    <!-- Bantuan -->
                    <x-nav-link :href="route('help')" :active="request()->routeIs('help')" class="dark:text-gray-300 dark:hover:text-white">
                        {{ __('Help') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- Right side: Search, Dark Mode, Language, Notifications, Profile -->
            <div class="flex items-center gap-3">
                <!-- Search (Desktop) -->
                <div class="hidden sm:flex items-center flex-1 max-w-md mx-6">
                    <livewire:user.search-bar />
                </div>

                <!-- Dark Mode Toggle -->
                <button x-data @click="$store.theme.toggle()"
                    class="p-2 rounded-full text-gray-500 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 transition-all duration-200"
                    :title="$store.theme.dark ? '{{ __('Light Mode') }}' : '{{ __('Dark Mode') }}'">
                    <!-- Sun icon (shown in dark mode) -->
                    <svg x-show="$store.theme.dark" class="w-5 h-5 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                    <!-- Moon icon (shown in light mode) -->
                    <svg x-show="!$store.theme.dark" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                    </svg>
                </button>

                <!-- Language Switcher -->
                <div class="relative" x-data="{ langOpen: false }">
                    <button @click="langOpen = !langOpen" @click.outside="langOpen = false"
                        class="flex items-center gap-1.5 px-2.5 py-1.5 rounded-full text-sm font-medium text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 border border-gray-200 dark:border-gray-700 transition-all duration-200">
                        @if(app()->getLocale() === 'id')
                            <span class="text-base leading-none">🇮🇩</span>
                            <span class="hidden sm:inline">ID</span>
                        @else
                            <span class="text-base leading-none">🇬🇧</span>
                            <span class="hidden sm:inline">EN</span>
                        @endif
                        <svg class="w-3 h-3 transition-transform" :class="langOpen ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <!-- Dropdown -->
                    <div x-show="langOpen" x-cloak
                        x-transition:enter="transition ease-out duration-100"
                        x-transition:enter-start="opacity-0 scale-95"
                        x-transition:enter-end="opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-75"
                        x-transition:leave-start="opacity-100 scale-100"
                        x-transition:leave-end="opacity-0 scale-95"
                        class="absolute right-0 mt-2 w-36 bg-white dark:bg-gray-800 border border-gray-100 dark:border-gray-700 rounded-xl shadow-lg overflow-hidden z-50">
                        <a href="{{ route('set-locale', 'id') }}"
                            class="flex items-center gap-2 px-4 py-2.5 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700 transition {{ app()->getLocale() === 'id' ? 'font-semibold bg-indigo-50 dark:bg-indigo-900/30 text-indigo-600 dark:text-indigo-400' : '' }}">
                            <span class="text-base">🇮🇩</span> Indonesia
                            @if(app()->getLocale() === 'id')
                                <svg class="w-4 h-4 ml-auto text-indigo-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                </svg>
                            @endif
                        </a>
                        <a href="{{ route('set-locale', 'en') }}"
                            class="flex items-center gap-2 px-4 py-2.5 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700 transition {{ app()->getLocale() === 'en' ? 'font-semibold bg-indigo-50 dark:bg-indigo-900/30 text-indigo-600 dark:text-indigo-400' : '' }}">
                            <span class="text-base">🇬🇧</span> English
                            @if(app()->getLocale() === 'en')
                                <svg class="w-4 h-4 ml-auto text-indigo-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                </svg>
                            @endif
                        </a>
                    </div>
                </div>

                <!-- Notifikasi -->
                @auth
                    <livewire:user.notification-dropdown />
                @endauth

                <!-- Profil / Login -->
                <div class="flex items-center ml-1 border-l pl-3 border-gray-100 dark:border-gray-700 h-8">
                    @auth
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button class="flex items-center transition duration-150 ease-in-out">
                                    <div class="h-9 w-9 rounded-full bg-indigo-100 dark:bg-indigo-900 text-indigo-700 dark:text-indigo-300 flex items-center justify-center font-bold text-sm ring-2 ring-white dark:ring-gray-900 shadow-sm overflow-hidden">
                                        {{ substr(Auth::user()->name, 0, 1) }}
                                    </div>
                                    <div class="hidden md:ml-2 md:block text-sm font-medium text-gray-700 dark:text-gray-200">{{ Auth::user()->name }}</div>
                                    <svg class="ml-1 h-4 w-4 text-gray-400 hidden md:block" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path d="M19 9l-7 7-7-7" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                    </svg>
                                </button>
                            </x-slot>
                            <x-slot name="content">
                                <x-dropdown-link :href="route('profile')">{{ __('My Profile') }}</x-dropdown-link>
                                <hr class="my-1 border-gray-100 dark:border-gray-700">
                                <x-dropdown-link :href="route('logout')" @click.prevent="$store.logout.show = true">{{ __('Log Out') }}</x-dropdown-link>
                            </x-slot>
                        </x-dropdown>
                    @else
                        <div class="flex items-center gap-3">
                            <a href="{{ route('login') }}" class="text-sm text-gray-600 dark:text-gray-300 hover:text-indigo-600 dark:hover:text-indigo-400 font-medium transition">{{ __('Login') }}</a>
                            <a href="{{ route('register') }}" class="bg-indigo-600 text-white px-4 py-1.5 rounded-full text-sm font-semibold hover:bg-indigo-700 transition shadow-sm">{{ __('Register') }}</a>
                        </div>
                    @endauth
                </div>

                <!-- Hamburger (Mobile) -->
                <div class="lg:hidden">
                    <button @click="open = ! open" class="p-2 rounded-md text-gray-400 dark:text-gray-300 hover:text-gray-500 hover:bg-gray-100 dark:hover:bg-gray-800 transition">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu (Mobile) -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden lg:hidden bg-white dark:bg-gray-900 border-t border-gray-100 dark:border-gray-800 overflow-hidden transition-all duration-300">
        <div class="pt-2 pb-3 space-y-1 px-4">
            <x-responsive-nav-link :href="route('home')" :active="request()->routeIs('home')">{{ __('Home') }}</x-responsive-nav-link>
            
            <div class="py-3 px-3">
                <livewire:user.search-bar />
            </div>
            
            <div class="py-2">
                <p class="px-3 text-xs font-bold text-gray-400 uppercase tracking-widest mb-1">{{ __('Catalog') }}</p>
                <x-responsive-nav-link :href="route('allBooks')">{{ __('All Books') }}</x-responsive-nav-link>
                <x-responsive-nav-link href="#">{{ __('Latest Books') }}</x-responsive-nav-link>
                <x-responsive-nav-link href="#">{{ __('Popular Books') }}</x-responsive-nav-link>
            </div>

            <div class="py-2 border-t border-gray-50 dark:border-gray-800">
                <p class="px-3 text-xs font-bold text-gray-400 uppercase tracking-widest mb-1">{{ __('Category') }}</p>
                <div class="grid grid-cols-2 gap-1 px-3">
                    <a href="{{ route('allBooks', ['kategori' => 'Novel']) }}" class="text-sm py-2 text-gray-600 dark:text-gray-300">{{ __('Novel') }}</a>
                    <a href="{{ route('allBooks', ['kategori' => 'Sejarah']) }}" class="text-sm py-2 text-gray-600 dark:text-gray-300">{{ __('History') }}</a>
                    <a href="{{ route('allBooks', ['kategori' => 'Teknologi']) }}" class="text-sm py-2 text-gray-600 dark:text-gray-300">{{ __('Technology') }}</a>
                    <a href="{{ route('allBooks', ['kategori' => 'Komik']) }}" class="text-sm py-2 text-gray-600 dark:text-gray-300">{{ __('Comic') }}</a>
                </div>
            </div>

            @auth
            <div class="py-2 border-t border-gray-50 dark:border-gray-800">
                <p class="px-3 text-xs font-bold text-gray-400 uppercase tracking-widest mb-1">{{ __('Dashboard') }}</p>
                <x-responsive-nav-link :href="route('dashboard')">{{ __('Summary') }}</x-responsive-nav-link>
                <x-responsive-nav-link :href="route('my-loans')">{{ __('Borrowed Books') }}</x-responsive-nav-link>
            </div>
            @endauth

            <x-responsive-nav-link :href="route('help')" :active="request()->routeIs('help')">{{ __('Help') }}</x-responsive-nav-link>

            <!-- Mobile: Dark mode + Language -->
            <div class="py-3 border-t border-gray-100 dark:border-gray-800 flex items-center justify-between px-3">
                <!-- Dark mode toggle -->
                <button x-data @click="$store.theme.toggle()"
                    class="flex items-center gap-2 text-sm text-gray-600 dark:text-gray-300 font-medium">
                    <svg x-show="$store.theme.dark" class="w-5 h-5 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                    <svg x-show="!$store.theme.dark" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                    </svg>
                    <span x-show="$store.theme.dark">{{ __('Light Mode') }}</span>
                    <span x-show="!$store.theme.dark">{{ __('Dark Mode') }}</span>
                </button>

                <!-- Language -->
                <div class="flex items-center gap-2">
                    <a href="{{ route('set-locale', 'id') }}"
                        class="flex items-center gap-1 text-sm px-2.5 py-1 rounded-full border {{ app()->getLocale() === 'id' ? 'border-indigo-500 text-indigo-600 dark:text-indigo-400 font-semibold' : 'border-gray-200 dark:border-gray-700 text-gray-500 dark:text-gray-400' }}">
                        🇮🇩 ID
                    </a>
                    <a href="{{ route('set-locale', 'en') }}"
                        class="flex items-center gap-1 text-sm px-2.5 py-1 rounded-full border {{ app()->getLocale() === 'en' ? 'border-indigo-500 text-indigo-600 dark:text-indigo-400 font-semibold' : 'border-gray-200 dark:border-gray-700 text-gray-500 dark:text-gray-400' }}">
                        🇬🇧 EN
                    </a>
                </div>
            </div>
        </div>

        <!-- Mobile User Info -->
        <div class="pt-4 pb-1 border-t border-gray-100 dark:border-gray-800">
            @auth
                <div class="px-4 flex items-center gap-3 mb-3">
                    <div class="h-10 w-10 rounded-full bg-indigo-100 dark:bg-indigo-900 text-indigo-700 dark:text-indigo-300 flex items-center justify-center font-bold">
                        {{ substr(Auth::user()->name, 0, 1) }}
                    </div>
                    <div>
                        <div class="font-medium text-base text-gray-800 dark:text-white">{{ Auth::user()->name }}</div>
                        <div class="font-medium text-sm text-gray-500 dark:text-gray-400">{{ Auth::user()->email }}</div>
                    </div>
                </div>
                <div class="space-y-1">
                    <x-responsive-nav-link :href="route('profile')">
                        <svg class="w-5 h-5 transition duration-75 group-hover:text-gray-900 {{ request()->routeIs('profile') ? 'text-indigo-600' : 'text-gray-500' }}" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        {{ __('My Profile') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('logout')" @click.prevent="$store.logout.show = true" class="text-red-600">{{ __('Log Out') }}</x-responsive-nav-link>
                </div>
            @else
                <div class="p-4 flex flex-col gap-2">
                    <a href="{{ route('login') }}" class="w-full text-center py-2 text-sm font-medium text-gray-700 dark:text-gray-200 bg-gray-50 dark:bg-gray-800 rounded-lg">{{ __('Login') }}</a>
                    <a href="{{ route('register') }}" class="w-full text-center py-2 text-sm font-medium text-white bg-indigo-600 rounded-lg">{{ __('Register') }}</a>
                </div>
            @endauth
        </div>
    </div>
</nav>
