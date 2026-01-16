<x-guest-layout>
<<<<<<< HEAD
    <div class="w-full max-w-lg bg-white/90 backdrop-blur-md rounded-xl shadow-xl p-8">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    
=======
    <div
        class="w-full max-w-sm bg-white/90 backdrop-blur-md rounded-2xl shadow-xl p-8 
               border border-gray-200">
>>>>>>> main

        {{-- ICON --}}
        <div class="flex justify-center mb-6">
            <div
                class="w-14 h-14 rounded-full bg-gradient-to-br from-indigo-500 to-purple-600 
                       flex items-center justify-center shadow-md">
                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 11c0 1.657-1.343 3-3 3S6 12.657 6 11s1.343-3 3-3 3 1.343 3 3zm0 0v2a4 4 0 004 4h1" />
                </svg>
            </div>
        </div>

<<<<<<< HEAD
        <div class="flex text-center mt-4">
            <x-primary-button>
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
        <div class="text-center pt-2">
            <p class="text-sm text-gray-600">
                <a href="{{ route('login') }}" class="font-bold text-indigo-700 hover:text-indigo-500 transition">Login</a>
            </p>
        </div>
    </form>
</div>
=======
        {{-- TITLE --}}
        <h2 class="text-2xl font-bold text-gray-800 text-center mb-2">
            Lupa Password?
        </h2>

        {{-- DESC --}}
        <p class="text-sm text-gray-600 text-center mb-6 leading-relaxed">
            Masukkan email yang terdaftar. Kami akan mengirimkan tautan untuk mengatur ulang password Anda.
        </p>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4 text-center" :status="session('status')" />

        <form method="POST" action="{{ route('password.email') }}" class="space-y-5">
            @csrf

            {{-- EMAIL --}}
            <div>
                <x-input-label for="email" :value="__('Email Address')" />
                <x-text-input
                    id="email"
                    class="block mt-1 w-full rounded-lg focus:ring-2 focus:ring-indigo-500"
                    type="email"
                    name="email"
                    :value="old('email')"
                    placeholder="you@example.com"
                    required
                    autofocus
                />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            {{-- BUTTON --}}
            <x-primary-button
                class="w-full justify-center py-3 text-base font-semibold tracking-wide 
                       bg-gradient-to-r from-indigo-600 to-blue-600 hover:from-indigo-700 hover:to-blue-700 transition-all">
                Kirim Link Reset Password
            </x-primary-button>

            {{-- BACK TO LOGIN --}}
            <div class="text-center pt-2">
                <a href="{{ route('login') }}"
                    class="text-sm font-medium text-indigo-600 hover:text-indigo-500 transition">
                    Login
                </a>
            </div>
        </form>
    </div>
>>>>>>> main
</x-guest-layout>
