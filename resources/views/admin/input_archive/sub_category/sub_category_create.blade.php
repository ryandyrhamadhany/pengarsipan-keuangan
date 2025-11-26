<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ __('Input Arsip') }}
        </h2>
    </x-slot>

    <div class="py-10 bg-gray-50">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-md sm:rounded-xl p-8 border border-gray-200">
                <form action="{{ route('subcategory.store') }}" method="POST" class="space-y-6">
                    @csrf

                    <input type="text" name="category_id" value="{{ $category->id }}" class="hidden">

                    {{-- Nama Rak Arsip --}}
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">
                            Nama Sub Kategori
                        </label>
                        <input type="text" name="name" id="name"
                            class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm"
                            placeholder="Masukkan nama rak arsip" required>
                    </div>

                    {{-- Kategori --}}
                    <div>
                        <label for="kode" class="block text-sm font-medium text-gray-700 mb-1">
                            kode Sub Kategori
                        </label>
                        <input type="text" name="kode" id="kode"
                            class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm"
                            placeholder="Masukkan keterangan" required>
                    </div>

                    {{-- Keterangan --}}
                    <div>
                        <label for="Keterangan" class="block text-sm font-medium text-gray-700 mb-1">
                            Keterangan
                        </label>
                        <input type="text" name="Keterangan" id="Keterangan"
                            class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm"
                            placeholder="Masukkan keterangan" required>
                    </div>


                    {{-- Tombol Aksi --}}
                    <div class="flex items-center justify-between pt-4">
                        <a href="{{ route('category.show', $category->id) }}"
                            class="inline-flex items-center px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium rounded-lg transition">
                            ← Kembali
                        </a>

                        <button type="submit"
                            class="inline-flex items-center px-5 py-2 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-lg shadow transition">
                            + Buat Sub Kategori
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</x-app-layout>
