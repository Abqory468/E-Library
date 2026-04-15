<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-8 md:py-12">
    <!-- Breadcrumbs -->
    <nav class="flex mb-6 text-sm text-gray-500" aria-label="Breadcrumb">
        <ol class="flex items-center space-x-2">
            <li><a href="{{ route('home') }}" class="hover:text-blue-600 transition">Beranda</a></li>
            <li><svg class="h-4 w-4" fill="currentColor" viewBox="0 0 20 20"><path d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"/></svg></li>
            <li><a href="{{ route('allBooks') }}" class="hover:text-blue-600 transition">Koleksi Buku</a></li>
            <li><svg class="h-4 w-4" fill="currentColor" viewBox="0 0 20 20"><path d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"/></svg></li>
            <li class="font-medium text-gray-900 truncate max-w-[200px]">{{ $book->judul }}</li>
        </ol>
    </nav>

    <!-- Content Grid -->
    <div class="bg-white border border-gray-200 overflow-hidden">
        <div class="flex flex-col md:flex-row">
            <!-- Left: Cover -->
            <div class="w-full md:w-2/5 lg:w-1/3 bg-gray-50 p-6 flex items-center justify-center border-b md:border-b-0 md:border-r border-gray-200">
                <div class="relative w-full max-w-[260px]">
                    <div class="aspect-[2/3] overflow-hidden bg-gray-100">
                        @if($book->cover)
                            <img src="{{ asset('storage/' . $book->cover) }}" alt="{{ $book->judul }}" class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full flex flex-col items-center justify-center p-6 text-center bg-gray-100">
                                <svg class="w-12 h-12 text-gray-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                </svg>
                                <span class="text-xs text-gray-400">No Cover</span>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Right: Details -->
            <div class="w-full md:w-3/5 lg:w-2/3 p-6 md:p-8 flex flex-col">
                <div class="flex-1">
                    <div class="flex flex-wrap items-center gap-2 mb-4">
                        <span class="px-2 py-0.5 bg-gray-100 text-gray-600 text-xs font-medium">
                            {{ $book->kategori ?: 'Umum' }}
                        </span>
                        @if($book->stok > 0)
                            <span class="px-2 py-0.5 bg-green-100 text-green-700 text-xs font-medium">Tersedia</span>
                        @else
                            <span class="px-2 py-0.5 bg-red-100 text-red-700 text-xs font-medium">Stok Habis</span>
                        @endif
                    </div>

                    <h1 class="text-2xl md:text-3xl font-bold text-gray-900 mb-2 leading-tight">
                        {{ $book->judul }}
                    </h1>
                    <p class="text-base text-gray-500 mb-6">oleh <span class="text-blue-600">{{ $book->penulis }}</span></p>

                    <!-- Alert Messages -->
                    @if(session()->has('message'))
                        <div class="mb-6 p-3 bg-green-50 border-l-4 border-green-500 text-green-700">
                            {{ session('message') }}
                        </div>
                    @endif
                    @if(session()->has('error'))
                        <div class="mb-6 p-3 bg-red-50 border-l-4 border-red-500 text-red-700">
                            {{ session('error') }}
                        </div>
                    @endif

                    <!-- Book Details Grid -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-6 py-5 border-t border-b border-gray-200">
                        <div>
                            <p class="text-xs text-gray-400 uppercase tracking-wider mb-1">Penerbit</p>
                            <p class="text-gray-800 font-medium">{{ $book->penerbit ?: '-' }}</p>
                        </div>
                        <div>
                            <p class="text-xs text-gray-400 uppercase tracking-wider mb-1">Tahun Terbit</p>
                            <p class="text-gray-800 font-medium">{{ $book->tahun_terbit ?: '-' }}</p>
                        </div>
                        <div>
                            <p class="text-xs text-gray-400 uppercase tracking-wider mb-1">ISBN</p>
                            <p class="text-gray-800 font-mono text-sm">{{ $book->isbn ?: '-' }}</p>
                        </div>
                        <div>
                            <p class="text-xs text-gray-400 uppercase tracking-wider mb-1">Stok Tersedia</p>
                            <p class="text-gray-800 font-medium">{{ $book->stok }} eksemplar</p>
                        </div>
                    </div>

                    <!-- Description -->
                    @if($book->deskripsi)
                        <div class="mb-6">
                            <h3 class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2">Deskripsi</h3>
                            <div class="text-gray-600 text-sm leading-relaxed">
                                {!! nl2br(e($book->deskripsi)) !!}
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Actions -->
                <div class="flex flex-col sm:flex-row items-center gap-3 pt-5 mt-4 border-t border-gray-200">
                    @auth
                        @if($isBorrowed)
                            <button wire:click="returnBook" class="w-full sm:w-auto px-6 py-2.5 bg-orange-500 hover:bg-orange-600 text-white font-medium transition-colors">
                                Kembalikan Buku
                            </button>
                        @else
                            <button wire:click="borrowBook" 
                                class="w-full sm:w-auto px-6 py-2.5 {{ $book->stok > 0 ? 'bg-blue-600 hover:bg-blue-700' : 'bg-gray-300 cursor-not-allowed' }} text-white font-medium transition-colors"
                                {{ $book->stok > 0 ? '' : 'disabled' }}>
                                {{ $book->stok > 0 ? 'Pinjam Sekarang' : 'Stok Habis' }}
                            </button>
                        @endif

                        <!-- Wishlist Toggle -->
                        <button wire:click="toggleWishlist" class="w-full sm:w-auto flex items-center justify-center gap-2 px-6 py-2.5 border border-gray-200 text-gray-700 hover:bg-gray-50 transition-colors">
                            <svg class="w-5 h-5 {{ $isInWishlist ? 'fill-red-500 text-red-500' : 'text-gray-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                            </svg>
                            <span>{{ $isInWishlist ? 'Disukai' : 'Sukai' }}</span>
                        </button>
                    @else
                        <a href="{{ route('login') }}" class="w-full sm:w-auto px-6 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-medium transition-colors text-center">
                            Masuk untuk Meminjam
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>