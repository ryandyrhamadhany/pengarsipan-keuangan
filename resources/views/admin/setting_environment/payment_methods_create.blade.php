<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Tambah Metode Pembayaran') }}
        </h2>
    </x-slot>

    {{-- TOMBOL KEMBALI --}}
    <div class="#">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-2">
            <a href="{{ route('admin.envi') }}"
                class="inline-flex items-center gap-2 bg-gray-100 text-gray-700 px-2 py-2 rounded-full border border-gray-200
                    shadow-lg transition-all duration-200 ease-in-out hover:bg-gray-400 hover:shadow-md active:bg-gray-300 active:scale-95">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
            </a>             
        </div>
    </div>

    <div class="py-12 bg-gradient-to-br from-gray-50 to-gray-100 min-h-screen">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

            {{-- Main Card --}}
            <div class="bg-white shadow-xl rounded-xl overflow-hidden border border-gray-200">
                {{-- Header --}}
                <div class="bg-gradient-to-r from-emerald-500 to-teal-600 px-8 py-6">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4v16m8-8H4" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-white">Tambah Metode Pembayaran</h3>
                            <p class="text-emerald-50 text-sm mt-0.5">Isi formulir untuk menambahkan metode pembayaran
                                baru</p>
                        </div>
                    </div>
                </div>

                {{-- Form --}}
                <form action="{{ route('payment.store') }}" method="POST" class="p-8 space-y-6">
                    @csrf

                    {{-- Payment Method Name --}}
                    <div>
                        <label for="payment_method_name" class="block text-sm font-semibold text-gray-700 mb-2">
                            Nama Metode Pembayaran <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="payment_method_name" id="payment_method_name"
                            class="w-full border-2 border-gray-300 rounded-lg px-4 py-3 text-gray-800 font-medium
                            placeholder-gray-400 focus:ring-2 focus:ring-emerald-400 focus:border-emerald-500
                            focus:outline-none transition-all duration-200 @error('payment_method_name') border-red-500 @enderror"
                            placeholder="Contoh: Transfer Bank">
                        @error('payment_method_name')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Sub Category --}}
                    <div>
                        <label for="sub_category" class="block text-sm font-semibold text-gray-700 mb-2">
                            Sub Kategori <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="sub_category" id="sub_category"
                            class="w-full border-2 border-gray-300 rounded-lg px-4 py-3 text-gray-800 font-medium
                            placeholder-gray-400 focus:ring-2 focus:ring-emerald-400 focus:border-emerald-500
                            focus:outline-none transition-all duration-200 @error('sub_category') border-red-500 @enderror"
                            placeholder="Contoh: BCA, Mandiri, BNI">
                        @error('sub_category')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Description --}}
                    <div>
                        <label for="description" class="block text-sm font-semibold text-gray-700 mb-2">
                            Deskripsi / Keterangan
                        </label>
                        <textarea name="description" id="description" rows="4"
                            class="w-full border-2 border-gray-300 rounded-lg px-4 py-3 text-gray-800 font-medium
                            placeholder-gray-400 focus:ring-2 focus:ring-emerald-400 focus:border-emerald-500
                            focus:outline-none transition-all duration-200 @error('description') border-red-500 @enderror"
                            placeholder="Jelaskan detail atau kepanjangan dari metode pembayaran ini..."></textarea>
                        @error('description')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Info Box --}}
                    <div class="flex items-start gap-3 p-4 bg-emerald-50 rounded-lg border border-emerald-200">
                        <svg class="w-5 h-5 text-emerald-600 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <div class="text-sm text-emerald-800">
                            <p class="font-semibold mb-1">Catatan:</p>
                            <ul class="list-disc list-inside space-y-0.5 text-xs">
                                <li>Field yang bertanda (*) wajib diisi</li>
                                <li>Pastikan nama metode pembayaran jelas dan mudah dipahami</li>
                                <li>Sub kategori digunakan untuk pengelompokan lebih spesifik</li>
                            </ul>
                        </div>
                    </div>

                    {{-- Action Buttons --}}
                    <div class="flex items-center justify-end gap-3 pt-4 border-t border-gray-200">
                        <a href="{{ route('admin.envi') }}"
                            class="px-6 py-3 bg-gray-100 text-gray-700 rounded-lg font-semibold hover:bg-gray-200 transition-colors">
                            Batal
                        </a>
                        <button type="submit"
                            class="inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-emerald-500 to-teal-600
                            text-white rounded-lg font-semibold hover:from-emerald-600 hover:to-teal-700
                            transition-all duration-200 shadow-lg hover:shadow-xl">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                            Simpan
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</x-app-layout>
