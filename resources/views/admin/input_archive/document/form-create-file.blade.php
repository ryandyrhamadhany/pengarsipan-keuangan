<x-app-layout>
    {{-- HEADER --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-900 tracking-tight">
            {{ __('Input Arsip') }}
        </h2>
    </x-slot>

    {{-- TOMBOL KEMBALI --}}
    <div class="#">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-2">
<<<<<<< HEAD
            <a href="{{ route('folder.show', $folders->id) }}"
=======
            <a href="{{ route('archive.list', $folders->id) }}"
>>>>>>> main
                class="inline-flex items-center gap-2 bg-gray-100 text-gray-700 px-2 py-2 rounded-full border border-gray-200
                    shadow-lg transition-all duration-200 ease-in-out hover:bg-gray-400 hover:shadow-md active:bg-gray-300 active:scale-95">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
            </a>             
        </div>
    </div>

<<<<<<< HEAD
    <div class="py-4 min-h-screen">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        
            {{-- Main Card --}}
            <div class="bg-white/90 backdrop-blur-md shadow-2xl rounded-3xl overflow-hidden border border-gray-100 transform transition-all duration-300 hover:shadow-3xl">
                
                {{-- Header Card dengan Gradient --}}
=======
    {{-- CONTENT --}}
    <div class="min-h-screen">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white/90 backdrop-blur-md shadow-2xl rounded-lg border border-gray-100 overflow-hidden transition-all duration-300 hover:shadow-3xl">
                {{-- CARD HEADER --}}
>>>>>>> main
                <div class="relative bg-gradient-to-b from-[#003A8F] to-[#002766] px-4 py-4">
                    <div class="absolute inset-0 bg-black/10"></div>
                    <div class="relative flex items-start gap-4">
                        <div class="p-2 bg-white/20 backdrop-blur-md rounded-lg shadow-xl">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
<<<<<<< HEAD
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
=======
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
>>>>>>> main
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold text-white">Form Input Arsip Baru</h3>
<<<<<<< HEAD
                        </div>
                    </div>
                    {{-- Decorative Elements --}}
                    <div class="absolute top-0 right-0 w-64 h-64 bg-white/5 rounded-full -mr-32 -mt-32"></div>
                    <div class="absolute bottom-0 left-0 w-48 h-48 bg-white/5 rounded-full -ml-24 -mb-24"></div>
                </div>

                {{-- Form Content --}}
                <form action="{{ route('file.store') }}" method="POST" enctype="multipart/form-data" class="p-8 space-y-4">
                    @csrf
                    <input type="hidden" name="document_folder_id" value="{{ $folders->id }}">

                    {{-- Nama File Section --}}
                    <div class="group relative">
                        <label for="name" class="flex items-center gap-2 text-sm font-bold text-gray-800 mb-3">
                            Nama File Arsip
                            <span class="text-red-500 text-base">*</span>
                        </label>
                        <div class="relative">
                            <input type="text" name="name" id="name"
                                class="w-full rounded-xl border-2 border-gray-200 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-100 shadow-sm transition-all duration-200 px-5 text-gray-700 font-medium placeholder:text-gray-400"
                                placeholder="Contoh: Dokumen Pajak 2024" required>
                            <div class="absolute inset-y-0 right-0 flex items-center pr-4 pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400 group-focus-within:text-indigo-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                                </svg>
                            </div>
                        </div>
                        <p class="text-xs text-gray-500 mt-2 ml-1 flex items-center gap-1.5">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            Gunakan nama yang jelas dan mudah dikenali untuk memudahkan pencarian
=======
                            <p class="text-sm text-white">Lengkapi data arsip berikut dengan benar.</p>
                        </div>
                    </div>
                </div>

                {{-- Form --}}
                <form action="{{ route('file.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6 p-6">
                    @csrf
                    <input type="hidden" name="folders_id" value="{{ $folders->id }}">

                    {{-- Nama File --}}
                    <div class="group">
                        <label class="flex items-center gap-2 text-sm font-bold text-gray-800 mb-3">
                            Nama File Arsip <span class="text-red-500">*</span>
                        </label>

                        <div class="relative">
                            <input type="text" name="name" required
                                placeholder="Contoh: Dokumen Pajak 2024"
                                class="w-full rounded-xl border-2 border-gray-200 px-5 py-2 text-gray-700 font-medium placeholder:text-gray-400 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-100 transition">
                            <div class="absolute inset-y-0 right-0 flex items-center pr-4 pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400 group-focus-within:text-indigo-500 transition"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                                </svg>
                            </div>
                        </div>

                        <p class="text-xs text-gray-500 mt-2 ml-1 flex items-center gap-1.5">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            Gunakan nama yang jelas agar mudah dicari
>>>>>>> main
                        </p>
                    </div>

                    {{-- Upload File Section --}}
                    <div class="group relative">
                        <label for="name" class="flex items-center gap-2 text-sm font-bold text-gray-800 mb-3">
                            Upload PDF Arsip
                            <span class="text-red-500 text-base">*</span>
                        </label>
                        <div class="relative">
                            <label for="file"
                                class="flex items-center gap-4 p-4 border-2 border-dashed border-gray-200 rounded-xl cursor-pointer
                                    hover:bg-gray-50 hover:border-indigo-400 transition-all duration-200">
                                <div class="flex-shrink-0 w-9 h-9 bg-indigo-600 rounded-lg flex items-center justify-center shadow-sm">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 4v16m8-8H4" />
                                    </svg>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p id="filename" class="text-sm font-semibold text-gray-700 truncate">Pilih berkas arsip...</p>
                                    <p class="text-xs text-gray-400 mt-0.5">Format PDF • Maks. 10MB </p>
                                </div>
                                <span class="hidden sm:inline-block text-xs font-semibold text-indigo-600 bg-indigo-50 px-3 py-1.5 rounded-lg">
                                    Cari File
                                </span>
                            </label>
                            <input id="file" name="file" type="file" accept="application/pdf" class="hidden" onchange="document.getElementById('filename').innerText = this.files.length ? this.files[0].name : 'Pilih berkas arsip...'" required>
                        </div>
                    </div>
                    
                    {{-- Keterangan Section --}}
                    <div class="group">
                        <label for="keterangan" class="flex items-center gap-2 text-sm font-bold text-gray-800 mb-3">
                            Keterangan / Deskripsi
                            <span class="text-red-500 text-base">*</span>
                        </label>
                        <textarea name="keterangan" id="keterangan" rows="3"
                            class="w-full rounded-xl border-2 border-gray-200 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-100 shadow-sm transition-all duration-200 px-3 text-gray-700 font-medium resize-none placeholder:text-gray-400"
                            placeholder="Contoh: Arsip laporan keuangan triwulan pertama tahun 2024. Berisi detail pendapatan, pengeluaran, dan proyeksi keuangan..." required></textarea>
                        <p class="text-xs text-gray-500 mt-2 ml-1 flex items-center gap-1.5">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            Berikan deskripsi yang detail untuk memudahkan identifikasi dokumen di kemudian hari
                        </p>
                    </div>

<<<<<<< HEAD
                    {{-- Action Buttons --}}
                    <div class="flex flex-col sm:flex-row items-center justify-between gap-4 pt-2">
                        <div class="flex items-center gap-2 text-sm text-gray-500">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <span>Semua field wajib diisi</span>
                        </div>

                        <div class="flex gap-3 w-full sm:w-auto">
                            <button type="submit"
                                class="flex-1 sm:flex-none inline-flex items-center gap-2 px-5 py-2.5 bg-gradient-to-r from-emerald-600 to-teal-600
                                hover:from-emerald-700 hover:to-teal-700 text-white font-semibold rounded-xl shadow-lg
                                hover:shadow-xl hover:-translate-y-0.5 transition">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                                </svg>
                                Simpan
                            </button>
                            <a href="{{ route('folder.show', $folders->id) }}"
                                class="flex-1 inline-flex items-center justify-center gap-2 px-5 py-2.5
                                    bg-gray-300 hover:bg-gray-400 text-gray-700 font-semibold rounded-xl
                                    shadow-lg hover:shadow-xl hover:-translate-y-0.5 transition">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                </svg>
=======
                    {{-- Keterangan --}}
                    <div>
                        <label class="flex items-center gap-2 text-sm font-bold text-gray-800 mb-3">
                            Keterangan / Deskripsi <span class="text-red-500">*</span>
                        </label>
                        <textarea name="keterangan" rows="3" required placeholder="Contoh: Arsip laporan keuangan"
                            class="w-full rounded-xl border-2 border-gray-200 px-3 py-2 text-gray-700 font-medium resize-none focus:border-indigo-500 focus:ring-4 focus:ring-indigo-100 transition"></textarea>
                    </div>

                    {{-- ACTION BUTTONS --}}
                    <div class="flex flex-col sm:flex-row items-center justify-between gap-4 pt-2">
                        <p class="flex items-center gap-2 text-sm text-gray-500">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            Semua field wajib diisi
                        </p>

                        <div class="flex gap-3 w-full sm:w-auto">
                            <button type="submit"
                                    class="flex-1 px-8 py-2.5 rounded-lg text-white font-semibold bg-gradient-to-r from-green-600 to-emerald-600 shadow-lg hover:shadow-xl hover:-translate-y-0.5 transition">
                                Simpan
                            </button>

                            <a href="{{ route('archive.list', $folders->id) }}"
                                class="flex-1 px-5 py-2.5 rounded-lg font-semibold text-gray-700 bg-gray-300 hover:bg-gray-400 shadow-lg hover:shadow-xl hover:-translate-y-0.5 transition text-center">
>>>>>>> main
                                Batal
                            </a>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <style>
        @keyframes blob {
            0%, 100% { transform: translate(0, 0) scale(1); }
            33% { transform: translate(30px, -50px) scale(1.1); }
            66% { transform: translate(-20px, 20px) scale(0.9); }
        }
        .animate-blob {
            animation: blob 7s infinite;
        }
        .animation-delay-2000 {
            animation-delay: 2s;
        }
        .animation-delay-4000 {
            animation-delay: 4s;
        }
        .border-3 {
            border-width: 3px;
        }
    </style>
</x-app-layout>