<div class="p-4 md:p-6 lg:p-8 bg-gray-50 dark:bg-gray-950 min-h-screen">
    <!-- Header -->
    <div class="mb-8">
        <div>
            <h1 class="text-2xl md:text-3xl font-bold text-gray-800 dark:text-white tracking-tight">Dashboard</h1>
            <p class="text-gray-500 dark:text-gray-400 text-sm mt-1">Selamat datang kembali, <span class="font-medium text-gray-700 dark:text-gray-300">{{ auth()->user()->name }}</span></p>
        </div>
    </div>

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6 mb-8">
        <!-- Total Buku -->
        <div class="bg-white dark:bg-gray-900 rounded-xl border border-gray-200 dark:border-gray-800 p-4 md:p-5 hover:shadow-md hover:border-blue-200 dark:hover:border-blue-800 transition-all duration-200">
            <div class="flex items-center justify-between mb-3">
                <div class="w-10 h-10 bg-blue-50 dark:bg-blue-900/30 rounded-lg flex items-center justify-center">
                    <svg class="w-5 h-5 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                </div>
                <span class="text-xs text-gray-400 dark:text-gray-500 bg-gray-100 dark:bg-gray-800 px-2 py-1 rounded-full">+{{ $newBooks }} bulan ini</span>
            </div>
            <p class="text-2xl md:text-3xl font-bold text-gray-800 dark:text-white">{{ number_format($totalBuku) }}</p>
            <p class="text-xs text-gray-500 dark:text-gray-400 uppercase tracking-wide mt-1">Total Buku</p>
        </div>

        <!-- Total User -->
        <div class="bg-white dark:bg-gray-900 rounded-xl border border-gray-200 dark:border-gray-800 p-4 md:p-5 hover:shadow-md hover:border-purple-200 dark:hover:border-purple-800 transition-all duration-200">
            <div class="flex items-center justify-between mb-3">
                <div class="w-10 h-10 bg-purple-50 dark:bg-purple-900/30 rounded-lg flex items-center justify-center">
                    <svg class="w-5 h-5 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                    </svg>
                </div>
                <span class="text-xs text-gray-400 dark:text-gray-500 bg-gray-100 dark:bg-gray-800 px-2 py-1 rounded-full">+{{ $newUsers }} bulan ini</span>
            </div>
            <p class="text-2xl md:text-3xl font-bold text-gray-800 dark:text-white">{{ number_format($totalUser) }}</p>
            <p class="text-xs text-gray-500 dark:text-gray-400 uppercase tracking-wide mt-1">Total Anggota</p>
        </div>

        <!-- Buku Dipinjam -->
        <div class="bg-white dark:bg-gray-900 rounded-xl border border-gray-200 dark:border-gray-800 p-4 md:p-5 hover:shadow-md hover:border-yellow-200 dark:hover:border-yellow-800 transition-all duration-200">
            <div class="flex items-center justify-between mb-3">
                <div class="w-10 h-10 bg-yellow-50 dark:bg-yellow-900/30 rounded-lg flex items-center justify-center">
                    <svg class="w-5 h-5 text-yellow-600 dark:text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <span class="text-xs text-yellow-600 dark:text-yellow-400 bg-yellow-50 dark:bg-yellow-900/10 px-2 py-1 rounded-full">{{ $totalPeminjamanAktif }} aktif</span>
            </div>
            <p class="text-2xl md:text-3xl font-bold text-gray-800 dark:text-white">{{ number_format($totalPeminjamanAktif) }}</p>
            <p class="text-xs text-gray-500 dark:text-gray-400 uppercase tracking-wide mt-1">Buku Dipinjam</p>
        </div>

        <!-- Buku Terlambat -->
        <div class="bg-white dark:bg-gray-900 rounded-xl border border-gray-200 dark:border-gray-800 p-4 md:p-5 hover:shadow-md hover:border-red-200 dark:hover:border-red-800 transition-all duration-200">
            <div class="flex items-center justify-between mb-3">
                <div class="w-10 h-10 bg-red-50 dark:bg-red-900/30 rounded-lg flex items-center justify-center">
                    <svg class="w-5 h-5 text-red-600 dark:text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <span class="text-xs text-red-600 dark:text-red-400 bg-red-50 dark:bg-red-900/10 px-2 py-1 rounded-full">perlu tindakan</span>
            </div>
            <p class="text-2xl md:text-3xl font-bold text-red-600 dark:text-red-500">{{ number_format($totalTerlambat) }}</p>
            <p class="text-xs text-gray-500 dark:text-gray-400 uppercase tracking-wide mt-1">Buku Terlambat</p>
        </div>
    </div>

    <!-- Charts & Quick Actions Row -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
        <!-- Chart -->
        <div class="lg:col-span-2 bg-white dark:bg-gray-900 rounded-xl border border-gray-200 dark:border-gray-800 p-4 md:p-6">
            <div class="flex items-center justify-between mb-6">
                <div>
                    <h3 class="text-base font-semibold text-gray-800 dark:text-white">Statistik Peminjaman</h3>
                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-0.5">Per bulan - Tahun {{ date('Y') }}</p>
                </div>
            </div>
            <div class="h-64 relative" 
                 wire:ignore 
                 x-data="{ 
                    chart: null,
                    init() {
                        const render = () => {
                            if (typeof Chart === 'undefined') {
                                setTimeout(render, 100);
                                return;
                            }
                            this.renderChart();
                        };
                        render();

                        this.$watch('$wire.monthlyLoans', () => this.renderChart());
                    },
                    renderChart() {
                        if (this.chart) this.chart.destroy();
                        const ctx = document.getElementById('loanChart');
                        if (!ctx) return;
                        
                        this.chart = new Chart(ctx, {
                            type: 'line',
                            data: {
                                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
                                datasets: [{
                                    label: 'Jumlah Peminjaman',
                                    data: Array.from($wire.monthlyLoans),
                                    borderColor: '#4f46e5',
                                    backgroundColor: 'rgba(79, 70, 229, 0.1)',
                                    borderWidth: 3,
                                    tension: 0.4,
                                    fill: true,
                                    pointBackgroundColor: '#4f46e5',
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
                                    legend: { display: false },
                                    tooltip: {
                                        backgroundColor: '#1f2937',
                                        padding: 12,
                                        cornerRadius: 8
                                    }
                                },
                                scales: {
                                    y: {
                                        beginAtZero: true,
                                        grid: { color: 'rgba(0,0,0,0.05)', drawBorder: false },
                                        ticks: { stepSize: 1, color: '#94a3b8' }
                                    },
                                    x: {
                                        grid: { display: false },
                                        ticks: { color: '#94a3b8' }
                                    }
                                }
                            }
                        });
                    }
                 }">
                <canvas id="loanChart" class="w-full h-full"></canvas>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="bg-white dark:bg-gray-900 rounded-xl border border-gray-200 dark:border-gray-800 p-4 md:p-6">
            <h3 class="text-base font-semibold text-gray-800 dark:text-white mb-4">Aksi Cepat</h3>
            <div class="space-y-3">
                <a href="{{ route('books') }}" 
                   class="flex items-center gap-3 p-3 bg-gray-50 dark:bg-gray-800 rounded-lg hover:bg-blue-50 dark:hover:bg-blue-900/20 transition-all group">
                    <div class="w-9 h-9 bg-blue-100 dark:bg-blue-900/50 rounded-lg flex items-center justify-center group-hover:bg-blue-200 transition-colors">
                        <svg class="w-4 h-4 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <p class="text-sm font-medium text-gray-800 dark:text-gray-200">Tambah Buku Baru</p>
                        <p class="text-xs text-gray-500 dark:text-gray-400">Tambahkan koleksi buku baru</p>
                    </div>
                    <svg class="w-4 h-4 text-gray-400 group-hover:text-blue-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </a>
                <a href="{{ route('register') }}" 
                   class="flex items-center gap-3 p-3 bg-gray-50 dark:bg-gray-800 rounded-lg hover:bg-purple-50 dark:hover:bg-purple-900/20 transition-all group">
                    <div class="w-9 h-9 bg-purple-100 dark:bg-purple-900/50 rounded-lg flex items-center justify-center group-hover:bg-purple-200 transition-colors">
                        <svg class="w-4 h-4 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <p class="text-sm font-medium text-gray-800 dark:text-gray-200">Tambah Anggota Baru</p>
                        <p class="text-xs text-gray-500 dark:text-gray-400">Registrasi anggota baru</p>
                    </div>
                    <svg class="w-4 h-4 text-gray-400 group-hover:text-purple-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </a>
                <a href="{{ route('loans') }}" 
                   class="flex items-center gap-3 p-3 bg-gray-50 dark:bg-gray-800 rounded-lg hover:bg-green-50 dark:hover:bg-green-900/20 transition-all group">
                    <div class="w-9 h-9 bg-green-100 dark:bg-green-900/50 rounded-lg flex items-center justify-center group-hover:bg-green-200 transition-colors">
                        <svg class="w-4 h-4 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <p class="text-sm font-medium text-gray-800 dark:text-gray-200">Lihat Peminjaman</p>
                        <p class="text-xs text-gray-500 dark:text-gray-400">Monitor semua peminjaman</p>
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
        <div class="bg-white dark:bg-gray-900 rounded-xl border border-gray-200 dark:border-gray-800 p-4 md:p-6 shadow-sm">
            <div class="flex items-center justify-between mb-6">
                <div>
                    <h3 class="text-base font-semibold text-gray-800 dark:text-white">Aktivitas Terbaru</h3>
                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-0.5">Pantau peminjaman dan pengembalian</p>
                </div>
                <a href="{{ route('loans') }}" class="text-xs text-indigo-600 dark:text-indigo-400 hover:text-indigo-700 font-medium bg-indigo-50 dark:bg-indigo-900/30 px-3 py-1.5 rounded-full transition-all">Lihat semua</a>
            </div>
            <div class="space-y-4 max-h-[400px] overflow-y-auto pr-2 custom-scrollbar">
                @forelse($recentActivities as $activity)
                <div class="flex items-start gap-4 p-3 rounded-xl hover:bg-gray-50 dark:hover:bg-gray-800/50 transition-all border border-transparent hover:border-gray-100 dark:hover:border-gray-700">
                    <div class="flex-shrink-0">
                        @if($activity->type == 'borrow')
                            <div class="w-10 h-10 bg-indigo-50 dark:bg-indigo-900/30 rounded-xl flex items-center justify-center border border-indigo-100 dark:border-indigo-800">
                                <svg class="w-5 h-5 text-indigo-600 dark:text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                </svg>
                            </div>
                        @else
                            <div class="w-10 h-10 bg-emerald-50 dark:bg-emerald-900/30 rounded-xl flex items-center justify-center border border-emerald-100 dark:border-emerald-800">
                                <svg class="w-5 h-5 text-emerald-600 dark:text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                        @endif
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm text-gray-800 dark:text-gray-200 leading-snug">
                            <span class="font-bold text-gray-900 dark:text-white">{{ $activity->user_name }}</span>
                            <span class="text-gray-500 dark:text-gray-400">{{ $activity->type == 'borrow' ? 'meminjam' : 'mengembalikan' }}</span>
                            <span class="font-semibold text-indigo-600 dark:text-indigo-400">{{ $activity->book_title }}</span>
                        </p>
                        <p class="text-[11px] text-gray-400 dark:text-gray-500 mt-1 flex items-center gap-1">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" /></svg>
                            {{ $activity->created_at->diffForHumans() }}
                        </p>
                    </div>
                </div>
                @empty
                <div class="text-center py-12">
                    <div class="w-16 h-16 bg-gray-50 dark:bg-gray-800 rounded-full flex items-center justify-center mx-auto mb-4 border-2 border-dashed border-gray-200 dark:border-gray-700">
                        <svg class="w-8 h-8 text-gray-300 dark:text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 012-2h2a2 2 0 012 2" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" /></svg>
                    </div>
                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Belum ada aktivitas hari ini</p>
                </div>
                @endforelse
            </div>
        </div>

        <!-- Overdue Loans -->
        <div class="bg-white dark:bg-gray-900 rounded-xl border border-gray-200 dark:border-gray-800 p-4 md:p-6 shadow-sm">
            <div class="flex items-center justify-between mb-6">
                <div>
                    <h3 class="text-base font-semibold text-gray-800 dark:text-white">Peminjaman Terlambat</h3>
                    <p class="text-xs text-red-500 dark:text-red-400 mt-0.5">Segera ingatkan anggota</p>
                </div>
                <div class="px-3 py-1 bg-red-50 dark:bg-red-900/20 text-red-600 dark:text-red-400 text-xs font-bold rounded-full border border-red-100 dark:border-red-800">
                    {{ count($overdueLoans) }} Terlambat
                </div>
            </div>
            <div class="space-y-3 max-h-[400px] overflow-y-auto pr-2 custom-scrollbar">
                @forelse($overdueLoans as $overdue)
                <div class="flex items-center justify-between p-4 bg-white dark:bg-gray-800 rounded-2xl border border-red-100 dark:border-red-900/50 shadow-sm hover:shadow-md transition-all">
                    <div class="flex-1 min-w-0">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-red-50 dark:bg-red-900/30 rounded-full flex items-center justify-center flex-shrink-0">
                                <span class="text-sm font-bold text-red-600 dark:text-red-400">{{ substr($overdue->user_name, 0, 1) }}</span>
                            </div>
                            <div class="min-w-0">
                                <p class="text-sm font-bold text-gray-900 dark:text-white truncate">{{ $overdue->user_name }}</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400 truncate mt-0.5">{{ $overdue->book_title }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="text-right ml-4">
                        <div class="text-sm font-black text-red-600 dark:text-red-500">{{ $overdue->days_overdue }} hari</div>
                        <p class="text-[10px] font-bold text-red-400 uppercase tracking-tighter">Terlambat</p>
                    </div>
                </div>
                @empty
                <div class="text-center py-12">
                    <div class="w-16 h-16 bg-emerald-50 dark:bg-emerald-900/30 rounded-full flex items-center justify-center mx-auto mb-4 border-2 border-emerald-100 dark:border-emerald-800">
                        <svg class="w-8 h-8 text-emerald-500 dark:text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M5 13l4 4L19 7" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" /></svg>
                    </div>
                    <p class="text-sm font-medium text-emerald-600 dark:text-emerald-400">Semua tepat waktu!</p>
                </div>
                @endforelse
            </div>
        </div>
    </div>

    <!-- New Books Section -->
    <div class="bg-white dark:bg-gray-900 rounded-xl border border-gray-200 dark:border-gray-800 p-4 md:p-6 shadow-sm">
        <div class="flex items-center justify-between mb-6">
            <div>
                <h3 class="text-base font-semibold text-gray-800 dark:text-white">Inventaris Buku Terbaru</h3>
                <p class="text-xs text-gray-500 dark:text-gray-400 mt-0.5">Pantau penambahan koleksi</p>
            </div>
            <a href="{{ route('books') }}" class="text-xs text-indigo-600 dark:text-indigo-400 hover:underline">Kelola inventaris</a>
        </div>
        <div class="overflow-x-auto rounded-xl border border-gray-100 dark:border-gray-800">
            <table class="w-full text-sm text-left">
                <thead class="text-xs text-gray-500 dark:text-gray-400 uppercase bg-gray-50/50 dark:bg-gray-800/50">
                    <tr>
                        <th class="px-6 py-4 font-bold">Informasi Buku</th>
                        <th class="px-6 py-4 font-bold hidden md:table-cell">Kategori</th>
                        <th class="px-6 py-4 font-bold">Status Stok</th>
                        <th class="px-6 py-4 font-bold hidden sm:table-cell">Tgl Input</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 dark:divide-gray-800">
                    @forelse($newBooksList as $book)
                    <tr class="hover:bg-gray-50/50 dark:hover:bg-gray-800/50 transition-colors">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-14 bg-gray-100 dark:bg-gray-800 rounded shadow-sm overflow-hidden flex-shrink-0">
                                    @if($book->cover)
                                        <img src="{{ asset('storage/' . $book->cover) }}" class="w-full h-full object-cover">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center text-[10px] text-gray-400">No Img</div>
                                    @endif
                                </div>
                                <div class="min-w-0">
                                    <p class="font-bold text-gray-900 dark:text-white truncate">{{ $book->judul }}</p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400 truncate">{{ $book->penulis }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 hidden md:table-cell">
                            <span class="px-2.5 py-1 bg-gray-100 dark:bg-gray-800 text-gray-600 dark:text-gray-300 text-[10px] font-black rounded-md uppercase tracking-wider">
                                {{ $book->kategori ?: 'UMUM' }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            @if($book->stok > 5)
                                <div class="flex items-center gap-1.5 text-emerald-600 dark:text-emerald-400 font-bold">
                                    <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                                    {{ $book->stok }} <span class="hidden lg:inline">Tersedia</span>
                                </div>
                            @elseif($book->stok > 0)
                                <div class="flex items-center gap-1.5 text-orange-500 dark:text-orange-400 font-bold">
                                    <span class="w-2 h-2 rounded-full bg-orange-500 animate-pulse"></span>
                                    {{ $book->stok }} <span class="hidden lg:inline">Menipis</span>
                                </div>
                            @else
                                <div class="flex items-center gap-1.5 text-red-600 dark:text-red-500 font-bold">
                                    <span class="w-2 h-2 rounded-full bg-red-600"></span>
                                    <span class="hidden lg:inline">Kosong</span>
                                </div>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-xs text-gray-400 dark:text-gray-500 hidden sm:table-cell">
                            {{ $book->created_at->format('d M Y') }}
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="px-6 py-10 text-center text-gray-500 dark:text-gray-400">Belum ada koleksi baru</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <style>
        .custom-scrollbar::-webkit-scrollbar { width: 4px; }
        .custom-scrollbar::-webkit-scrollbar-track { background: transparent; }
        .custom-scrollbar::-webkit-scrollbar-thumb { background: #e2e8f0; border-radius: 10px; }
        .dark .custom-scrollbar::-webkit-scrollbar-thumb { background: #334155; }
    </style>
</div>
