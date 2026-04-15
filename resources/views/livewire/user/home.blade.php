<div class="bg-white min-h-screen">
    {{-- Hero Section --}}
    <section class="relative overflow-hidden bg-gradient-to-br from-blue-50 via-white to-indigo-50">
        <div class="absolute top-20 right-10 w-72 h-72 bg-blue-200 rounded-full blur-3xl opacity-20"></div>
        <div class="absolute bottom-0 left-0 w-96 h-96 bg-indigo-200 rounded-full blur-3xl opacity-20"></div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 md:py-24">
            <div class="text-center max-w-3xl mx-auto">
                <span class="inline-flex items-center gap-2 bg-white/80 backdrop-blur-sm border border-gray-200 text-gray-700 text-sm font-medium px-4 py-1.5 rounded-full shadow-sm mb-6">
                    <span class="relative flex h-2 w-2">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-green-500"></span>
                    </span>
                    Akses gratis • 5000+ koleksi buku
                </span>
                <h1 class="text-4xl md:text-6xl font-bold text-gray-900 tracking-tight mb-5">
                    Temukan dunia baru melalui
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-indigo-600">membaca</span>
                </h1>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto mb-8 leading-relaxed">
                    Perpustakaan digital dengan ribuan koleksi buku terbaik. Pinjam, baca, dan kembangkan wawasanmu kapan saja, di mana saja.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('register') }}" class="inline-flex items-center justify-center gap-2 bg-gray-900 text-white px-6 py-3 rounded-xl font-medium hover:bg-gray-800 transition-all shadow-lg hover:shadow-xl">
                        Mulai membaca gratis
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </a>
                    <a href="#koleksi" class="inline-flex items-center justify-center gap-2 border border-gray-300 text-gray-700 px-6 py-3 rounded-xl font-medium hover:bg-gray-50 transition-all">
                        Jelajahi koleksi
                    </a>
                </div>
            </div>

            {{-- Statistik --}}
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mt-16 pt-8 border-t border-gray-100">
                <div class="text-center">
                    <div class="text-2xl md:text-3xl font-bold text-gray-900">50+</div>
                    <div class="text-sm text-gray-500 mt-1">Koleksi Buku</div>
                </div>
                <div class="text-center">
                    <div class="text-2xl md:text-3xl font-bold text-gray-900">5+</div>
                    <div class="text-sm text-gray-500 mt-1">Pembaca Aktif</div>
                </div>
                <div class="text-center">
                    <div class="text-2xl md:text-3xl font-bold text-gray-900">15</div>
                    <div class="text-sm text-gray-500 mt-1">Kategori</div>
                </div>
                <div class="text-center">
                    <div class="text-2xl md:text-3xl font-bold text-gray-900">100%</div>
                    <div class="text-sm text-gray-500 mt-1">Gratis Akses</div>
                </div>
            </div>
        </div>
    </section>

    {{-- Buku Terbaru --}}
    <section id="koleksi" class="py-16 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-end mb-8">
            <div>
                <h2 class="text-2xl md:text-3xl font-bold text-gray-900">Buku terbaru</h2>
                <p class="text-gray-500 mt-2">Koleksi terbaru yang baru saja ditambahkan</p>
            </div>
            <a href="{{ route('allBooks') }}" class="hidden sm:inline-flex items-center gap-1 text-sm font-medium text-blue-600 hover:text-blue-700 transition">
                Lihat semua
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </a>
        </div>

        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-5">
            @forelse ($latestBooks as $book)
            <div class="group cursor-pointer" onclick="window.location='{{ route('books.show', $book->id) }}'">
                <div class="relative aspect-[2/3] rounded-xl overflow-hidden bg-gradient-to-br from-gray-100 to-gray-200 mb-3 shadow-md group-hover:shadow-xl transition-all duration-300 group-hover:-translate-y-1">
                    @if ($book->cover)
                        <img src="{{ asset('storage/' . $book->cover) }}" alt="{{ $book->judul }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                    @else
                        <div class="w-full h-full flex items-center justify-center p-4 text-center">
                            <span class="text-sm font-medium text-gray-600 line-clamp-3">{{ $book->judul }}</span>
                        </div>
                    @endif
                    @if($book->stok > 0 && $book->stok <= 3)
                        <span class="absolute top-2 right-2 bg-yellow-500 text-white text-xs px-2 py-0.5 rounded-full">Stok terbatas</span>
                    @endif
                </div>
                <p class="text-sm font-semibold text-gray-800 line-clamp-1 group-hover:text-blue-600 transition">{{ $book->judul }}</p>
                <p class="text-xs text-gray-500 mt-0.5">{{ $book->penulis }}</p>
                <div class="flex items-center gap-1 mt-1">
                    <svg class="w-3 h-3 text-yellow-500 fill-current" viewBox="0 0 20 20">
                        <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                    </svg>
                    <span class="text-xs text-gray-500">{{ number_format($book->rating ?? 4.5, 1) }}</span>
                </div>
            </div>
            @empty
            <div class="col-span-full text-center py-12 text-gray-500">Belum ada buku</div>
            @endforelse
        </div>
        
        <div class="text-center mt-8 sm:hidden">
            <a href="{{ route('allBooks') }}" class="inline-flex items-center gap-1 text-sm font-medium text-blue-600 hover:text-blue-700">
                Lihat semua buku
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </a>
        </div>
    </section>

    {{-- Kategori Populer --}}
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-10">
                <h2 class="text-2xl md:text-3xl font-bold text-gray-900">Jelajahi berdasarkan kategori</h2>
                <p class="text-gray-500 mt-2">Temukan buku favoritmu dari berbagai genre</p>
            </div>
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-3">
                @foreach($categories as $category)
                <a href="{{ route('allBooks', ['kategori' => $category->slug] ) }}" 
                   class="group bg-white border border-gray-200 rounded-xl p-4 text-center hover:border-blue-200 hover:shadow-md transition-all">
                    <div class="w-12 h-12 mx-auto mb-3 rounded-full bg-gradient-to-br from-blue-100 to-indigo-100 flex items-center justify-center group-hover:scale-110 transition">
                        @if($category->icon == 'fiksi')
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                            </svg>
                        @elseif($category->icon == 'pendidikan')
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"></path>
                            </svg>
                        @elseif($category->icon == 'teknologi')
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 21h6l-.75-4M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                        @elseif($category->icon == 'bisnis')
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                        @elseif($category->icon == 'komik')
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                            </svg>
                        @elseif($category->icon == 'religi')
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path>
                            </svg>
                        @else
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l5 5a2 2 0 01.586 1.414V19a2 2 0 01-2 2H7a2 2 0 01-2-2V5a2 2 0 012-2z"></path>
                            </svg>
                        @endif
                    </div>
                    <p class="text-sm font-medium text-gray-800">{{ $category->nama }}</p>
                    <p class="text-xs text-gray-400 mt-1">{{ $category->books_count ?? 0 }} buku</p>
                </a>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Buku Terfavorit / Terpopuler --}}
    <section class="py-16 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-end mb-8">
            <div>
                <h2 class="text-2xl md:text-3xl font-bold text-gray-900">Buku terfavorit</h2>
                <p class="text-gray-500 mt-2">Paling banyak dipinjam bulan ini</p>
            </div>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse ($popularBooks as $index => $book)
            <div class="group bg-white border border-gray-100 rounded-xl overflow-hidden hover:shadow-lg transition-all duration-300 cursor-pointer" onclick="window.location='{{ route('books.show', $book->id) }}'">
                <div class="flex gap-4 p-4">
                    <div class="relative">
                        <div class="w-20 h-28 rounded-lg bg-gradient-to-br from-gray-100 to-gray-200 flex items-center justify-center overflow-hidden shadow-sm">
                            @if ($book->cover)
                                <img src="{{ asset('storage/' . $book->cover) }}" alt="{{ $book->judul }}" class="w-full h-full object-cover">
                            @else
                                <span class="text-xs text-gray-600 text-center px-2">{{ $book->judul }}</span>
                            @endif
                        </div>
                        <div class="absolute -top-2 -left-2 w-6 h-6 bg-yellow-500 rounded-full flex items-center justify-center text-white text-xs font-bold shadow-md">
                            {{ $index + 1 }}
                        </div>
                    </div>
                    <div class="flex-1 min-w-0">
                        <span class="inline-block text-xs text-gray-500 mb-1">{{ $book->kategori ?? 'Umum' }}</span>
                        <p class="text-base font-bold text-gray-800 line-clamp-1 group-hover:text-blue-600 transition">{{ $book->judul }}</p>
                        <p class="text-xs text-gray-500 mt-0.5">{{ $book->penulis }}</p>
                        <div class="flex items-center gap-3 mt-2">
                            <div class="flex items-center gap-0.5">
                                <svg class="w-3 h-3 text-yellow-500 fill-current" viewBox="0 0 20 20">
                                    <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                </svg>
                                <span class="text-xs font-medium text-gray-700">{{ number_format($book->rating ?? 4.5, 1) }}</span>
                            </div>
                            <span class="text-xs text-gray-400">{{ $book->loans_count ?? 0 }} kali dipinjam</span>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-full text-center py-12 text-gray-500">Belum ada data</div>
            @endforelse
        </div>
    </section>

    {{-- Rekomendasi untuk Kamu --}}
    <section class="py-16 bg-gradient-to-r from-blue-50 to-indigo-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-end mb-8">
                <div>
                    <h2 class="text-2xl md:text-3xl font-bold text-gray-900">Rekomendasi untuk kamu</h2>
                    <p class="text-gray-600 mt-2">Pilihan terbaik berdasarkan minat pembaca</p>
                </div>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
                @forelse ($recommendedBooks as $book)
                <div class="bg-white rounded-xl p-4 flex gap-3 hover:shadow-md transition-all cursor-pointer border border-transparent hover:border-blue-100" onclick="window.location='{{ route('books.show', $book->id) }}'">
                    <div class="w-14 h-20 rounded-lg bg-gradient-to-br from-gray-100 to-gray-200 flex-shrink-0 overflow-hidden">
                        @if ($book->cover)
                            <img src="{{ asset('storage/' . $book->cover) }}" alt="{{ $book->judul }}" class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full flex items-center justify-center text-center p-1">
                                <span class="text-[10px] text-gray-600">{{ $book->judul }}</span>
                            </div>
                        @endif
                    </div>
                    <div class="flex-1 min-w-0">
                        <span class="inline-block text-xs text-gray-500 mb-0.5">{{ $book->kategori ?? 'Umum' }}</span>
                        <p class="text-sm font-semibold text-gray-800 line-clamp-1">{{ $book->judul }}</p>
                        <p class="text-xs text-gray-500 mt-0.5">{{ $book->penulis }}</p>
                        <div class="flex items-center gap-1 mt-2">
                            <svg class="w-3 h-3 text-yellow-500 fill-current" viewBox="0 0 20 20">
                                <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                            </svg>
                            <span class="text-xs text-gray-600">{{ number_format($book->rating ?? 4.5, 1) }}</span>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-span-full text-center py-12 text-gray-500">Belum ada rekomendasi</div>
                @endforelse
            </div>
        </div>
    </section>

    {{-- CTA Banner --}}
    <section class="py-16 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-gradient-to-r from-gray-900 to-gray-800 rounded-2xl p-8 md:p-12 text-center">
            <h2 class="text-2xl md:text-3xl font-bold text-white mb-3">Siap memulai petualangan membaca?</h2>
            <p class="text-gray-300 mb-6 max-w-md mx-auto">Bergabunglah dengan ribuan pembaca lainnya dan akses ribuan buku gratis</p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('register') }}" class="inline-flex items-center justify-center gap-2 bg-white text-gray-900 px-6 py-3 rounded-xl font-semibold hover:bg-gray-100 transition-all">
                    Daftar sekarang gratis
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                    </svg>
                </a>
                <a href="#koleksi" class="inline-flex items-center justify-center border border-gray-500 text-gray-300 px-6 py-3 rounded-xl font-medium hover:bg-gray-700 transition-all">
                    Lihat koleksi buku
                </a>
            </div>
        </div>
    </section>

    {{-- Footer --}}
    <footer class="bg-gray-900 pt-12 pb-6">
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
                        Perpustakaan digital modern untuk semua kalangan. Baca, pinjam, dan eksplorasi ribuan judul buku secara gratis.
                    </p>
                </div>
                <div>
                    <h4 class="text-sm font-semibold text-white mb-4">Koleksi</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-sm text-gray-400 hover:text-white transition">Buku terbaru</a></li>
                        <li><a href="#" class="text-sm text-gray-400 hover:text-white transition">Buku terpopuler</a></li>
                        <li><a href="#" class="text-sm text-gray-400 hover:text-white transition">Rekomendasi</a></li>
                        <li><a href="#" class="text-sm text-gray-400 hover:text-white transition">Semua kategori</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-sm font-semibold text-white mb-4">Bantuan</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-sm text-gray-400 hover:text-white transition">Cara meminjam</a></li>
                        <li><a href="#" class="text-sm text-gray-400 hover:text-white transition">Panduan pengguna</a></li>
                        <li><a href="#" class="text-sm text-gray-400 hover:text-white transition">FAQ</a></li>
                        <li><a href="#" class="text-sm text-gray-400 hover:text-white transition">Kontak kami</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-sm font-semibold text-white mb-4">Legal</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-sm text-gray-400 hover:text-white transition">Kebijakan privasi</a></li>
                        <li><a href="#" class="text-sm text-gray-400 hover:text-white transition">Syarat & ketentuan</a></li>
                        <li><a href="#" class="text-sm text-gray-400 hover:text-white transition">Hak cipta</a></li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-gray-800 pt-6 flex flex-col sm:flex-row justify-between gap-3 text-center sm:text-left">
                <p class="text-xs text-gray-500">© {{ date('Y') }} E-Library. Hak cipta dilindungi.</p>
                <p class="text-xs text-gray-500">Dibuat dengan ❤️ untuk para pecinta buku</p>
            </div>
        </div>
    </footer>
</div>