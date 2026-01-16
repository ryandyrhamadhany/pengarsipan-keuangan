<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">Notifikasi</h2>
    </x-slot>

    @php
        $typeConfig = [
            'info' => [
                'bg' => 'bg-gradient-to-r from-blue-50 to-blue-100',
                'border' => 'border-blue-500',
                'icon' => 'M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z',
                'iconBg' => 'bg-blue-500',
                'badge' => 'bg-blue-100 text-blue-800'
            ],
            'success' => [
                'bg' => 'bg-gradient-to-r from-green-50 to-green-100',
                'border' => 'border-green-500',
                'icon' => 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z',
                'iconBg' => 'bg-green-500',
                'badge' => 'bg-green-100 text-green-800'
            ],
            'warning' => [
                'bg' => 'bg-gradient-to-r from-yellow-50 to-yellow-100',
                'border' => 'border-yellow-500',
                'icon' => 'M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z',
                'iconBg' => 'bg-yellow-500',
                'badge' => 'bg-yellow-100 text-yellow-800'
            ],
            'error' => [
                'bg' => 'bg-gradient-to-r from-red-50 to-red-100',
                'border' => 'border-red-500',
                'icon' => 'M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z',
                'iconBg' => 'bg-red-500',
                'badge' => 'bg-red-100 text-red-800'
            ],
        ];
    @endphp

    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8">

        {{-- FILTER & ACTIONS --}}
        <div class="bg-white rounded-xl shadow-sm p-4 mb-6">
            <div class="flex flex-wrap justify-between items-center gap-4">

                {{-- Filter Tabs --}}
                <div class="flex gap-2 bg-gray-100 p-1 rounded-lg">
                    <a href="{{ route('notifications.index') }}"
                       class="px-4 py-2 rounded-lg text-sm font-medium transition-all duration-200 {{ request('filter') === null ? 'bg-white text-blue-600 shadow-sm' : 'text-gray-600 hover:text-gray-900' }}">
                        <svg class="inline-block w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                        Semua
                    </a>

                    <a href="{{ route('notifications.index', ['filter' => 'unread']) }}"
                       class="px-4 py-2 rounded-lg text-sm font-medium transition-all duration-200 {{ request('filter') === 'unread' ? 'bg-white text-blue-600 shadow-sm' : 'text-gray-600 hover:text-gray-900' }}">
                        <svg class="inline-block w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                        Belum Dibaca
                    </a>

                    <a href="{{ route('notifications.index', ['filter' => 'read']) }}"
                       class="px-4 py-2 rounded-lg text-sm font-medium transition-all duration-200 {{ request('filter') === 'read' ? 'bg-white text-blue-600 shadow-sm' : 'text-gray-600 hover:text-gray-900' }}">
                        <svg class="inline-block w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Sudah Dibaca
                    </a>
                </div>

                {{-- Action Buttons --}}
                <div class="flex gap-2">
                    <form method="POST" action="{{ route('notifications.readAll') }}">
                        @csrf
                        <button class="px-4 py-2 bg-blue-500 text-white rounded-lg text-sm font-medium hover:bg-blue-600 transition-all duration-200 shadow-sm hover:shadow flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Tandai Semua
                        </button>
                    </form>

                    <form method="POST" action="{{ route('notifications.deleteRead') }}">
                        @csrf
                        @method('DELETE')
                        <button class="px-4 py-2 bg-red-500 text-white rounded-lg text-sm font-medium hover:bg-red-600 transition-all duration-200 shadow-sm hover:shadow flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                            </svg>
                            Hapus Dibaca
                        </button>
                    </form>
                </div>
            </div>
        </div>

        {{-- NOTIFICATION LIST --}}
        <div class="space-y-3">
            @forelse ($notifications as $notif)
                @php
                    $config = $typeConfig[$notif->type] ?? $typeConfig['info'];
                @endphp

                <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300 overflow-hidden border-l-4 {{ $config['border'] }} {{ $notif->is_read ? 'opacity-60' : '' }}">
                    <div class="p-5">
                        <div class="flex items-start gap-4">
                            
                            {{-- Icon --}}
                            <div class="flex-shrink-0">
                                <div class="{{ $config['iconBg'] }} p-3 rounded-full">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $config['icon'] }}"></path>
                                    </svg>
                                </div>
                            </div>

                            {{-- Content --}}
                            <div class="flex-1 min-w-0">
                                <div class="flex items-start justify-between gap-2 mb-2">
                                    <h3 class="font-semibold text-gray-900 text-lg">
                                        {{ $notif->title }}
                                        @if(!$notif->is_read)
                                            <span class="inline-block w-2 h-2 bg-blue-600 rounded-full ml-2 animate-pulse"></span>
                                        @endif
                                    </h3>
                                    <span class="{{ $config['badge'] }} px-3 py-1 rounded-full text-xs font-semibold uppercase">
                                        {{ ucfirst($notif->type) }}
                                    </span>
                                </div>
                                
                                <p class="text-gray-600 text-sm leading-relaxed mb-3">
                                    {!! $notif->message !!}
                                </p>

                                <div class="flex items-center justify-between">
                                    <div class="flex items-center text-xs text-gray-400 gap-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        {{ $notif->created_at->diffForHumans() }}
                                    </div>

                                    <div class="flex gap-2">
                                        @if(!$notif->is_read)
                                            <form method="POST" action="{{ route('notifications.read', $notif->id) }}">
                                                @csrf
                                                <button class="px-3 py-1 bg-blue-50 text-blue-600 rounded-lg text-sm font-medium hover:bg-blue-100 transition-all duration-200 flex items-center gap-1">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                                    </svg>
                                                    Baca
                                                </button>
                                            </form>
                                        @endif

                                        @if($notif->is_read)
                                            <form method="POST" action="{{ route('notifications.delete', $notif->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button class="px-3 py-1 bg-red-50 text-red-600 rounded-lg text-xs font-medium hover:bg-red-100 transition-all duration-200 flex items-center gap-1">
                                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                    </svg>
                                                    Hapus
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            @empty
                <div class="bg-white rounded-xl shadow-sm p-28 text-center shadow-md">
                    <svg class="w-20 h-20 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                    </svg>
                    <h3 class="text-xl font-semibold text-gray-700 mb-2">Tidak ada notifikasi</h3>
                    <p class="text-gray-500">Semua notifikasi sudah terbaca atau belum ada notifikasi baru</p>
                </div>
            @endforelse
        </div>
    </div>

    <style>
        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .space-y-3 > div {
            animation: slideIn 0.3s ease-out;
        }
    </style>
</x-app-layout>