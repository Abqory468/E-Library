<div class="min-h-screen bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-2 py-6 md:py-8">
        <!-- Header & Search Section -->
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-6 md:mb-8">
            <div>
                <h1 class="text-2xl md:text-3xl font-bold text-gray-800 tracking-tight">Koleksi Buku</h1>
                <p class="text-gray-500 text-sm mt-1">Temukan berbagai bacaan menarik untuk Anda</p>
            </div>

            <div class="flex flex-col sm:flex-row gap-3">
                <div class="relative">
                    <input wire:model.live.debounce.300ms="search" type="text" placeholder="Cari judul atau penulis..." 
                        class="w-full sm:w-72 pl-10 pr-4 py-2 bg-white border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500 transition-all">
                    <div class="absolute left-3 top-2.5 text-gray-400">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                </div>

                <select wire:model.live="kategori" class="px-4 py-2 bg-white border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500 transition-all cursor-pointer">
                    <option value="">Semua Kategori</option>
                    @foreach($kategoris as $item)
                        <option value="{{ $item }}">{{ $item }}</option>
                    @endforeach
                </select>

                <button wire:click="resetFilters" class="px-5 py-2 text-sm text-gray-600 hover:text-gray-900 bg-white border border-gray-300 rounded-md hover:bg-gray-50 transition-all font-medium">
                    Reset
                </button>
            </div>
        </div>

        <!-- Alert Messages -->
        @if(session()->has('message'))
            <div class="mb-6 p-3 bg-green-50 border-l-4 border-green-500 text-green-700 flex items-center gap-3">
                <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <span class="text-sm">{{ session('message') }}</span>
            </div>
        @endif
        @if(session()->has('error'))
            <div class="mb-6 p-3 bg-red-50 border-l-4 border-red-500 text-red-700 flex items-center gap-3">
                <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <span class="text-sm">{{ session('error') }}</span>
            </div>
        @endif

        <!-- Books Grid -->
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-4 md:gap-5">
            @foreach($books as $book)
                <div class="group bg-white border border-gray-200 hover:border-gray-300 hover:shadow-md transition-all duration-200 overflow-hidden">
                    <!-- Cover Image - No zoom -->
                    <a href="{{ route('books.show', $book->id) }}" class="block relative aspect-[2/3] overflow-hidden bg-gray-100">
                        @if($book->cover)
                            <img src="{{ asset('storage/' . $book->cover) }}" alt="{{ $book->judul }}" class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full flex flex-col items-center justify-center p-4 text-center bg-gray-100">
                                <svg class="w-10 h-10 text-gray-300 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                </svg>
                                <span class="text-xs font-medium text-gray-400 text-center line-clamp-2">{{ $book->judul }}</span>
                            </div>
                        @endif

                        <!-- Wishlist Toggle -->
                        <button wire:click.prevent="toggleWishlist({{ $book->id }})" class="absolute top-2 right-2 p-1.5 rounded-full bg-white/80 backdrop-blur-sm shadow-sm hover:scale-110 transition-transform z-10">
                            <svg class="w-4 h-4 {{ in_array($book->id, $myWishlistBookIds) ? 'fill-red-500 text-red-500' : 'text-gray-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                            </svg>
                        </button>
                    </a>

                    <!-- Details -->
                    <div class="p-3">
                        <div class="mb-2">
                            <span class="inline-block px-2 py-0.5 bg-gray-100 text-gray-600 text-[10px] font-medium rounded-sm">
                                {{ $book->kategori ?: 'Umum' }}
                            </span>
                        </div>
                        
                        <h3 class="text-sm font-semibold text-gray-800 line-clamp-1 mb-1" title="{{ $book->judul }}">
                            {{ $book->judul }}
                        </h3>
                        
                        <p class="text-xs text-gray-500 line-clamp-1 mb-2">
                            {{ $book->penulis }}
                        </p>

                        <!-- Stok Info -->
                        <div class="flex items-center justify-between text-xs mb-3">
                            <span class="{{ $book->stok > 0 ? 'text-green-600' : 'text-red-500' }}">
                                {{ $book->stok > 0 ? 'Tersedia' : 'Stok Habis' }}
                            </span>
                            <span class="text-gray-400">{{ $book->stok }} eks</span>
                        </div>

                        <!-- Actions -->
                        @if(in_array($book->id, $myLoanBookIds))
                            <button wire:click="returnBook({{ $book->id }})" 
                                class="w-full py-1.5 bg-orange-500 hover:bg-orange-600 text-white text-xs font-medium transition-colors">
                                Kembalikan
                            </button>
                        @else
                            <button wire:click="borrowBook({{ $book->id }})" 
                                class="w-full py-1.5 {{ $book->stok > 0 ? 'bg-blue-600 hover:bg-blue-700' : 'bg-gray-300 cursor-not-allowed' }} text-white text-xs font-medium transition-colors"
                                {{ $book->stok > 0 ? '' : 'disabled' }}>
                                Pinjam
                            </button>
                        @endif

                        <a href="{{ route('books.show', $book->id) }}" class="block w-full text-center text-xs text-gray-500 hover:text-blue-600 py-1.5 mt-1 transition-colors">
                            Detail
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Empty State -->
        @if($books->isEmpty())
            <div class="text-center py-16">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-gray-100 mb-4">
                    <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                </div>
                <h3 class="text-base font-semibold text-gray-800 mb-1">Tidak ada buku ditemukan</h3>
                <p class="text-gray-500 text-sm">Coba ubah kata kunci pencarian atau filter kategori</p>
                <button wire:click="resetFilters" class="mt-4 px-4 py-2 text-sm text-blue-600 bg-blue-50 hover:bg-blue-100 transition-colors">
                    Reset Filter
                </button>
            </div>
        @endif

        <!-- Pagination -->
        <div class="mt-10">
            @if($books->hasPages())
                <div class="flex justify-center">
                    {{ $books->onEachSide(1)->links() }}
                </div>
            @endif
        </div>
    </div>
</div>