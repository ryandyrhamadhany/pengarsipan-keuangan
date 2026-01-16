<x-app-layout>
    <x-slot name="header">
<<<<<<< HEAD
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
=======
        <h2 class="font-semibold text-xl leading-tight">
>>>>>>> main
            {{ __('Input Arsip') }}
        </h2>
    </x-slot>

    {{-- TOMBOL KEMBALI --}}
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

    <div class="py-4 bg-gray-100 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Header Category --}}
            <div class="bg-white/90 backdrop-blur-xl shadow-lg rounded-2xl p-6 border border-gray-200 mb-8">
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-700">Daftar Sub Kategori</h3>
                        <p class="text-sm font-semibold text-gray-500">
                            Total Sub Kategori : {{ $subcategories->count() }} Item</p>
                    </div>

                    <div class="flex gap-4">
<<<<<<< HEAD
                        <a href="{{ route('subcategory.create_with_category', $category->id) }}"
=======
                        <a href="{{ route('subcategory.create', $category->id) }}"
>>>>>>> main
                            class="inline-flex items-center gap-2 px-4 py-2
                                   bg-gradient-to-r from-emerald-500 to-teal-600
                                   hover:from-emerald-600 hover:to-teal-700
                                   text-white font-medium rounded-lg
                                   shadow-lg hover:shadow-xl
                                   transform hover:-translate-y-0.5
                                   transition-all duration-200">
                            <img src="https://img.icons8.com/?size=20&id=EkK2AS8KSyo0&format=png&color=ffffff"
                                class="w-5" />
                            Tambah sub kategori
                        </a>
                    </div>
                </div>
<<<<<<< HEAD
            
=======
>>>>>>> main

            {{-- Daftar Category --}}

            @if ($subcategories->count() > 0)
<<<<<<< HEAD
                <div class="mt-10 space-y-4 rounded-lg ">

                    @php $no = 1; @endphp
                    @foreach ($subcategories as $subcategory)
                        <div class="flex items-center justify-between p-4 bg-white border border-gray-400 rounded-lg
                                shadow-sm hover:shadow-md hover:bg-gray-300 transition-all duration-200 group">
=======
            <div class="mt-10 space-y-4 rounded-lg">

                    @php $no = 1; @endphp
                    @foreach ($subcategories as $subcategory)
                        @if ($subcategory->sub_category != null)
                        <div class="flex items-center justify-between p-4 bg-white border border-gray-400 rounded-lg
                                    shadow-sm hover:shadow-md hover:bg-gray-300 transition-all duration-200 group">
>>>>>>> main

                                {{-- Link utama --}}
                                <a href="{{ route('subcategory.show', $subcategory->id) }}"
                                    class="flex items-center gap-4 flex-1">
    
                                    <div class="w-8 h-8 flex items-center justify-center rounded-full bg-gradient-to-b from-[#003A8F] to-[#002766] text-white font-semibold">
                                        {{ $no++ }}
                                    </div>

<<<<<<< HEAD
                                <div class="w-8 h-8 flex items-center justify-center rounded-full bg-gradient-to-b from-[#003A8F] to-[#002766] text-white font-semibold">
                                    {{ $no++ }}
                                </div>
=======
                                    <div class="space-y-1">
                                        <p class="text-gray-900 font-semibold text-base">
                                            {{ $subcategory->sub_category }}
                                        </p>
>>>>>>> main

                                        {{-- <div class="flex items-center gap-4 text-sm text-gray-600">
                                        <span class="flex items-center gap-1 bg-gray-100 px-2 py-1 rounded-lg">
                                            <img src="https://img.icons8.com/?size=16&id=7880&format=png&color=4b5563"
                                                class="w-4 opacity-70">
                                            {{ $category->category_code ?? '-' }}
                                        </span>
                                    </div> --}}
<<<<<<< HEAD
                                </div>
                            </a>

                            {{-- Tombol Aksi --}}
                            <div class="flex items-center gap-2 ml-4">
                                <a href="{{ route('subcategory.edit', $subcategory->id) }}"
                                    class="flex items-center justify-center bg-amber-500 hover:bg-orange-600 rounded-lg p-2 shadow transition">
                                    <img src="https://img.icons8.com/?size=24&id=88584&format=png&color=ffffff">
=======
                                    </div>
>>>>>>> main
                                </a>

                                {{-- Tombol Aksi --}}
                                <div class="flex items-center gap-2 ml-4">
                                    <a href="{{ route('subcategory.edit', $subcategory->id) }}"
                                        class="flex items-center justify-center bg-amber-500 hover:bg-orange-600 rounded-lg p-2 shadow transition">
                                        <img src="https://img.icons8.com/?size=24&id=88584&format=png&color=ffffff">
                                    </a>

                                    <form action="{{ route('subcategory.delete', $subcategory->id) }}" method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus kabinet ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="flex items-center justify-center bg-red-500 hover:bg-red-600 rounded-lg p-2 shadow transition">
                                            <img src="https://img.icons8.com/?size=24&id=43949&format=png&color=ffffff">
                                        </button>
                                    </form>
                                </div>

                            </div>

                            {{-- Border antar item --}}
                            @if (!$loop->last)
                                <div class="border-b border-gray-200"></div>
                            @endif
                        @endif
                    @endforeach
                </div>
            </div>
            @else
            @endif
        </div>
    </div>
</x-app-layout>
