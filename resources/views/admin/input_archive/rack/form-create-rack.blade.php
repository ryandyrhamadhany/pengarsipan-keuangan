<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ __('Input Arsip') }}
        </h2>
    </x-slot>

    <div class="py-10 bg-gray-50">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-md sm:rounded-xl p-8 border border-gray-200">

                <form action="{{ route('rak.store') }}" method="POST" class="space-y-6">
                    @csrf

                    <input type="text" value="{{ $year->id }}" name="year_id" class="hidden">

                    {{-- Nama Rak --}}
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">
                            Nama Rak Arsip
                        </label>
                        <input type="text" name="name" id="name"
                            class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm"
                            placeholder="Masukkan nama rak arsip" required>
                    </div>

                    {{-- Kategori Arsip --}}
                    {{-- <div>
                        <label for="category" class="block text-sm font-medium text-gray-700 mb-1">
                            Kategori Arsip
                        </label>

                        <select name="category_id" id="category"
                            class="w-full rounded-lg border-gray-300 bg-white focus:border-indigo-500 focus:ring-indigo-500 shadow-sm">
                            <option value="" disabled selected>Pilih kategori</option>

                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">
                                    {{ $category->category_name }}
                                </option>
                            @endforeach
                        </select>
                    </div> --}}

                    {{-- Kode Rak --}}
                    <div>
                        <label for="kode_rack" class="block text-sm font-medium text-gray-700 mb-1">
                            Kode Rak Arsip
                        </label>
                        <input type="text" name="kode_rack" id="kode_rack"
                            class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm"
                            placeholder="Masukkan kode rak" required>
                    </div>

                    {{-- Keterangan --}}
                    <div>
                        <label for="keterangan" class="block text-sm font-medium text-gray-700 mb-1">
                            Keterangan
                        </label>
                        <input type="text" name="keterangan" id="keterangan"
                            class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm"
                            placeholder="Masukkan keterangan" required>
                    </div>

                    {{-- Tombol --}}
                    <div class="flex items-center justify-between pt-4">
                        <a href="{{ route('year.show', $year->id) }}"
                            class="inline-flex items-center px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium rounded-lg transition">
                            ← Kembali
                        </a>

                        <button type="submit"
                            class="inline-flex items-center px-5 py-2 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-lg shadow transition">
                            + Buat Rak
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</x-app-layout>
