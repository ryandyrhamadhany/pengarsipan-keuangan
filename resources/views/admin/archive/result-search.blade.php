<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Hasil Pencarian') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6">

                    {{-- Tombol Kembali --}}
                    <a href="{{ route('admin.archive') }}"
                        class="inline-flex items-center gap-2 mb-6 bg-gray-200 text-gray-700 font-medium px-4 py-2 rounded-lg hover:bg-gray-300 transition shadow-sm">
                        ← Kembali
                    </a>

                    {{-- Hasil Pencarian --}}
                    @if ($files->count() > 0)
                        <div class="space-y-4">
                            @foreach ($files as $file)
                                <div
                                    class="flex items-center justify-between p-5 border border-gray-200 rounded-xl hover:bg-gray-50 transition">

                                    {{-- Info File --}}
                                    <div class="flex flex-col gap-1">

                                        {{-- Judul + Status --}}
                                        <div class="flex items-center gap-3">
                                            <p class="text-lg font-semibold text-gray-800">
                                                {{ $file->name_file }}
                                            </p>

                                            @if ($file->path_file)
                                                <span
                                                    class="text-sm bg-green-100 text-green-700 px-2 py-0.5 rounded-lg font-medium">
                                                    File tersedia
                                                </span>
                                            @else
                                                <span
                                                    class="text-sm bg-red-100 text-red-600 px-2 py-0.5 rounded-lg font-medium">
                                                    Belum ada file
                                                </span>
                                            @endif
                                        </div>

                                        {{-- Folder --}}
                                        <p class="text-sm text-gray-600">
                                            <span class="font-medium">Folder:</span>
                                            {{ $file->folder->folder_name ?? 'Tidak ada folder' }}
                                        </p>

                                        {{-- Rak & Kategori --}}
                                        <div class="flex gap-12">
                                            <p class="text-sm text-gray-600">
                                                <span class="font-medium">Rak:</span>
                                                {{ $file->folder->rak->rack_name ?? 'Tidak ada rak' }}
                                            </p>

                                            {{-- <p class="text-sm text-gray-600">
                                                <span class="font-medium">Kategori:</span>
                                                {{ $file->folder->rak->category->category_name ?? 'Tidak ada kategori' }}
                                            </p> --}}
                                        </div>
                                    </div>

                                    {{-- Tombol Aksi --}}
                                    <div class="flex-shrink-0">
                                        <a href="{{ route('file.show', $file->id) }}"
                                            class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition shadow-sm">
                                            Lihat Detail
                                        </a>
                                    </div>

                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-10 text-gray-500">
                            <img src="https://img.icons8.com/?size=96&id=102550&format=png&color=9ca3af"
                                class="mx-auto mb-3 opacity-70">
                            <p>Tidak ada hasil ditemukan untuk pencarian ini.</p>
                        </div>
                    @endif

                </div>

            </div>
        </div>
    </div>
</x-app-layout>
