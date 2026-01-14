<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Pengajuan') }}
        </h2>
    </x-slot>

    {{-- TOMBOL KEMBALI --}}
    <div class="#">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-2">
            <a href="{{ route('user.worklist') }}"
                class="inline-flex items-center gap-2 bg-gray-100 text-gray-700 px-2 py-2 rounded-full border border-gray-200
                    shadow-lg transition-all duration-200 ease-in-out hover:bg-gray-400 hover:shadow-md active:bg-gray-300 active:scale-95">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
            </a>             
        </div>
    </div>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            {{-- MAIN CARD --}}
            <div class="bg-white overflow-hidden shadow-2xl rounded-3xl border border-gray-200">
                <div class="relative bg-gradient-to-b from-[#003A8F] to-[#002766] p-6 overflow-hidden">
                    {{-- Background Pattern --}}
                    <div class="absolute inset-0 opacity-10">
                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg">
                            <defs>
                                <pattern id="grid" width="40" height="40" patternUnits="userSpaceOnUse">
                                    <path d="M 40 0 L 0 0 0 40" fill="none" stroke="white" stroke-width="1"/>
                                </pattern>
                            </defs>
                            <rect width="100%" height="100%" fill="url(#grid)"/>
                        </svg>
                    </div>

                    {{-- Header Content --}}
                    <div class="relative z-10">
                        <div class="flex items-start gap-4">
                            <div class="p-2 bg-white/20 backdrop-blur-sm rounded-lg shadow-lg">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                </svg>
                            </div>
                            <div>
                                <h2 class="text-xl font-semibold text-white">
                                    Edit/Perbaiki Pengajuan Keuangan
                                </h2>
                                <p class="text-sm text-amber-100 mt-1">
                                    Perbarui informasi pengajuan Anda dengan data terbaru
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="p-6 bg-gradient-to-br from-gray-50 to-orange-50/20">
                    <form action="{{ route('pengajuan.update', $pengajuan->id) }}" method="POST"
                        enctype="multipart/form-data" class="space-y-6">
                        @method('PUT')
                        @csrf

                        {{-- Nama Pengajuan --}}
                        <div class="bg-white rounded-xl shadow-lg border-2 border-gray-200 p-6 hover:shadow-xl transition-all duration-300">
                            <div class="flex items-center gap-3 mb-4">
                                <div class="p-3 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-xl shadow-md">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"/>
                                    </svg>
                                </div>
                                <div>
                                    <label class="text-gray-700 font-semibold">Nama Pengajuan</label>
                                    <p class="text-xs text-gray-500 mt-1">Step 1 dari 2</p>
                                </div>
                            </div>
                            
                            <div class="space-y-3">
                                <input type="text" name="nama_pengajuan" value="{{ $pengajuan->pengajuan_name }}"
                                    class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-400 focus:border-blue-400 focus:outline-none"
                                    placeholder="Contoh: Pengajuan Pembelian Alat Tulis Kantor" required>
                                
                                <div class="bg-blue-50 rounded-lg p-3 border border-blue-200">
                                    <div class="flex items-start gap-2">
                                        <svg class="w-4 h-4 text-blue-600 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                        <p class="text-xs text-blue-800">
                                            <span class="font-semibold">Tips:</span> Gunakan nama yang jelas dan deskriptif agar mudah diidentifikasi
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- File Upload --}}
                        <div class="bg-white rounded-xl shadow-lg border-2 border-gray-200 p-6 hover:shadow-xl transition-all duration-300">
                            <div class="flex items-center gap-3 mb-4">
                                <div class="p-3 bg-gradient-to-br from-red-500 to-pink-600 rounded-xl shadow-md">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                                <div>
                                    <label class="text-gray-700 font-semibold">File PDF Pengajuan</label>
                                    <p class="text-xs text-gray-500 mt-1">Step 2 dari 2</p>
                                </div>
                            </div>

                            {{-- File Saat Ini --}}
                            @if ($pengajuan->path_file_pengajuan)
                                <div class="mb-6">
                                    <p class="text-sm font-semibold text-gray-700 mb-3 flex items-center gap-2">
                                        <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                        File Saat Ini
                                    </p>
                                    <div class="bg-gradient-to-r from-green-50 to-emerald-50 rounded-lg p-4 mb-4 border-2 border-green-200 shadow-sm">
                                        <div class="flex items-center justify-between gap-4">
                                            <div class="flex items-center gap-4 flex-1 min-w-0">
                                                <div class="p-2 bg-white rounded-lg shadow-md border border-blue-400">
                                                    <svg class="w-7 h-7 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                                                    </svg>
                                                </div>
                                                <div class="flex-1 min-w-0">
                                                    <p class="text-xs text-gray-500 mb-1">File Saat Ini:</p>
                                                    <p class="text-sm font-bold text-gray-900 break-all">
                                                        {{ basename($pengajuan->path_file_pengajuan) }}
                                                    </p>
                                                </div>
                                            </div>

                                            <a href="{{ route('view.file', $pengajuan->id) }}" target="_blank"
                                                class="group flex-shrink-0 inline-flex items-center gap-2 px-5 py-3 bg-gradient-to-r from-blue-500 to-indigo-600 text-white text-sm font-semibold rounded-xl shadow-lg hover:shadow-xl hover:scale-105 transition-all duration-300">
                                                <svg class="w-5 h-5 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                                </svg>
                                                Lihat File
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            {{-- Upload File Baru --}}
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-3 flex items-center gap-2">
                                    <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    {{ $pengajuan->path_file_pengajuan ? 'Upload File Baru (Opsional)' : 'Upload File PDF' }}
                                </label>

                                <div class="w-full px-4 py-2 border-2 border-dashed border-blue-400 rounded-xl bg-blue-50 text-gray-700 font-semibold cursor-pointer
                                            focus:outline-none focus:ring-4 focus:ring-blue-300 hover:bg-blue-100 transition-all">
                                    <label for="file"
                                        class="inline-flex items-center gap-2 bg-blue-500 text-white px-5 py-2.5 rounded-lg shadow-sm cursor-pointer font-medium">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13">
                                            </path>
                                        </svg>
                                        Ganti File
                                    </label>

                                    <span id="filename" class="text-sm text-red-600 flex-1">
                                        {{ $pengajuan->path_file_pengajuan ? 'Tidak ada file baru dipilih' : 'Belum ada file dipilih' }}
                                    </span>
                                    <p class="text-xs text-gray-500 mt-3">
                                        {{ $pengajuan->path_file_pengajuan ? 'Biarkan kosong jika tidak ingin mengubah file' : 'Format file: PDF' }}
                                    </p>
                                </div>

                                <input id="file" name="file" type="file" accept="application/pdf"
                                    class="hidden"
                                    onchange="document.getElementById('filename').innerText = this.files.length ? this.files[0].name : '{{ $pengajuan->path_file_pengajuan ? 'Tidak ada file baru dipilih' : 'Belum ada file dipilih' }}'">
                            </div>
                        </div>

                        {{-- Buttons --}}
                        <div class="space-y-3 pt-2">
                            <button type="submit"
                                class="w-full bg-blue-500 text-white px-5 py-3 rounded-lg shadow-md
                                    font-semibold text-lg hover:scale-95 transition-all">
                                Simpan Perubahan
                            </button>
                            <a href="{{ route('user.worklist') }}"
                                class="w-full flex items-center justify-center gap-2 bg-gray-300 text-gray-700 px-5 py-3 rounded-lg border border-gray-300 shadow-sm hover:scale-95 transition-all font-semibold">
                                <svg class="w-5 h-5 text-gray-500 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                                Batal
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
