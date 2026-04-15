<div class="p-6 bg-gray-50">
    <!-- Flash Messages -->
    @if (session()->has('message'))
        <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)"
             class="mb-6 p-4 bg-green-50 border border-green-200 text-green-700 rounded-lg flex items-center justify-between shadow-sm">
            <div class="flex items-center gap-2">
                <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <span class="text-sm font-medium">{{ session('message') }}</span>
            </div>
            <button @click="show = false" class="text-green-500 hover:text-green-700">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
    @endif

    <!-- Header -->
    <div class="mb-8">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div>
                <h1 class="text-2xl font-semibold text-gray-800 tracking-tight">Proses Pengembalian</h1>
                <p class="text-gray-500 text-sm mt-1">Terima dan proses pengembalian buku dari anggota</p>
            </div>
            <div class="text-sm text-gray-500 bg-white px-3 py-1.5 rounded-lg border border-gray-200">
                {{ $loans->where('status', 'dipinjam')->count() }} buku sedang dipinjam
            </div>
        </div>
    </div>

    <!-- Stats -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
        <div class="bg-white border border-gray-200 rounded-lg p-4 hover:border-blue-200 hover:shadow-sm transition-all">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs text-gray-500 uppercase tracking-wide">Total Dipinjam</p>
                    <p class="text-2xl font-semibold text-gray-800 mt-1">{{ $loans->where('status', 'dipinjam')->count() }}</p>
                </div>
                <div class="w-8 h-8 bg-blue-50 rounded-lg flex items-center justify-center text-blue-600">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
            </div>
        </div>
        
        <div class="bg-white border border-gray-200 rounded-lg p-4 hover:border-red-200 hover:shadow-sm transition-all">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs text-gray-500 uppercase tracking-wide">Terlambat</p>
                    <p class="text-2xl font-semibold text-red-600 mt-1">{{ $loans->where('status', 'dipinjam')->filter(function($loan) { return $loan->tanggal_kembali < now(); })->count() }}</p>
                </div>
                <div class="w-8 h-8 bg-red-50 rounded-lg flex items-center justify-center text-red-600">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
            </div>
        </div>
        
        <div class="bg-white border border-gray-200 rounded-lg p-4 hover:border-yellow-200 hover:shadow-sm transition-all">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs text-gray-500 uppercase tracking-wide">Akan Jatuh Tempo</p>
                    <p class="text-2xl font-semibold text-yellow-600 mt-1">{{ $loans->where('status', 'dipinjam')->filter(function($loan) { return $loan->tanggal_kembali >= now() && now()->diffInDays($loan->tanggal_kembali) <= 3; })->count() }}</p>
                </div>
                <div class="w-8 h-8 bg-yellow-50 rounded-lg flex items-center justify-center text-yellow-600">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Search -->
    <div class="bg-white border border-gray-200 rounded-lg p-4 mb-6">
        <div class="relative">
            <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
            </svg>
            <input wire:model.live.debounce.300ms="search" 
                   type="text" 
                   placeholder="Cari nama peminjam atau judul buku..." 
                   class="w-full pl-9 pr-3 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-blue-400 focus:ring-1 focus:ring-blue-200 transition-all">
        </div>
    </div>

    <!-- Table -->
    <div class="bg-white border border-gray-200 rounded-lg overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="border-b border-gray-200 bg-gray-50">
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Peminjam</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Buku</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tgl Pinjam</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jatuh Tempo</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($loans->where('status', 'dipinjam') as $loan)
                        @php
                            $isOverdue = $loan->tanggal_kembali < now();
                            $daysLeft = now()->diffInDays($loan->tanggal_kembali, false);
                        @endphp
                        <tr class="hover:bg-blue-50/30 transition-colors {{ $isOverdue ? 'bg-red-50/30' : '' }}">
                            <td class="px-4 py-3 text-sm text-gray-500">{{ $loop->iteration }}</td>
                            <td class="px-4 py-3">
                                <div>
                                    <p class="text-sm font-medium text-gray-800">{{ $loan->user->name }}</p>
                                    <p class="text-xs text-gray-400">{{ $loan->user->email }}</p>
                                </div>
                            </td>
                            <td class="px-4 py-3">
                                <div>
                                    <p class="text-sm font-medium text-gray-800">{{ $loan->book->judul }}</p>
                                    <p class="text-xs text-gray-400">{{ $loan->book->penulis }}</p>
                                </div>
                            </td>
                            <td class="px-4 py-3 text-sm text-gray-600">{{ $loan->tanggal_pinjam->format('d/m/Y') }}</td>
                            <td class="px-4 py-3">
                                <div>
                                    <p class="text-sm {{ $isOverdue ? 'text-red-600 font-semibold' : 'text-gray-600' }}">
                                        {{ $loan->tanggal_kembali->format('d/m/Y') }}
                                    </p>
                                    @if($isOverdue)
                                        <p class="text-xs text-red-500">Terlambat {{ abs($daysLeft) }} hari</p>
                                    @elseif($daysLeft <= 3)
                                        <p class="text-xs text-yellow-600">Sisa {{ $daysLeft }} hari</p>
                                    @endif
                                </div>
                            </td>
                            <td class="px-4 py-3">
                                @if($isOverdue)
                                    <span class="inline-block px-2 py-0.5 text-xs font-medium text-red-700 bg-red-50 rounded">Terlambat</span>
                                @else
                                    <span class="inline-block px-2 py-0.5 text-xs font-medium text-yellow-700 bg-yellow-50 rounded">Dipinjam</span>
                                @endif
                            </td>
                            <td class="px-4 py-3">
                                <button wire:click="confirmReturn({{ $loan->id }})" 
                                        class="inline-flex items-center gap-1 px-3 py-1.5 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 transition-colors">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    Proses Kembali
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-4 py-12 text-center">
                                <div class="inline-flex items-center justify-center w-12 h-12 rounded-full bg-gray-100 mb-3">
                                    <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <p class="text-sm text-gray-500">Tidak ada buku yang sedang dipinjam</p>
                                <p class="text-xs text-gray-400 mt-1">Semua buku sudah dikembalikan</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Konfirmasi -->
    @if($showModal && $selectedLoan)
    <div class="fixed inset-0 bg-black/40 flex items-center justify-center z-50 p-4" 
         x-data="{ open: true }" 
         x-show="open"
         x-transition.opacity.duration.200ms
         @click.self="$wire.set('showModal', false)">
        <div class="bg-white rounded-lg shadow-xl w-full max-w-md text-center">
            <div class="p-6">
                <div class="inline-flex items-center justify-center w-12 h-12 rounded-full bg-green-100 mb-4">
                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-gray-800 mb-2">Konfirmasi Pengembalian</h3>
                <p class="text-sm text-gray-600 mb-4">
                    Terima buku <span class="font-semibold">{{ $selectedLoan->book->judul }}</span><br>
                    dari <span class="font-semibold">{{ $selectedLoan->user->name }}</span>?
                </p>
                <div class="flex justify-center gap-3">
                    <button wire:click="$set('showModal', false)" 
                            class="px-4 py-2 text-sm text-gray-700 border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors">
                        Batal
                    </button>
                    <button wire:click="processReturn" 
                            class="px-4 py-2 text-sm text-white bg-blue-600 rounded-lg hover:bg-blue-700 transition-colors">
                        Ya, Terima Buku
                    </button>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>