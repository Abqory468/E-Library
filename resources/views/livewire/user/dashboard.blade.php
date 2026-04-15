<div class="p-4 md:p-6 lg:p-8 bg-gray-50 min-h-screen">
    <!-- Header -->
    <div class="mb-8">
        <div>
            <h1 class="text-2xl md:text-3xl font-bold text-gray-800 tracking-tight">Dashboard User</h1>
            <p class="text-gray-500 text-sm mt-1">Selamat datang kembali, <span class="font-medium text-gray-700">{{ auth()->user()->name }}</span></p>
        </div>
    </div>

    <!-- Welcome Banner -->
    <div class="bg-gradient-to-r from-blue-600 to-indigo-600 rounded-xl p-6 mb-8 text-white shadow-lg">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
            <div>
                <div class="flex items-center gap-2 mb-2">
                    <span class="text-3xl">👋</span>
                    <h2 class="text-xl md:text-2xl font-bold">Halo, {{ auth()->user()->name }}!</h2>
                </div>
                <p class="text-blue-100 text-sm md:text-base">
                    Selamat datang di Perpustakaan Digital. Temukan dan nikmati berbagai koleksi buku terbaik untuk Anda.
                </p>
            </div>
            <div class="bg-white/10 backdrop-blur-sm rounded-lg px-5 py-3 text-center">
                <p class="text-xs text-blue-100 uppercase tracking-wide">Sedang Dipinjam</p>
                <p class="text-3xl md:text-4xl font-bold">{{ $bukuDipinjam }}</p>
                <p class="text-xs text-blue-100">buku</p>
            </div>
        </div>
    </div>

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
        <!-- Total Peminjaman -->
        <div class="bg-white rounded-xl border border-gray-200 p-4 hover:shadow-md hover:border-blue-200 transition-all duration-200">
            <div class="flex items-center justify-between mb-3">
                <div class="w-10 h-10 bg-blue-50 rounded-lg flex items-center justify-center">
                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                    </svg>
                </div>
            </div>
            <p class="text-2xl font-bold text-gray-800">{{ $totalPeminjaman }}</p>
            <p class="text-xs text-gray-500 uppercase tracking-wide mt-1">Total Peminjaman</p>
        </div>

        <!-- Buku Sedang Dipinjam -->
        <div class="bg-white rounded-xl border border-gray-200 p-4 hover:shadow-md hover:border-yellow-200 transition-all duration-200">
            <div class="flex items-center justify-between mb-3">
                <div class="w-10 h-10 bg-yellow-50 rounded-lg flex items-center justify-center">
                    <svg class="w-5 h-5 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                </div>
            </div>
            <p class="text-2xl font-bold text-gray-800">{{ $bukuDipinjam }}</p>
            <p class="text-xs text-gray-500 uppercase tracking-wide mt-1">Sedang Dipinjam</p>
        </div>

        <!-- Buku Dikembalikan -->
        <div class="bg-white rounded-xl border border-gray-200 p-4 hover:shadow-md hover:border-green-200 transition-all duration-200">
            <div class="flex items-center justify-between mb-3">
                <div class="w-10 h-10 bg-green-50 rounded-lg flex items-center justify-center">
                    <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
            </div>
            <p class="text-2xl font-bold text-gray-800">{{ $bukuDikembalikan }}</p>
            <p class="text-xs text-gray-500 uppercase tracking-wide mt-1">Sudah Dikembalikan</p>
        </div>

        <!-- Buku Terlambat -->
        <div class="bg-white rounded-xl border border-gray-200 p-4 hover:shadow-md hover:border-red-200 transition-all duration-200">
            <div class="flex items-center justify-between mb-3">
                <div class="w-10 h-10 bg-red-50 rounded-lg flex items-center justify-center">
                    <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
            </div>
            <p class="text-2xl font-bold text-red-600">{{ $bukuTerlambat }}</p>
            <p class="text-xs text-gray-500 uppercase tracking-wide mt-1">Buku Terlambat</p>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
        <a href="{{ route('books') }}" 
           class="group bg-white border border-gray-200 rounded-xl p-4 hover:shadow-md hover:border-blue-200 transition-all duration-200">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-blue-50 rounded-lg flex items-center justify-center group-hover:bg-blue-100 transition-colors">
                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                </div>
                <div class="flex-1">
                    <p class="text-sm font-semibold text-gray-800">Cari Buku</p>
                    <p class="text-xs text-gray-500">Jelajahi koleksi buku</p>
                </div>
                <svg class="w-4 h-4 text-gray-400 group-hover:text-blue-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </div>
        </a>

        <a href="{{ route('my-loans') }}" 
           class="group bg-white border border-gray-200 rounded-xl p-4 hover:shadow-md hover:border-green-200 transition-all duration-200">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-green-50 rounded-lg flex items-center justify-center group-hover:bg-green-100 transition-colors">
                    <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                    </svg>
                </div>
                <div class="flex-1">
                    <p class="text-sm font-semibold text-gray-800">Peminjaman Saya</p>
                    <p class="text-xs text-gray-500">Lihat riwayat peminjaman</p>
                </div>
                <svg class="w-4 h-4 text-gray-400 group-hover:text-green-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </div>
        </a>

        <a href="{{ route('profile') }}" 
           class="group bg-white border border-gray-200 rounded-xl p-4 hover:shadow-md hover:border-purple-200 transition-all duration-200">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-purple-50 rounded-lg flex items-center justify-center group-hover:bg-purple-100 transition-colors">
                    <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                </div>
                <div class="flex-1">
                    <p class="text-sm font-semibold text-gray-800">Profil Saya</p>
                    <p class="text-xs text-gray-500">Kelola akun Anda</p>
                </div>
                <svg class="w-4 h-4 text-gray-400 group-hover:text-purple-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </div>
        </a>
    </div>

    <!-- Two Column Layout -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
        <!-- Sedang Dipinjam (Aktif) -->
        <div class="bg-white rounded-xl border border-gray-200 overflow-hidden">
            <div class="border-b border-gray-200 bg-gray-50/50 px-5 py-4">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-2">
                        <div class="w-8 h-8 bg-yellow-100 rounded-lg flex items-center justify-center">
                            <svg class="w-4 h-4 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                            </svg>
                        </div>
                        <h3 class="font-semibold text-gray-800">Sedang Dipinjam</h3>
                    </div>
                    <span class="text-xs text-gray-500">{{ $activeLoans->count() }} buku</span>
                </div>
            </div>
            <div class="divide-y divide-gray-100 max-h-96 overflow-y-auto">
                @forelse($activeLoans as $loan)
                    @php
                        $isOverdue = $loan->tanggal_kembali < now();
                        $daysLeft = now()->diffInDays($loan->tanggal_kembali, false);
                    @endphp
                    <div class="p-4 hover:bg-gray-50 transition-colors {{ $isOverdue ? 'bg-red-50/30' : '' }}">
                        <div class="flex justify-between items-start mb-2">
                            <div class="flex-1">
                                <p class="font-medium text-gray-800">{{ $loan->book->judul }}</p>
                                <p class="text-xs text-gray-500 mt-0.5">{{ $loan->book->penulis }}</p>
                            </div>
                            @if($isOverdue)
                                <span class="inline-block px-2 py-0.5 text-xs font-medium text-red-700 bg-red-100 rounded">Terlambat</span>
                            @endif
                        </div>
                        <div class="flex justify-between items-center text-sm">
                            <div>
                                <span class="text-gray-500">Pinjam:</span>
                                <span class="text-gray-700 ml-1">{{ $loan->tanggal_pinjam->format('d/m/Y') }}</span>
                            </div>
                            <div class="text-right">
                                <span class="text-gray-500">Kembali:</span>
                                <span class="{{ $isOverdue ? 'text-red-600 font-semibold' : 'text-gray-700' }} ml-1">
                                    {{ $loan->tanggal_kembali->format('d/m/Y') }}
                                </span>
                                @if(!$isOverdue && $daysLeft <= 3)
                                    <p class="text-xs text-yellow-600 mt-0.5">Sisa {{ $daysLeft }} hari</p>
                                @elseif($isOverdue)
                                    <p class="text-xs text-red-500 mt-0.5">Terlambat {{ abs($daysLeft) }} hari</p>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="p-8 text-center">
                        <div class="w-12 h-12 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-3">
                            <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                            </svg>
                        </div>
                        <p class="text-sm text-gray-500">Tidak ada buku yang sedang dipinjam</p>
                        <a href="{{ route('books') }}" class="text-sm text-blue-600 hover:text-blue-700 mt-2 inline-block">Cari buku →</a>
                    </div>
                @endforelse
            </div>
            @if($activeLoans->count() > 0)
                <div class="border-t border-gray-200 px-5 py-3 bg-gray-50">
                    <a href="{{ route('my-loans') }}" class="text-sm text-blue-600 hover:text-blue-700 font-medium">Lihat semua →</a>
                </div>
            @endif
        </div>

        <!-- Rekomendasi Buku / Buku Populer -->
        <div class="bg-white rounded-xl border border-gray-200 overflow-hidden">
            <div class="border-b border-gray-200 bg-gray-50/50 px-5 py-4">
                <div class="flex items-center gap-2">
                    <div class="w-8 h-8 bg-purple-100 rounded-lg flex items-center justify-center">
                        <svg class="w-4 h-4 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                        </svg>
                    </div>
                    <h3 class="font-semibold text-gray-800">Rekomendasi Untuk Anda</h3>
                </div>
            </div>
            <div class="divide-y divide-gray-100 max-h-96 overflow-y-auto">
                @forelse($recommendedBooks ?? [] as $book)
                    <div class="p-4 hover:bg-gray-50 transition-colors">
                        <div class="flex justify-between items-start">
                            <div class="flex-1">
                                <p class="font-medium text-gray-800">{{ $book->judul }}</p>
                                <p class="text-xs text-gray-500 mt-0.5">{{ $book->penulis }}</p>
                                @if($book->kategori)
                                    <span class="inline-block px-2 py-0.5 text-xs font-medium text-blue-700 bg-blue-50 rounded mt-2">
                                        {{ $book->kategori }}
                                    </span>
                                @endif
                            </div>
                            <button wire:click="borrowBook({{ $book->id }})" 
                                    class="ml-3 px-3 py-1.5 text-xs font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 transition-colors"
                                    {{ $book->stok <= 0 ? 'disabled' : '' }}>
                                {{ $book->stok > 0 ? 'Pinjam' : 'Stok Habis' }}
                            </button>
                        </div>
                        <div class="mt-2 flex items-center gap-4 text-xs text-gray-500">
                            <span>📚 Stok: {{ $book->stok }}</span>
                            <span>⭐ {{ $book->rating ?? 'Belum ada rating' }}</span>
                        </div>
                    </div>
                @empty
                    <div class="p-8 text-center">
                        <div class="w-12 h-12 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-3">
                            <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                            </svg>
                        </div>
                        <p class="text-sm text-gray-500">Belum ada rekomendasi</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    <!-- Riwayat Peminjaman Terbaru -->
    <div class="bg-white rounded-xl border border-gray-200 overflow-hidden">
        <div class="border-b border-gray-200 bg-gray-50/50 px-5 py-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-2">
                    <div class="w-8 h-8 bg-gray-100 rounded-lg flex items-center justify-center">
                        <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                        </svg>
                    </div>
                    <h3 class="font-semibold text-gray-800">Riwayat Peminjaman</h3>
                </div>
                <span class="text-xs text-gray-500">5 peminjaman terakhir</span>
            </div>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="border-b border-gray-200 bg-gray-50">
                        <th class="px-5 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Buku</th>
                        <th class="px-5 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hidden md:table-cell">Penulis</th>
                        <th class="px-5 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal Pinjam</th>
                        <th class="px-5 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal Kembali</th>
                        <th class="px-5 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($riwayatPeminjaman as $loan)
                        @php
                            $isOverdue = $loan->status == 'dipinjam' && $loan->tanggal_kembali < now();
                        @endphp
                        <tr class="hover:bg-gray-50 transition-colors {{ $isOverdue ? 'bg-red-50/30' : '' }}">
                            <td class="px-5 py-3">
                                <p class="text-sm font-medium text-gray-800">{{ $loan->book->judul }}</p>
                                <p class="text-xs text-gray-400 md:hidden mt-0.5">{{ $loan->book->penulis }}</p>
                            </td>
                            <td class="px-5 py-3 text-sm text-gray-600 hidden md:table-cell">{{ $loan->book->penulis }}</td>
                            <td class="px-5 py-3 text-sm text-gray-600">{{ $loan->tanggal_pinjam->format('d/m/Y') }}</td>
                            <td class="px-5 py-3">
                                <span class="text-sm {{ $isOverdue ? 'text-red-600 font-semibold' : 'text-gray-600' }}">
                                    {{ $loan->tanggal_kembali->format('d/m/Y') }}
                                </span>
                            </td>
                            <td class="px-5 py-3">
                                @if($loan->status == 'dipinjam')
                                    <span class="inline-block px-2 py-0.5 text-xs font-medium text-yellow-700 bg-yellow-50 rounded">Dipinjam</span>
                                @else
                                    <span class="inline-block px-2 py-0.5 text-xs font-medium text-green-700 bg-green-50 rounded">Dikembalikan</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-5 py-8 text-center">
                                <div class="w-12 h-12 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-3">
                                    <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                                    </svg>
                                </div>
                                <p class="text-sm text-gray-500">Belum ada riwayat peminjaman</p>
                                <a href="{{ route('books') }}" class="text-sm text-blue-600 hover:text-blue-700 mt-2 inline-block">Mulai pinjam buku →</a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($riwayatPeminjaman->count() > 0)
            <div class="border-t border-gray-200 px-5 py-3 bg-gray-50">
                <a href="{{ route('my-loans') }}" class="text-sm text-blue-600 hover:text-blue-700 font-medium">Lihat semua riwayat →</a>
            </div>
        @endif
    </div>
</div>