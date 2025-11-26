<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ __('Input Arsip') }}
        </h2>
    </x-slot>

    <div class="py-10 bg-gray-50">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-md sm:rounded-xl p-8 border border-gray-200">
                <form action="{{ route('folder.update', $folder->id) }}" method="POST" class="space-y-6">
                    @method('PUT')
                    @csrf

                    {{-- <input type="text" name="document_rack_id" id="" value="{{ $raks->id }}"
                        class="hidden"> --}}

                    {{-- Nama Rak Arsip --}}
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">
                            Nama Folder Arsip
                        </label>
                        <input type="text" name="name" id="name" value="{{ $folder->folder_name }}"
                            class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm"
                            placeholder="Masukkan nama folder arsip" required>
                    </div>
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">
                            Kode Folder Arsip
                        </label>
                        <input type="text" name="kode_folder" id="name" value="{{ $folder->kode_folder }}"
                            class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm"
                            placeholder="Masukkan kode folder arsip" required>
                    </div>

                    {{-- Keterangan --}}
                    <div>
                        <label for="keterangan" class="block text-sm font-medium text-gray-700 mb-1">
                            Deskripsi
                        </label>
                        <input type="text" name="deskripsi" id="keterangan" value="{{ $folder->deskripsi }}"
                            class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm"
                            placeholder="Masukkan deskripsi" required>
                    </div>

                    {{-- Tombol Aksi --}}
                    <div class="flex items-center justify-between pt-4">
                        <a href="{{ route('rak.show', $folder->document_rack_id) }}"
                            class="inline-flex items-center px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium rounded-lg transition">
                            ← Kembali
                        </a>

                        <button type="submit"
                            class="inline-flex items-center px-5 py-2 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-lg shadow transition">
                            + Edit Folder
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
