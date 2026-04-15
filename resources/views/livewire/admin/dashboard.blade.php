<div class="p-4 md:p-6 lg:p-8 bg-gray-50 min-h-screen">
    <!-- Header -->
    <div class="mb-8">
        <div>
            <h1 class="text-2xl md:text-3xl font-bold text-gray-800 tracking-tight">Dashboard</h1>
            <p class="text-gray-500 text-sm mt-1">Selamat datang kembali, <span class="font-medium text-gray-700">{{ auth()->user()->name }}</span></p>
        </div>
    </div>

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6 mb-8">
        <!-- Total Buku -->
        <div class="bg-white rounded-xl border border-gray-200 p-4 md:p-5 hover:shadow-md hover:border-blue-200 transition-all duration-200">
            <div class="flex items-center justify-between mb-3">
                <div class="w-10 h-10 bg-blue-50 rounded-lg flex items-center justify-center">
                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                </div>
                <span class="text-xs text-gray-400 bg-gray-100 px-2 py-1 rounded-full">+{{ $newBooks }} bulan ini</span>
            </div>
            <p class="text-2xl md:text-3xl font-bold text-gray-800">{{ number_format($totalBuku) }}</p>
            <p class="text-xs text-gray-500 uppercase tracking-wide mt-1">Total Buku</p>
        </div>

        <!-- Total User -->
        <div class="bg-white rounded-xl border border-gray-200 p-4 md:p-5 hover:shadow-md hover:border-purple-200 transition-all duration-200">
            <div class="flex items-center justify-between mb-3">
                <div class="w-10 h-10 bg-purple-50 rounded-lg flex items-center justify-center">
                    <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                    </svg>
                </div>
                <span class="text-xs text-gray-400 bg-gray-100 px-2 py-1 rounded-full">+{{ $newUsers }} bulan ini</span>
            </div>
            <p class="text-2xl md:text-3xl font-bold text-gray-800">{{ number_format($totalUser) }}</p>
            <p class="text-xs text-gray-500 uppercase tracking-wide mt-1">Total Anggota</p>
        </div>

        <!-- Buku Dipinjam -->
        <div class="bg-white rounded-xl border border-gray-200 p-4 md:p-5 hover:shadow-md hover:border-yellow-200 transition-all duration-200">
            <div class="flex items-center justify-between mb-3">
                <div class="w-10 h-10 bg-yellow-50 rounded-lg flex items-center justify-center">
                    <svg class="w-5 h-5 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <span class="text-xs text-yellow-600 bg-yellow-50 px-2 py-1 rounded-full">{{ $totalPeminjamanAktif }} aktif</span>
            </div>
            <p class="text-2xl md:text-3xl font-bold text-gray-800">{{ number_format($totalPeminjamanAktif) }}</p>
            <p class="text-xs text-gray-500 uppercase tracking-wide mt-1">Buku Dipinjam</p>
        </div>

        <!-- Buku Terlambat -->
        <div class="bg-white rounded-xl border border-gray-200 p-4 md:p-5 hover:shadow-md hover:border-red-200 transition-all duration-200">
            <div class="flex items-center justify-between mb-3">
                <div class="w-10 h-10 bg-red-50 rounded-lg flex items-center justify-center">
                    <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <span class="text-xs text-red-600 bg-red-50 px-2 py-1 rounded-full">perlu tindakan</span>
            </div>
            <p class="text-2xl md:text-3xl font-bold text-red-600">{{ number_format($totalTerlambat) }}</p>
            <p class="text-xs text-gray-500 uppercase tracking-wide mt-1">Buku Terlambat</p>
        </div>
    </div>

    <!-- Charts & Quick Actions Row -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
        <!-- Chart -->
        <div class="lg:col-span-2 bg-white rounded-xl border border-gray-200 p-4 md:p-6">
            <div class="flex items-center justify-between mb-6">
                <div>
                    <h3 class="text-base font-semibold text-gray-800">Statistik Peminjaman</h3>
                    <p class="text-xs text-gray-500 mt-0.5">Per bulan - Tahun {{ date('Y') }}</p>
                </div>
            </div>
            <div class="h-64 relative" wire:ignore>
                <canvas id="loanChart" class="w-full h-full"></canvas>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="bg-white rounded-xl border border-gray-200 p-4 md:p-6">
            <h3 class="text-base font-semibold text-gray-800 mb-4">Aksi Cepat</h3>
            <div class="space-y-3">
                <a href="{{ route('books') }}" 
                   class="flex items-center gap-3 p-3 bg-gray-50 rounded-lg hover:bg-blue-50 transition-all group">
                    <div class="w-9 h-9 bg-blue-100 rounded-lg flex items-center justify-center group-hover:bg-blue-200 transition-colors">
                        <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <p class="text-sm font-medium text-gray-800">Tambah Buku Baru</p>
                        <p class="text-xs text-gray-500">Tambahkan koleksi buku baru</p>
                    </div>
                    <svg class="w-4 h-4 text-gray-400 group-hover:text-blue-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </a>
                <a href="{{ route('register') }}" 
                   class="flex items-center gap-3 p-3 bg-gray-50 rounded-lg hover:bg-purple-50 transition-all group">
                    <div class="w-9 h-9 bg-purple-100 rounded-lg flex items-center justify-center group-hover:bg-purple-200 transition-colors">
                        <svg class="w-4 h-4 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <p class="text-sm font-medium text-gray-800">Tambah Anggota Baru</p>
                        <p class="text-xs text-gray-500">Registrasi anggota baru</p>
                    </div>
                    <svg class="w-4 h-4 text-gray-400 group-hover:text-purple-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </a>
                <a href="{{ route('loans') }}" 
                   class="flex items-center gap-3 p-3 bg-gray-50 rounded-lg hover:bg-green-50 transition-all group">
                    <div class="w-9 h-9 bg-green-100 rounded-lg flex items-center justify-center group-hover:bg-green-200 transition-colors">
                        <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <p class="text-sm font-medium text-gray-800">Lihat Peminjaman</p>
                        <p class="text-xs text-gray-500">Monitor semua peminjaman</p>
                    </div>
                    <svg class="w-4 h-4 text-gray-400 group-hover:text-green-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </a>
            </div>
        </div>
    </div>

    <!-- Recent Activity & Overdue Loans Row -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
        <!-- Recent Activity -->
        <div class="bg-white rounded-xl border border-gray-200 p-4 md:p-6">
            <div class="flex items-center justify-between mb-4">
                <div>
                    <h3 class="text-base font-semibold text-gray-800">Aktivitas Terbaru</h3>
                    <p class="text-xs text-gray-500 mt-0.5">10 aktivitas terakhir</p>
                </div>
                <a href="{{ route('loans') }}" class="text-xs text-blue-600 hover:text-blue-700 font-medium">Lihat semua →</a>
            </div>
            <div class="space-y-3 max-h-80 overflow-y-auto">
                @forelse($recentActivities as $activity)
                <div class="flex items-start gap-3 p-3 rounded-lg hover:bg-gray-50 transition-colors">
                    <div class="flex-shrink-0">
                        @if($activity->type == 'borrow')
                            <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center">
                                <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                </svg>
                            </div>
                        @else
                            <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center">
                                <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                        @endif
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm text-gray-800">
                            <span class="font-medium">{{ $activity->user_name }}</span>
                            {{ $activity->type == 'borrow' ? 'meminjam' : 'mengembalikan' }}
                            <span class="font-medium">{{ $activity->book_title }}</span>
                        </p>
                        <p class="text-xs text-gray-400 mt-0.5">{{ $activity->created_at->diffForHumans() }}</p>
                    </div>
                </div>
                @empty
                <div class="text-center py-8">
                    <div class="w-12 h-12 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-3">
                        <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                        </svg>
                    </div>
                    <p class="text-sm text-gray-500">Belum ada aktivitas</p>
                </div>
                @endforelse
            </div>
        </div>

        <!-- Overdue Loans -->
        <div class="bg-white rounded-xl border border-gray-200 p-4 md:p-6">
            <div class="flex items-center justify-between mb-4">
                <div>
                    <h3 class="text-base font-semibold text-gray-800">Peminjaman Terlambat</h3>
                    <p class="text-xs text-gray-500 mt-0.5">Perlu segera ditindaklanjuti</p>
                </div>
                <a href="{{ route('loans') }}" class="text-xs text-red-600 hover:text-red-700 font-medium">Kelola →</a>
            </div>
            <div class="space-y-3 max-h-80 overflow-y-auto">
                @forelse($overdueLoans as $overdue)
                <div class="flex items-center justify-between p-3 bg-red-50 rounded-lg border border-red-100">
                    <div class="flex-1 min-w-0">
                        <div class="flex items-center gap-2">
                            <div class="w-6 h-6 bg-red-100 rounded-full flex items-center justify-center">
                                <svg class="w-3 h-3 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <p class="text-sm font-medium text-gray-800 truncate">{{ $overdue->user_name }}</p>
                        </div>
                        <p class="text-xs text-gray-600 mt-1 truncate">{{ $overdue->book_title }}</p>
                    </div>
                    <div class="text-right ml-3">
                        <p class="text-sm font-bold text-red-600">{{ $overdue->days_overdue }} hari</p>
                        <p class="text-xs text-red-500">terlambat</p>
                    </div>
                </div>
                @empty
                <div class="text-center py-8">
                    <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-3">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <p class="text-sm text-gray-500">Tidak ada peminjaman terlambat</p>
                    <p class="text-xs text-gray-400 mt-1">Semua peminjaman dalam keadaan baik</p>
                </div>
                @endforelse
            </div>
        </div>
    </div>

    <!-- New Books Section -->
    <div class="bg-white rounded-xl border border-gray-200 p-4 md:p-6">
        <div class="flex items-center justify-between mb-4">
            <div>
                <h3 class="text-base font-semibold text-gray-800">Buku Terbaru</h3>
                <p class="text-xs text-gray-500 mt-0.5">5 koleksi buku terbaru</p>
            </div>
            <a href="{{ route('books') }}" class="text-xs text-blue-600 hover:text-blue-700 font-medium">Lihat semua →</a>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="border-b border-gray-200">
                        <th class="text-left py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">Judul Buku</th>
                        <th class="text-left py-3 text-xs font-medium text-gray-500 uppercase tracking-wider hidden md:table-cell">Penulis</th>
                        <th class="text-left py-3 text-xs font-medium text-gray-500 uppercase tracking-wider hidden lg:table-cell">Kategori</th>
                        <th class="text-left py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">Stok</th>
                        <th class="text-left py-3 text-xs font-medium text-gray-500 uppercase tracking-wider hidden sm:table-cell">Ditambahkan</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($newBooksList as $book)
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="py-3">
                            <p class="text-sm font-medium text-gray-800">{{ $book->judul }}</p>
                            <p class="text-xs text-gray-400 md:hidden">{{ $book->penulis }}</p>
                        </td>
                        <td class="py-3 text-sm text-gray-600 hidden md:table-cell">{{ $book->penulis }}</td>
                        <td class="py-3 text-sm text-gray-600 hidden lg:table-cell">
                            @if($book->kategori)
                                <span class="inline-block px-2 py-0.5 text-xs font-medium text-blue-700 bg-blue-50 rounded">{{ $book->kategori }}</span>
                            @else
                                <span class="text-gray-400">-</span>
                            @endif
                        </td>
                        <td class="py-3">
                            <span class="text-sm font-medium {{ $book->stok > 0 ? 'text-gray-800' : 'text-red-600' }}">
                                {{ $book->stok }}
                            </span>
                        </td>
                        <td class="py-3 text-sm text-gray-500 hidden sm:table-cell">{{ $book->created_at->format('d/m/Y') }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="py-8 text-center text-gray-500">Belum ada buku</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@script
    const chartCanvas = document.getElementById('loanChart');
    if (chartCanvas) {
        const ctx = chartCanvas.getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
                datasets: [{
                    label: 'Jumlah Peminjaman',
                    data: $wire.monthlyLoans,
                    borderColor: '#3b82f6',
                    backgroundColor: 'rgba(59, 130, 246, 0.1)',
                    borderWidth: 2,
                    tension: 0.3,
                    fill: true,
                    pointBackgroundColor: '#3b82f6',
                    pointBorderColor: '#fff',
                    pointBorderWidth: 2,
                    pointRadius: 4,
                    pointHoverRadius: 6
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        backgroundColor: '#1f2937',
                        titleColor: '#f3f4f6',
                        bodyColor: '#d1d5db',
                        padding: 10,
                        cornerRadius: 8
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: '#e5e7eb',
                            drawBorder: false
                        },
                        ticks: {
                            stepSize: 1,
                            precision: 0
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        }
                    }
                }
            }
        });
    }
@endscript
