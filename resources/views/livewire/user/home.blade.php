<div class="bg-white dark:bg-gray-950 min-h-screen transition-colors duration-300">
   {{-- Hero Section --}}
<section class="relative overflow-hidden bg-gradient-to-br from-blue-100 via-white to-indigo-100 dark:from-gray-900 dark:via-gray-950 dark:to-indigo-950 transition-colors duration-300">
    {{-- Decorative elements --}}
    <div class="absolute top-0 right-0 w-80 h-80 bg-blue-200 dark:bg-blue-900 rounded-full blur-3xl opacity-40"></div>
    <div class="absolute bottom-0 left-0 w-80 h-80 bg-indigo-200 dark:bg-indigo-900 rounded-full blur-3xl opacity-40"></div>
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-blue-300 dark:bg-blue-800 rounded-full blur-3xl opacity-10"></div>
    
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 md:py-20">
        <div class="grid lg:grid-cols-2 gap-10 items-center">
            {{-- Left side - Text content --}}
            <div class="text-center lg:text-left">
                {{-- Badge --}}
                <div class="inline-flex items-center gap-2 bg-white/80 dark:bg-gray-800/80 backdrop-blur-sm shadow-sm border border-gray-100 dark:border-gray-700 text-gray-700 dark:text-gray-300 text-sm px-4 py-1.5 rounded-full mb-6">
                    <span class="relative flex h-2 w-2">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-emerald-500"></span>
                    </span>
                    {{ __('Free access • :total book collections', ['total' => $totalBooks ?? '1000+']) }}
                </div>
                
                {{-- Heading --}}
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-gray-900 dark:text-white tracking-tight mb-4 leading-tight">
                    {{ __('Read thousands of books free in the palm of your hand') }}
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-indigo-600"></span>
                </h1>
                
                {{-- Description --}}
                <p class="text-base md:text-lg text-gray-600 dark:text-gray-400 max-w-lg mx-auto lg:mx-0 mb-8 leading-relaxed">
                    {{ __('Borrow and read digital book collections anytime, anywhere. No cost, no hassle.') }}
                </p>
                
                {{-- CTA Buttons --}}
                <div class="flex flex-col sm:flex-row gap-3 justify-center lg:justify-start">
                    <a href="{{ route('register') }}" 
                       class="inline-flex items-center justify-center gap-2 bg-gradient-to-r from-blue-600 to-indigo-600 text-white px-6 py-2.5 rounded-xl font-medium hover:from-blue-700 hover:to-indigo-700 transition-all shadow-md hover:shadow-lg">
                        {{ __('Start reading for free') }}
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </a>
                    <a href="#koleksi" 
                       class="inline-flex items-center justify-center gap-2 bg-white/80 dark:bg-gray-800/80 backdrop-blur-sm border border-gray-200 dark:border-gray-700 text-gray-700 dark:text-gray-300 px-6 py-2.5 rounded-xl font-medium hover:bg-white dark:hover:bg-gray-700 hover:shadow-md transition-all">
                        {{ __('Explore collection') }}
                    </a>
                </div>

                {{-- Stats --}}
                <div class="grid grid-cols-3 gap-4 mt-10 pt-6 border-t border-gray-200 dark:border-gray-700 max-w-md mx-auto lg:mx-0">
                    <div>
                        <div class="text-xl md:text-2xl font-bold text-gray-900 dark:text-white">{{ $totalBooks ?? '100+' }}</div>
                        <div class="text-xs text-gray-500 dark:text-gray-400 mt-0.5">{{ __('Book Collection') }}</div>
                    </div>
                    <div>
                        <div class="text-xl md:text-2xl font-bold text-gray-900 dark:text-white">{{ $activeUsers ?? '50+' }}</div>
                        <div class="text-xs text-gray-500 dark:text-gray-400 mt-0.5">{{ __('Active Readers') }}</div>
                    </div>
                    <div>
                        <div class="text-xl md:text-2xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-indigo-600">{{ __('Free') }}</div>
                        <div class="text-xs text-gray-500 dark:text-gray-400 mt-0.5">{{ __('Forever') }}</div>
                    </div>
                </div>
            </div>

            {{-- Right side - Illustration / Image --}}
            <div class="hidden lg:block relative">
                <div class="relative z-10">
                    <div class="flex justify-center">
                        <div class="relative">
                            {{-- Main book --}}
                            <div class="w-64 h-80 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-2xl shadow-2xl rotate-3 transform transition hover:rotate-6 duration-300">
                                <div class="absolute inset-0 bg-white/10 rounded-2xl"></div>
                                <div class="absolute bottom-4 left-4 right-4">
                                    <div class="w-12 h-1 bg-white/30 rounded mb-2"></div>
                                    <div class="w-24 h-1 bg-white/30 rounded"></div>
                                </div>
                            </div>
                            {{-- Stacked book 1 --}}
                            <div class="absolute -top-4 -left-8 w-48 h-64 bg-gradient-to-br from-blue-400 to-blue-500 rounded-2xl shadow-xl -rotate-6">
                                <div class="absolute inset-0 bg-white/10 rounded-2xl"></div>
                            </div>
                            {{-- Stacked book 2 --}}
                            <div class="absolute -bottom-4 right-6 w-40 h-56 bg-gradient-to-br from-indigo-400 to-indigo-500 rounded-2xl shadow-xl rotate-12">
                                <div class="absolute inset-0 bg-white/10 rounded-2xl"></div>
                            </div>
                            {{-- Floating dots --}}
                            <div class="absolute -top-8 -right-8 w-16 h-16 bg-blue-300 rounded-full blur-xl opacity-60"></div>
                            <div class="absolute -bottom-8 -left-10 w-20 h-20 bg-indigo-300 rounded-full blur-xl opacity-60"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

    {{-- Buku Terbaru --}}
    <section id="koleksi" class="py-16 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-end mb-8">
            <div>
                <h2 class="text-2xl md:text-3xl font-bold text-gray-900 dark:text-white">{{ __('Latest books') }}</h2>
                <p class="text-gray-500 dark:text-gray-400 mt-2">{{ __('Latest collections just added') }}</p>
            </div>
            <a href="{{ route('allBooks') }}" class="hidden sm:inline-flex items-center gap-1 text-sm font-medium text-blue-600 dark:text-blue-400 hover:text-blue-700 dark:hover:text-blue-300 transition">
                {{ __('See all') }}
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </a>
        </div>

        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-5">
            @forelse ($latestBooks as $book)
            <div class="group cursor-pointer" onclick="window.location='{{ route('books.show', $book->id) }}'">
                <div class="relative aspect-[2/3] rounded-xl overflow-hidden bg-gradient-to-br from-gray-100 to-gray-200 dark:from-gray-800 dark:to-gray-700 mb-3 shadow-md group-hover:shadow-xl transition-all duration-300 group-hover:-translate-y-1">
                    @if ($book->cover)
                        <img src="{{ asset('storage/' . $book->cover) }}" alt="{{ $book->judul }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                    @else
                        <div class="w-full h-full flex items-center justify-center p-4 text-center">
                            <span class="text-sm font-medium text-gray-600 dark:text-gray-300 line-clamp-3">{{ $book->judul }}</span>
                        </div>
                    @endif
                    @if($book->stok > 0 && $book->stok <= 3)
                        <span class="absolute top-2 right-2 bg-yellow-500 text-white text-xs px-2 py-0.5 rounded-full">{{ __('Limited stock') }}</span>
                    @endif
                </div>
                <p class="text-sm font-semibold text-gray-800 dark:text-gray-200 line-clamp-1 group-hover:text-blue-600 dark:group-hover:text-blue-400 transition">{{ $book->judul }}</p>
                <p class="text-xs text-gray-500 dark:text-gray-400 mt-0.5">{{ $book->penulis }}</p>
                <div class="flex items-center gap-1 mt-1">
                    <svg class="w-3 h-3 text-yellow-500 fill-current" viewBox="0 0 20 20">
                        <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                    </svg>
                    <span class="text-xs text-gray-500 dark:text-gray-400">{{ number_format($book->rating ?? 4.5, 1) }}</span>
                </div>
            </div>
            @empty
            <div class="col-span-full text-center py-12 text-gray-500 dark:text-gray-400">{{ __('No books yet') }}</div>
            @endforelse
        </div>
        
        <div class="text-center mt-8 sm:hidden">
            <a href="{{ route('allBooks') }}" class="inline-flex items-center gap-1 text-sm font-medium text-blue-600 dark:text-blue-400 hover:text-blue-700 dark:hover:text-blue-300">
                {{ __('See all books') }}
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </a>
        </div>
    </section>

    {{-- Kategori Populer --}}
    <section class="py-16 bg-gray-50 dark:bg-gray-900 transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-10">
                <h2 class="text-2xl md:text-3xl font-bold text-gray-900 dark:text-white">{{ __('Browse by category') }}</h2>
                <p class="text-gray-500 dark:text-gray-400 mt-2">{{ __('Find your favorite books from various genres') }}</p>
            </div>
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-3">
                @foreach($categories as $category)
                <a href="{{ route('allBooks', ['kategori' => $category->slug] ) }}" 
                   class="group bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl p-4 text-center hover:border-blue-200 dark:hover:border-blue-600 hover:shadow-md transition-all">
                    <div class="w-12 h-12 mx-auto mb-3 rounded-full bg-gradient-to-br from-blue-100 to-indigo-100 dark:from-blue-900/50 dark:to-indigo-900/50 flex items-center justify-center group-hover:scale-110 transition">
                        @if($category->icon == 'fiksi')
                            <svg class="w-6 h-6 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                            </svg>
                        @elseif($category->icon == 'pendidikan')
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-600 dark:text-blue-400" viewBox="0 0 24 24" fill="currentColor">
                              <path d="M11.7 2.805a.75.75 0 0 1 .6 0A60.65 60.65 0 0 1 22.83 8.72a.75.75 0 0 1-.231 1.337 49.948 49.948 0 0 0-9.902 3.912l-.003.002c-.114.06-.227.119-.34.18a.75.75 0 0 1-.707 0A50.88 50.88 0 0 0 7.5 12.173v-.224c0-.131.067-.248.172-.311a54.615 54.615 0 0 1 4.653-2.52.75.75 0 0 0-.65-1.352 56.123 56.123 0 0 0-4.78 2.589 1.858 1.858 0 0 0-.859 1.228 49.803 49.803 0 0 0-4.634-1.527.75.75 0 0 1-.231-1.337A60.653 60.653 0 0 1 11.7 2.805Z" />
                              <path d="M13.06 15.473a48.45 48.45 0 0 1 7.666-3.282c.134 1.414.22 2.843.255 4.284a.75.75 0 0 1-.46.711 47.87 47.87 0 0 0-8.105 4.342.75.75 0 0 1-.832 0 47.87 47.87 0 0 0-8.104-4.342.75.75 0 0 1-.461-.71c.035-1.442.121-2.87.255-4.286.921.304 1.83.634 2.726.99v1.27a1.5 1.5 0 0 0-.14 2.508c-.09.38-.222.753-.397 1.11.452.213.901.434 1.346.66a6.727 6.727 0 0 0 .551-1.607 1.5 1.5 0 0 0 .14-2.67v-.645a48.549 48.549 0 0 1 3.44 1.667 2.25 2.25 0 0 0 2.12 0Z" />
                              <path d="M4.462 19.462c.42-.419.753-.89 1-1.395.453.214.902.435 1.347.662a6.742 6.742 0 0 1-1.286 1.794.75.75 0 0 1-1.06-1.06Z" />
                            </svg>
                        @elseif($category->icon == 'teknologi')
                            <svg class="w-6 h-6 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 21h6l-.75-4M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                        @elseif($category->icon == 'bisnis')
                            <svg class="w-6 h-6 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                        @elseif($category->icon == 'komik')
                            <svg class="w-6 h-6 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                            </svg>
                        @elseif($category->icon == 'religi')
                            <svg class="w-6 h-6 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path>
                            </svg>
                        @else
                            <svg class="w-6 h-6 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l5 5a2 2 0 01.586 1.414V19a2 2 0 01-2 2H7a2 2 0 01-2-2V5a2 2 0 012-2z"></path>
                            </svg>
                        @endif
                    </div>
                    <p class="text-sm font-medium text-gray-800 dark:text-gray-200">{{ $category->nama }}</p>
                    <p class="text-xs text-gray-400 dark:text-gray-500 mt-1">{{ $category->books_count ?? 0 }} {{ __('books') }}</p>
                </a>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Buku Terfavorit / Terpopuler --}}
    <section class="py-16 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-end mb-8">
            <div>
                <h2 class="text-2xl md:text-3xl font-bold text-gray-900 dark:text-white">{{ __('Favorite books') }}</h2>
                <p class="text-gray-500 dark:text-gray-400 mt-2">{{ __('Most borrowed this month') }}</p>
            </div>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse ($popularBooks as $index => $book)
            <div class="group bg-white dark:bg-gray-800 border border-gray-100 dark:border-gray-700 rounded-xl overflow-hidden hover:shadow-lg transition-all duration-300 cursor-pointer" onclick="window.location='{{ route('books.show', $book->id) }}'">
                <div class="flex gap-4 p-4">
                    <div class="relative">
                        <div class="w-20 h-28 rounded-lg bg-gradient-to-br from-gray-100 to-gray-200 dark:from-gray-700 dark:to-gray-600 flex items-center justify-center overflow-hidden shadow-sm">
                            @if ($book->cover)
                                <img src="{{ asset('storage/' . $book->cover) }}" alt="{{ $book->judul }}" class="w-full h-full object-cover">
                            @else
                                <span class="text-xs text-gray-600 dark:text-gray-300 text-center px-2">{{ $book->judul }}</span>
                            @endif
                        </div>
                        <div class="absolute -top-2 -left-2 w-6 h-6 bg-yellow-500 rounded-full flex items-center justify-center text-white text-xs font-bold shadow-md">
                            {{ $index + 1 }}
                        </div>
                    </div>
                    <div class="flex-1 min-w-0">
                        <span class="inline-block text-xs text-gray-500 dark:text-gray-400 mb-1">{{ $book->kategori ?? __('General') }}</span>
                        <p class="text-base font-bold text-gray-800 dark:text-gray-100 line-clamp-1 group-hover:text-blue-600 dark:group-hover:text-blue-400 transition">{{ $book->judul }}</p>
                        <p class="text-xs text-gray-500 dark:text-gray-400 mt-0.5">{{ $book->penulis }}</p>
                        <div class="flex items-center gap-3 mt-2">
                            <div class="flex items-center gap-0.5">
                                <svg class="w-3 h-3 text-yellow-500 fill-current" viewBox="0 0 20 20">
                                    <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                </svg>
                                <span class="text-xs font-medium text-gray-700 dark:text-gray-300">{{ number_format($book->rating ?? 4.5, 1) }}</span>
                            </div>
                            <span class="text-xs text-gray-400 dark:text-gray-500">{{ $book->loans_count ?? 0 }} {{ __('times borrowed') }}</span>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-full text-center py-12 text-gray-500 dark:text-gray-400">{{ __('No data yet') }}</div>
            @endforelse
        </div>
    </section>

    {{-- Rekomendasi untuk Kamu --}}
    <section class="py-16 bg-gradient-to-r from-blue-50 to-indigo-50 dark:from-gray-900 dark:to-indigo-950 transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-end mb-8">
                <div>
                    <h2 class="text-2xl md:text-3xl font-bold text-gray-900 dark:text-white">{{ __('Recommended for you') }}</h2>
                    <p class="text-gray-600 dark:text-gray-400 mt-2">{{ __('Best picks based on readers interests') }}</p>
                </div>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
                @forelse ($recommendedBooks as $book)
                <div class="bg-white dark:bg-gray-800 rounded-xl p-4 flex gap-3 hover:shadow-md transition-all cursor-pointer border border-transparent hover:border-blue-100 dark:hover:border-blue-700" onclick="window.location='{{ route('books.show', $book->id) }}'">
                    <div class="w-14 h-20 rounded-lg bg-gradient-to-br from-gray-100 to-gray-200 dark:from-gray-700 dark:to-gray-600 flex-shrink-0 overflow-hidden">
                        @if ($book->cover)
                            <img src="{{ asset('storage/' . $book->cover) }}" alt="{{ $book->judul }}" class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full flex items-center justify-center text-center p-1">
                                <span class="text-[10px] text-gray-600 dark:text-gray-300">{{ $book->judul }}</span>
                            </div>
                        @endif
                    </div>
                    <div class="flex-1 min-w-0">
                        <span class="inline-block text-xs text-gray-500 dark:text-gray-400 mb-0.5">{{ $book->kategori ?? __('General') }}</span>
                        <p class="text-sm font-semibold text-gray-800 dark:text-gray-100 line-clamp-1">{{ $book->judul }}</p>
                        <p class="text-xs text-gray-500 dark:text-gray-400 mt-0.5">{{ $book->penulis }}</p>
                        <div class="flex items-center gap-1 mt-2">
                            <svg class="w-3 h-3 text-yellow-500 fill-current" viewBox="0 0 20 20">
                                <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                            </svg>
                            <span class="text-xs text-gray-600 dark:text-gray-400">{{ number_format($book->rating ?? 4.5, 1) }}</span>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-span-full text-center py-12 text-gray-500 dark:text-gray-400">{{ __('No recommendations yet') }}</div>
                @endforelse
            </div>
        </div>
    </section>

    {{-- Footer --}}
    <footer class="bg-gray-900 dark:bg-gray-950 pt-12 pb-6 transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8 mb-10">
                <div>
                    <div class="flex items-center gap-2 mb-4">
                        <div class="w-8 h-8 bg-blue-600 rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                            </svg>
                        </div>
                        <span class="text-white font-semibold text-lg">E-Library</span>
                    </div>
                    <p class="text-sm text-gray-400 leading-relaxed">
                        {{ __('Modern digital library for everyone. Read, borrow, and explore thousands of book titles for free.') }}
                    </p>
                </div>
                <div>
                    <h4 class="text-sm font-semibold text-white mb-4">{{ __('Collection') }}</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-sm text-gray-400 hover:text-white transition">{{ __('Latest books') }}</a></li>
                        <li><a href="#" class="text-sm text-gray-400 hover:text-white transition">{{ __('Popular books') }}</a></li>
                        <li><a href="#" class="text-sm text-gray-400 hover:text-white transition">{{ __('Recommendations') }}</a></li>
                        <li><a href="#" class="text-sm text-gray-400 hover:text-white transition">{{ __('All categories') }}</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-sm font-semibold text-white mb-4">{{ __('Help') }}</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-sm text-gray-400 hover:text-white transition">{{ __('How to borrow') }}</a></li>
                        <li><a href="#" class="text-sm text-gray-400 hover:text-white transition">{{ __('User guide') }}</a></li>
                        <li><a href="#" class="text-sm text-gray-400 hover:text-white transition">{{ __('FAQ') }}</a></li>
                        <li><a href="#" class="text-sm text-gray-400 hover:text-white transition">{{ __('Contact us') }}</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-sm font-semibold text-white mb-4">{{ __('Legal') }}</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-sm text-gray-400 hover:text-white transition">{{ __('Privacy policy') }}</a></li>
                        <li><a href="#" class="text-sm text-gray-400 hover:text-white transition">{{ __('Terms & conditions') }}</a></li>
                        <li><a href="#" class="text-sm text-gray-400 hover:text-white transition">{{ __('Copyright') }}</a></li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-gray-800 pt-6 flex flex-col sm:flex-row justify-between gap-3 text-center sm:text-left">
                <p class="text-xs text-gray-500">© {{ date('Y') }} E-Library. {{ __('All rights reserved.') }}</p>
                <p class="text-xs text-gray-500"></p>
            </div>
        </div>
    </footer>
</div>