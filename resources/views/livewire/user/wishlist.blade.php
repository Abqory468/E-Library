<div class="max-w-7xl mx-auto px-4 py-8 md:py-12">
    <div class="mb-10">
        <h1 class="text-3xl font-black text-gray-900 tracking-tight">Wishlist Saya</h1>
        <p class="text-gray-500 mt-2">Daftar buku yang Anda sukai dan ingin dibaca nanti.</p>
    </div>

    <!-- Wishlist Grid -->
    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-6">
        @forelse($wishlists as $wishlist)
            <div class="group relative bg-white border border-gray-100 hover:shadow-xl transition-all duration-300 rounded-2xl p-3 overflow-hidden">
                <!-- Cover -->
                <a href="{{ route('books.show', $wishlist->book->id) }}" class="block aspect-[2/3] rounded-xl overflow-hidden bg-gray-50 mb-3 shadow-sm border border-gray-50">
                    @if($wishlist->book->cover)
                        <img src="{{ asset('storage/' . $wishlist->book->cover) }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                    @else
                        <div class="w-full h-full flex items-center justify-center p-4 text-center text-xs font-bold text-gray-300 uppercase leading-snug">
                            {{ $wishlist->book->judul }}
                        </div>
                    @endif
                </a>

                <!-- Info -->
                <div class="space-y-1 px-1">
                    <h3 class="text-sm font-bold text-gray-900 line-clamp-1 group-hover:text-indigo-600 transition">{{ $wishlist->book->judul }}</h3>
                    <p class="text-[11px] text-gray-500 truncate">{{ $wishlist->book->penulis }}</p>
                </div>

                <!-- Delete Action -->
                <button wire:click="removeWishlist({{ $wishlist->id }})" class="absolute top-4 right-4 p-2 bg-red-500 text-white rounded-full shadow-lg opacity-0 group-hover:opacity-100 transition duration-300 hover:scale-110">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                </button>
            </div>
        @empty
            <div class="col-span-full py-20 text-center">
                <div class="w-20 h-20 bg-gray-50 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-10 h-10 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" /></svg>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">Belum ada buku favorit</h3>
                <p class="text-gray-500 mb-8 max-w-xs mx-auto">Sukai buku di katalog untuk menemukannya kembali di sini dengan mudah.</p>
                <a href="{{ route('allBooks') }}" class="inline-flex items-center px-8 py-3 bg-indigo-600 text-white font-bold rounded-2xl shadow-lg hover:bg-indigo-700 transition transform hover:-translate-y-0.5">Jelajahi Katalog</a>
            </div>
        @endforelse
    </div>

    <!-- Pagination -->
    <div class="mt-12">
        {{ $wishlists->links() }}
    </div>
</div>
