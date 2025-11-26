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
                    <h3 class="text-lg font-semibold text-gray-700">Daftar Kategori</h3>

                    <a href="{{ route('category.list_with_cabinet', $cabinet->id) }}"
                        class="inline-flex items-center gap-2 bg-green-500 hover:bg-green-600 text-white font-medium px-4 py-2 rounded-xl shadow-md transition">
                        <img src="https://img.icons8.com/?size=20&id=EkK2AS8KSyo0&format=png&color=ffffff"
                            class="w-5" />
                        Edit Kategori
                    </a>
                </div>
            </div>

            {{-- Daftar Category --}}
            @if ($categories->count() > 0)
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-5">

                    @foreach ($categories as $category)
                        <a href="{{ route('category.show', $category->id) }}"
                            class="group bg-gradient-to-br from-blue-500 to-blue-400 text-white rounded-2xl shadow-md p-6 flex flex-col items-center justify-center gap-4 transition transform hover:-translate-y-1 hover:shadow-lg">

                            {{-- Tempat Icon (kosong dulu, nanti kamu isi) --}}
                            @if (isset($category->url_icon))
                                <img src="{{ $category->url_icon }}" alt="">
                            @else
                                <div class="w-14 h-14 flex items-center justify-center bg-white/20 rounded-xl">
                                    {{-- <img src="..." class="w-10"> --}}
                                </div>
                            @endif

                            <p class="text-lg font-semibold text-center">
                                {{ $category->category_name }}
                            </p>

                        </a>
                    @endforeach

                </div>
            @endif

            {{-- Tombol Kembali --}}
            <div class="mt-6">
                <a href="{{ route('admin.archive') }}"
                    class="inline-flex items-center gap-2 px-4 py-2 bg-gray-100 hover:bg-gray-200 border border-gray-300 text-gray-700 rounded-lg font-medium transition">
                    {{-- <img src="https://img.icons8.com/?size=20&id=118774&format=png&color=4b5563" alt="back"> --}}
                    Kembali
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
