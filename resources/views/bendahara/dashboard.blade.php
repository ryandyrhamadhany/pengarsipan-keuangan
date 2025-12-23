<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Bendahara') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="space-y-6">

                {{-- ================= HERO SECTION ================= --}}
                <div class="bg-gradient-to-b from-[#003A8F] to-[#002766] rounded-xl shadow-lg overflow-hidden">
                    <div class="p-8">
                        <div class="flex items-center justify-between">
                            <div>
                                <h1 class="text-3xl font-bold text-white mb-2">
                                    Dashboard Bendahara
                                </h1>
                                <p class="text-violet-100 text-base">
                                    Verifikasi dan arsipkan pengajuan yang telah disetujui
                                </p>
                            </div>
                            <div class="hidden md:block">
                                <div class="w-20 h-20 bg-white/20 rounded-full flex items-center justify-center">
                                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z">
                                        </path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- ================= STATISTIK CARDS ================= --}}
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

                    {{-- Total Pengajuan Terverifikasi --}}
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                        <div class="flex items-center justify-between">
                            <div class="flex-1">
                                <p class="text-sm text-gray-500 mb-1">Total Terverifikasi</p>
                                <p class="text-3xl font-bold text-gray-800">{{ $total_terverifikasi ?? 0 }}</p>
                            </div>
                            <div class="p-4 bg-purple-100 rounded-lg">
                                <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4">
                                    </path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    {{-- Menunggu Verifikasi Final --}}
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                        <div class="flex items-center justify-between">
                            <div class="flex-1">
                                <p class="text-sm text-gray-500 mb-1">Menunggu Verifikasi</p>
                                <p class="text-3xl font-bold text-orange-600">{{ $menunggu_verifikasi ?? 0 }}</p>
                            </div>
                            <div class="p-4 bg-orange-100 rounded-lg">
                                <svg class="w-8 h-8 text-orange-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    {{-- Sudah Diarsipkan --}}
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                        <div class="flex items-center justify-between">
                            <div class="flex-1">
                                <p class="text-sm text-gray-500 mb-1">Sudah Diarsipkan</p>
                                <p class="text-3xl font-bold text-green-600">{{ $sudah_diarsipkan ?? 0 }}</p>
                            </div>
                            <div class="p-4 bg-green-100 rounded-lg">
                                <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4">
                                    </path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    {{-- Selesai Hari Ini --}}
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                        <div class="flex items-center justify-between">
                            <div class="flex-1">
                                <p class="text-sm text-gray-500 mb-1">Selesai Hari Ini</p>
                                <p class="text-3xl font-bold text-blue-600">{{ $selesai_hari_ini ?? 0 }}</p>
                            </div>
                            <div class="p-4 bg-blue-100 rounded-lg">
                                <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                </div>

                {{-- ================= SEARCH & FILTER ================= --}}
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                    <form method="GET" action="" class="space-y-4">
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

                            {{-- Search --}}
                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Cari Pengajuan</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                        </svg>
                                    </div>
                                    <input type="text" name="search" value="{{ request('search') }}"
                                        class="block w-full pl-10 pr-3 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-400 focus:border-purple-400 focus:outline-none"
                                        placeholder="Cari nama pengajuan...">
                                </div>
                            </div>

                            {{-- Filter Status --}}
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Status Arsip</label>
                                <select name="status"
                                    class="block w-full px-3 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-400 focus:border-purple-400 focus:outline-none">
                                    <option value="">Semua Status</option>
                                    <option value="belum_diarsipkan"
                                        {{ request('status') == 'belum_diarsipkan' ? 'selected' : '' }}>
                                        Belum Diarsipkan
                                    </option>
                                    <option value="sudah_diarsipkan"
                                        {{ request('status') == 'sudah_diarsipkan' ? 'selected' : '' }}>
                                        Sudah Diarsipkan
                                    </option>
                                </select>
                            </div>

                        </div>

                        {{-- Buttons --}}
                        <div class="flex gap-3">
                            <button type="submit"
                                class="inline-flex items-center gap-2 px-5 py-2.5 bg-gradient-to-b from-[#003A8F] to-[#002766] text-white font-medium rounded-lg shadow-sm">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z">
                                    </path>
                                </svg>
                                Filter
                            </button>
                            <a href=""
                                class="inline-flex items-center gap-2 px-5 py-2.5 bg-gray-200 text-gray-700 font-medium rounded-lg">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15">
                                    </path>
                                </svg>
                                Reset
                            </a>
                        </div>
                    </form>
                </div>

                {{-- ================= DAFTAR PENGAJUAN ================= --}}
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                    <div class="flex items-center justify-between mb-6 pb-4 border-b border-gray-200">
                        <div class="flex items-center gap-3">
                            <div class="p-2 bg-purple-100 rounded-lg">
                                <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4">
                                    </path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-gray-800">Pengajuan Terverifikasi</h3>
                                <p class="text-xs text-gray-500 mt-0.5">Total: {{ $pengajuans->count() }} pengajuan
                                </p>
                            </div>
                        </div>
                    </div>

                    @php $no = 1; @endphp

                    @forelse ($pengajuans as $pengajuan)
                        @if ($pengajuan->status_kelengkapan == 'Lengkap' && $pengajuan->status_verifikasi == 1)
                            <div class="group relative mb-4 last:mb-0">
                                <div
                                    class="flex items-center p-5 bg-gray-50 rounded-xl shadow-sm border border-gray-200 hover:shadow-md hover:border-purple-300 transition-all duration-300">

                                    {{-- NOMOR --}}
                                    <div
                                        class="flex-shrink-0 w-10 h-10 flex items-center justify-center bg-gradient-to-b from-[#003A8F] to-[#002766] text-white font-bold text-sm rounded-lg shadow-md">
                                        {{ $no++ }}
                                    </div>

                                    {{-- KONTEN LIST --}}
                                    <a href="{{ route('bendahara.sign', $pengajuan->id) }}" class="flex-1 px-6">
                                        {{-- Nama Pengajuan --}}
                                        <div class="font-semibold text-base text-gray-800 mb-3 break-words">
                                            {{ $pengajuan->pengajuan_name }}
                                        </div>

                                        {{-- Pengaju --}}
                                        <div class="text-xs text-gray-500 mb-2">
                                            Diajukan oleh: <span
                                                class="font-medium text-gray-700">{{ $pengajuan->user->name }}</span>
                                        </div>

                                        {{-- STATUS --}}
                                        <div class="flex flex-wrap items-center gap-2">
                                            @if ($pengajuan->status_diarsipkan == 1)
                                                <span
                                                    class="px-3 py-1 text-xs font-medium rounded-full bg-green-100 text-green-700">
                                                    Selesai
                                                </span>
                                            @endif

                                            <span
                                                class="px-3 py-1 text-xs font-medium rounded-full bg-green-100 text-green-700">
                                                Lengkap
                                            </span>

                                            <span
                                                class="px-3 py-1 text-xs font-medium rounded-full bg-green-100 text-green-700">
                                                Diverifikasi
                                            </span>

                                            @if ($pengajuan->status_diarsipkan == 1)
                                                <span
                                                    class="px-3 py-1 text-xs font-medium rounded-full bg-green-100 text-green-700">
                                                    Diarsipkan
                                                </span>
                                            @else
                                                <span
                                                    class="px-3 py-1 text-xs font-medium rounded-full bg-orange-100 text-orange-700">
                                                    Menunggu Arsip
                                                </span>
                                            @endif
                                        </div>
                                    </a>

                                    {{-- Arrow Icon --}}
                                    <div class="flex-shrink-0 ml-4">
                                        <div
                                            class="w-10 h-10 flex items-center justify-center bg-gray-100 rounded-lg group-hover:bg-[#003A8F] transition-all duration-300">
                                            <svg class="w-5 h-5 text-gray-400 group-hover:text-white transition-all duration-300"
                                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 5l7 7-7 7"></path>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @empty
                        <div class="text-center py-12">
                            <div
                                class="w-20 h-20 bg-gray-200 rounded-full flex items-center justify-center mx-auto mb-4">
                                <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4">
                                    </path>
                                </svg>
                            </div>
                            <p class="text-gray-500 font-medium text-lg mb-2">Tidak Ada Pengajuan</p>
                            <p class="text-gray-400 text-sm">
                                {{ request('search') || request('status') ? 'Tidak ada pengajuan yang sesuai dengan filter' : 'Belum ada pengajuan yang perlu diverifikasi final' }}
                            </p>
                        </div>
                    @endforelse
                </div>

                {{-- ================= INFO SECTION ================= --}}
                <div class="bg-gradient-to-br from-purple-50 to-violet-100/50 rounded-xl p-6 border border-purple-200">
                    <div class="flex items-start gap-4">
                        <div class="p-3 bg-gradient-to-b from-[#003A8F] to-[#002766] rounded-lg flex-shrink-0">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div class="flex-1">
                            <h4 class="font-semibold text-gray-800 mb-2">Informasi Verifikasi Final</h4>
                            <ul class="space-y-1 text-sm text-gray-700">
                                <li class="flex items-start gap-2">
                                    <span class="text-purple-600 mt-0.5">•</span>
                                    <span>Verifikasi pengajuan yang telah diperiksa kelengkapannya</span>
                                </li>
                                <li class="flex items-start gap-2">
                                    <span class="text-purple-600 mt-0.5">•</span>
                                    <span>Setelah diverifikasi, pengajuan akan diarsipkan secara otomatis</span>
                                </li>
                                <li class="flex items-start gap-2">
                                    <span class="text-purple-600 mt-0.5">•</span>
                                    <span>Pastikan semua dokumen sudah lengkap sebelum melakukan verifikasi final</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
