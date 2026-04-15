<x-guest-layout>
    <!-- Wrapper dengan background gradient (SAMA KAYA REGISTER) -->
    <div class="min-h-screen bg-gradient-to-br from-blue-50 to-indigo-100 py-12">
        <div class="max-w-md mx-auto bg-white rounded-2xl shadow-xl p-8">
            <div class="flex justify-center">
                <x-application-logo class="w-16 h-16" />
            </div>

            <h1 class="text-3xl font-bold text-gray-800 text-center mt-4">Welcome back!</h1>
            <p class="text-gray-500 text-center mb-8">Login to access your digital library.</p>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}" class="space-y-5">
                @csrf

                <!-- Email Address -->
                <div>
                    <div class="flex items-center bg-gray-50 rounded-xl px-4 py-2 border border-gray-200 focus-within:border-blue-500 focus-within:ring-1 focus-within:ring-blue-500 transition duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg" 
                            class="text-gray-400 mr-3" 
                            width="20" height="20" 
                            fill="none" 
                            stroke="currentColor" 
                            stroke-width="2" 
                            viewBox="0 0 24 24">
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
                            autofocus
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
                            class="text-gray-400 mr-3" 
                            width="20" height="20" 
                            fill="none" 
                            stroke="currentColor" 
                            stroke-width="2" 
                            viewBox="0 0 24 24">
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
                            autocomplete="current-password"
                        />
                        <button type="button" 
                                @click="show = !show" 
                                class="text-gray-400 hover:text-gray-600 focus:outline-none ml-2">
                            <!-- Eye Icon -->
                            <svg x-show="!show" x-cloak xmlns="http://www.w3.org/2000/svg" 
                                width="20" height="20" 
                                fill="none" 
                                stroke="currentColor" 
                                stroke-width="2" 
                                viewBox="0 0 24 24">
                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                                <circle cx="12" cy="12" r="3"/>
                            </svg>
                            <!-- Eye Off Icon -->
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

                <!-- Forgot Password -->
                <div class="flex justify-end">
                    @if (Route::has('password.request'))
                        <a class="text-sm text-blue-600 hover:text-blue-800 hover:underline transition" 
                           href="{{ route('password.request') }}">
                            Forgot your password?
                        </a>
                    @endif
                </div>

                <!-- Login Button -->
                <div class="pt-2">
                    <button type="submit" class="w-full bg-blue-700 hover:bg-blue-800 active:bg-blue-900 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition duration-200 py-3 text-base font-semibold shadow-md rounded-xl text-white">
                        Log in
                    </button>
                </div>

                <!-- Divider -->
                <div class="relative my-6">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-gray-300"></div>
                    </div>
                    <div class="relative flex justify-center text-sm">
                        <span class="px-3 bg-white text-gray-500">or</span>
                    </div>
                </div>

                <!-- Register Link -->
                <div class="text-center">
                    <p class="text-gray-600">
                        Don't have an account? 
                        <a href="{{ route('register') }}" 
                           class="font-semibold text-blue-700 hover:text-blue-800 hover:underline transition">
                            Create free account
                        </a>
                    </p>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>