<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ __('Input Arsip') }}
        </h2>
    </x-slot>

    <div class="py-10 bg-gray-100 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Header Category --}}
            <div class="bg-white shadow-md rounded-xl p-6 border border-gray-200 mb-6">
                <div class="flex justify-between items-center">
                    <h3 class="text-lg font-semibold text-gray-700">Daftar Sub Kategori</h3>

                    <div class="flex gap-4">
                        <a href="{{ route('subcategory.create_with_category', $category->id) }}"
                            class="inline-flex items-center gap-2 bg-indigo-500 hover:bg-indigo-600 text-white font-medium px-4 py-2 rounded-xl shadow-md transition">
                            <img src="https://img.icons8.com/?size=20&id=EkK2AS8KSyo0&format=png&color=ffffff"
                                class="w-5" />
                            Tambah sub kategori
                        </a>
                    </div>
                </div>
            </div>

            {{-- Daftar Category --}}

            @if ($subcategories->count() > 0)
                <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">

                    @php $no = 1; @endphp
                    @foreach ($subcategories as $subcategory)
                        <div
                            class="flex items-center justify-between p-5 transition duration-150 ease-in-out hover:bg-gray-50">

                            {{-- Link utama --}}
                            <a href="{{ route('subcategory.show', $subcategory->id) }}"
                                class="flex items-center gap-4 flex-1">

                                <div
                                    class="w-9 h-9 flex items-center justify-center rounded-full bg-indigo-100 text-indigo-600 font-bold">
                                    {{ $no++ }}
                                </div>

                                <div class="space-y-1">
                                    <p class="text-gray-900 font-semibold text-base">
                                        {{ $subcategory->sub_category_name }}
                                    </p>

                                    {{-- <div class="flex items-center gap-4 text-sm text-gray-600">
                                        <span class="flex items-center gap-1 bg-gray-100 px-2 py-1 rounded-lg">
                                            <img src="https://img.icons8.com/?size=16&id=7880&format=png&color=4b5563"
                                                class="w-4 opacity-70">
                                            {{ $category->category_code ?? '-' }}
                                        </span>
                                    </div> --}}
                                </div>
                            </a>

                            {{-- Tombol Aksi --}}
                            <div class="flex items-center gap-2 ml-4">
                                <a href="{{ route('subcategory.edit', $subcategory->id) }}"
                                    class="flex items-center justify-center bg-blue-500 hover:bg-blue-600 rounded-lg p-2 shadow transition">
                                    <img src="https://img.icons8.com/?size=24&id=88584&format=png&color=ffffff">
                                </a>

                                <form action="{{ route('subcategory.destroy', $subcategory->id) }}" method="POST"
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
                    @endforeach
                </div>
            @else
            @endif
            {{-- Tombol Kembali --}}
            <div class="mt-6">
                <a href="{{ route('cabinet.show', $category->cabinet_id) }}"
                    class="inline-flex items-center gap-2 px-4 py-2 bg-gray-100 hover:bg-gray-200 border border-gray-300 text-gray-700 rounded-lg font-medium transition">
                    {{-- <img src="https://img.icons8.com/?size=20&id=118774&format=png&color=4b5563" alt="back"> --}}
                    Kembali
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
