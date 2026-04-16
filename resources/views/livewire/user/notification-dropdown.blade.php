<div class="relative" x-data="{ open: false }" @click.away="open = false">
    <button @click="open = !open" class="relative p-2 text-gray-500 hover:text-gray-700 transition">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
        </svg>
        @if($this->unreadCount > 0)
            <span class="absolute top-1.5 right-1.5 w-4 h-4 bg-red-500 text-white text-[10px] flex items-center justify-center rounded-full border border-white">
                {{ $this->unreadCount }}
            </span>
        @endif
    </button>

    <div x-show="open" 
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 scale-95"
         x-transition:enter-end="opacity-100 scale-100"
         x-transition:leave="transition ease-in duration-75"
         x-transition:leave-start="opacity-100 scale-100"
         x-transition:leave-end="opacity-0 scale-95"
         class="absolute right-0 mt-2 w-80 bg-white dark:bg-gray-900 border border-gray-100 dark:border-gray-800 shadow-xl rounded-xl z-50 overflow-hidden" 
         style="display: none;">
        
        <div class="p-4 border-b border-gray-50 dark:border-gray-800 flex items-center justify-between">
            <h3 class="text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-widest">Notifikasi</h3>
            <div class="flex items-center gap-3">
                @if($this->unreadCount > 0)
                    <button wire:click="markAllAsRead" class="text-[10px] text-indigo-600 dark:text-indigo-400 hover:underline">Tandai semua dibaca</button>
                @endif
                @if($this->notifications->count() > 0)
                    <button wire:click="clearAll" wire:confirm="Hapus semua notifikasi?" class="text-[10px] text-red-600 dark:text-red-400 hover:underline">Hapus semua notif</button>
                @endif
            </div>
        </div>

        <div class="max-h-96 overflow-y-auto">
            @forelse($this->notifications as $notification)
                <div class="p-4 border-b border-gray-50 dark:border-gray-800 {{ $notification->unread() ? 'bg-indigo-50/30 dark:bg-indigo-900/10' : '' }} hover:bg-gray-50 dark:hover:bg-gray-800 transition cursor-pointer"
                     wire:click="markAsRead('{{ $notification->id }}')">
                    <div class="flex gap-3">
                        <div class="w-8 h-8 rounded-full flex-shrink-0 flex items-center justify-center {{ $notification->data['type'] === 'borrow' ? 'bg-green-100 dark:bg-green-900/30 text-green-600 dark:text-green-400' : 'bg-blue-100 dark:bg-blue-900/30 text-blue-600 dark:text-blue-400' }}">
                            @if($notification->data['type'] === 'borrow')
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" /></svg>
                            @else
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                            @endif
                        </div>
                        <div class="min-w-0 flex-1">
                            <p class="text-xs text-gray-800 dark:text-gray-200 font-medium line-clamp-2">
                                {{ $notification->data['message'] }}
                            </p>
                            <p class="text-[10px] text-gray-400 dark:text-gray-500 mt-1">
                                {{ $notification->created_at->diffForHumans() }}
                            </p>
                        </div>
                        @if($notification->unread())
                            <div class="w-1.5 h-1.5 bg-indigo-600 dark:bg-indigo-400 rounded-full mt-1.5"></div>
                        @endif
                    </div>
                </div>
            @empty
                <div class="p-8 text-center text-gray-500 dark:text-gray-400">
                    <svg class="w-8 h-8 text-gray-200 dark:text-gray-700 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" /></svg>
                    <p class="text-xs">Belum ada notifikasi</p>
                </div>
            @endforelse
        </div>

        <a href="#" class="block p-3 text-center text-[10px] font-bold text-gray-400 hover:text-indigo-600 hover:bg-gray-50 transition border-t border-gray-50 uppercase tracking-widest">
            Lihat Semua Notifikasi
        </a>
    </div>
</div>
