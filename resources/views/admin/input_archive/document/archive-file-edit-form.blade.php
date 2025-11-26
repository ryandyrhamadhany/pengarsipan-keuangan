<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ __('Input Arsip') }}
        </h2>
    </x-slot>

    <div class="py-10 bg-gray-50 min-h-screen">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg sm:rounded-xl p-10 border border-gray-200">

                {{-- Judul kecil --}}
                <div class="mb-6">
                    <h3 class="text-lg font-semibold text-gray-700">Form Edit Arsip</h3>
                    <p class="text-sm text-gray-500">Edit data arsip berikut dengan benar.</p>
                </div>

                <form action="{{ route('file.update', $file->id) }}" method="POST" enctype="multipart/form-data"
                    class="space-y-6">
                    @method('PUT')
                    @csrf

                    {{-- id folder --}}
                    {{-- <input type="hidden" name="document_folder_id" value="{{ $folders->id }}"> --}}

                    {{-- Nama File --}}
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">
                            Nama File Arsip
                        </label>
                        <input type="text" name="name" id="name" value="{{ $file->name_file }}"
                            class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm"
                            placeholder="Contoh: Dokumen Pajak 2024" required>
                    </div>

                    {{-- Upload PDF --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            File Arsip
                        </label>

                        @if ($file->path_file)
                            {{-- Jika file sudah ada --}}
                            <div class="p-4 border rounded-lg bg-green-50 border-green-200 mb-3">
                                <p class="text-sm text-green-700 font-medium flex items-center gap-2">
                                    <img src="https://img.icons8.com/?size=20&id=102550&format=png&color=2e7d32">
                                    File saat ini: <span class="underline">{{ basename($file->path_file) }}</span>
                                </p>

                                <div class="mt-2 flex gap-3">
                                    <a href="{{ asset('storage/' . $file->path_file) }}"
                                        class="px-3 py-1.5 text-sm bg-blue-600 hover:bg-blue-700 text-white rounded-lg">
                                        Lihat File
                                    </a>
                                </div>
                            </div>

                            {{-- Input file baru untuk mengganti --}}
                            <label class="block text-sm text-gray-600 mb-1">Ganti dengan file baru (opsional)</label>
                            <input type="file" name="file_archive"
                                class="w-full block rounded-lg border border-gray-300 bg-gray-50
                   file:bg-indigo-600 file:text-white file:border-none
                   file:py-2 file:px-4 file:rounded-lg file:cursor-pointer
                   hover:file:bg-indigo-700 transition"
                                accept="application/pdf">
                            <p class="text-xs text-gray-500 mt-1">Biarkan kosong jika tidak ingin mengganti.</p>
                        @else
                            {{-- Jika file TIDAK ada --}}
                            <div class="p-4 border rounded-lg bg-red-50 border-red-200 mb-3">
                                <p class="text-sm text-red-700 font-medium flex items-center gap-2">
                                    <img src="https://img.icons8.com/?size=20&id=102550&format=png&color=c62828">
                                    Tidak ada file terupload
                                </p>
                            </div>

                            <input type="file" name="file_archive"
                                class="w-full block rounded-lg border border-gray-300 bg-gray-50
                   file:bg-indigo-600 file:text-white file:border-none
                   file:py-2 file:px-4 file:rounded-lg file:cursor-pointer
                   hover:file:bg-indigo-700 transition"
                                accept="application/pdf">
                            <p class="text-xs text-gray-500 mt-1">Format: PDF • Maksimal 20MB</p>
                        @endif
                    </div>


                    {{-- Keterangan --}}
                    <div>
                        <label for="keterangan" class="block text-sm font-medium text-gray-700 mb-1">
                            Keterangan
                        </label>
                        <input type="text" name="keterangan" id="keterangan" value="{{ $file->keterangan }}"
                            class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm"
                            placeholder="Contoh: Arsip laporan keuangan" required>
                    </div>

                    {{-- Tombol --}}
                    <div class="flex items-center justify-between pt-4">
                        <a href="{{ route('folder.show', $file->document_folder_id) }}"
                            class="inline-flex items-center px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium rounded-lg transition shadow-sm">
                            ← Kembali
                        </a>

                        <button type="submit"
                            class="inline-flex items-center px-5 py-2 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-lg shadow-md transition">
                            + Edit File
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
