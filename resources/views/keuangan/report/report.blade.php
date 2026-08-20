<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Report') }}
        </h2>
    </x-slot>

    <div class="py-6 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-2 lg:px-4">
            <div class="bg-white overflow-hidden shadow-sm rounded-md">
                <div class="p-4 space-y-4">
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
                        {{-- Filter Tanggal --}}
                        <div class="bg-gray-50 p-6 rounded-md border border-gray-200">

                        {{-- Report Links --}}
                        <div class="grid md:grid-cols-2 gap-4">
                            <a href="{{route('report.keuangan.all')}}" class="group p-6 bg-white border-2 border-gray-200 rounded-md hover:border-blue-500 hover:shadow-md transition-all duration-200">
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

                            <a href="{{route('report.keuangan.verify')}}" class="group p-6 bg-white border-2 border-gray-200 rounded-md hover:border-green-500 hover:shadow-md transition-all duration-200">
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

                </div>
            </div>
        </div>
    </div>
</x-app-layout>