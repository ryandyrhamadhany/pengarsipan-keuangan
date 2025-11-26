<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ __('Detail Arsip') }}
        </h2>
    </x-slot>

    <div class="py-10 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg sm:rounded-xl p-8 border border-gray-200">

                {{-- Header --}}
                <div class="mb-6">
                    <h3 class="text-xl font-semibold text-gray-700">Informasi Arsip</h3>
                    <p class="text-sm text-gray-500">Detail lengkap file arsip yang tersimpan pada sistem.</p>
                </div>

                {{-- Nama File --}}
                <div class="mb-6">
                    <p class="text-sm font-medium text-gray-500">Nama Arsip</p>
                    <p class="text-lg font-semibold text-gray-800 mt-1">
                        {{ $archives->name_file }}
                    </p>
                </div>

                {{-- Status File dan Action --}}
                <div class="mb-6">
                    <p class="text-sm font-medium text-gray-500">File Arsip</p>

                    @if ($archives->path_file)
                        <div class="mt-2 flex items-center gap-3">

                            {{-- Badge File Exists --}}
                            <span
                                class="inline-flex items-center gap-1 bg-green-100 text-green-700 text-sm px-3 py-1 rounded-full">
                                <img src="https://img.icons8.com/?size=18&id=111700&format=png&color=2e7d32"
                                    alt="">
                                File tersedia
                            </span>

                            {{-- Lihat  --}}
                            <a href="{{ asset('storage/' . $archives->path_file) }}" target="_blank"
                                class="inline-flex items-center gap-1 px-4 py-1.5 bg-blue-600 hover:bg-blue-700 text-white text-sm rounded-lg transition">
                                <img src="https://img.icons8.com/?size=18&id=82756&format=png&color=ffffff"
                                    alt="">
                                Lihat
                            </a>

                            {{-- Download {{ route('archive.download', $archives->id) }} --}}
                            <a href="{{ route('archive.download', $archives->id) }}"
                                class="inline-flex items-center gap-1 px-4 py-1.5 bg-indigo-600 hover:bg-indigo-700 text-white text-sm rounded-lg transition">
                                <img src="https://img.icons8.com/?size=18&id=67967&format=png&color=ffffff"
                                    alt="">
                                Download
                            </a>
                        </div>
                    @else
                        <div class="mt-4">
                            <div class="flex items-center gap-2 mb-3">
                                <span
                                    class="inline-flex items-center gap-1 bg-red-100 text-red-700 text-sm px-3 py-1 rounded-full">
                                    <img src="https://img.icons8.com/?size=18&id=102550&format=png&color=b71c1c"
                                        alt="">
                                    File belum diupload
                                </span>
                            </div>

                            {{-- Custom Upload File {{ route('archive.upload.store', $archives->id) }} --}}
                            <form action="{{ route('archive.upload.store', $archives->id) }}" method="POST"
                                enctype="multipart/form-data"
                                class="bg-gray-50 p-4 rounded-lg border border-gray-200 shadow-sm space-y-3 max-w-lg">
                                @csrf

                                <label class="block text-sm font-medium text-gray-700">Upload File PDF Arsip</label>

                                <label
                                    class="flex items-center justify-center gap-2 w-xl px-3 py-3 bg-white border border-gray-300 rounded-lg cursor-pointer hover:bg-gray-100 transition shadow-sm">
                                    <img src="https://img.icons8.com/?size=20&id=23264&format=png&color=4f46e5"
                                        alt="">
                                    <span class="text-sm text-gray-700">Pilih File PDF</span>

                                    <input type="file" name="file_archive" class="hidden" accept="application/pdf"
                                        required>
                                </label>

                                <button type="submit"
                                    class="inline-flex items-center gap-1 px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded-lg transition">
                                    🚀 Upload Sekarang
                                </button>
                            </form>

                        </div>
                    @endif

                </div>

                {{-- Keterangan --}}
                <div class="mb-4">
                    <p class="text-sm font-medium text-gray-500">Keterangan</p>
                    <div class="mt-2 p-4 bg-gray-50 rounded-lg border border-gray-200 text-gray-700">
                        {{ $archives->keterangan }}
                    </div>
                </div>

                <div class="flex items-center justify-between mt-8 pt-6 border-t border-gray-200">

                    {{-- Tombol Kembali --}}
                    <a href="{{ route('folder.show', $archives->document_folder_id) }}"
                        class="inline-flex items-center gap-2 px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium rounded-lg transition shadow-sm">
                        {{-- <img src="https://img.icons8.com/?size=22&id=11596&format=png&color=4b5563" class="w-5" /> --}}
                        Kembali
                    </a>

                    {{-- Tombol Aksi --}}
                    <div class="flex items-center gap-3">

                        {{-- Edit --}}
                        <a href="{{ route('file.edit', $archives->id) }}"
                            class="inline-flex items-center gap-2 px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white font-medium rounded-lg transition shadow-sm">
                            <img src="https://img.icons8.com/?size=22&id=88584&format=png&color=ffffff"
                                class="w-5" />
                            Edit
                        </a>

                        {{-- Hapus --}}
                        <form action="{{ route('file.destroy', $archives->id) }}" method="POST"
                            onsubmit="return confirm('Yakin ingin menghapus file ini?')">
                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                class="inline-flex items-center gap-2 px-4 py-2 bg-red-500 hover:bg-red-600 text-white font-medium rounded-lg transition shadow-sm">
                                <img src="https://img.icons8.com/?size=22&id=43949&format=png&color=ffffff"
                                    class="w-5" />
                                Hapus
                            </button>
                        </form>

                    </div>

                </div>

            </div>
        </div>
    </div>
</x-app-layout>
