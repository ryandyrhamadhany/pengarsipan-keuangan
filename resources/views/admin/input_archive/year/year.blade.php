<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ __('Input Arsip') }}
        </h2>
    </x-slot>

    <div class="py-10 bg-gray-100 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Header SubCategory --}}
            <div class="bg-white shadow-md rounded-xl p-6 border border-gray-200 mb-6 flex justify-between items-center">
                <h3 class="text-lg font-semibold text-gray-700">Daftar Tahun: {{ $category->sub_category_name }}
                </h3>

                <a href="{{ route('year.create_with_category', $category->id) }}"
                    class="inline-flex items-center gap-2 bg-green-500 hover:bg-green-600 text-white font-medium px-4 py-2 rounded-xl shadow-md transition">
                    <img src="https://img.icons8.com/?size=20&id=EkK2AS8KSyo0&format=png&color=ffffff" class="w-5" />
                    Tambah Tahun
                </a>
            </div>

            {{-- Daftar Tahun --}}
            @if ($yearsDirect->count() > 0)
                <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
                    @php $no = 1; @endphp
                    @foreach ($yearsDirect as $year)
                        <div
                            class="flex items-center justify-between p-5 transition duration-150 ease-in-out hover:bg-gray-50">

                            {{-- Link utama --}}
                            <a href="{{ route('year.show', $year->id) }}" class="flex items-center gap-4 flex-1">
                                <div
                                    class="w-9 h-9 flex items-center justify-center rounded-full bg-indigo-100 text-indigo-600 font-bold">
                                    {{ $no++ }}
                                </div>
                                <p class="text-gray-900 font-semibold">{{ $year->year }}</p>
                            </a>

                            {{-- Tombol Aksi --}}
                            <div class="flex items-center gap-2 ml-4">
                                <a href="{{ route('year.edit', $year->id) }}"
                                    class="flex items-center justify-center bg-blue-500 hover:bg-blue-600 rounded-lg p-2 shadow transition">
                                    <img src="https://img.icons8.com/?size=24&id=88584&format=png&color=ffffff">
                                </a>

                                <form action="{{ route('year.destroy', $year->id) }}" method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus tahun ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="flex items-center justify-center bg-red-500 hover:bg-red-600 rounded-lg p-2 shadow transition">
                                        <img src="https://img.icons8.com/?size=24&id=43949&format=png&color=ffffff">
                                    </button>
                                </form>
                            </div>
                        </div>
                        @if (!$loop->last)
                            <div class="border-b border-gray-200"></div>
                        @endif
                    @endforeach
                </div>
            @else
                <div class="text-center py-10 text-gray-500">
                    <p>Tidak ada tahun yang tersedia untuk subkategori ini.</p>
                </div>
            @endif

            {{-- Tombol Kembali --}}
            <div class="mt-6">
                <a href="{{ route('cabinet.show', $category->cabinet_id) }}"
                    class="inline-flex items-center gap-2 px-4 py-2 bg-gray-100 hover:bg-gray-200 border border-gray-300 text-gray-700 rounded-lg font-medium transition">
                    Kembali
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
