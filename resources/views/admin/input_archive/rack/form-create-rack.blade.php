<x-app-layout>
    <x-slot name="header">
<<<<<<< HEAD
        <h2 class="font-semibold text-xl text-gray-900 tracking-tight">
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
            <a href="{{ route('year.show', $year->id) }}"
=======
            <a href="{{ route('year.show', $category->id) }}"
>>>>>>> main
                class="inline-flex items-center gap-2 bg-gray-100 text-gray-700 px-2 py-2 rounded-full border border-gray-200
                    shadow-lg transition-all duration-200 ease-in-out hover:bg-gray-400 hover:shadow-md active:bg-gray-300 active:scale-95">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
            </a>             
        </div>
    </div>

    {{-- CONTENT --}}
    <div class="py-6 bg-gradient-to-br from-slate-50 to-emerald-50 min-h-screen">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- CARD UTAMA --}}
            <div class="bg-white rounded-3xl shadow-2xl overflow-hidden border border-gray-100">

                {{-- HEADER MENYATU --}}
                <div class="relative px-6 py-5 bg-gradient-to-b from-[#003A8F] to-[#002766]">
                    <div class="absolute inset-0 bg-black/10"></div>

                    <div class="relative flex items-center gap-4">
                        <div class="w-11 h-11 bg-white/20 backdrop-blur rounded-xl flex items-center justify-center shadow-lg">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold text-white">
                                Tambah Rak Arsip Baru
                            </h3>
                            <p class="text-sm text-emerald-100">
                                Tentukan lokasi penyimpanan arsip
                            </p>
                        </div>
                    </div>
                </div>

                {{-- FORM --}}
                <div class="p-6 sm:p-10">
<<<<<<< HEAD
                    <form action="{{ route('rak.store') }}" method="POST" class="space-y-5">
                        @csrf
                        <input type="hidden" name="year_id" value="{{ $year->id }}">

                        {{-- NAMA RAK --}}
                        <div>
                            <label for="name" class="block text-sm font-semibold text-gray-700 mb-2 flex items-center gap-2">
                                <svg class="w-5 h-5 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                                </svg>
                                Nama Rak Arsip
                            </label>
                            <input type="text" name="name"
                                class="w-full rounded-xl border-2 border-gray-200
                                focus:border-emerald-500 focus:ring-4 focus:ring-emerald-100
                                px-4 py-3 transition"
                                placeholder="Rak A1, Rak Utama, dll" required>
                        </div>

                        {{-- KODE RAK --}}
                        <div>
                            <label for="kode_rack" class="block text-sm font-semibold text-gray-700 mb-2 flex items-center gap-2">
                                <svg class="w-5 h-5 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"/>
                                </svg>
                                Kode Rak Arsip
                            </label>
                            <div class="relative">
                                <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 font-mono">#</span>
                                <input type="text" name="kode_rack"
                                    class="w-full rounded-xl border-2 border-gray-200
                                    focus:border-teal-500 focus:ring-4 focus:ring-teal-100
                                    pl-10 pr-4 py-3 font-mono transition"
                                    placeholder="RAK-001, A1-002" required>
                            </div>
                        </div>

                        {{-- KETERANGAN --}}
                        <div>
                            <label for="keterangan" class="block text-sm font-semibold text-gray-700 mb-2 flex items-center gap-2">
                                <svg class="w-5 h-5 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                                Keterangan
                            </label>
                            <textarea name="keterangan" rows="3"
                                class="w-full rounded-xl border-2 border-gray-200
                                focus:border-blue-500 focus:ring-4 focus:ring-blue-100
                                px-4 py-3 resize-none transition"
                                placeholder="Lokasi, jenis arsip, atau catatan tambahan" required></textarea>
                        </div>

                        {{-- AKSI --}}
                        <div class="flex flex-col sm:flex-row items-center justify-between gap-4 pt-4">
                            <div class="flex items-center gap-2 text-sm text-gray-500">
                                <svg class="w-5 h-5 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4"/>
                                </svg>
                                Semua field wajib diisi
                            </div>

                            <div class="flex gap-3 w-full sm:w-auto">
                                <button type="submit"
                                    class="flex-1 sm:flex-none inline-flex items-center gap-2 px-5 py-2.5
                                    bg-gradient-to-r from-emerald-600 to-teal-600
                                    hover:from-emerald-700 hover:to-teal-700
                                    text-white font-semibold rounded-xl shadow-lg
                                    hover:shadow-xl hover:-translate-y-0.5 transition">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 4v16m8-8H4"/>
                                    </svg>
                                    Simpan
                                </button>

                                <a href="{{ route('year.show', $year->id) }}"
                                    class="flex-1 inline-flex items-center justify-center gap-2 px-5 py-2.5
                                    bg-gray-300 hover:bg-gray-400 text-gray-700 font-semibold rounded-xl
                                    shadow-lg hover:shadow-xl hover:-translate-y-0.5 transition">
=======
                    <form action="{{ route('rack.store') }}" method="POST" class="space-y-6">
                        @csrf

                        <input type="text" value="{{ $category->id }}" name="year_id" class="hidden">

                        {{-- NAMA RAK --}}
                        <div>
                            <label for="name" class="block text-sm font-semibold text-gray-700 mb-2 flex items-center gap-2">
                                <svg class="w-5 h-5 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                                </svg>
                                Nama Rak Arsip
                            </label>
                            <input type="text" name="name"
                                class="w-full rounded-lg border-2 border-gray-200
                                focus:border-emerald-500 focus:ring-4 focus:ring-emerald-100
                                px-4 py-3 transition"
                                placeholder="Masukkan nama rak arsip" required>
                        </div>

                        {{-- Kode Rak
                        <div>
                            <label for="kode_rack" class="block text-sm font-medium text-gray-700 mb-1">
                                Kode Rak Arsip
                            </label>
                            <input type="text" name="kode_rack" id="kode_rack"
                                class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm"
                                placeholder="Masukkan kode rak" required>
                        </div>

                        Keterangan
                        <div>
                            <label for="keterangan" class="block text-sm font-medium text-gray-700 mb-1">
                                Keterangan
                            </label>
                            <input type="text" name="keterangan" id="keterangan"
                                class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm"
                                placeholder="Masukkan keterangan" required>
                        </div> --}}

                        {{-- AKSI --}}
                        <div class="flex flex-col sm:flex-row items-center justify-between gap-4 pt-4">
                            <div class="flex items-center gap-2 text-sm text-gray-500">
                                <svg class="w-5 h-5 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4"/>
                                </svg>
                                Semua field wajib diisi
                            </div>

                            <div class="flex gap-3 w-full sm:w-auto">
                                <button type="submit"
                                    class="flex-1 px-8 py-2.5 rounded-lg text-white font-semibold
                                           bg-gradient-to-r from-green-600 to-emerald-600
                                           shadow-lg hover:shadow-xl hover:-translate-y-0.5 transition">
                                    Simpan
                                </button>

                                <a href="{{ route('year.show', $category->id) }}"
                                    class="flex-1 px-5 py-2.5 rounded-lg font-semibold text-gray-700
                                      bg-gray-300 hover:bg-gray-400 shadow-lg hover:shadow-xl hover:-translate-y-0.5 transition text-center">
>>>>>>> main
                                    Batal
                                </a>
                            </div>
                        </div>
<<<<<<< HEAD
                    </form>
                </div>
=======

                    </form>
>>>>>>> main

            </div>
        </div>
    </div>
</x-app-layout>
