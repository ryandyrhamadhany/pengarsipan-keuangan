<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard
        </h2>
    </x-slot>
       
    <div class="py-10 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- WELCOME CARD --}}
            <div class="relative overflow-hidden bg-gradient-to-b from-[#003A8F] to-[#002766] text-white p-10 rounded-2xl shadow-2xl mb-8">
                <div class="absolute top-0 right-0 -mt-4 -mr-4 w-40 h-40 bg-white opacity-10 rounded-full"></div>
                <div class="absolute bottom-0 left-0 -mb-8 -ml-8 w-32 h-32 bg-white opacity-10 rounded-full"></div>
                <div class="relative z-10">
                    <div class="flex items-center mb-3">
                        <svg class="w-10 h-10 mr-3" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z"/>
                        </svg>
                        <h1 class="text-3xl font-bold">Selamat Datang di Dashboard Arsip!</h1>
                    </div>
                    <p class="text-lg opacity-90 ml-13">
                        Kelola dokumen, pantau statistik, dan akses fitur dengan lebih mudah.
                    </p>
                </div>
            </div>

            {{-- STATISTICS CARDS --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">

                {{-- Dokumen Ada --}}
                <div class="group relative p-8 bg-white shadow-lg rounded-2xl border-t-4 border-green-500 hover:shadow-2xl transition-all duration-300 hover:-translate-y-1">
                    <div class="flex items-start justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-500 uppercase tracking-wide">Dokumen Tersimpan</p>
                            <h3 class="text-4xl font-extrabold text-gray-800 mt-3">
                                {{ 124 }}
                            </h3>
                            <p class="text-xs text-green-600 mt-2 font-semibold">+12% dari bulan lalu</p>
                        </div>
                        <div class="p-4 bg-green-100 rounded-xl group-hover:bg-green-500 transition-colors duration-300">
                            <svg class="w-8 h-8 text-green-600 group-hover:text-white transition-colors duration-300" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"/>
                                <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm9.707 5.707a1 1 0 00-1.414-1.414L9 12.586l-1.293-1.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                    </div>
                </div>

                {{-- Dokumen Tidak Ada --}}
                <div class="group relative p-8 bg-white shadow-lg rounded-2xl border-t-4 border-red-500 hover:shadow-2xl transition-all duration-300 hover:-translate-y-1">
                    <div class="flex items-start justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-500 uppercase tracking-wide">Dokumen Tidak Ditemukan</p>
                            <h3 class="text-4xl font-extrabold text-gray-800 mt-3">
                                {{ 8 }}
                            </h3>
                            <p class="text-xs text-red-600 mt-2 font-semibold">Perlu perhatian</p>
                        </div>
                        <div class="p-4 bg-red-100 rounded-xl group-hover:bg-red-500 transition-colors duration-300">
                            <svg class="w-8 h-8 text-red-600 group-hover:text-white transition-colors duration-300" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                    </div>
                </div>

                {{-- Jumlah User --}}
                <div class="group relative p-8 bg-white shadow-lg rounded-2xl border-t-4 border-blue-500 hover:shadow-2xl transition-all duration-300 hover:-translate-y-1">
                    <div class="flex items-start justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-500 uppercase tracking-wide">Jumlah User</p>
                            <h3 class="text-4xl font-extrabold text-gray-800 mt-3">
                                {{ 5 }}
                            </h3>
                            <p class="text-xs text-blue-600 mt-2 font-semibold">User aktif</p>
                        </div>
                        <div class="p-4 bg-blue-100 rounded-xl group-hover:bg-blue-500 transition-colors duration-300">
                            <svg class="w-8 h-8 text-blue-600 group-hover:text-white transition-colors duration-300" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"/>
                            </svg>
                        </div>
                    </div>
                </div>

            </div>

            {{-- FILTER SECTION --}}
            <div class="bg-white p-8 rounded-2xl shadow-lg mb-8">
                <div class="flex items-center justify-between mb-6">
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-blue-600 mr-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M3 3a1 1 0 011-1h12a1 1 0 011 1v3a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V3z" clip-rule="evenodd"/>
                        </svg>
                        <h3 class="text-2xl font-bold text-gray-800">Filter Dokumen</h3>
                    </div>
                    <button class="px-4 py-2 bg-gray-100 text-gray-600 rounded-lg hover:bg-gray-200 transition-colors text-sm font-medium">
                        Reset Filter
                    </button>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">

                    <div class="relative">
                        <select class="w-full border-2 border-gray-200 px-4 py-3 rounded-xl focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all appearance-none bg-white cursor-pointer">
                            <option value="">Pilih Cabinet</option>
                            <option value="1">Cabinet A</option>
                            <option value="2">Cabinet B</option>
                        </select>
                        <svg class="absolute right-3 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400 pointer-events-none" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                        </svg>
                    </div>

                    <div class="relative">
                        <select class="w-full border-2 border-gray-200 px-4 py-3 rounded-xl focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all appearance-none bg-white cursor-pointer">
                            <option value="">Pilih Category</option>
                            <option value="1">Keuangan</option>
                            <option value="2">Pajak</option>
                        </select>
                        <svg class="absolute right-3 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400 pointer-events-none" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                        </svg>
                    </div>

                    <div class="relative">
                        <select class="w-full border-2 border-gray-200 px-4 py-3 rounded-xl focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all appearance-none bg-white cursor-pointer">
                            <option value="">Pilih Subcategory</option>
                            <option value="1">Laporan</option>
                            <option value="2">Rekap</option>
                        </select>
                        <svg class="absolute right-3 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400 pointer-events-none" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                        </svg>
                    </div>

                    <div class="relative">
                        <select class="w-full border-2 border-gray-200 px-4 py-3 rounded-xl focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all appearance-none bg-white cursor-pointer">
                            <option value="">Pilih Tahun</option>
                            <option value="2024">2024</option>
                            <option value="2023">2023</option>
                            <option value="2022">2022</option>
                        </select>
                        <svg class="absolute right-3 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400 pointer-events-none" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                        </svg>
                    </div>

                </div>

                @php
                    $dummy = [
                        ['nama' => 'Laporan Tahunan 2023', 'status' => true, 'tahun' => '2023', 'kategori' => 'Keuangan'],
                        ['nama' => 'Rekap Keuangan Q1', 'status' => false, 'tahun' => '2022', 'kategori' => 'Keuangan'],
                        ['nama' => 'Dokumen Pajak', 'status' => true, 'tahun' => '2024', 'kategori' => 'Pajak'],
                        ['nama' => 'Audit Internal', 'status' => true, 'tahun' => '2023', 'kategori' => 'Audit'],
                        ['nama' => 'Kontrak Vendor', 'status' => false, 'tahun' => '2024', 'kategori' => 'Legal'],
                    ];
                    $no = 1;
                @endphp

                {{-- LIST DOKUMEN --}}
                <div class="mt-8">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-xl font-bold text-gray-800">Daftar Dokumen</h3>
                        <span class="text-sm text-gray-500 bg-gray-100 px-3 py-1 rounded-full">{{ count($dummy) }} dokumen</span>
                    </div>

                    <div class="space-y-3">
                        @foreach ($dummy as $doc)
                            <div class="group flex items-center bg-white border-2 border-gray-100 rounded-xl p-5 hover:border-blue-500 hover:shadow-lg transition-all duration-300">

                                {{-- Nomor --}}
                                <div class="flex-shrink-0 w-12 h-12 flex items-center justify-center bg-gradient-to-br from-blue-500 to-blue-600 text-white font-sans rounded-xl mr-4 group-hover:scale-110 transition-transform">
                                    {{ $no++ }}
                                </div>

                                {{-- Info Dokumen --}}
                                <div class="flex-1 grid grid-cols-1 md:grid-cols-4 gap-4 items-center">

                                    {{-- Nama --}}
                                    <div class="md:col-span-2">
                                        <p class="font-semibold text-gray-800 text-lg group-hover:text-blue-600 transition-colors">
                                            {{ $doc['nama'] }}
                                        </p>
                                        <p class="text-sm text-gray-500 mt-1">{{ $doc['kategori'] }}</p>
                                    </div>

                                    {{-- Status --}}
                                    <div class="flex items-center">
                                        @if ($doc['status'])
                                            <span class="inline-flex items-center px-4 py-2 rounded-full bg-green-50 border border-green-200 text-green-700 text-sm font-semibold">
                                                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                                </svg>
                                                Tersedia
                                            </span>
                                        @else
                                            <span class="inline-flex items-center px-4 py-2 rounded-full bg-red-50 border border-red-200 text-red-700 text-sm font-semibold">
                                                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                                                </svg>
                                                Tidak Ada
                                            </span>
                                        @endif
                                    </div>

                                    {{-- Tahun --}}
                                    <div class="flex items-center text-gray-700">
                                        <svg class="w-5 h-5 text-gray-400 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
                                        </svg>
                                        <span class="font-semibold">{{ $doc['tahun'] }}</span>
                                    </div>

                                </div>

                                {{-- Aksi --}}
                                <a href="#" class="flex-shrink-0 ml-4 px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-xl transition-all duration-300 shadow-md hover:shadow-xl flex items-center group-hover:scale-105">
                                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"/>
                                        <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"/>
                                    </svg>
                                    Lihat
                                </a>

                            </div>
                        @endforeach
                    </div>
                </div>

            </div>

        </div>
    </div>

</x-app-layout>