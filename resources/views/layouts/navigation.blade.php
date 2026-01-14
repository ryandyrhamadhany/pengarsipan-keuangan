<nav class="bg-white border border-gray-200 shadow-lg">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
<<<<<<< HEAD
        <div class="flex justify-between h-16 items-center">
            
            {{-- LOGO/BRAND --}}
            <div class="flex items-center">
                <a href="{{ route('dashboard') }}" class="flex items-center space-x-3 group">
                    <img src="{{ asset('images/Logo.png') }}" class="h-12" alt="Logo">
                    <span class="text-xl font-bold bg-gradient-to-b from-[#ffffff] to-[#6895fd] 
                                    bg-clip-text text-transparent tracking-wide hidden sm:block">
                            VANTRANS-AKU
                    </span>
                </a>
=======
        <div class="flex h-12 items-center">

        {{-- LEFT SIDE --}}
            <div class="flex items-center gap-4">
                
                {{-- PAGE TITLE (DARI x-slot) --}}
                @isset($header)
                    <div class="text-lg font-semibold text-gray-600">
                        {{ $header }}
                    </div>
                @endisset
>>>>>>> main
            </div>

            {{-- RIGHT SIDE: NOTIFICATIONS & USER DROPDOWN --}}
            <div class="ml-auto flex items-center space-x-4">

                {{-- NOTIFICATION BELL --}}
                @php
                    $unreadCount = Auth::user()
                        ->notifications()
                        ->where('is_read', false)
                        ->count();
                @endphp

                <a href="{{ route('notifications.index') }}"
                    class="relative p-2 text-indigo-500 hover:text-indigo-600 hover:bg-indigo-500/10 rounded-lg transition-all duration-200">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                        </svg>

                        @if($unreadCount > 0)
                        <span
                            class="absolute -top-1 -right-1 bg-red-500 text-white text-xs
                                rounded-full px-1.5 py-0.5">
                            {{ $unreadCount }}
                        </span>
                    @endif
                </a>
            </div>
            
        </div>
    </div>
</nav>
