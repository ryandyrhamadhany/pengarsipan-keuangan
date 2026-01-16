<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Edit Sumber Dana') }}
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
                <div class="bg-gradient-to-r from-amber-500 to-orange-600 px-8 py-6">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-white">Edit Sumber Dana</h3>
                            <p class="text-amber-50 text-sm mt-0.5">Ubah informasi sumber dana yang sudah ada</p>
                        </div>
                    </div>
                </div>

                {{-- Form --}}
                <form action="{{ route('funding.update', $fundingSource->id) }}" method="POST" class="p-8 space-y-6">
                    @csrf
                    @method('PUT')

                    {{-- Funding Source Name --}}
                    <div>
                        <label for="funding_source_name" class="block text-sm font-semibold text-gray-700 mb-2">
                            Nama Sumber Dana <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="funding_source_name" id="funding_source_name"
                            value="{{ old('funding_source_name', $fundingSource->funding_source_name) }}"
                            class="w-full border-2 border-gray-300 rounded-lg px-4 py-2 text-gray-800 font-medium
                            placeholder-gray-400 focus:ring-1 focus:ring-amber-400 focus:border-amber-500
                            focus:outline-none transition-all duration-200 @error('funding_source_name') border-red-500 @enderror"
                            placeholder="Contoh: APBN">
                        @error('funding_source_name')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Sub Category --}}
                    <div>
                        <label for="sub_category" class="block text-sm font-semibold text-gray-700 mb-2">
                            Sub Kategori <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="sub_category" id="sub_category"
                            value="{{ old('sub_category', $fundingSource->sub_category) }}"
                            class="w-full border-2 border-gray-300 rounded-lg px-4 py-2 text-gray-800 font-medium
                            placeholder-gray-400 focus:ring-1 focus:ring-amber-400 focus:border-amber-500
                            focus:outline-none transition-all duration-200 @error('sub_category') border-red-500 @enderror"
                            placeholder="Contoh: Dana Operasional, Dana Hibah">
                        @error('sub_category')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Description --}}
                    <div>
                        <label for="description" class="block text-sm font-semibold text-gray-700 mb-2">
                            Deskripsi / Keterangan
                        </label>
                        <textarea name="description" id="description" rows="3"
                            class="w-full border-2 border-gray-300 rounded-lg px-4 py-3 text-gray-800 font-medium
                            placeholder-gray-400 focus:ring-1 focus:ring-amber-400 focus:border-amber-500
                            focus:outline-none transition-all duration-200 @error('description') border-red-500 @enderror"
                            placeholder="Jelaskan detail atau kepanjangan dari sumber dana ini...">{{ old('description', $fundingSource->description) }}</textarea>
                        @error('description')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Info Box --}}
                    <div class="flex items-start gap-3 p-4 bg-amber-50 rounded-lg border border-amber-200">
                        <svg class="w-5 h-5 text-amber-600 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <div class="text-sm text-amber-800">
                            <p class="font-semibold mb-1">Catatan:</p>
                            <ul class="list-disc list-inside space-y-0.5 text-xs">
                                <li>Field yang bertanda (*) wajib diisi</li>
                                <li>Pastikan nama sumber dana jelas dan mudah dipahami</li>
                                <li>Sub kategori digunakan untuk pengelompokan lebih spesifik</li>
                            </ul>
                        </div>
                    </div>

                    {{-- Action Buttons --}}
                    <div class="flex items-center justify-end gap-3 pt-4 border-t border-gray-200">
                        <button type="submit"
                            class="inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-amber-500 to-orange-600
                            text-white rounded-lg font-semibold hover:from-amber-600 hover:to-orange-700
                            transition-all duration-200 shadow-lg hover:shadow-xl">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                            Perbarui
                        </button>
                        <a href="{{ route('admin.envi') }}"
                            class="px-6 py-3 bg-gray-100 text-gray-700 rounded-lg font-semibold hover:bg-gray-200 transition-colors">
                            Batal
                        </a>
                    </div>
                </form>
            </div>

        </div>
    </div>
</x-app-layout>
