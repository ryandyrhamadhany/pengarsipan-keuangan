<x-app-layout>
    {{-- HEADER --}}
    <x-slot name="header">
<<<<<<< HEAD
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
=======
        <h2 class="font-semibold text-xl leading-tight">
>>>>>>> main
            {{ __('Input Arsip') }}
        </h2>
    </x-slot>

    {{-- TOMBOL KEMBALI --}}
    <div class="#">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-2">
<<<<<<< HEAD
            <a href="{{ route('folder.show', $file->document_folder_id) }}"
=======
            <a href="{{ route('archive.list', $file->folder_id) }}"
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
            <div class="bg-white shadow-xl rounded-2xl overflow-hidden border border-gray-100 transform transition-all duration-300 hover:shadow-2xl">
                
                {{-- Header Card --}}
                <div class="bg-gradient-to-b from-[#003A8F] to-[#002766] px-8 py-6">
                    <div class="flex items-center gap-3">
                        <div class="p-3 bg-white/20 backdrop-blur-sm rounded-xl">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
=======
    {{-- CONTENT --}}
    <div class="py-4 min-h-screen">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="bg-white rounded-2xl border border-gray-100 shadow-xl hover:shadow-2xl overflow-hidden transition duration-300">
                <div class="bg-gradient-to-b from-[#003A8F] to-[#002766] px-8 py-5">
                    <div class="flex items-center gap-3">
                        <div class="p-3 bg-white/20 backdrop-blur-sm rounded-xl">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7 a2 2 0 01-2-2V5 a2 2 0 012-2h5.586 a1 1 0 01.707.293 l5.414 5.414 a1 1 0 01.293.707 V19a2 2 0 01-2 2z" />
>>>>>>> main
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-white">Form Edit Arsip</h3>
<<<<<<< HEAD
                            <p class="text-indigo-100 text-sm">Lengkapi informasi dengan benar dan teliti</p>
                        </div>
                    </div>
                    {{-- Decorative Elements --}}
                    <div class="absolute top-0 right-0 w-64 h-64 bg-white/5 rounded-full -mr-32 -mt-32"></div>
                    <div class="absolute bottom-0 left-0 w-48 h-48 bg-white/5 rounded-full -ml-24 -mb-24"></div>
                </div>

                {{-- Form Content --}}
                <form action="{{ route('file.update', $file->id) }}" method="POST" enctype="multipart/form-data" class="p-8 space-y-8">
                    @method('PUT')
=======
                            <p class="text-sm text-indigo-100">
                                Lengkapi informasi dengan benar dan teliti
                            </p>
                        </div>
                    </div>
                </div>

                {{-- FORM --}}
                <form action="{{ route('file.update', $file->id) }}" method="POST" enctype="multipart/form-data" class="p-8 space-y-6">
>>>>>>> main
                    @csrf
                    @method('PUT')

<<<<<<< HEAD
                    {{-- Nama File --}}
                    <div class="group">
                        <label for="name" class="flex items-center gap-2 text-sm font-semibold text-gray-700 mb-2">
                            <svg class="w-5 h-5 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                            </svg>
                            Nama File Arsip
                            <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <input type="text" name="name" id="name" value="{{ $file->name_file }}"
                                class="w-full rounded-xl border-2 border-gray-200 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-100 shadow-sm transition-all duration-200 px-4 text-gray-700"
                                placeholder="Contoh: Dokumen Pajak 2024" required>
                            <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400 group-focus-within:text-indigo-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                                </svg>
                            </div>
                        </div>
                        <p class="text-xs text-gray-500 mt-1.5 ml-1">Gunakan nama yang deskriptif dan mudah dikenali</p>
                    </div>

                    {{-- Upload PDF Section --}}
                    <div class="space-y-3">
                        <label class="flex items-center gap-2 text-sm font-semibold text-gray-700">
                            <svg class="w-5 h-5 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
=======
                    {{-- NAMA FILE --}}
                    <div class="group">
                        <label class="flex items-center gap-2 text-sm font-semibold text-gray-700 mb-2">
                            <svg class="w-5 h-5 text-indigo-500" fill="none" stroke="currentColor"  viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 21h10a2 2 0 002-2V9.414 a1 1 0 00-.293-.707 l-5.414-5.414 A1 1 0 0012.586 3H7 a2 2 0 00-2 2v14 a2 2 0 002 2z" />
                            </svg>
                            Nama File Arsip <span class="text-red-500">*</span>
                        </label>

                        <div class="relative">
                            <input type="text" name="name" value="{{ $file->name_file }}" required placeholder="Contoh: Dokumen Pajak 2024"
                                class="w-full px-4 rounded-xl border-2 border-gray-200 text-gray-700 shadow-sm focus:border-indigo-500 focus:ring-4 focus:ring-indigo-100 transition" />
                        </div>

                        <p class="text-xs text-gray-500 mt-1 ml-1">Gunakan nama yang deskriptif dan mudah dikenali</p>
                    </div>

                    {{-- FILE ARSIP --}}
                    <div class="space-y-3">
                        <label class="flex items-center gap-2 text-sm font-semibold text-gray-700">
                            <svg class="w-5 h-5 text-indigo-500" fill="none" stroke="currentColor"
                                 viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M7 16a4 4 0 01-.88-7.903 A5 5 0 1115.9 6 L16 6a5 5 0 011 9.9M15 13 l-3-3m0 0l-3 3m3-3v12" />
>>>>>>> main
                            </svg>
                            File Arsip (PDF)
                        </label>

<<<<<<< HEAD
                        @if ($file->path_file)
                            {{-- File Saat Ini --}}
                            <div class="relative overflow-hidden rounded-xl border-2 border-green-200 bg-gradient-to-br from-green-50 to-emerald-50 p-5 shadow-sm">
                                <div class="absolute top-0 right-0 w-32 h-32 bg-green-200 rounded-full -mr-16 -mt-16 opacity-20"></div>
                                <div class="relative flex items-start gap-4">
                                    <div class="flex-shrink-0 p-3 bg-green-100 rounded-xl">
                                        <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <p class="text-sm font-semibold text-green-800 mb-1">File Tersedia</p>
                                        <p class="text-sm text-green-700 truncate font-medium">
                                            📄 {{ basename($file->path_file) }}
                                        </p>
                                        <div class="mt-3 flex gap-2">
                                            <a href="{{ asset('storage/' . $file->path_file) }}" target="_blank"
                                                class="inline-flex items-center gap-2 px-4 py-2 bg-white text-green-700 font-medium rounded-lg shadow-sm hover:shadow-md transition-all duration-200 border border-green-200 hover:border-green-300">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                                </svg>
                                                Lihat File
                                            </a>
                                        </div>
                                    </div>
=======
                        @if ($file->file_path)
                            {{-- File Saat Ini --}}
                            <div class="relative overflow-hidden rounded-xl border border-green-200 bg-white p-5 shadow-sm">
                                <div class="flex items-center justify-between gap-4">

                                    {{-- Kiri : Icon + Info --}}
                                    <div class="flex items-start gap-4 min-w-0">
                                        <div class="flex-shrink-0 p-3 bg-green-100 rounded-xl">
                                            <svg class="w-7 h-7 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>
                                        </div>

                                        <div class="min-w-0">
                                            <p class="text-sm font-semibold text-green-700">File Arsip Tersedia</p>
                                            <p class="text-sm text-red-700 truncate mt-1"><span class = "underline">📄 {{ basename($file->file_path) }}</span></p>
                                        </div>
                                    </div>

                                    {{-- Kanan : Tombol --}}
                                    <div class="flex-shrink-0">
                                        <a href="{{ route('archive.looks', $file->id) }}" target="_blank"
                                            class="inline-flex items-center gap-2 px-4 py-2 bg-blue-600 hover:bg-indigo-700 text-white text-sm font-medium rounded-lg shadow transition-all duration-200">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M2.458 12C3.732 7.943 7.523 5 12 5 c4.478 0 8.268 2.943 9.542 7 -1.274 4.057-5.064 7-9.542 7 -4.477 0-8.268-2.943-9.542-7z"/>
                                            </svg>
                                            Lihat File
                                        </a>
                                    </div>
>>>>>>> main
                                </div>
                            </div>
                        @endif

<<<<<<< HEAD
                            {{-- Upload File Baru --}}
                            <div class="space-y-2">
                                <label class="block text-sm font-medium text-gray-600">
                                    🔄 Ganti dengan file baru (opsional)
                                </label>
                                <div class="relative group">
                                    <input type="file" name="file_archive" id="file_archive"
                                        class="w-full block rounded-xl border-2 border-dashed border-gray-300 bg-gray-50
                                        file:mr-4 file:py-3 file:px-6
                                        file:rounded-lg file:border-0
                                        file:text-sm file:font-semibold
                                        file:bg-indigo-600 file:text-white
                                        hover:file:bg-indigo-700
                                        file:cursor-pointer file:transition-all file:duration-200
                                        cursor-pointer transition-all duration-200
                                        hover:border-indigo-400 hover:bg-indigo-50
                                        focus:outline-none focus:ring-4 focus:ring-indigo-100"
                                        accept="application/pdf">
                                </div>
                                <p class="text-xs text-gray-500 ml-1 flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    Biarkan kosong jika tidak ingin mengganti file
                                </p>
=======
                        {{-- Ganti File --}}
                        <div class="space-y-4">
                            <label class ="block text-sm font-medium text-gray-600">🔄 Ganti File (PDF)</label>

                            <div class="flex items-center gap-4">
                                <label for="file_archive"
                                    class="inline-flex items-center gap-2 px-6 py-3 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-semibold rounded-lg cursor-pointer shadow transition-all duration-200">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6 L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
                                    </svg>
                                    Ganti File
                                </label>
                                <span id="file-name" class="text-sm text-gray-500 truncate">Belum ada file dipilih</span>
>>>>>>> main
                            </div>
                        @else
                            {{-- Tidak Ada File --}}
                            <div class="relative overflow-hidden rounded-xl border-2 border-red-200 bg-gradient-to-br from-red-50 to-rose-50 p-2 shadow-sm mb-3">
                                <div class="absolute top-0 right-0 w-20 h-20 bg-red-200 rounded-full -mr-16 -mt-16 opacity-20"></div>
                                <div class="relative flex items-start gap-4">
                                    <div class="flex-shrink-0 p-2 bg-red-100 rounded-xl">
                                        <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-sm font-semibold text-red-800 mb-1">Tidak Ada File</p>
                                        <p class="text-sm text-red-700">Silakan upload file PDF untuk arsip ini</p>
                                    </div>
                                </div>
                            </div>

<<<<<<< HEAD
                            <div class="relative group">
                                <input type="file" name="file_archive" id="file_archive"
                                    class="w-full block rounded-xl border-2 border-dashed border-gray-300 bg-gray-50
                                    file:mr-4 file:py-3 file:px-6
                                    file:rounded-lg file:border-0
                                    file:text-sm file:font-semibold
                                    file:bg-indigo-600 file:text-white
                                    hover:file:bg-indigo-700
                                    file:cursor-pointer file:transition-all file:duration-200
                                    cursor-pointer transition-all duration-200
                                    hover:border-indigo-400 hover:bg-indigo-50
                                    focus:outline-none focus:ring-4 focus:ring-indigo-100"
                                    accept="application/pdf">
                            </div>
                            <p class="text-xs text-gray-500 mt-1.5 ml-1 flex items-center gap-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                Format: PDF • Maksimal 20MB
                            </p>
                        @endif
                    </div>

=======
                            <input type="file" name="file_archive" id="file_archive" class="hidden" accept="application/pdf"
                                onchange="document.getElementById('file-name').innerText = this.files[0]?.name || 'Belum ada file dipilih';">

                            <p class="text-xs text-gray-500 flex items-center gap-1 mt-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                Format PDF • Maksimal 20MB
                            </p>
                        </div>

                        {{-- kalo kebaratan code tuh ganti file mending pakai pun km ja gin pakai choosen file nih --}}
                        {{-- <input type="file" name="file_archive"
                               accept="application/pdf"
                               class="w-full rounded-xl border-2 border-dashed border-gray-300 bg-gray-50 cursor-pointer file:mr-4 file:px-6 file:py-3
                                      file:rounded-lg file:border-0 file:bg-indigo-600 file:text-white hover:file:bg-indigo-700 focus:ring-4 focus:ring-indigo-100 transition" />
                        <p class="text-xs text-gray-500 ml-1">Format PDF • Maksimal 20MB</p>
                    </div> --}}

>>>>>>> main
                    {{-- Keterangan --}}
                    <div class="group">
                        <label for="keterangan" class="flex items-center gap-2 text-sm font-semibold text-gray-700 mb-2">
                            <svg class="w-5 h-5 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"/>
                            </svg>
                            Keterangan
                            <span class="text-red-500">*</span>
                        </label>
<<<<<<< HEAD
                        <textarea name="keterangan" id="keterangan" rows="2"
                            class="w-full rounded-xl border-2 border-gray-200 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-100 shadow-sm transition-all duration-200 px-4 text-gray-700 resize-none"
                            placeholder="Contoh: Arsip laporan keuangan triwulan pertama tahun 2024" required>{{ $file->keterangan }}</textarea>
                        <p class="text-xs text-gray-500 mt-1.5 ml-1">Tambahkan deskripsi singkat tentang arsip ini</p>
                    </div>

                    {{-- Action Buttons --}}
                    <div class="flex flex-col sm:flex-row items-center justify-between gap-4 pt-4">
                        <p class="text-sm text-gray-500 flex items-center gap-2">
                            <svg class="w-5 h-5 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4
                                       c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
=======
                        <textarea name="keterangan" id="keterangan" rows="3"
                            class="w-full rounded-xl border-2 border-gray-200 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-100 shadow-sm transition-all duration-200 px-4 text-gray-700 resize-none"
                            placeholder="Contoh: Arsip laporan keuangan" required>{{ $file->description }}</textarea>
                        <p class="text-xs text-gray-500 mt-1.5 ml-1">Tambahkan deskripsi singkat tentang arsip ini</p>
                    </div>

                    {{-- ACTION --}}
                    <div class="flex flex-col sm:flex-row justify-between items-center gap-4 pt-4">
                        <p class="text-sm text-gray-500 flex items-center gap-2">
                            <svg class="w-5 h-5 text-amber-500" fill="none" stroke="currentColor"
                                 viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M12 9v2m0 4h.01
                                         m-6.938 4h13.856" />
>>>>>>> main
                            </svg>
                            Perubahan akan tersimpan permanen
                        </p>

                        <div class="flex gap-3 w-full sm:w-auto">
                            <button type="submit"
<<<<<<< HEAD
                            class="flex-1 sm:flex-none inline-flex items-center justify-center gap-2 px-4 py-2 bg-gradient-to-r from-amber-600 to-orange-600 hover:from-amber-700 hover:to-orange-700 text-white font-semibold rounded-lg shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200">
                                Update
                            </button>
                            <a href="{{ route('folder.show', $file->document_folder_id) }}"
                                class="flex-1 sm:flex-none inline-flex items-center justify-center gap-2 px-4 py-2 bg-gradient-to-r from-gray-200 to-gray-300 hover:from-gray-300 hover:to-gray-400 text-gray-700 font-semibold rounded-lg shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200">
=======
                                    class="flex-1 sm:flex-none inline-flex items-center justify-center gap-2 px-8 py-2.5 bg-gradient-to-r from-amber-600 to-orange-600 hover:from-amber-700 hover:to-orange-700 text-white font-semibold rounded-lg shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200">
                                Update
                            </button>
                            <a href="{{ route('archive.list', $file->folder_id) }}"
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
        .bg-grid-pattern {
            background-image: 
                linear-gradient(to right, #e5e7eb 1px, transparent 1px),
                linear-gradient(to bottom, #e5e7eb 1px, transparent 1px);
            background-size: 20px 20px;
        }
    </style>
</x-app-layout>