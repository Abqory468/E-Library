<div class="relative w-full max-w-lg" x-data="{ open: false }" @click.away="open = false">
    <div class="relative group">
        <input 
            wire:model.live.debounce.300ms="search"
            @focus="open = true"
            @keydown.escape="open = false; $el.blur()"
            type="text" 
            placeholder="{{ __('Search books, authors, or categories...') }}" 
            class="w-full pl-10 pr-10 py-2.5 bg-gray-100 dark:bg-gray-800 dark:text-gray-100 border-none rounded-2xl text-sm focus:ring-2 focus:ring-indigo-500 focus:bg-white dark:focus:bg-gray-700 transition-all duration-300 shadow-sm group-hover:bg-gray-200 dark:group-hover:bg-gray-750"
        >
        <div class="absolute left-3.5 top-3 text-gray-400">
            <svg class="w-4.5 h-4.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
        </div>
        
        @if($search)
            <button 
                wire:click="clearSearch"
                class="absolute right-3.5 top-3 text-gray-400 hover:text-gray-600 dark:hover:text-gray-200 transition-colors"
            >
                <svg class="w-4.5 h-4.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        @endif
    </div>

    <!-- Live Search Results -->
    <div 
        x-show="open && search.length >= 2"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 translate-y-2"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 translate-y-2"
        class="absolute mt-2 w-full bg-white dark:bg-gray-900 border border-gray-100 dark:border-gray-800 rounded-2xl shadow-2xl z-50 overflow-hidden"
        x-cloak
    >
        @if(count($results) > 0)
            <div class="p-2">
                <p class="px-3 py-2 text-[10px] font-bold text-gray-400 uppercase tracking-widest">{{ __('Search Results') }}</p>
                <div class="space-y-1">
                    @foreach($results as $book)
                        <button 
                            wire:click="selectBook({{ $book['id'] }})"
                            class="w-full flex items-center gap-4 p-3 hover:bg-gray-50 dark:hover:bg-gray-800 rounded-xl transition text-left group"
                        >
                            <div class="w-12 h-16 rounded-lg bg-gray-100 dark:bg-gray-800 overflow-hidden flex-shrink-0 shadow-sm group-hover:shadow-md transition">
                                @if($book['cover'])
                                    <img src="{{ asset('storage/' . $book['cover']) }}" alt="{{ $book['judul'] }}" class="w-full h-full object-cover">
                                @else
                                    <div class="w-full h-full flex items-center justify-center text-gray-300 dark:text-gray-600">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                        </svg>
                                    </div>
                                @endif
                            </div>
                            <div class="min-w-0 flex-1">
                                <h4 class="text-sm font-semibold text-gray-900 dark:text-gray-100 truncate group-hover:text-indigo-600 dark:group-hover:text-indigo-400 transition">{{ $book['judul'] }}</h4>
                                <p class="text-xs text-gray-500 dark:text-gray-400 truncate">{{ $book['penulis'] }}</p>
                                <div class="mt-1 flex items-center gap-2">
                                    <span class="px-2 py-0.5 bg-indigo-50 dark:bg-indigo-900/30 text-indigo-600 dark:text-indigo-400 text-[10px] font-bold rounded-full border border-indigo-100 dark:border-indigo-800/50">
                                        {{ $book['kategori'] }}
                                    </span>
                                </div>
                            </div>
                            <div class="text-gray-300 dark:text-gray-700 opacity-0 group-hover:opacity-100 transition translate-x-1 group-hover:translate-x-0">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </div>
                        </button>
                    @endforeach
                </div>
                
                <a href="{{ route('allBooks', ['search' => $search]) }}" class="block mt-2 p-3 text-center text-xs font-semibold text-indigo-600 dark:text-indigo-400 hover:bg-indigo-50 dark:hover:bg-indigo-900/20 rounded-xl transition">
                    {{ __('See all results for') }} "{{ $search }}"
                </a>
            </div>
        @else
            <div class="p-8 text-center border-t border-gray-100 dark:border-gray-800">
                <div class="w-12 h-12 bg-gray-50 dark:bg-gray-800 rounded-full flex items-center justify-center mx-auto mb-3">
                    <svg class="w-6 h-6 text-gray-300 dark:text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
                <p class="text-sm text-gray-500 dark:text-gray-400">{{ __('No books found') }}</p>
                <p class="text-xs text-gray-400 dark:text-gray-500 mt-1">{{ __('Try searching for something else') }}</p>
            </div>
        @endif
    </div>
</div>
