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
                    <h3 class="text-lg font-semibold text-gray-700">Form Input Arsip Baru</h3>
                    <p class="text-sm text-gray-500">Lengkapi data arsip berikut dengan benar.</p>
                </div>

                <form action="{{ route('file.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf

                    {{-- id folder --}}
                    <input type="hidden" name="document_folder_id" value="{{ $folders->id }}">

                    {{-- Nama File --}}
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">
                            Nama File Arsip
                        </label>
                        <input type="text" name="name" id="name"
                            class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm"
                            placeholder="Contoh: Dokumen Pajak 2024" required>
                    </div>

                    {{-- Upload PDF --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            Upload File PDF Arsip
                        </label>
                        <input type="file" name="file_archive"
                            class="w-full block rounded-lg border border-gray-300 bg-gray-50 file:bg-indigo-600 file:text-white file:border-none file:py-2 file:px-4 file:rounded-lg file:cursor-pointer hover:file:bg-indigo-700 transition"
                            accept="application/pdf">
                        <p class="text-xs text-gray-500 mt-1">Format: PDF • Maksimal 20MB</p>
                    </div>

                    {{-- Keterangan --}}
                    <div>
                        <label for="keterangan" class="block text-sm font-medium text-gray-700 mb-1">
                            Keterangan
                        </label>
                        <input type="text" name="keterangan" id="keterangan"
                            class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm"
                            placeholder="Contoh: Arsip laporan keuangan" required>
                    </div>

                    {{-- Tombol --}}
                    <div class="flex items-center justify-between pt-4">
                        <a href="{{ route('folder.show', $folders->id) }}"
                            class="inline-flex items-center px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium rounded-lg transition shadow-sm">
                            ← Kembali
                        </a>

                        <button type="submit"
                            class="inline-flex items-center px-5 py-2 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-lg shadow-md transition">
                            + Buat File
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
