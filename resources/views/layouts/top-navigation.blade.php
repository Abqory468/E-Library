<nav x-data="{ open: false, searchOpen: false }" class="bg-white border-b border-gray-100 z-50 sticky top-0 shadow-sm">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center">
                <!-- Logo -->
                <div class="shrink-0 flex items-center mr-8">
                    <a href="{{ route('home') }}" class="flex items-center gap-2">
                        <x-application-logo class="block h-9 w-auto fill-current text-indigo-600" />
                        <span class="text-xl font-bold text-gray-800 self-center whitespace-nowrap">E-Library</span>
                    </a>
                </div>

                <!-- Desktop Navigation Links -->
                <div class="hidden lg:flex lg:space-x-4">
                    <!-- 1. Home (Dropdown) -->
                    <x-dropdown align="left" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-3 py-4 text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                <div>Home</div>
                                <div class="ml-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>
                        <x-slot name="content">
                            <x-dropdown-link :href="route('home')">Beranda Utama</x-dropdown-link>
                            <x-dropdown-link href="{{ Request::routeIs('home') ? '#rekomendasi' : route('home').'#rekomendasi' }}">Rekomendasi Buku</x-dropdown-link>
                            <x-dropdown-link href="{{ Request::routeIs('home') ? '#koleksi' : route('home').'#koleksi' }}">Buku Trending / Terbaru</x-dropdown-link>
                        </x-slot>
                    </x-dropdown>

                    <!-- 2. Katalog (Dropdown) -->
                    <x-dropdown align="left" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-3 py-4 text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                <div>Katalog</div>
                                <div class="ml-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>
                        <x-slot name="content">
                            <x-dropdown-link :href="route('allBooks')">Semua Buku</x-dropdown-link>
                            <x-dropdown-link href="{{ route('allBooks', ['sort' => 'latest']) }}">Buku Terbaru</x-dropdown-link>
                            <x-dropdown-link href="{{ route('allBooks', ['sort' => 'popular']) }}">Buku Populer</x-dropdown-link>
                            <x-dropdown-link href="{{ route('allBooks', ['filter' => 'free']) }}">Buku Gratis</x-dropdown-link>
                        </x-slot>
                    </x-dropdown>

                    <!-- 3. Kategori (Dropdown) -->
                    <x-dropdown align="left" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-3 py-4 text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                <div>Kategori</div>
                                <div class="ml-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>
                        <x-slot name="content">
                            <x-dropdown-link href="{{ route('allBooks', ['kategori' => 'Novel']) }}">Novel</x-dropdown-link>
                            <x-dropdown-link href="{{ route('allBooks', ['kategori' => 'Sejarah']) }}">Sejarah</x-dropdown-link>
                            <x-dropdown-link href="{{ route('allBooks', ['kategori' => 'Teknologi']) }}">Teknologi</x-dropdown-link>
                            <x-dropdown-link href="{{ route('allBooks', ['kategori' => 'Pendidikan']) }}">Pendidikan</x-dropdown-link>
                            <x-dropdown-link href="{{ route('allBooks', ['kategori' => 'Biografi']) }}">Biografi</x-dropdown-link>
                            <x-dropdown-link href="{{ route('allBooks', ['kategori' => 'Komik']) }}">Komik</x-dropdown-link>
                        </x-slot>
                    </x-dropdown>

                    <!-- 4. Dashboard (Dropdown - Auth) -->
                    @auth
                    <x-dropdown align="left" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-3 py-4 text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                <div>Dashboard</div>
                                <div class="ml-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>
                        <x-slot name="content">
                            <x-dropdown-link :href="route('dashboard')">Ringkasan</x-dropdown-link>
                            <x-dropdown-link :href="route('my-loans')">Buku Dipinjam</x-dropdown-link>
                            <x-dropdown-link href="#">Riwayat Bacaan</x-dropdown-link>
                            <x-dropdown-link :href="route('wishlist')">Wishlist / Favorit</x-dropdown-link>
                            <x-dropdown-link href="#">Review Saya</x-dropdown-link>
                        </x-slot>
                    </x-dropdown>
                    @endauth

                    <!-- 8. Bantuan -->
                    <x-nav-link :href="route('help')" :active="request()->routeIs('help')">
                        {{ __('Bantuan') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- Right side: Search, Notifications, Profile -->
            <div class="flex items-center gap-4">
                <!-- 5. Pencarian (Desktop Inline or Icon) -->
                <div class="hidden sm:flex items-center relative group">
                    <form action="{{ route('allBooks') }}" method="GET" class="relative">
                        <input type="text" name="search" placeholder="Cari buku..." 
                            class="pl-10 pr-4 py-1.5 bg-gray-50 border border-gray-200 rounded-full text-sm focus:ring-2 focus:ring-indigo-500 focus:bg-white transition-all w-48 focus:w-64 outline-none">
                        <div class="absolute left-3 top-2 text-gray-400">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </div>
                    </form>
                </div>

                <!-- 6. Notifikasi -->
                @auth
                    <livewire:user.notification-dropdown />
                @endauth

                <!-- 7. Profil / Login -->
                <div class="flex items-center ml-2 border-l pl-4 border-gray-100 h-8">
                    @auth
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button class="flex items-center transition duration-150 ease-in-out">
                                    <div class="h-9 w-9 rounded-full bg-indigo-100 text-indigo-700 flex items-center justify-center font-bold text-sm ring-2 ring-white shadow-sm overflow-hidden">
                                        {{ substr(Auth::user()->name, 0, 1) }}
                                    </div>
                                    <div class="hidden md:ml-2 md:block text-sm font-medium text-gray-700">{{ Auth::user()->name }}</div>
                                    <svg class="ml-1 h-4 w-4 text-gray-400 hidden md:block" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path d="M19 9l-7 7-7-7" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                    </svg>
                                </button>
                            </x-slot>
                            <x-slot name="content">
                                <x-dropdown-link :href="route('profile')">Profil Saya</x-dropdown-link>
                                <hr class="my-1 border-gray-100">
                                <x-dropdown-link :href="route('logout')" @click.prevent="$store.logout.show = true">Logout</x-dropdown-link>
                            </x-slot>
                        </x-dropdown>
                    @else
                        <div class="flex items-center gap-3">
                            <a href="{{ route('login') }}" class="text-sm text-gray-600 hover:text-indigo-600 font-medium transition">Masuk</a>
                            <a href="{{ route('register') }}" class="bg-indigo-600 text-white px-4 py-1.5 rounded-full text-sm font-semibold hover:bg-indigo-700 transition shadow-sm">Daftar</a>
                        </div>
                    @endauth
                </div>

                <!-- Hamburger (Mobile) -->
                <div class="lg:hidden">
                    <button @click="open = ! open" class="p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 transition">
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
    <div :class="{'block': open, 'hidden': ! open}" class="hidden lg:hidden bg-white border-t border-gray-50 overflow-hidden transition-all duration-300">
        <div class="pt-2 pb-3 space-y-1 px-4">
            <x-responsive-nav-link :href="route('home')" :active="request()->routeIs('home')">Home</x-responsive-nav-link>
            
            <div class="py-2">
                <p class="px-3 text-xs font-bold text-gray-400 uppercase tracking-widest mb-1">Katalog</p>
                <x-responsive-nav-link :href="route('allBooks')">Semua Buku</x-responsive-nav-link>
                <x-responsive-nav-link href="#">Buku Terbaru</x-responsive-nav-link>
                <x-responsive-nav-link href="#">Buku Populer</x-responsive-nav-link>
            </div>

            <div class="py-2 border-t border-gray-50">
                <p class="px-3 text-xs font-bold text-gray-400 uppercase tracking-widest mb-1">Kategori</p>
                <div class="grid grid-cols-2 gap-1 px-3">
                    <a href="{{ route('allBooks', ['kategori' => 'Novel']) }}" class="text-sm py-2 text-gray-600">Novel</a>
                    <a href="{{ route('allBooks', ['kategori' => 'Sejarah']) }}" class="text-sm py-2 text-gray-600">Sejarah</a>
                    <a href="{{ route('allBooks', ['kategori' => 'Teknologi']) }}" class="text-sm py-2 text-gray-600">Teknologi</a>
                    <a href="{{ route('allBooks', ['kategori' => 'Komik']) }}" class="text-sm py-2 text-gray-600">Komik</a>
                </div>
            </div>

            @auth
            <div class="py-2 border-t border-gray-50">
                <p class="px-3 text-xs font-bold text-gray-400 uppercase tracking-widest mb-1">Dashboard</p>
                <x-responsive-nav-link :href="route('dashboard')">Ringkasan</x-responsive-nav-link>
                <x-responsive-nav-link :href="route('my-loans')">Buku Dipinjam</x-responsive-nav-link>
            </div>
            @endauth

            <x-responsive-nav-link :href="route('help')" :active="request()->routeIs('help')">Bantuan</x-responsive-nav-link>
        </div>

        <!-- Mobile User Info -->
        <div class="pt-4 pb-1 border-t border-gray-100">
            @auth
                <div class="px-4 flex items-center gap-3 mb-3">
                    <div class="h-10 w-10 rounded-full bg-indigo-100 text-indigo-700 flex items-center justify-center font-bold">
                        {{ substr(Auth::user()->name, 0, 1) }}
                    </div>
                    <div>
                        <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                        <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                    </div>
                </div>
                <div class="space-y-1">
                    <x-responsive-nav-link :href="route('profile')">Profil Saya</x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('logout')" @click.prevent="$store.logout.show = true" class="text-red-600">Logout</x-responsive-nav-link>
                </div>
            @else
                <div class="p-4 flex flex-col gap-2">
                    <a href="{{ route('login') }}" class="w-full text-center py-2 text-sm font-medium text-gray-700 bg-gray-50 rounded-lg">Masuk</a>
                    <a href="{{ route('register') }}" class="w-full text-center py-2 text-sm font-medium text-white bg-indigo-600 rounded-lg">Daftar</a>
                </div>
            @endauth
        </div>
    </div>
</nav>
