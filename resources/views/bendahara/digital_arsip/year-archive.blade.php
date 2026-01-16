<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Tahun Arsip') }}
        </h2>
    </x-slot>

    {{-- TOMBOL KEMBALI --}}
    <div class="#">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-2">
            <a href="{{ route('digital.index') }}"
                class="inline-flex items-center gap-2 bg-gray-100 text-gray-700 px-2 py-2 rounded-full border border-gray-200
                    shadow-lg transition-all duration-200 ease-in-out hover:bg-gray-400 hover:shadow-md active:bg-gray-300 active:scale-95">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
            </a>             
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div
                    class="border border-gray-200 rounded-lg shadow-sm p-8 bg-gradient-to-br from-gray-50 to-blue-50/30">

                    {{-- Header Section --}}
                    <div class="flex items-center gap-3 mb-6">
                        <div class="p-3 bg-blue-500 rounded-lg shadow-md">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                </path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800">
                                Arsip Digital Berdasarkan Tahun
                            </h3>
                            <p class="text-sm text-gray-500 mt-1">
                                Pilih tahun untuk melihat arsip digital
                            </p>
                        </div>
                    </div>

                    {{-- Stats Badge --}}
                    <div class="mb-6 inline-block">
                        <div class="px-4 py-2 bg-white rounded-full shadow-sm border border-gray-200">
                            <span class="text-sm text-gray-600">Total Tahun: </span>
                            <span class="font-bold text-blue-600">{{ count($tahun_archive) }}</span>
                        </div>
                    </div>

                    @php $no = 1; @endphp

                    @forelse ($tahun_archive as $archive)
                        <div class="group relative mb-4 last:mb-0">
                            {{-- Card dengan efek hover --}}
                            <div
                                class="flex items-center p-5 bg-white rounded-xl shadow-sm border border-gray-200
                                hover:shadow-lg hover:border-blue-300 transition-all duration-300
                                hover:-translate-y-1">

                                {{-- NOMOR dengan styling badge --}}
                                <div
                                    class="flex-shrink-0 w-12 h-12 flex items-center justify-center
                                    bg-gradient-to-br from-blue-500 to-blue-600
                                    text-white font-bold text-lg rounded-lg shadow-md
                                    group-hover:scale-110 transition-transform duration-300">
                                    {{ $no++ }}
                                </div>

                                {{-- KONTEN LIST --}}
                                <a href="{{ route('digital.archive', $archive->id) }}"
                                    class="flex-1 flex items-center justify-between px-6 py-2">

                                    <div class="flex-1">
                                        {{-- Tahun --}}
                                        <div
                                            class="font-semibold text-lg text-gray-800 mb-1
                                            group-hover:text-blue-600 transition-colors">
                                            Tahun {{ $archive->year }}
                                        </div>

                                        {{-- Subtitle/info tambahan --}}
                                        <div class="flex items-center gap-3 text-sm text-gray-500">
                                            <span class="flex items-center gap-1">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                                    </path>
                                                </svg>
                                                Lihat Arsip Tahun Ini
                                            </span>
                                        </div>
                                    </div>

                                    {{-- Arrow Icon --}}
                                    <div class="flex-shrink-0 ml-4">
                                        <div
                                            class="w-10 h-10 flex items-center justify-center
                                            bg-gray-100 rounded-lg group-hover:bg-blue-500
                                            transition-all duration-300">
                                            <svg class="w-5 h-5 text-gray-400 group-hover:text-white
                                                group-hover:translate-x-1 transition-all duration-300"
                                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 5l7 7-7 7"></path>
                                            </svg>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @empty
                        {{-- Empty State --}}
                        <div class="flex flex-col items-center justify-center py-16">
                            <div class="w-20 h-20 bg-gray-200 rounded-full flex items-center justify-center mb-4">
                                <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                    </path>
                                </svg>
                            </div>
                            <p class="text-gray-500 font-medium text-lg mb-2">Belum Ada Data</p>
                            <p class="text-gray-400 text-sm">Arsip tahun akan ditampilkan di sini</p>
                        </div>
                    @endforelse
<<<<<<< HEAD
=======

>>>>>>> main
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
