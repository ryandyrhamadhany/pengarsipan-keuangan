<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Daftar Rak Arsip') }}
        </h2>
    </x-slot>

    {{-- Tombol Kembali --}}
    <div class="#">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-2">
            <a href="{{ route('cabinet.show', $category->cabinet_id) }}"
                class="inline-flex items-center gap-2 bg-gray-100 text-gray-700 px-2 py-2 rounded-full border border-gray-200
                    shadow-lg transition-all duration-200 ease-in-out hover:bg-gray-400 hover:shadow-md active:bg-gray-300 active:scale-95">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
            </a>             
        </div>
    </div>

    <div class="py-8 bg-gray-50 min-h-screen">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 space-y-8">

            {{-- =====================================================
                 SECTION : ARSIP FISIK
            ====================================================== --}}
            <div class="bg-white shadow-md rounded-xl p-6 border border-gray-200">

                {{-- Header --}}
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-lg font-semibold text-gray-700">Arsip Fisik</h3>

                    <a href="#modalTambahRak"
                       class="inline-flex items-center gap-2 px-4 py-2
                              bg-gradient-to-r from-emerald-500 to-teal-600
                              text-white rounded-lg shadow hover:shadow-xl transition">
                        <img src="https://img.icons8.com/?size=24&id=48427&format=png&color=ffffff" class="w-5">
                        Tambah Rak Arsip
                    </a>
                </div>

                {{-- List Rak --}}
                @php $no = 1; @endphp

                @if ($racks->count() > 0)
                    <div class="space-y-3">
                        @foreach ($racks as $rak)
                            <div class="flex justify-between items-center p-4 bg-white
                                        border border-gray-300 rounded-lg shadow-sm hover:bg-gray-100 transition">

                                {{-- Info Rak --}}
                                <a href="{{ route('rack.show', $rak->id) }}"
                                   class="flex items-center gap-4 flex-1">
                                    <div class="w-8 h-8 flex items-center justify-center rounded-full
                                                bg-gradient-to-b from-[#003A8F] to-[#002766]
                                                text-white font-semibold">
                                        {{ $no++ }}
                                    </div>

                                    <div>
                                        <p class="font-semibold text-gray-800">
                                            {{ $rak->rack_name }}
                                        </p>

                                        <span class="text-sm text-indigo-700 bg-indigo-100 px-2 py-0.5 rounded">
                                            {{ $rak->category->category_name ?? '-' }}
                                        </span>
                                    </div>
                                </a>

                                {{-- Aksi --}}
                                <div class="flex gap-2">
                                    <a href="#modalEditRak-{{ $rak->id }}"
                                       class="p-2 bg-amber-500 rounded hover:bg-amber-600">
                                        <img src="https://img.icons8.com/?size=24&id=88584&format=png&color=ffffff">
                                    </a>

                                    <form action="{{ route('rack.delete', $rak->id) }}"
                                          method="POST"
                                          onsubmit="return confirm('Yakin ingin menghapus rak ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="p-2 bg-red-500 rounded hover:bg-red-600">
                                            <img src="https://img.icons8.com/?size=24&id=43949&format=png&color=ffffff">
                                        </button>
                                    </form>
                                </div>
                            </div>

                            {{-- ========== MODAL EDIT RAK ========== --}}
                            <div id="modalEditRak-{{ $rak->id }}"
                                 class="modal fixed inset-0 hidden items-center justify-center bg-black/40 z-50">
                                <div class="bg-white rounded-xl w-80 max-w-lg shadow-xl">
                                    <div class="px-6 py-4 bg-gradient-to-b from-[#003A8F] to-[#002766] rounded-t-xl text-white font-semibold">
                                        Edit Rak Arsip
                                    </div>

                                    <form action="{{ route('rack.update', $rak->id) }}"
                                          method="POST"
                                          class="p-6 space-y-5">
                                        @csrf
                                        @method('PUT')

                                        <div>
                                            <label class="text-sm font-semibold">Nama Rak Arsip</label>
                                            <input type="text" name="name" value="{{ $rak->rack_name }}"
                                                    class="w-full rounded-lg border-2  border focus:border-emerald-500
                                                    focus:ring-4 focus:ring-emerald-100 px-4 py-2 transition"
                                                    placeholder="Masukkan nama folder arsip" required>
                                        </div>

                                        <div class="flex justify-end gap-3">
                                            <button class="px-4 py-2 bg-gradient-to-b from-[#003A8F] to-[#002766] text-white rounded">
                                                Update
                                            </button>
                                            <a href="{{ route('year.show', $category->id) }}" class="px-4 py-2 bg-gray-300 rounded">Batal</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    {{-- Empty State --}}
                    <div class="mt-10 text-center bg-white rounded-2xl shadow-md border border-gray-200 py-10">
                        <div class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-br from-gray-100 to-gray-200 rounded-full mb-6 shadow-inner">
                            <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                            </svg>
                        </div>
                        <p class="text-xl font-semibold text-gray-700 mb-3">Belum Ada Rak Arsip</p>
                        <p class="text-gray-500 mb-8 max-w-md mx-auto">Tidak ada rak arsip yang tersedia. Silakan tambahkan rak pertama untuk mulai menyimpan dokumen Anda.</p>
                    </div>
                @endif
            </div>

            {{-- Section Arsip Digital --}}
            <div class="bg-white shadow-md sm:rounded-xl p-6 border border-gray-200">
                <div class="flex justify-between items-start mb-6">
                    <h3 class="text-lg font-semibold text-gray-700">Arsip Digital</h3>

                    <div class="flex items-center gap-3">
                        {{-- Tombol Tambah Arsip Digital (opsional) --}}
                        <a href="#"
                            class="inline-flex items-center gap-2 px-4 py-2 bg-gradient-to-r from-emerald-500 to-teal-600 hover:from-emerald-600 hover:to-teal-700
                                   text-white font-medium rounded-lg shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200">
                            <img src="https://img.icons8.com/?size=24&id=48427&format=png&color=ffffff"
                                class="w-5" />
                            Tambah Arsip Digital
                        </a>
                    </div>
                </div>

                {{-- Daftar Arsip Digital --}}
                @php $noDigital = 1; @endphp

                @if ($digitalarchive->count() > 0)
                    <div class="divide-y divide-gray-200 rounded-lg border border-gray-100">
                        @foreach ($digitalarchive as $archive)
                            <div
                                class="flex items-center justify-between p-4 bg-white border border-gray-400 rounded-lg shadow-sm hover:shadow-md hover:bg-gray-300 transition group">

                                {{-- Bagian Klik Utama --}}
                                <a href="#" class="flex items-center gap-4 flex-1 group-hover:text-indigo-600">
                                    <div
                                        class="w-8 h-8 flex items-center justify-center rounded-full bg-gradient-to-b from-[#003A8F] to-[#002766] text-white font-semibold">
                                        {{ $noDigital++ }}
                                    </div>
                                    <div class="space-y-2 flex-1">
                                        {{-- Nama Arsip --}}
                                        <p class="text-gray-900 font-semibold text-base leading-tight">
                                            {{ $archive->archive_name }}
                                        </p>

                                        {{-- Informasi Detail --}}
                                        <div class="flex flex-wrap items-center gap-3 text-sm text-gray-600">
                                            {{-- Diajukan Oleh --}}
                                            <span class="flex items-center gap-1.5">
                                                <img src="https://img.icons8.com/?size=16&id=23264&format=png&color=4b5563"
                                                    class="w-4 opacity-70">
                                                <span class="text-gray-500">Diajukan:</span>
                                                <span
                                                    class="font-medium text-gray-700">{{ $archive->submiter_name }}</span>
                                            </span>

                                            {{-- Divider --}}
                                            <span class="text-gray-300">•</span>

                                            {{-- Ditandatangani Oleh --}}
                                            <span class="flex items-center gap-1.5">
                                                <img src="https://img.icons8.com/?size=16&id=15544&format=png&color=4b5563"
                                                    class="w-4 opacity-70">
                                                <span class="text-gray-500">Ditandatangani:</span>
                                                <span
                                                    class="font-medium text-gray-700">{{ $archive->revenue_officer_name }}</span>
                                            </span>
                                        </div>
                                    </div>
                                </a>

                                {{-- Tombol Aksi --}}
                                <div class="flex items-center gap-2 ml-4">
                                    <a href="#"
                                        class="flex items-center justify-center bg-emerald-500 hover:bg-emerald-600 rounded-md p-2 transition"
                                        title="Lihat Detail">
                                        <img src="https://img.icons8.com/?size=24&id=85146&format=png&color=ffffff"
                                            alt="view">
                                    </a>

                                    <a href="#"
                                        class="flex items-center justify-center bg-amber-500 hover:bg-orange-600 rounded-md p-2 transition"
                                        title="Edit">
                                        <img src="https://img.icons8.com/?size=24&id=88584&format=png&color=ffffff"
                                            alt="edit">
                                    </a>

                                    <form action="#" method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus arsip digital ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="flex items-center justify-center bg-red-500 hover:bg-red-600 rounded-md p-2 transition"
                                            title="Hapus">
                                            <img src="https://img.icons8.com/?size=24&id=43949&format=png&color=ffffff"
                                                alt="delete">
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                {{-- Empty State --}}
                <div class="mt-10 text-center bg-white rounded-2xl shadow-md border border-gray-200 py-10">
                    <div class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-br from-gray-100 to-gray-200 rounded-full mb-6 shadow-inner">
                        <svg class="mx-auto mb-3 w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M3 7a2 2 0 012-2h4l2 2h8a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2V7z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M8 13h8" />
                        </svg>
                    </div>
                    <p class="text-xl font-semibold text-gray-700 mb-3">Belum Ada Arsip Digital</p>
                    <p class="text-gray-500 mb-8 max-w-md mx-auto">Tidak ada arsip digital yang tersedia. Silakan tambahkan rak pertama untuk mulai menyimpan dokumen Anda.</p>
                </div>
                @endif
            </div>
        </div>
    </div>

    {{-- ================= MODAL TAMBAH ================= --}}
    <div id="modalTambahRak"
        class="modal fixed inset-0 hidden items-center justify-center bg-black/40 z-50">
       <div class="bg-white rounded-xl w-80 max-w-lg shadow-xl">
           <div class="px-6 py-4 bg-gradient-to-b from-[#003A8F] to-[#002766] rounded-t-xl text-white font-semibold">
               Tambah Rak Arsip
           </div>

           <form action="{{ route('rack.store') }}" method="POST"
                  class="p-6 space-y-5">
                @csrf

                <input type="hidden" name="year_id" value="{{ $category->id }}">

                <div>
                    <label class="text-sm font-semibold">Nama Rak Arsip</label>
                    <input type="text" name="name"
                            class="w-full rounded-lg border-2  border focus:border-emerald-500
                            focus:ring-4 focus:ring-emerald-100 px-4 py-2 transition"
                            placeholder="Masukkan nama folder arsip" required>
                </div>

                <div class="flex justify-end gap-3">
                    <button type="submit" class="px-4 py-2 bg-gradient-to-b from-[#003A8F] to-[#002766] text-white rounded">
                        Simpan
                    </button>
                    <a href="{{ route('year.show', $category->id) }}" class="px-4 py-2 bg-gray-300 rounded">Batal</a>
                </div>
            </form>
        </div>
    </div>


    <style>
        .modal:target {
            display: flex;
        }
    </style>
</x-app-layout>
