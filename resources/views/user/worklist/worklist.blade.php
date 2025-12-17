<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-10 space-y-12">

                <h2 class="text-2xl font-bold text-gray-800">Pengajuan Saya</h2>


                {{-- ======================== BAGIAN 1 : Pengajuan Diproses ======================== --}}
                <div class="border border-gray-200 rounded-2xl shadow-sm p-8 bg-gray-50">
                    <h3 class="text-xl font-semibold text-gray-700 mb-6">
                        Pengajuan dalam proses
                    </h3>

                    @php $no = 1; @endphp

                    @forelse ($my_pengajuan as $pengajuan)
                        @if ($pengajuan->status_kelengkapan == 'Belum Lengkap' && $pengajuan->status_verifikasi == 0)
                            <div
                                class="flex items-center justify-between p-5 mb-3
                                    bg-white rounded-xl shadow-sm border border-gray-200
                                    hover:shadow-md hover:bg-gray-50 transition">

                                {{-- NOMOR --}}
                                <div class="w-10 text-gray-500 font-bold text-lg">
                                    {{ $no++ }}
                                </div>

                                {{-- KONTEN LIST --}}
                                <a href="{{ route('pengajuan.show', $pengajuan->id) }}"
                                    class="w-full px-4 text-gray-800">

                                    {{-- Nama Pengajuan --}}
                                    <div class="font-semibold text-lg mb-2 break-words">
                                        {{ $pengajuan->pengajuan_name }}
                                    </div>

                                    {{-- STATUS (flex) --}}
                                    <div class="flex flex-wrap items-center gap-4">

                                        <div class="px-3 py-1 text-sm rounded-full bg-blue-100 text-blue-700">
                                            proses
                                        </div>
                                        {{-- Status Kelengkapan --}}
                                        <div>
                                            @if ($pengajuan->status_kelengkapan == 'Belum Lengkap')
                                                <span
                                                    class="px-3 py-1 text-sm rounded-full bg-yellow-100 text-yellow-700">
                                                    Belum Lengkap
                                                </span>
                                            @elseif($pengajuan->status_kelengkapan == 'Lengkap')
                                                <span
                                                    class="px-3 py-1 text-sm rounded-full bg-green-100 text-green-700">
                                                    Lengkap
                                                </span>
                                            @else
                                                <span class="px-3 py-1 text-sm rounded-full bg-red-100 text-red-700">
                                                    Belum diperiksa
                                                </span>
                                            @endif
                                        </div>

                                        {{-- Status Verifikasi --}}
                                        <div>
                                            <span class="px-3 py-1 text-sm rounded-full bg-red-100 text-red-700">
                                                Belum Diverifikasi
                                            </span>
                                        </div>

                                        {{-- Status Arsip --}}
                                        <div>
                                            @if ($pengajuan->status_diarsipkan == 1)
                                                <span class="px-3 py-1 text-sm rounded-full bg-red-100 text-red-700">
                                                    Diarsipkan
                                                </span>
                                            @endif
                                        </div>

                                    </div>
                                </a>

                                {{-- Aksi --}}
                                <div class="flex gap-4 pr-2">
                                    <!-- Tombol Edit -->
                                    <a href="{{ route('pengajuan.edit', $pengajuan->id) }}"
                                        class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg shadow-sm transition">
                                        Edit
                                    </a>

                                    <!-- Tombol Delete -->
                                    <form action="{{ route('pengajuan.destroy', $pengajuan->id) }}" method="POST"
                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus pengajuan ini? Tindakan ini tidak dapat dibatalkan.');">
                                        @method('DELETE')
                                        @csrf

                                        <button
                                            class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white font-medium rounded-lg shadow-sm transition">
                                            Delete
                                        </button>
                                    </form>
                                </div>


                            </div>
                        @endif
                    @empty
                        <p class="text-gray-500">Belum ada data.</p>
                    @endforelse
                </div>


                {{-- ======================== BAGIAN 2 : SEMUA PENGAJUAN ======================== --}}
                <div class="border border-gray-200 rounded-2xl shadow-sm p-8 bg-gray-50">
                    <h3 class="text-xl font-semibold text-gray-700 mb-6">
                        Semua Pengajuan
                    </h3>

                    @php $no = 1; @endphp

                    @forelse ($my_pengajuan as $pengajuan)
                        <div
                            class="flex items-center justify-between p-5 mb-3
                                bg-white rounded-xl shadow-sm border border-gray-200
                                hover:shadow-md hover:bg-gray-50 transition">

                            {{-- NOMOR --}}
                            <div class="w-10 text-gray-500 font-bold text-lg">
                                {{ $no++ }}
                            </div>

                            {{-- KONTEN LIST --}}
                            <a href="{{ route('pengajuan.show', $pengajuan->id) }}" class="w-full px-4 text-gray-800">

                                {{-- Nama Pengajuan --}}
                                <div class="font-semibold text-lg mb-2 break-words">
                                    {{ $pengajuan->pengajuan_name }}
                                </div>

                                {{-- STATUS (flex) --}}
                                <div class="flex flex-wrap items-center gap-4">

                                    {{-- Status Kelengkapan --}}
                                    <div>
                                        @if ($pengajuan->status_kelengkapan == 'Belum Lengkap')
                                            <span class="px-3 py-1 text-sm rounded-full bg-yellow-100 text-yellow-700">
                                                Belum Lengkap
                                            </span>
                                        @elseif($pengajuan->status_kelengkapan == 'Lengkap')
                                            <span class="px-3 py-1 text-sm rounded-full bg-green-100 text-green-700">
                                                Lengkap
                                            </span>
                                        @else
                                            <span class="px-3 py-1 text-sm rounded-full bg-red-100 text-red-700">
                                                Belum diperiksa
                                            </span>
                                        @endif
                                    </div>

                                    {{-- Status Verifikasi --}}
                                    <div>
                                        @if ($pengajuan->status_verifikasi == 1)
                                            <span class="px-3 py-1 text-sm rounded-full bg-green-100 text-green-700">
                                                Diverifikasi
                                            </span>
                                        @else
                                            <span class="px-3 py-1 text-sm rounded-full bg-red-100 text-red-700">
                                                Belum diverifikasi
                                            </span>
                                        @endif
                                    </div>

                                    {{-- Status Arsip --}}
                                    <div>
                                        @if ($pengajuan->status_diarsipkan == 1)
                                            <span class="px-3 py-1 text-sm rounded-full bg-blue-100 text-blue-700">
                                                Diarsipkan
                                            </span>
                                        @endif
                                    </div>

                                </div>
                            </a>

                            {{-- Aksi --}}
                            <div class="flex gap-4 pr-2">
                                <!-- Tombol Edit -->
                                <a href="{{ route('pengajuan.edit', $pengajuan->id) }}"
                                    class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg shadow-sm transition">
                                    Edit
                                </a>

                                <!-- Tombol Delete -->
                                <form action="{{ route('pengajuan.destroy', $pengajuan->id) }}" method="POST"
                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus pengajuan ini? Tindakan ini tidak dapat dibatalkan.');">
                                    @method('DELETE')
                                    @csrf

                                    <button
                                        class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white font-medium rounded-lg shadow-sm transition">
                                        Delete
                                    </button>
                                </form>
                            </div>


                        </div>
                    @empty
                        <p class="text-gray-500">Belum ada data.</p>
                    @endforelse
                </div>


                {{-- ======================== BAGIAN 3 : Pengajuan diverifikasi atau selesai ======================== --}}
                <div class="border border-gray-200 rounded-2xl shadow-sm p-8 bg-gray-50">
                    <h3 class="text-xl font-semibold text-gray-700 mb-6">
                        Pengajuan diverifikasi atau selesai
                    </h3>

                    @php $no = 1; @endphp

                    @forelse ($my_pengajuan as $pengajuan)
                        @if ($pengajuan->status_kelengkapan == 'Lengkap' && $pengajuan->status_verifikasi == 1)
                            <div
                                class="flex items-center justify-between p-5 mb-3
                                    bg-white rounded-xl shadow-sm border border-gray-200
                                    hover:shadow-md hover:bg-gray-50 transition">

                                {{-- NOMOR --}}
                                <div class="w-10 text-gray-500 font-bold text-lg">
                                    {{ $no++ }}
                                </div>

                                {{-- KONTEN LIST --}}
                                <a href="{{ route('pengajuan.show', $pengajuan->id) }}"
                                    class="w-full px-4 text-gray-800">

                                    {{-- Nama Pengajuan --}}
                                    <div class="font-semibold text-lg mb-2 break-words">
                                        {{ $pengajuan->pengajuan_name }}
                                    </div>

                                    {{-- STATUS (flex) --}}
                                    <div class="flex flex-wrap items-center gap-4">

                                        @if ($pengajuan->status_diarsipkan == 1)
                                            <div class="px-3 py-1 text-sm rounded-full bg-green-100 text-green-700">
                                                Selesai
                                            </div>
                                        @endif
                                        {{-- Status Kelengkapan --}}
                                        <div>
                                            @if ($pengajuan->status_kelengkapan == 'Belum Lengkap')
                                                <span
                                                    class="px-3 py-1 text-sm rounded-full bg-yellow-100 text-yellow-700">
                                                    Belum Lengkap
                                                </span>
                                            @elseif($pengajuan->status_kelengkapan == 'Lengkap')
                                                <span
                                                    class="px-3 py-1 text-sm rounded-full bg-green-100 text-green-700">
                                                    Lengkap
                                                </span>
                                            @else
                                                <span class="px-3 py-1 text-sm rounded-full bg-red-100 text-red-700">
                                                    Belum diperiksa
                                                </span>
                                            @endif
                                        </div>

                                        {{-- Status Verifikasi --}}
                                        <div>
                                            <span class="px-3 py-1 text-sm rounded-full bg-green-100 text-green-700">
                                                Diverifikasi
                                            </span>
                                        </div>

                                        {{-- Status Arsip --}}
                                        <div>
                                            @if ($pengajuan->status_diarsipkan == 1)
                                                <span
                                                    class="px-3 py-1 text-sm rounded-full bg-green-100 text-green-700">
                                                    Diarsipkan
                                                </span>
                                            @endif
                                        </div>

                                    </div>
                                </a>

                                {{-- Aksi --}}
                                <div class="flex gap-4 pr-2">
                                    <!-- Tombol Edit -->
                                    <a href="{{ route('pengajuan.edit', $pengajuan->id) }}"
                                        class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg shadow-sm transition">
                                        Edit
                                    </a>

                                    <!-- Tombol Delete -->
                                    <form action="{{ route('pengajuan.destroy', $pengajuan->id) }}" method="POST"
                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus pengajuan ini? Tindakan ini tidak dapat dibatalkan.');">
                                        @method('DELETE')
                                        @csrf

                                        <button
                                            class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white font-medium rounded-lg shadow-sm transition">
                                            Delete
                                        </button>
                                    </form>
                                </div>


                            </div>
                        @endif
                    @empty
                        <p class="text-gray-500">Belum ada data.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
