<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambahkan Kabinet') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="bg-white shadow-md sm:rounded-xl p-6 border border-gray-200">

                    <form action="{{ route('cabinet.store') }}" method="POST" class="space-y-6">
                        @csrf

                        {{-- Nama cabinet --}}
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">
                                Nama Kabinet
                            </label>
                            <input type="text" name="name" id="name"
                                class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm"
                                placeholder="Masukkan nama rak arsip" required>
                        </div>

                        {{-- Kode cabinet --}}
                        <div>
                            <label for="code" class="block text-sm font-medium text-gray-700 mb-1">
                                Kode Kabinet
                            </label>
                            <input type="text" name="code" id="code"
                                class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm"
                                placeholder="Masukkan kode rak" required>
                        </div>

                        {{-- Deskripsi --}}
                        <div>
                            <label for="deskripsi" class="block text-sm font-medium text-gray-700 mb-1">
                                Deskripsi
                            </label>
                            <input type="text" name="deskripsi" id="deskripsi"
                                class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm"
                                placeholder="Masukkan keterangan" required>
                        </div>

                        {{-- Tombol --}}
                        <div class="flex items-center justify-between pt-4">
                            <a href="{{ route('admin.archive') }}"
                                class="inline-flex items-center px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium rounded-lg transition">
                                ← Kembali
                            </a>

                            <button type="submit"
                                class="inline-flex items-center px-5 py-2 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-lg shadow transition">
                                + Buat Cabinet
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
