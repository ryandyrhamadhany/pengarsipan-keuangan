<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Dashboard Keuangan') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-2 lg:px-4">
            <div class="space-y-4 bg-white p-4 rounded-lg border border-gray-200 shadow-md">

                {{-- ================= HERO SECTION ================= --}}
                <div class="bg-gradient-to-b from-[#003A8F] to-[#002766] rounded-xl overflow-hidden shadow-md">
                    <div class="p-8">
                        <div class="flex items-center justify-between">
                            <div>
                                <h1 class="text-3xl font-bold text-white mb-2">
                                    Dashboard Verifikasi Keuangan
                                </h1>
                                <p class="text-emerald-100 text-base">
                                    Kelola dan verifikasi pengajuan keuangan dengan mudah
                                </p>
                            </div>
                            <div class="hidden md:block">
                                <div class="w-24 h-24 bg-white/20 rounded-full flex items-center justify-center">
                                    <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- ================= STATISTIK CARDS ================= --}}
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

                    {{-- Total Pengajuan --}}
                    <div class="bg-white rounded-xl shadow-md border border-gray-200 p-6">
                        <div class="flex items-center justify-between">
                            <div class="flex-1">
                                <p class="text-sm text-gray-500 mb-1">Total Pengajuan</p>
                                <p class="text-3xl font-bold text-gray-800">{{ $total_pengajuan ?? 0 }}</p>
                            </div>
                            <div class="p-4 bg-gray-100 rounded-lg">
                                <svg class="w-8 h-8 text-gray-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2">
                                    </path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    {{-- Perlu Diperiksa --}}
                    <div class="bg-white rounded-xl shadow-md border border-gray-200 p-6">
                        <div class="flex items-center justify-between">
                            <div class="flex-1">
                                <p class="text-sm text-gray-500 mb-1">Perlu Diperiksa</p>
                                <p class="text-3xl font-bold text-orange-600">{{ $perlu_diperiksa ?? 0 }}</p>
                            </div>
                            <div class="p-4 bg-orange-100 rounded-lg">
                                <svg class="w-8 h-8 text-orange-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                    </path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    {{-- Belum Diverifikasi --}}
                    <div class="bg-white rounded-xl shadow-md border border-gray-200 p-6">
                        <div class="flex items-center justify-between">
                            <div class="flex-1">
                                <p class="text-sm text-gray-500 mb-1">Belum Diverifikasi</p>
                                <p class="text-3xl font-bold text-red-600">{{ $belum_diverifikasi ?? 0 }}</p>
                            </div>
                            <div class="p-4 bg-red-100 rounded-lg">
                                <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    {{-- Sudah Diverifikasi --}}
                    <div class="bg-white rounded-xl shadow-md border border-gray-200 p-6">
                        <div class="flex items-center justify-between">
                            <div class="flex-1">
                                <p class="text-sm text-gray-500 mb-1">Sudah Diverifikasi</p>
                                <p class="text-3xl font-bold text-green-600">{{ $sudah_diverifikasi ?? 0 }}</p>
                            </div>
                            <div class="p-4 bg-green-100 rounded-lg">
                                <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                @php
                    $progress = $total_pengajuan > 0 ? round(($sudah_diverifikasi / $total_pengajuan) * 100) : 0;
                @endphp
                {{-- ================= DAFTAR PENGAJUAN ================= --}}
                <div class="bg-white rounded-xl shadow-md border border-gray-200 p-6">
                    <div class="flex items-center justify-between mb-6 pb-4 border-b border-gray-200">
                        <div class="flex items-center gap-3">
                            <div class="p-2 bg-emerald-100 rounded-lg">
                                <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4">
                                    </path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-gray-800">Daftar Pengajuan</h3>
                                <p class="text-xs text-gray-500 mt-0.5">Total: {{ $pengajuans->count() }} pengajuan
                                </p>
                            </div>
                        </div>
                        <div x-data="{ progress: {{ $progress ?? 0 }} }" class="h-2 bg-emerald-500 rounded-full"
                            :style="`width: ${progress}%`">

                        </div>


                        <div class="flex justify-between text-sm text-gray-600 mt-2">
                            <span>{{ $sudah_diverifikasi }} diverifikasi</span>
                            <span>{{ $progress }}%</span>
                        </div>
                    </div>
                    {{-- Aksi Cepat --}}
                </div>
                <div class="bg-white rounded-xl shadow-md border border-gray-200 p-6">
                    <div class="flex items-center gap-3 mb-4 pb-4 border-b border-gray-200">
                        <div class="p-2 bg-purple-100 rounded-lg">
                            <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-800">Aksi Cepat</h3>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        {{-- Lihat Semua Pengajuan --}}
                        <a href="{{ route('verify.list.keuangan') }}"
                            class="flex items-center gap-4 p-3 bg-gradient-to-br from-purple-50 to-purple-100/50 rounded-lg border border-purple-200 hover:shadow-md transition-all">
                            <div class="p-3 bg-purple-500 rounded-lg">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2">
                                    </path>
                                </svg>
                            </div>
                            <div>
                                <p class="font-semibold text-gray-800">Lihat Pengajuan</p>
                                <p class="text-xs text-gray-600">Verifikasi Pengajuan yang diajukan</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>
