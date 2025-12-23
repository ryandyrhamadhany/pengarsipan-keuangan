<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Semua Status Pengajuan') }}
        </h2>
    </x-slot>

    <div class="py-10 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-8 bg-gradient-to-br from-gray-50 to-blue-50/30 space-y-8">

                    {{-- Header Dashboard --}}
                    <div class="relative overflow-hidden bg-gradient-to-b from-[#003A8F] to-[#002766] text-white p-10 rounded-2xl shadow-2xl mb-8">
                        <div class="absolute inset-0 bg-black/10"></div>
                        <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHZpZXdCb3g9IjAgMCA2MCA2MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPjxnIGZpbGw9IiNmZmYiIGZpbGwtb3BhY2l0eT0iMC4xIj48cGF0aCBkPSJNMzYgMzRjMC0yLjIxIDEuNzktNCA0LTRzNCAxLjc5IDQgNC0xLjc5IDQtNCA0LTQtMS43OS00LTR6bTAgMTBjMC0yLjIxIDEuNzktNCA0LTRzNCAxLjc5IDQgNC0xLjc5IDQtNCA0LTQtMS43OS00LTR6Ii8+PC9nPjwvZz48L3N2Zz4=')] opacity-20"></div>
                        
                        <div class="relative flex items-center justify-between">
                            <div class="flex items-center space-x-4">
                                <div class="w-10 h-10 bg-white/20 backdrop-blur-sm rounded-lg flex items-center justify-center ring-4 ring-white/30">
                                    <svg class="w-9 h-9 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                                    </svg>
                                </div>
                                <div>
                                    <h2 class="text-lg font-bold text-white">Pengajuan Saya</h2>
                                    <p class="text-white/90 text-sm mt-1">Kelola dan pantau semua pengajuan keuangan Anda dalam satu tempat</p>
                                </div>
                            </div>
                        </div>
                    </div>

            {{-- Main Content --}}
            <div class="space-y-6">

                {{-- ======================== BAGIAN 1 : Pengajuan Diproses ======================== --}}
                <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100">
                    {{-- Section Header --}}
                    <div class="relative bg-gradient-to-b from-[#003A8F] to-[#002766] px-6 py-5">
                        <div class="absolute inset-0 bg-black/5"></div>
                        <div class="relative flex items-center justify-between">
                            <div class="flex items-center space-x-3">
                                <div class="w-10 h-10 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <h3 class="text-lg font-semibold text-white">Pengajuan dalam Proses</h3>
                            </div>
                            <span class="px-3 py-1 bg-white/20 backdrop-blur-sm text-white text-sm font-semibold rounded-full">
                                {{ $my_pengajuan->where('status_kelengkapan', 'Belum Lengkap')->where('status_verifikasi', 0)->count() }} Item
                            </span>
                        </div>
                    </div>

                    {{-- List Items --}}
                    <div class="p-6 space-y-4">
                        @php $no = 1; @endphp

                        @forelse ($my_pengajuan as $pengajuan)
                            @if ($pengajuan->status_kelengkapan == 'Belum Lengkap' && $pengajuan->status_verifikasi == 0)
                                <div class="group relative overflow-hidden rounded-xl bg-gradient-to-br from-blue-50 to-cyan-50 border-2 border-blue-200 hover:border-blue-400 hover:shadow-lg transition-all duration-300">
                                    <div class="absolute top-0 right-0 w-32 h-32 bg-blue-200 rounded-full opacity-20 blur-2xl -mr-16 -mt-16"></div>
                                    
                                    <div class="relative flex items-center p-5">
                                        {{-- Number Badge --}}
                                        <div class="flex-shrink-0 w-12 h-12 flex items-center justify-center bg-gradient-to-br from-blue-500 to-cyan-600 text-white font-bold text-lg rounded-xl shadow-lg ring-4 ring-blue-100">
                                            {{ $no++ }}
                                        </div>

                                        {{-- Content --}}
                                        <a href="{{ route('pengajuan.show', $pengajuan->id) }}" class="flex-1 px-6">
                                            <div class="font-bold text-lg text-gray-800 mb-3">
                                                {{ $pengajuan->pengajuan_name }}
                                            </div>

                                            <div class="flex flex-wrap items-center gap-2">
                                                <span class="inline-flex items-center px-3 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-700 border border-blue-300">
                                                    <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                        <circle cx="10" cy="10" r="3"/>
                                                    </svg>
                                                    Proses
                                                </span>

                                                @if ($pengajuan->status_kelengkapan == 'Belum Lengkap')
                                                    <span class="inline-flex items-center px-3 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-700 border border-yellow-300">
                                                        <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                                        </svg>
                                                        Belum Lengkap
                                                    </span>
                                                @endif

                                                <span class="inline-flex items-center px-3 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-700 border border-red-300">
                                                    <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                    </svg>
                                                    Belum Diverifikasi
                                                </span>

                                                @if ($pengajuan->status_diarsipkan == 1)
                                                    <span class="inline-flex items-center px-3 py-1 text-xs font-semibold rounded-full bg-purple-100 text-purple-700 border border-purple-300">
                                                        <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                                                        </svg>
                                                        Diarsipkan
                                                    </span>
                                                @endif
                                            </div>
                                        </a>

                                        {{-- Action Buttons --}}
                                        <div class="flex gap-2 flex-shrink-0">
                                            <a href="{{ route('pengajuan.edit', $pengajuan->id) }}" 
                                               class="inline-flex items-center px-5 py-2.5 bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white text-sm font-semibold rounded-lg shadow-md hover:shadow-lg transform hover:-translate-y-0.5 transition-all duration-200">
                                                <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                </svg>
                                                Edit
                                            </a>

                                            <form action="{{ route('pengajuan.destroy', $pengajuan->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pengajuan ini?');">
                                                @method('DELETE')
                                                @csrf
                                                <button class="inline-flex items-center px-5 py-2.5 bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 text-white text-sm font-semibold rounded-lg shadow-md hover:shadow-lg transform hover:-translate-y-0.5 transition-all duration-200">
                                                    <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
                                                    Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @empty
                            <div class="text-center py-12">
                                <div class="w-20 h-20 bg-gradient-to-br from-blue-100 to-cyan-100 rounded-full flex items-center justify-center mx-auto mb-4 shadow-inner">
                                    <svg class="w-10 h-10 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <p class="text-gray-500 font-medium">Belum ada pengajuan dalam proses</p>
                                <p class="text-gray-400 text-sm mt-1">Pengajuan yang sedang diproses akan muncul di sini</p>
                            </div>
                        @endforelse
                    </div>
                </div>

                    {{-- ======================== BAGIAN 2 : SEMUA PENGAJUAN ======================== --}}
                <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100">
                    {{-- Section Header --}}
                    <div class="relative bg-gradient-to-b from-[#003A8F] to-[#002766] px-6 py-5">
                        <div class="absolute inset-0 bg-black/5"></div>
                        <div class="relative flex items-center justify-between">
                            <div class="flex items-center space-x-3">
                                <div class="w-10 h-10 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                                    </svg>
                                </div>
                                <h3 class="text-lg font-semibold text-white">Semua Pengajuan</h3>
                            </div>
                            <span class="px-3 py-1 bg-white/20 backdrop-blur-sm text-white text-sm font-semibold rounded-full">
                                {{ $my_pengajuan->count() }} Item
                            </span>
                        </div>
                    </div>

                    {{-- List Items --}}
                    <div class="p-6 space-y-4">
                        @php $no = 1; @endphp

                        @forelse ($my_pengajuan as $pengajuan)
                            <div class="group relative overflow-hidden rounded-xl bg-gradient-to-br from-gray-50 to-slate-50 border-2 border-gray-200 hover:border-gray-400 hover:shadow-lg transition-all duration-300">
                                <div class="absolute top-0 right-0 w-32 h-32 bg-gray-200 rounded-full opacity-20 blur-2xl -mr-16 -mt-16"></div>
                                
                                <div class="relative flex items-center p-5">
                                    {{-- Number Badge --}}
                                    <div class="flex-shrink-0 w-10 h-10 flex items-center justify-center bg-gradient-to-b from-[#003A8F] to-[#002766] text-white font-bold text-sm rounded-xl shadow-lg ring-4 ring-gray-100">
                                        {{ $no++ }}
                                    </div>

                                    {{-- Content --}}
                                    <a href="{{ route('pengajuan.show', $pengajuan->id) }}" class="flex-1 px-6">
                                        <div class="font-bold text-lg text-gray-800 mb-3">
                                            {{ $pengajuan->pengajuan_name }}
                                        </div>

                                        <div class="flex flex-wrap items-center gap-2">
                                            @if ($pengajuan->status_kelengkapan == 'Belum Lengkap')
                                                <span class="inline-flex items-center px-3 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-700 border border-yellow-300">
                                                    <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                                    </svg>
                                                    Belum Lengkap
                                                </span>
                                            @elseif($pengajuan->status_kelengkapan == 'Lengkap')
                                                <span class="inline-flex items-center px-3 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-700 border border-green-300">
                                                    <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                    </svg>
                                                    Lengkap
                                                </span>
                                            @else
                                                <span class="inline-flex items-center px-3 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-700 border border-red-300">
                                                    <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                    </svg>
                                                    Belum Diperiksa
                                                </span>
                                            @endif

                                            @if ($pengajuan->status_verifikasi == 1)
                                                <span class="inline-flex items-center px-3 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-700 border border-green-300">
                                                    <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                                    </svg>
                                                    Diverifikasi
                                                </span>
                                            @else
                                                <span class="inline-flex items-center px-3 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-700 border border-red-300">
                                                    <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                    </svg>
                                                    Belum Diverifikasi
                                                </span>
                                            @endif

                                            @if ($pengajuan->status_diarsipkan == 1)
                                                <span class="inline-flex items-center px-3 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-700 border border-blue-300">
                                                    <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                                                    </svg>
                                                    Diarsipkan
                                                </span>
                                            @endif
                                        </div>
                                    </a>

                                    {{-- Action Buttons --}}
                                    <div class="flex justify-center gap-3">
                                        {{-- EDIT BUTTON --}}
                                        <a href="{{ route('pengajuan.edit', $pengajuan->id) }}"
                                            class="group/btn relative p-3 bg-gradient-to-br from-yellow-400 to-orange-500 hover:from-yellow-500 hover:to-orange-600 rounded-xl shadow-md hover:shadow-lg transition-all duration-300 hover:scale-110"
                                            title="Edit User">
                                            <svg class="w-5 h-5 text-white group-hover/btn:rotate-12 transition-transform duration-300" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"/>
                                            </svg>
                                        </a>

                                        {{-- DELETE BUTTON --}}
                                        <form action="{{ route('pengajuan.destroy', $pengajuan->id) }}" method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus user ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="group/btn relative p-3 bg-gradient-to-br from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 rounded-xl shadow-md hover:shadow-lg transition-all duration-300 hover:scale-110"
                                                title="Hapus User">
                                                <svg class="w-5 h-5 text-white group-hover/btn:rotate-12 transition-transform duration-300" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="text-center py-12">
                                <div class="w-20 h-20 bg-gradient-to-br from-gray-100 to-slate-100 rounded-full flex items-center justify-center mx-auto mb-4 shadow-inner">
                                    <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                                    </svg>
                                </div>
                                <p class="text-gray-500 font-medium">Belum ada pengajuan</p>
                                <p class="text-gray-400 text-sm mt-1">Buat pengajuan baru untuk memulai</p>
                            </div>
                        @endforelse
                    </div>
                </div>


                    {{-- ======================== BAGIAN 3 : Pengajuan Selesai ======================== --}}
                    <div class="bg-white border border-gray-200 rounded-xl shadow-sm p-6">
                        <div class="relative bg-gradient-to-b from-[#003A8F] to-[#002766] px-6 py-5">
                            <div class="absolute inset-0 bg-black/5"></div>
                            <div class="relative flex items-center justify-between">
                                <div class="flex items-center space-x-3">
                                    <div class="w-10 h-10 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center">
                                        <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                    </div>
                                    <h3 class="text-lg font-semibold text-white">Pengajuan Diverifikasi atau Selesai</h3>
                                </div>
                                <span class="px-3 py-1 bg-white/20 backdrop-blur-sm text-white text-sm font-semibold rounded-full">
                                    {{ $my_pengajuan->count() }} Item
                                </span>
                            </div>
                        </div>
                        
                        {{-- <div class="flex items-center gap-3 mb-6 pb-4 border-b border-gray-200">
                            <div class="p-2 bg-green-100 rounded-lg">
                                <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <h3 class="text-lg font-semibold text-gray-800">
                                Pengajuan Diverifikasi atau Selesai
                            </h3>
                        </div> --}}

                        @php $no = 1; @endphp

                        @forelse ($my_pengajuan as $pengajuan)
                            @if ($pengajuan->status_kelengkapan == 'Lengkap' && $pengajuan->status_verifikasi == 1)
                                <div class="group relative mb-4 last:mb-0">
                                    <div
                                        class="flex items-center p-5 bg-gray-50 rounded-xl shadow-sm border border-gray-200 hover:shadow-md hover:border-green-300 transition-all duration-300">

                                        {{-- NOMOR --}}
                                        <div
                                            class="flex-shrink-0 w-10 h-10 flex items-center justify-center bg-gradient-to-b from-[#003A8F] to-[#002766] text-white font-bold text-sm rounded-lg shadow-md">
                                            {{ $no++ }}
                                        </div>

                                        {{-- KONTEN LIST --}}
                                        <a href="{{ route('pengajuan.show', $pengajuan->id) }}" class="flex-1 px-6">
                                            {{-- Nama Pengajuan --}}
                                            <div class="font-semibold text-base text-gray-800 mb-3 break-words">
                                                {{ $pengajuan->pengajuan_name }}
                                            </div>

                                            {{-- STATUS --}}
                                            <div class="flex flex-wrap items-center gap-2">
                                                @if ($pengajuan->status_diarsipkan == 1)
                                                <span class="inline-flex items-center px-3 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-700 border border-green-300">
                                                    <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                    </svg>
                                                    Selesai
                                                </span>
                                                @endif

                                                <span class="inline-flex items-center px-3 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-700 border border-green-300">
                                                    <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                    </svg>
                                                    Lengkap
                                                </span>

                                                <span class="inline-flex items-center px-3 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-700 border border-green-300">
                                                    <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                                    </svg>
                                                    Diverifikasi
                                                </span>

                                                @if ($pengajuan->status_diarsipkan == 1)
                                                    <<span class="inline-flex items-center px-3 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-700 border border-blue-300">
                                                        <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                                                        </svg>
                                                        Diarsipkan
                                                    </span>
                                                @endif
                                            </div>
                                        </a>

                                        {{-- Aksi --}}
                                        <div class="flex justify-center gap-3">
                                            {{-- EDIT BUTTON --}}
                                            <a href="{{ route('pengajuan.edit', $pengajuan->id) }}"
                                                class="group/btn relative p-3 bg-gradient-to-br from-yellow-400 to-orange-500 hover:from-yellow-500 hover:to-orange-600 rounded-xl shadow-md hover:shadow-lg transition-all duration-300 hover:scale-110"
                                                title="Edit User">
                                                <svg class="w-5 h-5 text-white group-hover/btn:rotate-12 transition-transform duration-300" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"/>
                                                </svg>
                                            </a>
    
                                            {{-- DELETE BUTTON --}}
                                            <form action="{{ route('pengajuan.destroy', $pengajuan->id) }}" method="POST"
                                                onsubmit="return confirm('Yakin ingin menghapus user ini?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="group/btn relative p-3 bg-gradient-to-br from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 rounded-xl shadow-md hover:shadow-lg transition-all duration-300 hover:scale-110"
                                                    title="Hapus User">
                                                    <svg class="w-5 h-5 text-white group-hover/btn:rotate-12 transition-transform duration-300" fill="currentColor" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @empty
                            <div class="text-center py-8">
                                <div
                                    class="w-16 h-16 bg-gray-200 rounded-full flex items-center justify-center mx-auto mb-3">
                                    <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <p class="text-gray-500 text-sm">Belum ada pengajuan yang selesai</p>
                            </div>
                        @endforelse
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
