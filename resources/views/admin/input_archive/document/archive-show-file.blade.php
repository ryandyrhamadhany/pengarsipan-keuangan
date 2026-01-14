<x-app-layout>
    <x-slot name="header">
<<<<<<< HEAD
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
=======
        <h2 class="font-semibold text-xl leading-tight">
>>>>>>> main
            {{ __('Detail Arsip') }}
        </h2>
    </x-slot>

    {{-- TOMBOL KEMBALI --}}
    <div class="#">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-2">
<<<<<<< HEAD
            <a href="{{ route('folder.show', $archives->document_folder_id) }}"
=======
            <a href="{{ route('archive.list', $archives->folder_id) }}"
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
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Main Card dengan Gradient Border -->
            <div class="relative bg-white shadow-2xl rounded-2xl overflow-hidden border-2 border-transparent bg-clip-padding">
                <!-- Gradient Border Effect -->
                <div class="absolute inset-0 bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 opacity-20 blur-xl"></div>
                
                <div class="relative p-8 md:p-10">
                    
                    <!-- Header Section -->
                    <div class="mb-8 pb-6 border-b-2 border-gray-100">
                        <div class="flex items-start justify-between">
                            <div>
                                <h3 class="text-2xl font-bold text-gray-800 mb-2">Informasi Arsip</h3>
                                <p class="text-sm text-gray-500 flex items-center gap-2">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                                    </svg>
                                    Detail lengkap file arsip yang tersimpan pada sistem
                                </p>
=======
    {{-- CONTENT --}}
    <div class="min-h-screen">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- MAIN CARD --}}
            <div class="relative bg-white shadow-2xl rounded-3xl overflow-hidden border border-gray-100">
                
                <div class="relative z-10 p-8 md:p-12 bg-gradient-to-br from-indigo-50 via-purple-50 to-blue-50">

                    {{-- HEADER INFO --}}
                    <div class="mb-10 pb-8 border-b border-gray-200 flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                        <div>
                            <div class="flex items-center gap-3 mb-3">
                                <div class="w-12 h-12 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-2xl flex items-center justify-center shadow-lg">
                                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                            d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                                <h3 class="text-xl font-semibold bg-gradient-to-r from-gray-800 to-gray-600 bg-clip-text text-transparent">
                                    Informasi Arsip
                                </h3>
                            </div>
                            <p class="text-sm text-gray-500 flex items-center gap-2 ml-1">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                        clip-rule="evenodd"/>
                                </svg>
                                Detail lengkap file arsip yang tersimpan
                            </p>
                        </div>

                        {{-- STATUS BADGE --}}
                         @if ($archives->file_path)
                            <span class="hidden md:inline-flex items-center gap-2 bg-green-500 text-white text-sm font-semibold px-5 py-2 rounded-full shadow-lg">
                                ✓ Aktif
                            </span>
                        @else
                            <span class="hidden md:inline-flex items-center gap-2 bg-amber-500 text-white text-sm font-semibold px-5 py-2 rounded-full shadow-lg">
                                ⏳ Menunggu Upload
                            </span>
                        @endif
                    </div>

                    {{-- CONTENT GRID --}}
                    <div class="space-y-8">

                        {{-- NAMA FILE --}}
                        <div class="bg-white/90 backdrop-blur p-6 rounded-xl border border-gray-200 shadow-sm">
                            <div class="flex items-start gap-3">
                                <div class="w-10 h-10 bg-indigo-500 rounded-xl flex items-center justify-center flex-shrink-0 shadow-md">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-semibold text-indigo-900 mb-1">Nama Arsip</p>
                                    <p class="text-lg font-bold text-gray-800 break-words">
                                        {{ $archives->file_name }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        {{-- FILE ARSIP --}}
                        <div class="bg-white p-6 rounded-2xl border-2 border-gray-200 shadow-sm hover:shadow-md transition-shadow">
                            <div class="flex items-center gap-3 mb-4">
                                <div class="w-10 h-10 bg-blue-500 rounded-xl flex items-center justify-center shadow-md">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                    </svg>
                                </div>
                                <p class="text-sm font-semibold text-gray-700">File Arsip</p>
>>>>>>> main
                            </div>
                            <!-- Badge Status -->
                            <div class="hidden md:block">
                                @if ($archives->path_file)
                                    <span class="inline-flex items-center gap-2 bg-gradient-to-r from-green-400 to-emerald-500 text-white text-sm font-semibold px-5 py-2 rounded-full shadow-lg animate-pulse">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        Aktif
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-2 bg-gradient-to-r from-amber-400 to-orange-500 text-white text-sm font-semibold px-5 py-2 rounded-full shadow-lg">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                        </svg>
                                        Menunggu Upload
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>

<<<<<<< HEAD
                    <!-- Nama File Section dengan Icon -->
                    <div class="mb-8 p-6 bg-gradient-to-br from-indigo-50 to-purple-50 rounded-xl border border-indigo-100 shadow-sm hover:shadow-md transition-all duration-300">
                        <div class="flex items-start gap-4">
                            <div class="w-10 h-10 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-lg flex items-center justify-center flex-shrink-0 shadow-lg">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <p class="text-sm font-semibold mb-1 uppercase tracking-wide">Nama Arsip</p>
                                <p class="text-xl font-bold text-gray-800 break-words">
                                    {{ $archives->name_file }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- File Status & Actions -->
                    <div class="mb-8 p-6 bg-white rounded-xl border-2 border-gray-100 shadow-sm hover:shadow-lg transition-all duration-300">
                        <div class="flex items-center gap-3 mb-4">
                            <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                            </svg>
                            <p class="text-lg font-bold text-gray-700">File Arsip</p>
                        </div>

                        @if ($archives->path_file)
                            <div class="space-y-4">
                                <!-- File Info -->
                                <div class="flex items-center gap-2 p-4 bg-green-50 rounded-lg border border-green-200">
                                    <svg class="w-5 h-5 text-green-600 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                    <div class="flex-1">
                                        <p class="text-sm text-green-700 font-medium">File tersedia:</p>
                                        <p class="text-sm text-green-800 font-semibold break-all">{{ basename($archives->path_file) }}</p>
                                    </div>
                                </div>

                                <!-- Action Buttons -->
                                <div class="flex flex-wrap gap-3">
                                    <a href="{{ asset('storage/' . $archives->path_file) }}" target="_blank"
                                        class="group relative inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white font-semibold rounded-xl transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                        </svg>
                                        Lihat File
                                        <span class="absolute inset-0 rounded-xl bg-white opacity-0 group-hover:opacity-20 transition-opacity"></span>
                                    </a>

                                    <a href="{{ route('archive.download', $archives->id) }}"
                                        class="group relative inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-indigo-500 to-purple-600 hover:from-indigo-600 hover:to-purple-700 text-white font-semibold rounded-xl transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                                        </svg>
                                        Download
                                        <span class="absolute inset-0 rounded-xl bg-white opacity-0 group-hover:opacity-20 transition-opacity"></span>
                                    </a>
                                </div>
                            </div>
                        @else
                            <!-- Upload Section -->
                            <div class="space-y-4">
                                <div class="flex items-center gap-2 p-4 bg-amber-50 rounded-lg border border-amber-200">
                                    <svg class="w-5 h-5 text-amber-600 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                    </svg>
                                    <p class="text-sm text-amber-800 font-semibold">File belum diupload. Silakan upload file PDF arsip.</p>
                                </div>

                                <!-- Upload Form -->
                                <form action="{{ route('archive.upload.store', $archives->id) }}" method="POST"
                                    enctype="multipart/form-data"
                                    class="p-6 bg-gradient-to-br from-indigo-50 to-purple-50 rounded-xl border-2 border-dashed border-indigo-300 space-y-4 hover:border-indigo-400 transition-all duration-300">
                                    @csrf

                                    <label class="block text-sm font-bold text-indigo-900 mb-3 flex items-center gap-2">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
                                        </svg>
                                        Upload File PDF Arsip
                                    </label>

                                    <label class="group relative flex flex-col items-center justify-center gap-3 w-full px-6 py-8 bg-white border-2 border-indigo-300 border-dashed rounded-xl cursor-pointer hover:bg-indigo-50 hover:border-indigo-500 transition-all duration-300 shadow-sm hover:shadow-md">
                                        <div class="w-16 h-16 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-2xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform duration-300">
                                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
                                            </svg>
                                        </div>
                                        <div class="text-center">
                                            <span class="text-base font-bold text-indigo-700">Pilih File PDF</span>
                                            <p class="text-xs text-gray-500 mt-1">Klik atau drag & drop file PDF Anda di sini</p>
                                        </div>
                                        <input type="file" name="file_archive" class="hidden" accept="application/pdf" required>
                                    </label>

                                    <button type="submit"
                                        class="group relative w-full inline-flex items-center justify-center gap-2 px-6 py-4 bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 text-white text-base font-bold rounded-xl transition-all duration-300 shadow-xl hover:shadow-2xl transform hover:-translate-y-1">
                                        <svg class="w-6 h-6 group-hover:rotate-12 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                                        </svg>
                                        Upload Sekarang
                                        <span class="absolute inset-0 rounded-xl bg-white opacity-0 group-hover:opacity-20 transition-opacity"></span>
                                    </button>
                                </form>
                            </div>
                        @endif
                    </div>

                    <!-- Keterangan Section -->
                    <div class="mb-8 p-6 bg-gradient-to-br from-gray-50 to-blue-50 rounded-xl border border-gray-200 shadow-sm hover:shadow-md transition-all duration-300">
                        <div class="flex items-center gap-3 mb-4">
                            <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                            <p class="text-lg font-bold text-gray-700">Keterangan</p>
                        </div>
                        <div class="p-4 bg-white rounded-lg border border-gray-200 text-gray-700 leading-relaxed shadow-sm">
                            {{ $archives->keterangan }}
                        </div>
                    </div>

                        <!-- Action Buttons -->
                        <div class="text-right">
                            <!-- Edit -->
                            <a href="{{ route('file.edit', $archives->id) }}"
                                class="group relative inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white font-semibold rounded-xl transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                </svg>
                                Edit
                                <span class="absolute inset-0 rounded-xl bg-white opacity-0 group-hover:opacity-20 transition-opacity"></span>
                            </a>

                            <!-- Hapus -->
                            <form action="{{ route('file.destroy', $archives->id) }}" method="POST"
                                onsubmit="return confirm('⚠️ Yakin ingin menghapus file ini? Data yang dihapus tidak dapat dikembalikan!')"
                                class="inline-block">
                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                    class="group relative inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 text-white font-semibold rounded-xl transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                                    <svg class="w-5 h-5 group-hover:rotate-12 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                    </svg>
                                    Hapus
                                    <span class="absolute inset-0 rounded-xl bg-white opacity-0 group-hover:opacity-20 transition-opacity"></span>
                                </button>
                            </form>
                        </div>
=======
                            @if ($archives->file_path)
                            <div class="bg-green-50 p-5 rounded-xl border border-green-200 mb-4">
                                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                            
                                    {{-- KIRI: Info File --}}
                                    <div>
                                        <div class="flex items-center gap-3 mb-2">
                                            <svg class="w-5 h-5 text-green-600 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <p class="text-sm font-semibold text-green-800">
                                                File tersedia
                                            </p>
                                        </div>
                            
                                        <p class="text-green-700 font-medium text-sm ml-8 break-all">
                                            {{ basename($archives->file_path) }}
                                        </p>
                                    </div>
                            
                                    {{-- KANAN: Tombol --}}
                                    <div class="flex gap-3 justify-end">
                                        <a href="{{ route('archive.looks', $archives->file_path) }}" target="_blank"
                                           class="group inline-flex items-center gap-2 px-5 py-2.5
                                                  bg-blue-600 hover:bg-blue-700
                                                  text-white text-sm font-semibold
                                                  rounded-lg shadow transition">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                      d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                      d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                            </svg>
                                            Lihat
                                        </a>
                            
                                        <a href="{{ route('file.download.archive', $archives->id) }}"
                                           class="group inline-flex items-center gap-2 px-5 py-2.5
                                                  bg-indigo-600 hover:bg-indigo-700
                                                  text-white text-sm font-semibold
                                                  rounded-lg shadow transition">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                      d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                                            </svg>
                                            Download
                                        </a>
                                    </div>
                            
                                </div>
                            </div>
                            
                            @else
                                {{-- UPLOAD --}}
                                <div class="p-4 bg-amber-50 rounded-lg border border-amber-200 text-amber-800 text-sm font-semibold mb-4">
                                    File belum tersedia, silakan upload file PDF arsip.
                                </div>

                                <form action="{{ route('archive.upload.store', $archives->id) }}"
                                    method="POST"
                                    enctype="multipart/form-data"
                                    class="p-4 bg-white/90 backdrop-blur rounded-xl border-2 border-dashed border-indigo-300 space-y-4">
                                    @csrf
                            
                                    <label class="block text-sm font-bold text-indigo-900">Upload File PDF Arsip</label>
                                    <input type="file" name="file_archive" accept="application/pdf" required
                                        class="w-full file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-indigo-600 file:text-white
                                            hover:file:bg-indigo-700 text-sm text-gray-700 bg-white border border-indigo-300
                                            rounded-lg cursor-pointer focus:outline-none focus:ring-2 focus:ring-indigo-400 transition">
                                    <p class="text-xs text-gray-500">Format: PDF • Maksimal 20MB</p>
                                </form>
                            @endif
                        </div>

                        {{-- KETERANGAN --}}
                        <div class="bg-white/90 backdrop-blur p-6 rounded-xl border border-gray-200 shadow-sm">
                            <div class="flex items-center gap-3 mb-4">
                                <div class="w-10 h-10 bg-slate-500 rounded-xl flex items-center justify-center shadow-md">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                    </svg>
                                </div>
                                <p class="text-sm font-semibold text-gray-700">Keterangan</p>
                            </div>
                            <div class="bg-white p-5 rounded-xl border border-gray-200 text-gray-700 leading-relaxed shadow-sm">
                                {{ $archives->keterangan }}
                            </div>
                        </div>

                    </div>

                    {{-- AKSI --}}
                    <div class="flex flex-wrap gap-3 pt-10 mt-10 border-t-2 border-gray-200">
                        <a href="{{ route('file.edit', $archives->id) }}"
                            class="group inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white font-semibold rounded-xl shadow-md hover:shadow-lg transition-all duration-300 hover:-translate-y-0.5 active:scale-95">
                            <svg class="w-5 h-5 transition-transform group-hover:rotate-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                            </svg>
                            Edit Arsip
                        </a>

                        <form action="{{ route('file.destroy', $archives->id) }}" method="POST"
                            onsubmit="return confirm('⚠️ Apakah Anda yakin ingin menghapus arsip ini? Tindakan ini tidak dapat dibatalkan!')">
                            @csrf
                            @method('DELETE')

                            <button class="group inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 text-white font-semibold rounded-xl shadow-md hover:shadow-lg transition-all duration-300 hover:-translate-y-0.5 active:scale-95">
                                <svg class="w-5 h-5 transition-transform group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                </svg>
                                Hapus Arsip
                            </button>
                        </form>
                    </div>

>>>>>>> main
                </div>
            </div>

        </div>
    </div>
</x-app-layout>