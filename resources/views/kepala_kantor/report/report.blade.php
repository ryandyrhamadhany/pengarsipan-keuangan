<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Report') }}
        </h2>
    </x-slot>

    <div class="py-10 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm rounded-md">
                <div class="p-8 space-y-8">
                    {{-- Header Dashboard --}}
                    <div class="bg-[#003A8F] text-white p-8 rounded-md shadow-sm">
                        <div class="flex items-center justify-between">
                            <div>
                                <h2 class="text-2xl font-bold">Report</h2>
                                <p class="text-white/90 text-sm mt-1">Buat Laporan Singkat Disini</p>
                            </div>
                        </div>
                    </div>

                    {{-- Filter & Report Section --}}
                    <div class="space-y-6">

                        {{-- Report Links --}}
                        <div class="grid md:grid-cols-2 gap-4">
                            <a href="{{route('report.kepala.aktif')}}" class="group p-6 bg-white border-2 border-gray-200 rounded-md hover:border-blue-500 hover:shadow-md transition-all duration-200">
                                <div class="flex items-start space-x-4">
                                    <div class="w-12 h-12 bg-blue-100 rounded-md flex items-center justify-center group-hover:bg-blue-200 transition-colors">
                                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                        </svg>
                                    </div>
                                    <div class="flex-1">
                                        <h4 class="font-semibold text-gray-800 group-hover:text-blue-600 transition-colors">Laporan Arisp Aktif</h4>
                                        <p class="text-sm text-gray-500 mt-1">Semua Arsip Berstatus Aktif</p>
                                    </div>
                                    <svg class="w-5 h-5 text-gray-400 group-hover:text-blue-600 group-hover:translate-x-1 transition-all" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </div>
                            </a>

                            <a href="{{route('report.kepala.approved')}}" class="group p-6 bg-white border-2 border-gray-200 rounded-md hover:border-green-500 hover:shadow-md transition-all duration-200">
                                <div class="flex items-start space-x-4">
                                    <div class="w-12 h-12 bg-green-100 rounded-md flex items-center justify-center group-hover:bg-green-200 transition-colors">
                                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                    <div class="flex-1">
                                        <h4 class="font-semibold text-gray-800 group-hover:text-green-600 transition-colors">Laporan Arsip yang disetujui</h4>
                                        <p class="text-sm text-gray-500 mt-1">Laporan arsip dengan data lengkap yang disetujui</p>
                                    </div>
                                    <svg class="w-5 h-5 text-gray-400 group-hover:text-green-600 group-hover:translate-x-1 transition-all" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="space-y-6">
                        <div>
                            Report Divisi
                        </div>
                        {{-- Report Links --}}
                        <div class="grid md:grid-cols-2 gap-4">
                            <a href="{{route('report.kepala.divisi.all')}}" class="group p-6 bg-white border-2 border-gray-200 rounded-md hover:border-blue-500 hover:shadow-md transition-all duration-200">
                                <div class="flex items-start space-x-4">
                                    <div class="w-12 h-12 bg-blue-100 rounded-md flex items-center justify-center group-hover:bg-blue-200 transition-colors">
                                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                        </svg>
                                    </div>
                                    <div class="flex-1">
                                        <h4 class="font-semibold text-gray-800 group-hover:text-blue-600 transition-colors">Laporan Semua Pengajuan</h4>
                                        <p class="text-sm text-gray-500 mt-1">Lihat detail semua pengajuan yang telah Anda buat</p>
                                    </div>
                                    <svg class="w-5 h-5 text-gray-400 group-hover:text-blue-600 group-hover:translate-x-1 transition-all" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </div>
                            </a>

                            <a href="{{route('report.kepala.divisi.nominal')}}" class="group p-6 bg-white border-2 border-gray-200 rounded-md hover:border-green-500 hover:shadow-md transition-all duration-200">
                                <div class="flex items-start space-x-4">
                                    <div class="w-12 h-12 bg-green-100 rounded-md flex items-center justify-center group-hover:bg-green-200 transition-colors">
                                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                    <div class="flex-1">
                                        <h4 class="font-semibold text-gray-800 group-hover:text-green-600 transition-colors">Laporan Total Biaya</h4>
                                        <p class="text-sm text-gray-500 mt-1">Ringkasan biaya dari semua pengajuan yang disetujui</p>
                                    </div>
                                    <svg class="w-5 h-5 text-gray-400 group-hover:text-green-600 group-hover:translate-x-1 transition-all" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </div>
                            </a>
                        </div>
                        </div>

                        <div class="space-y-6">
                            <div>
                                Report keuangan
                            </div>

                        {{-- Report Links --}}
                        <div class="grid md:grid-cols-2 gap-4">
                            <a href="{{route('report.kepala.keuangan.all')}}" class="group p-6 bg-white border-2 border-gray-200 rounded-md hover:border-blue-500 hover:shadow-md transition-all duration-200">
                                <div class="flex items-start space-x-4">
                                    <div class="w-12 h-12 bg-blue-100 rounded-md flex items-center justify-center group-hover:bg-blue-200 transition-colors">
                                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                        </svg>
                                    </div>
                                    <div class="flex-1">
                                        <h4 class="font-semibold text-gray-800 group-hover:text-blue-600 transition-colors">Laporan Semua Pengajuan</h4>
                                        <p class="text-sm text-gray-500 mt-1">Buat laporan semua pengajuan yang dibuat UM</p>
                                    </div>
                                    <svg class="w-5 h-5 text-gray-400 group-hover:text-blue-600 group-hover:translate-x-1 transition-all" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </div>
                            </a>

                            <a href="{{route('report.kepala.keuangan.verify')}}" class="group p-6 bg-white border-2 border-gray-200 rounded-md hover:border-green-500 hover:shadow-md transition-all duration-200">
                                <div class="flex items-start space-x-4">
                                    <div class="w-12 h-12 bg-green-100 rounded-md flex items-center justify-center group-hover:bg-green-200 transition-colors">
                                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                    <div class="flex-1">
                                        <h4 class="font-semibold text-gray-800 group-hover:text-green-600 transition-colors">Laporan Pengajuan Diverifikasi</h4>
                                        <p class="text-sm text-gray-500 mt-1">Laporan yang sudah diverifikasi</p>
                                    </div>
                                    <svg class="w-5 h-5 text-gray-400 group-hover:text-green-600 group-hover:translate-x-1 transition-all" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </div>
                            </a>
                        </div>
                        </div>

                        {{-- Filter & Report Section --}}
                    <div class="space-y-6">
                        <div>
                            Report Bendahara
                        </div>

                        {{-- Report Links --}}
                        <div class="grid md:grid-cols-3 gap-4">
                            <a href="{{route('report.kepala.bendahara.all')}}" class="group p-6 bg-white border-2 border-gray-200 rounded-md hover:border-blue-500 hover:shadow-md transition-all duration-200">
                                <div class="flex items-start space-x-4">
                                    <div class="w-12 h-12 bg-blue-100 rounded-md flex items-center justify-center group-hover:bg-blue-200 transition-colors">
                                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                        </svg>
                                    </div>
                                    <div class="flex-1">
                                        <h4 class="font-semibold text-gray-800 group-hover:text-blue-600 transition-colors">Laporan Pengajuan Ditanda Tangani</h4>
                                        <p class="text-sm text-gray-500 mt-1">Semua Laporan yang ditanda tangani oleh akun ini</p>
                                    </div>
                                    <svg class="w-5 h-5 text-gray-400 group-hover:text-blue-600 group-hover:translate-x-1 transition-all" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </div>
                            </a>

                            <a href="{{route('report.kepala.bendahara.nominal')}}" class="group p-6 bg-white border-2 border-gray-200 rounded-md hover:border-green-500 hover:shadow-md transition-all duration-200">
                                <div class="flex items-start space-x-4">
                                    <div class="w-12 h-12 bg-green-100 rounded-md flex items-center justify-center group-hover:bg-green-200 transition-colors">
                                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                    <div class="flex-1">
                                        <h4 class="font-semibold text-gray-800 group-hover:text-green-600 transition-colors">Laporan Total Biaya</h4>
                                        <p class="text-sm text-gray-500 mt-1">Ringkasan biaya dari pengajuan yang ditanda tangani oleh akun ini</p>
                                    </div>
                                    <svg class="w-5 h-5 text-gray-400 group-hover:text-green-600 group-hover:translate-x-1 transition-all" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </div>
                            </a>

                            <a href="{{route('report.kepala.bendahara.sign')}}" class="group p-6 bg-white border-2 border-gray-200 rounded-md hover:border-indigo-500 hover:shadow-md transition-all duration-200">
                                <div class="flex items-start space-x-4">
                                    <div class="w-12 h-12 bg-indigo-100 rounded-md flex items-center justify-center group-hover:bg-indigo-200 transition-colors">
                                        <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                        </svg>
                                    </div>
                                    <div class="flex-1">
                                        <h4 class="font-semibold text-gray-800 group-hover:text-indigo-600 transition-colors">Laporan Pengajuan yang sudah ditanda tangani</h4>
                                        <p class="text-sm text-gray-500 mt-1">Semua laporan pengajuan yang sudah ditanda tangani oleh semua akun</p>
                                    </div>
                                    <svg class="w-5 h-5 text-gray-400 group-hover:text-indigo-600 group-hover:translate-x-1 transition-all" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </div>
                            </a>
                        </div>
                    </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>