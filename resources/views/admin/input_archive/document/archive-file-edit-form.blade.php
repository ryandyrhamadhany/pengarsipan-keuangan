<x-app-layout>
    {{-- HEADER --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Input Arsip') }}
        </h2>
    </x-slot>

    {{-- TOMBOL KEMBALI --}}
    <div class="#">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-2">
            <a href="{{ route('archive.list', $file->folder_id) }}"
                class="inline-flex items-center gap-2 bg-gray-100 text-gray-700 px-2 py-2 rounded-full border border-gray-200
                    shadow-lg transition-all duration-200 ease-in-out hover:bg-gray-400 hover:shadow-md active:bg-gray-300 active:scale-95">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
            </a>             
        </div>
    </div>

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
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-white">Form Edit Arsip</h3>
                            <p class="text-sm text-indigo-100">
                                Lengkapi informasi dengan benar dan teliti
                            </p>
                        </div>
                    </div>
                </div>

                {{-- FORM --}}
                <form action="{{ route('file.update', $file->id) }}" method="POST" enctype="multipart/form-data"
                    class="p-8 space-y-6">
                    @csrf
                    @method('PUT')

                    {{-- NAMA FILE --}}
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Nama File Arsip <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="name" value="{{ $file->name_file }}" required
                            class="w-full px-4 py-2 rounded-xl border-2 border-gray-200 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-100">
                    </div>

                    {{-- FILE ARSIP --}}
                    <div class="space-y-3">
                        <label class="text-sm font-semibold text-gray-700">
                            File Arsip (PDF)
                        </label>

                        @if ($file->file_path)
                            {{-- FILE ADA --}}
                            <div class="rounded-xl border border-green-200 bg-green-50 p-4 flex justify-between items-center">
                                <p class="text-sm text-green-700 truncate">
                                    📄 {{ basename($file->file_path) }}
                                </p>

                                <a href="{{ route('archive.looks', $file->id) }}" target="_blank"
                                class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                                    Lihat
                                </a>
                            </div>
                        @else
                            {{-- FILE TIDAK ADA --}}
                            <div class="rounded-xl border border-red-200 bg-red-50 p-4 text-red-700">
                                Belum ada file PDF
                            </div>
                        @endif

                        {{-- INPUT FILE --}}
                        <div class="space-y-2">
                            <label for="file_archive"
                                class="inline-flex items-center gap-2 px-4 py-2 bg-indigo-600 text-white rounded-lg cursor-pointer hover:bg-indigo-700">
                                Ganti / Upload File
                            </label>

                            <input type="file" name="file_archive" id="file_archive"
                                class="hidden"
                                accept="application/pdf"
                                onchange="document.getElementById('file-name').innerText = this.files[0]?.name || 'Belum ada file dipilih'">

                            <p id="file-name" class="text-sm text-gray-500">
                                Belum ada file dipilih
                            </p>
                        </div>
                    </div>

                    {{-- ACTION --}}
                    <div class="flex gap-3 pt-6">
                        <button type="submit"
                            class="px-6 py-2 bg-amber-600 text-white rounded-lg hover:bg-amber-700">
                            Update
                        </button>

                        <a href="{{ route('archive.list', $file->folder_id) }}"
                        class="px-6 py-2 bg-gray-300 rounded-lg hover:bg-gray-400">
                            Batal
                        </a>
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