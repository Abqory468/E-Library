<x-guest-layout>
    <!-- Wrapper dengan background gradient -->
    <div class="min-h-screen bg-gradient-to-br from-blue-50 to-indigo-100 py-12">
        <div class="max-w-md mx-auto bg-white rounded-2xl shadow-xl p-8">
            <div class="flex justify-center">
                <x-application-logo class="w-16 h-16" />
            </div>
            
            <h1 class="text-3xl font-bold text-gray-800 text-center mt-4">Create an account</h1>
            <p class="text-gray-500 text-center mb-8">Register to start your digital library.</p>

            <!-- Menampilkan error global jika ada -->
            @if ($errors->any())
                <div class="mb-4 p-3 bg-red-100 border border-red-400 text-red-700 rounded-lg">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('register') }}" class="space-y-5">
                @csrf

                <!-- Name -->
                <div>
                    <div class="flex items-center bg-gray-50 rounded-xl px-4 py-2 border border-gray-200 focus-within:border-blue-500 focus-within:ring-1 focus-within:ring-blue-500 transition duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            width="20"
                            height="20"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            viewBox="0 0 24 24"
                            class="text-gray-400 mr-3">
                            <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"/>
                            <circle cx="12" cy="7" r="4"/>
                        </svg>

                        <input
                            id="name"
                            class="block w-full border-0 bg-transparent focus:ring-0 text-gray-700 outline-none"
                            type="text"
                            name="name"
                            value="{{ old('name') }}"
                            placeholder="Full name"
                            required
                            autofocus
                            autocomplete="name"
                        />
                    </div>
                    @error('name')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email -->
                <div>
                    <div class="flex items-center bg-gray-50 rounded-xl px-4 py-2 border border-gray-200 focus-within:border-blue-500 focus-within:ring-1 focus-within:ring-blue-500 transition duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            width="20"
                            height="20"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            viewBox="0 0 24 24"
                            class="text-gray-400 mr-3">
                            <rect x="2" y="4" width="20" height="16" rx="2"></rect>
                            <path d="M22 6l-10 7L2 6"></path>
                        </svg>

                        <input
                            id="email"
                            class="block w-full border-0 bg-transparent focus:ring-0 text-gray-700 outline-none"
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            placeholder="Email address"
                            required
                            autocomplete="username"
                        />
                    </div>
                    @error('email')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div x-data="{ show: false }">
                    <div class="flex items-center bg-gray-50 rounded-xl px-4 py-2 border border-gray-200 focus-within:border-blue-500 focus-within:ring-1 focus-within:ring-blue-500 transition duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            width="20"
                            height="20"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            viewBox="0 0 24 24"
                            class="text-gray-400 mr-3">
                            <rect x="5" y="11" width="14" height="10" rx="2"></rect>
                            <path d="M7 11V7a5 5 0 0110 0v4"></path>
                        </svg>

                        <input
                            id="password"
                            type="password"
                            x-bind:type="show ? 'text' : 'password'"
                            class="block w-full border-0 bg-transparent focus:ring-0 text-gray-700 outline-none"
                            name="password"
                            placeholder="Password"
                            required
                            autocomplete="new-password"
                        />

                        <button type="button" @click="show = !show" class="text-gray-400 hover:text-gray-600 focus:outline-none ml-2">
                            <svg x-show="!show" x-cloak xmlns="http://www.w3.org/2000/svg"
                                width="20" height="20"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                                viewBox="0 0 24 24">
                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                                <circle cx="12" cy="12" r="3"/>
                            </svg>
                            <svg x-show="show" x-cloak xmlns="http://www.w3.org/2000/svg"
                                width="20" height="20"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                                viewBox="0 0 24 24">
                                <path d="M17.94 17.94A10.94 10.94 0 0112 19C5 19 1 12 1 12a21.77 21.77 0 015.06-6.94M1 1l22 22"/>
                            </svg>
                        </button>
                    </div>
                    @error('password')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div x-data="{ show: false }">
                    <div class="flex items-center bg-gray-50 rounded-xl px-4 py-2 border border-gray-200 focus-within:border-blue-500 focus-within:ring-1 focus-within:ring-blue-500 transition duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            width="20"
                            height="20"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            viewBox="0 0 24 24"
                            class="text-gray-400 mr-3">
                            <rect x="5" y="11" width="14" height="10" rx="2"></rect>
                            <path d="M7 11V7a5 5 0 0110 0v4"></path>
                        </svg>

                        <input
                            id="password_confirmation"
                            type="password"
                            x-bind:type="show ? 'text' : 'password'"
                            class="block w-full border-0 bg-transparent focus:ring-0 text-gray-700 outline-none"
                            name="password_confirmation"
                            placeholder="Confirm password"
                            required
                            autocomplete="new-password"
                        />

                        <button type="button" @click="show = !show" class="text-gray-400 hover:text-gray-600 focus:outline-none ml-2">
                            <svg x-show="!show" x-cloak xmlns="http://www.w3.org/2000/svg"
                                width="20" height="20"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                                viewBox="0 0 24 24">
                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                                <circle cx="12" cy="12" r="3"/>
                            </svg>
                            <svg x-show="show" x-cloak xmlns="http://www.w3.org/2000/svg"
                                width="20" height="20"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                                viewBox="0 0 24 24">
                                <path d="M17.94 17.94A10.94 10.94 0 0112 19C5 19 1 12 1 12a21.77 21.77 0 015.06-6.94M1 1l22 22"/>
                            </svg>
                        </button>
                    </div>
                    @error('password_confirmation')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Register Button -->
                <div class="pt-2">
                    <button type="submit" class="w-full bg-blue-700 hover:bg-blue-800 active:bg-blue-900 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition duration-200 py-3 text-base font-semibold shadow-md rounded-xl text-white">
                        Create account
                    </button>
                </div>

                <!-- Login Link -->
                <div class="text-center pt-2">
                    <p class="text-gray-600">
                        Already have an account? 
                        <a href="{{ route('login') }}" class="font-semibold text-blue-700 hover:text-blue-800 hover:underline transition">
                            Login here
                        </a>
                    </p>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>