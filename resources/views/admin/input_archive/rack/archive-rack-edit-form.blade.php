<x-app-layout>
    {{-- HEADER --}}
    <x-slot name="header">
<<<<<<< HEAD
        <h2 class="font-bold text-xl text-gray-900 tracking-tight">
            {{ __('Edit Rak Arsip') }}
=======
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Input Arsip') }}
>>>>>>> main
        </h2>
    </x-slot>

    {{-- TOMBOL KEMBALI --}}
    <div class="#">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-2">
<<<<<<< HEAD
            <a href="{{ route('year.show', $raks->year_id) }}"
=======
            <a href="{{ route('year.show', $rack->category_id) }}"
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

    <div class="py-6 min-h-screen">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- CARD UTAMA --}}
            <div class="rounded-3xl shadow-2xl overflow-hidden border border-gray-100 bg-white">

                {{-- HEADER GRADIENT --}}
                <div class="relative bg-gradient-to-b from-[#003A8F] to-[#002766] p-8 py-6">
                    <div class="flex items-center gap-4">
                        <div
                            class="w-12 h-12 bg-white/20 backdrop-blur rounded-xl flex items-center justify-center shadow-lg">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2
                                       m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2"/>
                            </svg>
                        </div>

                        <div>
                            <h3 class="text-xl font-semibold text-white">
                                Edit Rak Arsip
                            </h3>
                            <p class="text-orange-100 mt-1">
                                Kode Rak: <span class="font-semibold">{{ $raks->kode_rack }}</span>
                            </p>
                        </div>
=======

    {{-- CONTENT --}}
    <div class="min-h-screen">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- CARD --}}
            <div class="bg-white rounded-3xl border border-gray-100 shadow-2xl overflow-hidden">

                {{-- CARD HEADER --}}
                <div class="bg-gradient-to-b from-[#003A8F] to-[#002766] px-8 py-6">
                    <div class="flex items-center gap-4">
                        <div
                            class="w-12 h-12 rounded-xl bg-white/20 backdrop-blur
                                   flex items-center justify-center shadow-lg">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor"
                                 viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5
                                         a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9
                                         a2 2 0 00-2-2M5 11V9a2 2 0 012-2
                                         m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-white">
                            Edit Rak Arsip
                        </h3>
                    </div>
                </div>

                {{-- FORM --}}
                <form action="{{ route('rack.update', $rack->id) }}"
                      method="POST"
                      class="p-8 space-y-6">
                    @csrf
                    @method('PUT')

                    {{-- NAMA RAK --}}
                    <div class="group">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Nama Rak Arsip
                        </label>
                        <input type="text" name="name" value="{{ $rack->rack_name }}"
                            class="w-full rounded-xl border-2 border-gray-200
                            focus:border-amber-500 focus:ring-4 focus:ring-amber-100
                            transition px-4 py-2"
                            placeholder="Masukkan nama rak arsip" required>
                        <p class="mt-2 text-xs text-gray-500">
                            Perbarui nama rak sesuai kebutuhan
                        </p>
>>>>>>> main
                    </div>
                </div>

<<<<<<< HEAD
                {{-- FORM --}}
                <div class="p-8 sm:p-6">
                    <form action="{{ route('rak.update', $raks->id) }}" method="POST" class="space-y-6">
                        @csrf
                        @method('PUT')

                        {{-- NAMA RAK --}}
                        <div class="group">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Nama Rak Arsip
                            </label>
                            <input type="text" name="name" value="{{ $raks->rack_name }}"
                                class="w-full rounded-xl border-2 border-gray-200
                                focus:border-amber-500 focus:ring-4 focus:ring-amber-100
                                transition px-4 py-2"
                                placeholder="Rak A1, Rak Utama, dll" required>
                            <p class="mt-2 text-xs text-gray-500">
                                Perbarui nama rak sesuai kebutuhan
                            </p>
                        </div>

                        {{-- KODE RAK --}}
                        <div class="group">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Kode Rak Arsip
                            </label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-gray-400 font-mono">#</span>
                                <input type="text" name="kode_rack" value="{{ $raks->kode_rack }}"
                                    class="w-full pl-10 pr-4 py-2 rounded-xl border-2 border-gray-200
                                    focus:border-orange-500 focus:ring-4 focus:ring-orange-100
                                    transition font-mono"
                                    placeholder="RAK-001" required>
                            </div>
                            <p class="mt-2 text-xs text-gray-500">
                                Kode unik untuk identifikasi rak
                            </p>
                        </div>

                        {{-- KETERANGAN --}}
                        <div class="group">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Keterangan
                            </label>
                            <textarea name="keterangan" rows="2"
                                class="w-full rounded-xl border-2 border-gray-200
                                focus:border-red-500 focus:ring-4 focus:ring-red-100
                                transition px-4 py-2 resize-none"
                                placeholder="Deskripsi lokasi atau jenis dokumen..." required>{{ $raks->keterangan }}</textarea>
                            <p class="mt-2 text-xs text-gray-500">
                                Informasi tambahan tentang rak
                            </p>
                        </div>

                        {{-- AKSI --}}
                        <div class="flex flex-col sm:flex-row justify-between items-center gap-4 pt-4 border-t">
                            <p class="text-sm text-gray-500 flex items-center gap-2">
                                <svg class="w-5 h-5 text-amber-500" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 9v2m0 4h.01m-6.938 4h13.856"/>
                                </svg>
                                Perubahan akan tersimpan permanen
                            </p>

                            <div class="flex gap-3 w-full sm:w-auto">
                                <button type="submit"
                                class="flex-1 sm:flex-none inline-flex items-center justify-center gap-2 px-4 py-2 bg-gradient-to-r from-amber-600 to-orange-600 hover:from-amber-700 hover:to-orange-700 text-white font-semibold rounded-lg shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200">
                                    Update
                                </button>

                                <a href="{{ route('year.show', $raks->year_id) }}"
                                    class="flex-1 sm:flex-none inline-flex items-center justify-center gap-2 px-4 py-2 bg-gradient-to-r from-gray-200 to-gray-300 hover:from-gray-300 hover:to-gray-400 text-gray-700 font-semibold rounded-lg shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200">
                                    Batal
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
=======
                    {{-- AKSI --}}
                    <div class="pt-6 border-t flex flex-col sm:flex-row
                                items-center justify-between gap-4">

                        <p class="flex items-center gap-2 text-sm text-gray-500">
                            <svg class="w-5 h-5 text-amber-500" fill="none"
                                 stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M12 9v2m0 4h.01m-6.938 4h13.856" />
                            </svg>
                            Perubahan akan tersimpan permanen
                        </p>

                        <div class="flex gap-3 w-full sm:w-auto">
                            <button type="submit"
                                class="flex-1 sm:flex-none inline-flex items-center justify-center
                                       px-8 py-2.5 rounded-lg font-semibold text-white
                                       bg-gradient-to-r from-amber-600 to-orange-600
                                       hover:from-amber-700 hover:to-orange-700
                                       shadow-lg hover:shadow-xl
                                       transform hover:-translate-y-0.5 transition">
                                Update
                            </button>

                            <a href="{{ route('year.show', $rack->category_id) }}"
                               class="flex-1 sm:flex-none px-6 py-2.5 text-center
                                      rounded-lg font-semibold text-gray-700
                                      bg-gray-300 hover:bg-gray-400
                                      shadow-lg hover:shadow-xl
                                      transform hover:-translate-y-0.5 transition">
                                Batal
                            </a>
                        </div>
                    </div>
                </form>
>>>>>>> main
            </div>

        </div>
    </div>
</x-app-layout>
