<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Edit Kategori Arsip') }}
        </h2>
    </x-slot>

    {{-- TOMBOL KEMBALI --}}
    <div class="#">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-2">
            <a href="{{ route('cabinet.show', $cabinet->id) }}"
                class="inline-flex items-center gap-2 bg-gray-100 text-gray-700 px-2 py-2 rounded-full border border-gray-200
                    shadow-lg transition-all duration-200 ease-in-out hover:bg-gray-400 hover:shadow-md active:bg-gray-300 active:scale-95">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
            </a>             
        </div>
    </div>

    <div class="min-h-screen">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-2xl rounded-xl overflow-hidden border border-gray-200">

                {{-- Header Section --}}
                <div class="relative bg-gradient-to-b from-[#003A8F] to-[#002766] p-4">

                    <div class="relative z-10 flex items-center gap-4">
                        <div class="p-4 bg-white bg-opacity-20 rounded-2xl backdrop-blur-sm">
                            <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-white">
                                Edit Kategori
                            </h3>
                            <p class="text-pink-100 mt-2">Mengubah kategori: <span
                                    class="font-semibold">{{ $category->category_name }}</span></p>
                        </div>
                    </div>
                </div>

                {{-- FORM --}}
                <form action="{{ route('category.update', $category->id) }}" method="POST" class="p-8">
                    @csrf
                    @method('PUT')

                    <input type="hidden" name="cabinet_id" value="{{ $cabinet->id }}">
                    <div class="space-y-6">

                        {{-- Nama Kategori --}}
                        <div class="group">
                            <label for="category_name" class="flex items-center gap-2 text-gray-700 font-semibold mb-3">
                                <svg class="w-5 h-5 text-purple-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z" />
                                </svg>
                                Nama Kategori Arsip
                                <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <input type="text" name="category_name" id="category_name"
                                    value="{{ old('category_name', $category->category_name) }}"
                                    class="w-full px-5 py-2 border-2 border-gray-200 rounded-lg focus:ring-1 focus:ring-purple-500 focus:border-purple-500 transition-all duration-300 bg-gray-50 focus:bg-white pl-12"
                                    placeholder="Contoh: Surat Masuk, Laporan Keuangan, Dokumen Legal" required>
                                <svg class="absolute left-4 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400"
                                    fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z" />
                                </svg>
                            </div>
                            @error('category_name')
                                <p class="mt-2 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                            <p class="mt-2 text-xs text-gray-500 ml-1">Perubahan ini akan mempengaruhi semua data
                                terkait</p>
                        </div>

                        {{-- Jenis Kategori --}}
                        <div class="group">
                            <label class="flex items-center gap-2 text-gray-700 font-semibold mb-2">
                                <svg class="w-5 h-5 text-purple-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                                        clip-rule="evenodd" />
                                </svg>
                                Jenis Kategori
                            </label>

                            {{-- Info Box --}}
                            <div class="mb-3 bg-amber-50 border border-amber-200 rounded-lg p-3">
                                <p class="text-xs text-amber-800">
                                    <strong>Pilih salah satu</strong> jenis kategori atau <strong>kosongkan
                                        keduanya</strong> jika akan membuat sub-kategori. Kode arsip akan dibuat di
                                    sub-kategori nanti.
                                </p>
                            </div>

                            {{-- Selection Grid --}}
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                                {{-- Payment Method Card --}}
                                <div
                                    class="bg-white border border-gray-200 rounded-lg p-3 hover:border-blue-400 transition-colors">
                                    <div class="flex items-center gap-2 mb-2">
                                        <svg class="w-5 h-5 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4z" />
                                            <path fill-rule="evenodd"
                                                d="M18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <h4 class="font-semibold text-gray-800 text-sm">Metode Pembayaran</h4>
                                    </div>

                                    <select name="payment_method"
                                        class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all bg-white">
                                        <option value="">-- Kosongkan jika tidak dipilih --</option>
                                        @foreach ($payment as $pay)
                                            <option value="{{ $pay->id }}"
                                                {{ $category->payment_method_id == $pay->id ? 'selected' : '' }}>
                                                {{ $pay->payment_method_name }}{{ $pay->sub_category ? ' → ' . $pay->sub_category : '' }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                {{-- Funding Source Card --}}
                                <div
                                    class="bg-white border border-gray-200 rounded-lg p-3 hover:border-purple-400 transition-colors">
                                    <div class="flex items-center gap-2 mb-2">
                                        <svg class="w-5 h-5 text-purple-600" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <h4 class="font-semibold text-gray-800 text-sm">Sumber Dana</h4>
                                    </div>

                                    <select name="funding_source"
                                        class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all bg-white">
                                        <option value="">-- Kosongkan jika tidak dipilih --</option>
                                        @foreach ($funding as $fun)
                                            <option value="{{ $fun->id }}"
                                                {{ $category->funding_source_id == $fun->id ? 'selected' : '' }}>
                                                {{ $fun->funding_source_name }}{{ $fun->sub_category ? ' → ' . $fun->sub_category : '' }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                        </div>


                        {{-- Deskripsi --}}
                        <div class="group">
                            <label for="deskripsi" class="flex items-center gap-2 text-gray-700 font-semibold mb-3">
                                <svg class="w-5 h-5 text-purple-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z"
                                        clip-rule="evenodd" />
                                </svg>
                                Deskripsi
                                <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <textarea name="deskripsi" id="deskripsi" rows="3"
                                    class="w-full px-5 py-2 border-2 border-gray-200 rounded-lg focus:ring-1 focus:ring-purple-500 focus:border-purple-500 transition-all duration-300 bg-gray-50 focus:bg-white pl-12 resize-none"
                                    placeholder="Jelaskan jenis dokumen apa saja yang masuk dalam kategori ini">{{ old('deskripsi', $category->description) }}</textarea>
                                <svg class="absolute left-4 top-4 w-5 h-5 text-gray-400" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            @error('deskripsi')
                                <p class="mt-2 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- URL Icon --}}
                        <div class="group">
                            <label for="url" class="flex items-center gap-2 text-gray-700 font-semibold mb-3">
                                <svg class="w-5 h-5 text-purple-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z"
                                        clip-rule="evenodd" />
                                </svg>
                                URL Icon
                            </label>

                            {{-- Preview Icon jika ada --}}
                            @if ($category->url_icon)
                                <div class="mb-4 p-4 bg-gray-50 rounded-xl border-2 border-gray-200">
                                    <p class="text-sm font-semibold text-gray-700 mb-2">Icon saat ini:</p>
                                    <div class="flex items-center gap-3">
                                        <div class="p-3 bg-gradient-to-br from-purple-500 to-pink-500 rounded-xl">
                                            <img src="{{ $category->url_icon }}" alt="Current Icon"
                                                class="w-12 h-12">
                                        </div>
                                        <span class="text-xs text-gray-500">Kosongkan field untuk menghapus icon</span>
                                    </div>
                                </div>
                            @endif

                            {{-- URL Input --}}
                            <div class="relative">
                                <input type="text" name="url" id="url"
                                    value="{{ old('url', $category->url_icon) }}"
                                    class="w-full px-5 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all duration-300 bg-gray-50 focus:bg-white pl-12"
                                    placeholder="https://img.icons8.com/?size=100&id=...&format=png&color=ffffff">
                                <svg class="absolute left-4 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400"
                                    fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M12.586 4.586a2 2 0 112.828 2.828l-3 3a2 2 0 01-2.828 0 1 1 0 00-1.414 1.414 4 4 0 005.656 0l3-3a4 4 0 00-5.656-5.656l-1.5 1.5a1 1 0 101.414 1.414l1.5-1.5zm-5 5a2 2 0 012.828 0 1 1 0 101.414-1.414 4 4 0 00-5.656 0l-3 3a4 4 0 105.656 5.656l1.5-1.5a1 1 0 10-1.414-1.414l-1.5 1.5a2 2 0 11-2.828-2.828l3-3z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            @error('url')
                                <p class="mt-2 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                            <p class="mt-2 text-xs text-gray-500 ml-1 flex items-center gap-1">
                                <svg class="w-3 h-3 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                        clip-rule="evenodd" />
                                </svg>
                                Gunakan format: https://img.icons8.com/?size=100&id=xxx&format=png&color=ffffff
                            </p>
                        </div>

                    </div>

                    {{-- Footer Actions --}}
                    <div class="flex flex-col sm:flex-row items-stretch sm:items-center justify-between gap-4 pt-8 border-t-2 border-gray-100">
                            
                        {{-- Info Required Fields --}}
                        <div class="flex items-center gap-2 text-sm text-gray-600">
                            <svg class="w-5 h-5 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                            </svg>
                            <span class="font-medium">Semua field wajib diisi</span>
                        </div>

                        {{-- Submit Button --}}
                        <div class="flex gap-3 w-full sm:w-auto">
                            <button type="submit"
                            class="flex-1 sm:flex-none inline-flex items-center justify-center gap-2 px-8 py-2 bg-gradient-to-r from-amber-600 to-orange-600 hover:from-amber-700 hover:to-orange-700 text-white font-semibold rounded-lg shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200">
                            <svg class="w-5 h-5 group-hover:rotate-12 transition-transform duration-300"
                                fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                            </svg>    
                                Update
                            </button>

                            <a href="{{ route('cabinet.show', $cabinet->id) }}"
                                class="flex-1 sm:flex-none inline-flex items-center justify-center gap-2 px-4 py-2 bg-gradient-to-r from-gray-200 to-gray-300 hover:from-gray-300 hover:to-gray-400 text-gray-700 font-semibold rounded-lg shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                                Batal
                            </a>
                        </div>
                    </div>
                </div>
            </form>

            {{-- Warning Card --}}
            <div
                class="mt-8 bg-gradient-to-r from-yellow-50 to-orange-50 border-2 border-yellow-300 rounded-xl p-6 shadow-lg">
                <div class="flex items-start gap-4">
                    <div class="flex-shrink-0 p-3 bg-yellow-100 rounded-xl">
                        <svg class="w-6 h-6 text-yellow-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div>
                        <h4 class="font-bold text-yellow-900 mb-2">⚠️ Perhatian Penting!</h4>
                        <p class="text-sm text-yellow-800 leading-relaxed">
                            Mengubah <strong>Nama Kategori</strong> akan mempengaruhi <strong>semua sub-kategori dan
                                tahun</strong> yang terkait dengan kategori ini di cabinet yang sama. Pastikan Anda
                            yakin sebelum menyimpan perubahan.
                        </p>
                    </div>
                </div>
            </div>
        </div>      
    </div>
</x-app-layout>
