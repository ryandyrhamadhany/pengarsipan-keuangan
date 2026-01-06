<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Keuangan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="space-y-6">

                {{-- ================= HERO SECTION ================= --}}
                <div class="bg-gradient-to-r from-emerald-500 to-teal-600 rounded-xl shadow-lg overflow-hidden">
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
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
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
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
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
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
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
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
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

                
</x-app-layout>
