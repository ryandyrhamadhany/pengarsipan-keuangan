<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ __('Daftar Rak Arsip') }}
        </h2>
    </x-slot>

    <div class="py-10 bg-gray-50 min-h-screen">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">

            {{-- Search Bar --}}
            {{-- <form action="{{ route('search.index') }}" method="GET" class="mb-6">
                <div class="relative flex items-center">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama file"
                        class="w-full bg-white border border-gray-300 rounded-xl py-2.5 pl-12 pr-4 text-gray-700 placeholder-gray-400 shadow-sm focus:ring-2 focus:ring-indigo-400 focus:border-indigo-400 transition">

                    <div class="absolute left-4 text-gray-400">
                        <img src="https://img.icons8.com/?size=24&id=111098&format=png&color=9ca3af" class="w-5" />
                    </div>

                    <button type="submit"
                        class="ml-3 px-5 py-2.5 bg-indigo-600 text-white font-medium rounded-xl hover:bg-indigo-700 shadow-md transition flex items-center gap-2">
                        <img src="https://img.icons8.com/?size=24&id=7695&format=png&color=ffffff" class="w-5" />
                        Cari
                    </button>
                </div>
            </form> --}}



            <div class="bg-white shadow-md sm:rounded-xl p-6 border border-gray-200">
                <div class="flex justify-between items-start mb-6">
                    <h3 class="text-lg font-semibold text-gray-700">Kelola Rak Arsip</h3>

                    <div class="flex items-center gap-3">
                        {{-- Tombol Tambah Kategori --}}
                        {{-- <a href="{{ route('category.create') }}"
                            class="inline-flex items-center gap-2 bg-indigo-600 hover:bg-indigo-700 text-white font-medium px-4 py-2 rounded-xl shadow-md transition">
                            <img src="https://img.icons8.com/?size=24&id=48427&format=png&color=ffffff"
                                class="w-5" />
                            Tambah Kategori Rak
                        </a> --}}

                        {{-- Tombol Tambah Rak --}}
                        <a href="{{ route('rack.create_with_year', $year->id) }}"
                            class="inline-flex items-center gap-2 bg-green-500 hover:bg-green-600 text-white font-medium px-4 py-2 rounded-xl shadow-md transition">
                            <img src="https://img.icons8.com/?size=24&id=48427&format=png&color=ffffff"
                                class="w-5" />
                            Tambah Rak Arsip
                        </a>
                    </div>
                </div>

                {{-- Filter Kategori --}}
                {{-- <form action="{{ route('admin.rack.archive') }}" method="GET" class="mb-6">
                    <div class="flex items-center gap-3 bg-gray-100 p-4 rounded-xl border border-gray-200">

                        <label for="category_id" class="text-gray-700 font-medium">
                            Filter Kategori:
                        </label>

                        <select name="category_id" id="category_id"
                            class="max-w-md w-full rounded-lg border-gray-300 bg-white py-2 px-3 shadow-sm focus:ring-indigo-500 focus:border-indigo-500">

                            <option value="">Semua</option>

                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ request('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->category_name }}
                                </option>
                            @endforeach
                        </select>

                        <button type="submit"
                            class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg shadow transition flex items-center gap-2">
                            <img src="https://img.icons8.com/?size=24&id=7695&format=png&color=ffffff" class="w-4" />
                            Terapkan
                        </button>

                        <a href="{{ route('admin.rack.archive') }}"
                            class="px-4 py-2 bg-gray-300 hover:bg-gray-400 text-gray-800 rounded-lg shadow transition">
                            Reset
                        </a>
                    </div>
                </form> --}}



                {{-- Daftar Rak --}}
                @php $no = 1; @endphp

                @if ($racks->count() > 0)
                    <div class="divide-y divide-gray-200 rounded-lg border border-gray-100">
                        @foreach ($racks as $rak)
                            <div
                                class="flex items-center justify-between p-4 hover:bg-gray-50 transition duration-150 ease-in-out group rounded-md">

                                {{-- Bagian Klik Utama --}}
                                <a href="{{ route('rak.show', $rak->id) }}"
                                    class="flex items-center gap-4 flex-1 group-hover:text-indigo-600">
                                    <div
                                        class="w-8 h-8 flex items-center justify-center rounded-full bg-indigo-100 text-indigo-600 font-semibold">
                                        {{ $no++ }}
                                    </div>
                                    <div class="space-y-1">
                                        {{-- Nama Rak --}}
                                        <p class="text-gray-900 font-semibold text-base leading-tight">
                                            {{ $rak->rack_name }}
                                        </p>

                                        {{-- Informasi Detail --}}
                                        <div class="flex items-center gap-4 text-sm text-gray-600">

                                            {{-- Kode Rak --}}
                                            <span class="flex items-center gap-1 bg-gray-100 px-2 py-0.5 rounded-lg">
                                                <img src="https://img.icons8.com/?size=16&id=7880&format=png&color=4b5563"
                                                    class="w-4 opacity-70">
                                                {{ $rak->kode_rack ?? '-' }}
                                            </span>

                                            {{-- Kategori
                                            <span
                                                class="flex items-center gap-1 bg-indigo-100 px-2 py-0.5 rounded-lg text-indigo-700">
                                                <img src="https://img.icons8.com/?size=16&id=99268&format=png&color=4f46e5"
                                                    class="w-4 opacity-70">
                                                {{ $rak->category->category_name ?? '-' }}
                                            </span> --}}

                                        </div>
                                    </div>

                                </a>

                                {{-- Tombol Aksi --}}
                                <div class="flex items-center gap-2 ml-4">
                                    <a href="{{ route('rak.edit', $rak->id) }}"
                                        class="flex items-center justify-center bg-blue-500 hover:bg-blue-600 rounded-md p-2 transition"
                                        title="Edit">
                                        <img src="https://img.icons8.com/?size=24&id=88584&format=png&color=ffffff"
                                            alt="edit">
                                    </a>

                                    <form action="{{ route('rak.destroy', $rak->id) }}" method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus rak ini?')">
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
                    <div class="text-center py-10 text-gray-500">
                        <img src="https://img.icons8.com/?size=96&id=102550&format=png&color=9ca3af"
                            class="mx-auto mb-3 opacity-70" alt="no data">
                        <p>Tidak ada rak arsip yang tersedia.</p>
                    </div>
                @endif
                {{-- Tombol Kembali --}}
                <div class="mt-6">
                    <a href="{{ $cabinetId ? route('cabinet.show', $cabinetId) : '#' }}"
                        class="inline-flex items-center gap-2 px-4 py-2 bg-gray-100 hover:bg-gray-200 border border-gray-300 text-gray-700 rounded-lg font-medium transition">
                        Kembali
                    </a>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
