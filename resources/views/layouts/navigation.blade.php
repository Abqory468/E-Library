<aside x-data :class="$store.sidebar.open ? 'translate-x-0' : '-translate-x-full'" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform sm:translate-x-0 bg-white border-r border-gray-100 shadow-sm" aria-label="Sidebar">
    <div class="h-full px-3 py-4 overflow-y-auto bg-white flex flex-col">
        <!-- Logo -->
        <div class="flex items-center justify-between mb-6 pl-2.5 pr-2 pt-2">
            <a href="{{ route('home') }}" class="flex items-center gap-2">
                <x-application-logo class="block h-9 w-auto fill-current text-indigo-600" />
                <span class="text-xl font-bold text-gray-800 self-center whitespace-nowrap">E-Library</span>
            </a>
            <button @click="$store.sidebar.open = false" class="sm:hidden text-gray-500 hover:text-gray-700 bg-gray-50 rounded-lg p-1 focus:outline-none ring-2 ring-transparent focus:ring-gray-200">
                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <!-- Navigation Links -->
        <ul class="space-y-2 font-medium flex-1">
            <li>
                <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="rounded-lg !border-0 group">
                    <div class="flex items-center gap-3">
                        <svg class="w-5 h-5 transition duration-75 group-hover:text-gray-900 {{ request()->routeIs('dashboard') ? 'text-indigo-600' : 'text-gray-500' }}" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                            <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z"/>
                            <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z"/>
                        </svg>
                        <span>{{ __('Dashboard') }}</span>
                    </div>
                </x-responsive-nav-link>
            </li>

            @if (auth()->user()->role === 'admin')
                <div class="pt-4 pb-2">
                    <p class="px-3 text-xs font-semibold text-gray-400 uppercase tracking-wider">
                        Management
                    </p>
                </div>
                <li>
                    <x-responsive-nav-link :href="route('books')" :active="request()->routeIs('books')" class="rounded-lg !border-0 group">
                        <div class="flex items-center gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5">
                                <path d="M10.75 16.82A7.462 7.462 0 0 1 15 15.5c.71 0 1.396.098 2.046.282A.75.75 0 0 0 18 15.06v-11a.75.75 0 0 0-.546-.721A9.006 9.006 0 0 0 15 3a8.963 8.963 0 0 0-4.25 1.065V16.82ZM9.25 4.065A8.963 8.963 0 0 0 5 3c-.85 0-1.673.118-2.454.339A.75.75 0 0 0 2 4.06v11a.75.75 0 0 0 .954.721A7.506 7.506 0 0 1 5 15.5c1.579 0 3.042.487 4.25 1.32V4.065Z" />
                            </svg>

                            <span>{{ __('Kelola Buku') }}</span>
                        </div>
                    </x-responsive-nav-link>
                </li>
                <li>
                    <x-responsive-nav-link :href="route('loans')" :active="request()->routeIs('loans')" class="rounded-lg !border-0 group">
                        <div class="flex items-center gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5">
                              <path d="M2 3a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H2Z" />
                              <path fill-rule="evenodd" d="M2 7.5h16l-.811 7.71a2 2 0 0 1-1.99 1.79H4.802a2 2 0 0 1-1.99-1.79L2 7.5ZM7 11a1 1 0 0 1 1-1h4a1 1 0 1 1 0 2H8a1 1 0 0 1-1-1Z" clip-rule="evenodd" />
                            </svg>

                            <span>{{ __('Peminjaman') }}</span>
                        </div>
                    </x-responsive-nav-link>
                </li>
                <li>
                    <x-responsive-nav-link :href="route('returns')" :active="request()->routeIs('returns')" class="rounded-lg !border-0 group">
                        <div class="flex items-center gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5">
                                <path fill-rule="evenodd" d="M15.312 11.424a5.5 5.5 0 0 1-9.201 2.466l-.312-.311h2.433a.75.75 0 0 0 0-1.5H3.989a.75.75 0 0 0-.75.75v4.242a.75.75 0 0 0 1.5 0v-2.43l.31.31a7 7 0 0 0 11.712-3.138.75.75 0 0 0-1.449-.39Zm1.23-3.723a.75.75 0 0 0 .219-.53V2.929a.75.75 0 0 0-1.5 0V5.36l-.31-.31A7 7 0 0 0 3.239 8.188a.75.75 0 1 0 1.448.389A5.5 5.5 0 0 1 13.89 6.11l.311.31h-2.432a.75.75 0 0 0 0 1.5h4.243a.75.75 0 0 0 .53-.219Z" clip-rule="evenodd" />
                            </svg>
                            <span>{{ __('Pengembalian') }}</span>
                        </div>
                    </x-responsive-nav-link>
                </li>
            @endif
        </ul>

        <!-- User Profile Area -->
        <div class="border-t border-gray-100 pt-4 mt-4 mb-2">
            <div class="px-3 pb-3 flex items-center gap-3">
                <div class="h-10 w-10 rounded-full bg-indigo-100 text-indigo-700 flex items-center justify-center font-bold text-lg">
                    {{ substr(Auth::user()->name, 0, 1) }}
                </div>
                <div class="flex flex-col truncate">
                    <div class="font-semibold text-sm text-gray-800 truncate">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-xs text-gray-500 truncate">{{ Auth::user()->email }}</div>
                </div>
            </div>
            
            <ul class="space-y-1">
                <li>
                    <x-responsive-nav-link :href="route('profile')" :active="request()->routeIs('profile')" class="rounded-lg !border-0 group !py-2">
                        <div class="flex items-center gap-3">
                            <svg class="w-5 h-5 transition duration-75 group-hover:text-gray-900 {{ request()->routeIs('profile') ? 'text-indigo-600' : 'text-gray-500' }}" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            <span>{{ __('Profile') }}</span>
                        </div>
                    </x-responsive-nav-link>
                </li>
                <li>
                    <button type="button" 
                            @click="$store.logout.show = true" 
                            class="w-full flex items-center gap-3 ps-3 pe-4 py-2 border-l-4 border-transparent text-start text-base font-medium text-red-600 hover:text-red-700 hover:bg-red-50 hover:border-red-300 focus:outline-none transition duration-150 ease-in-out group rounded-lg">
                        <svg class="w-5 h-5 transition duration-75 text-red-500 group-hover:text-red-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                        <span>{{ __('Log Out') }}</span>
                    </button>
                </li>
            </ul>
        </div>
    </div>
</aside>


