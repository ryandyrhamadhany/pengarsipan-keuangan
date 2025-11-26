<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ __('Input Arsip') }}
        </h2>
    </x-slot>

    <div class="py-10 bg-gray-50">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-md sm:rounded-xl p-8 border border-gray-200">
                <form action="{{ route('category.update', $category->id) }}" method="POST" class="space-y-6">
                    @method('PUT')
                    @csrf

                    {{-- Nama Rak Arsip --}}
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">
                            Nama Kategori Arsip
                        </label>
                        <input type="text" name="name" id="name" value="{{ $category->category_name }}"
                            class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm"
                            placeholder="Masukkan nama rak arsip" required>
                    </div>

                    {{-- deskripsi --}}
                    <div>
                        <label for="deskripsi" class="block text-sm font-medium text-gray-700 mb-1">
                            Deskripsi
                        </label>
                        <input type="text" name="deskripsi" id="deskripsi" value="{{ $category->deskripsi }}"
                            class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm"
                            placeholder="Masukkan keterangan" required>
                    </div>

                    {{-- URL Icon --}}
                    <div class="mb-4">
                        <label for="url" class="block text-sm font-medium text-gray-700 mb-1">
                            URL Icon
                        </label>

                        <div
                            class="text-xs text-gray-600 bg-gray-50 p-3 rounded-lg border border-gray-200 leading-relaxed mb-2">
                            <p class="font-semibold mb-1">Instruksi memasukkan URL icon dari Icon8:</p>

                            <ol class="list-decimal list-inside space-y-1">
                                <li>Buka situs <strong>icons8.com</strong> dan cari icon yang ingin dipakai.</li>
                                <li>Klik icon tersebut hingga terbuka halaman detailnya, lalu pilih copy > link to png
                                    "jumlahnya hurufnya harus sama"
                                </li>
                                <li>Ganti warna icon menjadi <strong>putih</strong> pada bagian <em>“color=000000
                                        menjadi color=ffffff”</em>.
                                </li>
                                <li>Ganti ukuran (size) menjadi <strong>100 px</strong>. contohnya size=100 </li>
                            </ol>

                            <p class="mt-2 font-semibold">Contoh URL yang benar:</p>
                            <code class="block bg-white p-2 rounded border text-[11px]">
                                https://img.icons8.com/?size=100&id=2HU1G5leSjOg&format=png&color=ffffff
                            </code>
                        </div>

                        <input type="text" name="url" id="url" value="{{ $category->url_icon }}"
                            class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm"
                            placeholder="Masukkan URL Icon dari Icons8 atau bisa kosongkan sementara" required>
                    </div>

                    {{-- Tombol Aksi --}}
                    <div class="flex items-center justify-between pt-4">
                        <a href="{{ route('cabinet.show', $category->cabinet_id) }}"
                            class="inline-flex items-center px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium rounded-lg transition">
                            ← Kembali
                        </a>

                        <button type="submit"
                            class="inline-flex items-center px-5 py-2 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-lg shadow transition">
                            + Edit Kategori
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</x-app-layout>
