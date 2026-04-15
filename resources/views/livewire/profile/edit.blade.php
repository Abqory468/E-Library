<div class="p-4 md:p-6 lg:p-8 bg-gray-50 min-h-screen">
    <!-- Header -->
    <div class="mb-8">
        <div>
            <h1 class="text-center text-2xl md:text-3xl font-bold text-gray-800 tracking-tight">Profil Saya</h1>
            <p class="text-center text-gray-500 text-sm mt-1">Kelola informasi akun dan keamanan Anda</p>
        </div>
    </div>

    <div class="max-w-4xl mx-auto space-y-6">
        <!-- Update Profile Information -->
        <div class="bg-white rounded-xl border border-gray-200 overflow-hidden hover:shadow-md transition-all duration-200">
            <div class="border-b border-gray-200 bg-gray-50/50 px-6 py-4">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-blue-50 rounded-lg flex items-center justify-center">
                        <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-lg font-semibold text-gray-800">Informasi Profil</h2>
                        <p class="text-sm text-gray-500">Perbarui informasi akun dan alamat email Anda</p>
                    </div>
                </div>
            </div>
            <div class="p-6">
                @include('livewire.profile.partials.update-profile-information-form', ['user' => auth()->user()])
            </div>
        </div>

        <!-- Update Password -->
        <div class="bg-white rounded-xl border border-gray-200 overflow-hidden hover:shadow-md transition-all duration-200">
            <div class="border-b border-gray-200 bg-gray-50/50 px-6 py-4">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-green-50 rounded-lg flex items-center justify-center">
                        <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-lg font-semibold text-gray-800">Keamanan Password</h2>
                        <p class="text-sm text-gray-500">Perbarui password Anda secara berkala untuk keamanan</p>
                    </div>
                </div>
            </div>
            <div class="p-6">
                @include('livewire.profile.partials.update-password-form', ['user' => auth()->user()])
            </div>
        </div>

        <!-- Delete Account -->
        <div class="bg-white rounded-xl border border-gray-200 overflow-hidden hover:shadow-md transition-all duration-200">
            <div class="border-b border-gray-200 bg-gray-50/50 px-6 py-4">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-red-50 rounded-lg flex items-center justify-center">
                        <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-lg font-semibold text-gray-800">Hapus Akun</h2>
                        <p class="text-sm text-gray-500">Hapus akun dan semua data Anda secara permanen</p>
                    </div>
                </div>
            </div>
            <div class="p-6">
                @include('livewire.profile.partials.delete-user-form', ['user' => auth()->user()])
            </div>
        </div>
    </div>
</div>