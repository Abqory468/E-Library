<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-Library</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        html {
            scroll-behavior: smooth;
        }
    </style>
</head>
<body class="font-sans antialiased text-gray-900 bg-white">

    {{-- Navbar --}}
    <nav class="flex items-center justify-between px-8 py-4 border-b border-gray-100 bg-white sticky top-0 z-10">
        <a href="/" class="flex items-center gap-2 font-semibold text-gray-800 text-lg">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="#185FA5" stroke-width="2" viewBox="0 0 24 24">
                <path d="M4 19.5A2.5 2.5 0 016.5 17H20"/>
                <path d="M6.5 2H20v20H6.5A2.5 2.5 0 014 19.5v-15A2.5 2.5 0 016.5 2z"/>
            </svg>
            E-Library
        </a>
        <div class="flex items-center gap-2">
            <a href="#koleksi" class="text-sm text-gray-600 px-3 py-2 rounded-lg hover:bg-gray-100 transition">Koleksi</a>
            <a href="#kategori" class="text-sm text-gray-600 px-3 py-2 rounded-lg hover:bg-gray-100 transition">Kategori</a>
            @auth
                <a href="{{ route('dashboard') }}" class="text-sm bg-blue-700 text-white px-4 py-2 rounded-lg hover:bg-blue-800 transition font-medium">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="text-sm text-gray-600 px-3 py-2 rounded-lg hover:bg-gray-100 transition">Masuk</a>
                <a href="{{ route('register') }}" class="text-sm bg-blue-700 text-white px-4 py-2 rounded-lg hover:bg-blue-800 transition font-medium">Daftar gratis</a>
            @endauth
        </div>
    </nav>

    {{-- Hero --}}
    <section class="bg-blue-50 py-20 px-8 text-center">
        <span class="inline-block bg-blue-100 text-blue-800 text-xs font-medium px-4 py-1 rounded-full mb-5">
            Perpustakaan digital gratis untuk semua
        </span>
        <h1 class="text-4xl font-bold text-blue-950 max-w-xl mx-auto leading-tight mb-4">
            Temukan ribuan buku di genggaman tanganmu
        </h1>
        <p class="text-blue-700 text-base max-w-md mx-auto mb-8 leading-relaxed">
            Akses koleksi lengkap ebook, pinjam buku digital, dan baca kapan saja, di mana saja.
        </p>
        <div class="flex gap-3 justify-center flex-wrap">
            <a href="{{ route('register') }}" class="bg-blue-700 text-white px-6 py-3 rounded-xl font-medium hover:bg-blue-800 transition">
                Mulai membaca
            </a>
            <a href="#koleksi" class="border border-blue-700 text-blue-700 px-6 py-3 rounded-xl font-medium hover:bg-blue-100 transition">
                Lihat koleksi
            </a>
        </div>
    </section>

    {{-- Buku Terbaru --}}
    <section id="koleksi" class="py-12 px-8">
        <div class="mb-7">
            <h2 class="text-xl font-semibold text-gray-800">Buku terbaru</h2>
            <p class="text-sm text-gray-500 mt-1">Koleksi terbaru yang baru saja ditambahkan</p>
        </div>
        <a href="{{ route('books') }}" class="text-sm text-blue-700 flex justify-end px-4 py-2 rounded-lg hover:underline transition font-medium">Lihat selengkapnya -></a>
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-5">
            @foreach ($latestBooks as $book)
            <div class="group cursor-pointer">
                <div class="aspect-[2/3] rounded-xl overflow-hidden bg-blue-100 mb-3 flex items-end p-1">
                    @if ($book->cover)
                        <img src="{{ asset('storage/' . $book->cover) }}" alt="{{ $book->judul }}" class="w-full h-full object-cover rounded-xl">
                    @else
                        <span class="text-xs font-medium text-blue-800 leading-snug">{{ $book->judul }}</span>
                    @endif
                </div>
                <p class="text-sm font-medium text-gray-800 leading-snug">{{ $book->judul }}</p>
                <p class="text-xs text-gray-500 mt-0.5">{{ $book->penulis }}</p>
            </div>
            @endforeach
        </div>
    </section>

    {{-- Rekomendasi --}}
    <section class="py-12 px-8 bg-gray-50">
        <div class="mb-7">
            <h2 class="text-xl font-semibold text-gray-800">Rekomendasi untuk kamu</h2>
            <p class="text-sm text-gray-500 mt-1">Pilihan terbaik berdasarkan minat pembaca</p>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            @foreach ($recommendedBooks as $book)
            <div class="bg-white border border-gray-100 rounded-2xl p-4 flex gap-4 hover:border-blue-200 transition cursor-pointer">
                <div class="w-14 h-20 rounded-lg bg-blue-100 flex-shrink-0 flex items-end p-1">
                    @if ($book->cover)
                        <img src="{{ asset('storage/' . $book->cover) }}" alt="{{ $book->judul }}" class="w-full h-full object-cover rounded">
                    @else
                        <span class="text-[10px] font-medium text-blue-800 leading-tight">{{ $book->judul }}</span>
                    @endif
                </div>
                <div class="min-w-0">
                    <span class="inline-block text-xs bg-blue-50 text-blue-700 px-2 py-0.5 rounded-full mb-1">{{ $book->kategori }}</span>
                    <p class="text-sm font-medium text-gray-800 leading-snug">{{ $book->judul }}</p>
                    <p class="text-xs text-gray-500 mt-0.5 mb-1">{{ $book->penulis }}</p>
                    <p class="text-xs text-gray-400 leading-relaxed line-clamp-2">{{ $book->deskripsi }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </section>

    {{-- Footer --}}
    <footer class="bg-blue-950 px-8 pt-12 pb-6 text-blue-300">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-10 mb-10">
            <div>
                <div class="flex items-center gap-2 text-white font-medium text-base mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="#85B7EB" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M4 19.5A2.5 2.5 0 016.5 17H20"/>
                        <path d="M6.5 2H20v20H6.5A2.5 2.5 0 014 19.5v-15A2.5 2.5 0 016.5 2z"/>
                    </svg>
                    E-Library
                </div>
                <p class="text-sm text-blue-400 leading-relaxed">
                    Perpustakaan digital untuk semua kalangan. Baca, pinjam, dan eksplorasi ribuan judul buku secara gratis.
                </p>
            </div>
            <div>
                <h4 class="text-sm font-medium text-white mb-4">Jelajahi</h4>
                <a href="#" class="block text-sm text-blue-400 hover:text-white mb-2 transition">Koleksi buku</a>
                <a href="#" class="block text-sm text-blue-400 hover:text-white mb-2 transition">Kategori</a>
                <a href="#" class="block text-sm text-blue-400 hover:text-white mb-2 transition">Buku terbaru</a>
                <a href="#" class="block text-sm text-blue-400 hover:text-white transition">Rekomendasi</a>
            </div>
            <div>
                <h4 class="text-sm font-medium text-white mb-4">Bantuan</h4>
                <a href="#" class="block text-sm text-blue-400 hover:text-white mb-2 transition">Cara meminjam</a>
                <a href="#" class="block text-sm text-blue-400 hover:text-white mb-2 transition">FAQ</a>
                <a href="#" class="block text-sm text-blue-400 hover:text-white mb-2 transition">Kontak kami</a>
                <a href="#" class="block text-sm text-blue-400 hover:text-white transition">Kebijakan privasi</a>
            </div>
        </div>
        <div class="border-t border-blue-900 pt-5 flex flex-wrap justify-between gap-2">
            <p class="text-xs text-blue-500">© {{ date('Y') }} E-Library. Semua hak dilindungi.</p>
            <p class="text-xs text-blue-500">Dibuat dengan penuh cinta untuk para pembaca.</p>
        </div>
    </footer>

</body>
</html>