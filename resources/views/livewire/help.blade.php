<div class="max-w-4xl mx-auto px-4 py-12">
    <div class="text-center mb-16">
        <h1 class="text-4xl font-black text-gray-900 mb-4 tracking-tight">Pusat Bantuan</h1>
        <p class="text-xl text-gray-500">Ada yang bisa kami bantu hari ini?</p>
    </div>

    <!-- FAQ Section -->
    <div class="space-y-6 mb-20">
        <h2 class="text-2xl font-bold text-gray-800 mb-8 border-b border-gray-100 pb-4">Pertanyaan Populer (FAQ)</h2>
        
        <div x-data="{ active: null }" class="space-y-4">
            <!-- Q1 -->
            <div class="bg-white border border-gray-100 rounded-2xl overflow-hidden shadow-sm">
                <button @click="active === 1 ? active = null : active = 1" class="w-full text-left p-6 flex items-center justify-between hover:bg-gray-50 transition">
                    <span class="font-bold text-gray-900">Bagaimana cara meminjam buku?</span>
                    <svg class="w-5 h-5 text-gray-400 transition" :class="active === 1 ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M19 9l-7 7-7-7" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/></svg>
                </button>
                <div x-show="active === 1" x-collapse class="p-6 pt-0 text-gray-600 leading-relaxed border-t border-gray-50">
                    Cukup cari buku yang Anda inginkan di Katalog, lalu klik tombol "Pinjam Sekarang". Buku tersebut akan otomatis muncul di menu Dashboard atau Riwayat Anda.
                </div>
            </div>

            <!-- Q2 -->
            <div class="bg-white border border-gray-100 rounded-2xl overflow-hidden shadow-sm">
                <button @click="active === 2 ? active = null : active = 2" class="w-full text-left p-6 flex items-center justify-between hover:bg-gray-50 transition">
                    <span class="font-bold text-gray-900">Berapa lama durasi peminjaman?</span>
                    <svg class="w-5 h-5 text-gray-400 transition" :class="active === 2 ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M19 9l-7 7-7-7" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/></svg>
                </button>
                <div x-show="active === 2" x-collapse class="p-6 pt-0 text-gray-600 leading-relaxed border-t border-gray-50">
                    Setiap buku memiliki durasi peminjaman selama 7 hari. Anda akan menerima notifikasi pengingat sebelum batas waktu pengembalian berakhir.
                </div>
            </div>

            <!-- Q3 -->
            <div class="bg-white border border-gray-100 rounded-2xl overflow-hidden shadow-sm">
                <button @click="active === 3 ? active = null : active = 3" class="w-full text-left p-6 flex items-center justify-between hover:bg-gray-50 transition">
                    <span class="font-bold text-gray-900">Bagaimana jika saya lupa mengembalikan buku?</span>
                    <svg class="w-5 h-5 text-gray-400 transition" :class="active === 3 ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M19 9l-7 7-7-7" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/></svg>
                </button>
                <div x-show="active === 3" x-collapse class="p-6 pt-0 text-gray-600 leading-relaxed border-t border-gray-50">
                    Sistem digital kami akan menandai status peminjaman Anda sebagai "Terlambat". Anda tidak diperbolehkan meminjam buku lain sebelum buku yang terlambat dikembalikan.
                </div>
            </div>
        </div>
    </div>

    <!-- Contact Admin Section -->
    <div class="bg-indigo-600 rounded-3xl p-10 text-white shadow-xl shadow-indigo-100 flex flex-col md:flex-row items-center gap-10">
        <div class="flex-1">
            <h2 class="text-3xl font-black mb-4">Masih Butuh Bantuan?</h2>
            <p class="text-indigo-100 mb-8 opacity-90">Tim kami siap membantu Anda 24/7. Hubungi kami melalui tombol di bawah ini atau email langsung ke admin.</p>
            <div class="flex flex-wrap gap-4">
                <a href="mailto:admin@elibrary.com" class="px-8 py-3 bg-white text-indigo-600 font-bold rounded-xl shadow-lg hover:scale-105 transition-all">Hubungi Admin</a>
                <a href="#" class="px-8 py-3 bg-indigo-500/50 text-white font-bold rounded-xl hover:bg-indigo-500 transition">Chat via WhatsApp</a>
            </div>
        </div>
        <div class="w-32 h-32 md:w-48 md:h-48 rounded-full bg-indigo-500/30 flex items-center justify-center flex-shrink-0 border-8 border-indigo-400/20">
            <svg class="w-16 h-16 md:w-24 md:h-24 text-white/50" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z" /></svg>
        </div>
    </div>
</div>
