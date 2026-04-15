<div class="p-6 bg-gray-50">
    <!-- Header -->
    <div class="mb-8 text-center md:text-left">
        <h1 class="text-2xl font-bold text-gray-800 tracking-tight">Riwayat Peminjaman Saya</h1>
        <p class="text-gray-500 text-sm mt-1">Daftar buku yang pernah dan sedang Anda pinjam</p>
    </div>

    @if(session()->has('message'))
        <div class="mb-6 p-4 bg-green-50 border-l-4 border-green-500 text-green-700 rounded-r-xl shadow-sm">
            {{ session('message') }}
        </div>
    @endif

    <!-- Stats Summary -->
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 mb-8">
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5 flex flex-col items-center justify-center">
            <span class="text-xs font-bold text-gray-500 uppercase tracking-widest mb-1">Total Pinjam</span>
            <span class="text-3xl font-black text-gray-800">{{ $loans->total() }}</span>
        </div>
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5 flex flex-col items-center justify-center">
            <span class="text-xs font-bold text-yellow-500 uppercase tracking-widest mb-1">Masih Dipinjam</span>
            <span class="text-3xl font-black text-yellow-600">{{ $loans->where('status', 'dipinjam')->count() }}</span>
        </div>
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5 flex flex-col items-center justify-center">
            <span class="text-xs font-bold text-green-500 uppercase tracking-widest mb-1">Sudah Kembali</span>
            <span class="text-3xl font-black text-green-600">{{ $loans->where('status', 'dikembalikan')->count() }}</span>
        </div>
    </div>

    <!-- Loans List -->
    <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="bg-gray-50/50 border-b border-gray-100 text-left">
                        <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider">Buku</th>
                        <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider">Tgl Pinjam</th>
                        <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider">Tgl Kembali</th>
                        <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($loans as $loan)
                        @php
                            $isOverdue = $loan->status === 'dipinjam' && $loan->tanggal_kembali < now();
                        @endphp
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-5">
                                <div class="flex items-center gap-4">
                                    <div class="w-12 h-16 bg-gray-100 rounded shadow-sm flex-shrink-0 flex items-center justify-center overflow-hidden">
                                        @if($loan->book->cover)
                                            <img src="{{ asset('storage/' . $loan->book->cover) }}" class="w-full h-full object-cover">
                                        @else
                                            <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                                            </svg>
                                        @endif
                                    </div>
                                    <div>
                                        <p class="font-bold text-gray-800 mb-0.5">{{ $loan->book->judul }}</p>
                                        <p class="text-xs text-gray-500">{{ $loan->book->penulis }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-5 text-sm text-gray-600 font-medium">{{ $loan->tanggal_pinjam->format('d M Y') }}</td>
                            <td class="px-6 py-5">
                                <span class="text-sm font-semibold {{ $isOverdue ? 'text-red-500' : 'text-gray-700' }}">
                                    {{ $loan->tanggal_kembali->format('d M Y') }}
                                </span>
                                @if($isOverdue)
                                    <span class="block text-[10px] font-black text-red-600 uppercase mt-1">Terlambat!</span>
                                @endif
                            </td>
                            <td class="px-6 py-5">
                                @if($loan->status === 'dipinjam')
                                    <div class="flex items-center gap-3">
                                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-yellow-100 text-yellow-700 text-xs font-bold">
                                            <span class="w-1.5 h-1.5 rounded-full bg-yellow-500 animate-pulse"></span>
                                            Dipinjam
                                        </span>
                                        <button wire:click="returnBook({{ $loan->id }})" class="px-3 py-1 bg-indigo-600 hover:bg-indigo-700 text-white text-[10px] font-bold rounded-lg transition shadow-sm">
                                            Kembalikan
                                        </button>
                                    </div>
                                @else
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-green-100 text-green-700 text-xs font-bold">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path d="M5 13l4 4L19 7" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                                        </svg>
                                        Kembali
                                    </span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-20 text-center">
                                <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4 border-4 border-white shadow-sm">
                                    <svg class="w-10 h-10 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                                    </svg>
                                </div>
                                <h3 class="text-gray-800 font-bold mb-1">Belum Ada Pinjaman</h3>
                                <p class="text-gray-500 text-sm mb-6">Anda belum pernah meminjam buku apa pun.</p>
                                <a href="{{ route('books') }}" class="inline-flex items-center px-6 py-2 bg-blue-600 text-white font-bold rounded-xl shadow-lg hover:bg-blue-700 transition-all scale-100 hover:scale-105">
                                    Cari Buku Sekarang
                                </a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($loans->hasPages())
            <div class="px-6 py-4 bg-gray-50 border-t border-gray-100">
                {{ $loans->links() }}
            </div>
        @endif
    </div>
</div>
