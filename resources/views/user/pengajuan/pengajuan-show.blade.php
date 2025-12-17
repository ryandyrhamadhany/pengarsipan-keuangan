<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-gray-800 leading-tight flex items-center gap-3">
            Detail Pengajuan
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- CARD UTAMA --}}
            <div class="bg-white shadow-lg sm:rounded-xl border border-gray-100 p-8">
                <div class="mb-6">
                    <a href="{{ route('user.worklist') }}"
                        class="inline-flex items-center gap-2 px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg shadow-sm transition duration-200">
                        <!-- Icon Panah -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                        </svg>
                        Kembali
                    </a>
                </div>

                {{-- HEADER INFORMASI --}}
                <div class="mb-8">

                    <h3 class="text-2xl font-bold text-gray-900 mb-2">
                        {{ $pengajuan->pengajuan_name }}
                    </h3>

                    <div class="flex items-center gap-6 text-gray-600 text-sm mb-4">

                        <div class="flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-500" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0
                002-2V7a2 2 0 00-2-2H5a2 2 0
                00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            <span>Dibuat: <span class="font-medium text-gray-800">
                                    {{ $pengajuan->created_at->translatedFormat('d M Y — H:i') }}
                                </span></span>
                        </div>

                        <div class="flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-500" fill="none"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0
                11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span>Update: <span class="font-medium text-gray-800">
                                    {{ $pengajuan->updated_at->translatedFormat('d M Y — H:i') }}
                                </span></span>
                        </div>

                    </div>


                    <div class="flex flex-wrap gap-3">

                        @if ($pengajuan->status_kelengkapan == 'Belum Lengkap' && $pengajuan->status_verifikasi == 0)
                            <div class="px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-700">
                                Tahapan: Dalam Proses
                            </div>
                        @endif

                        {{-- STATUS KELENGKAPAN --}}
                        <span
                            class="px-3 py-1 rounded-full text-sm font-medium
                            {{ $pengajuan->status_kelengkapan == 'Lengkap' ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }}">
                            Kelengkapan: {{ ucfirst($pengajuan->status_kelengkapan) }}
                        </span>

                        {{-- STATUS VERIFIKASI --}}
                        <span
                            class="px-3 py-1 rounded-full text-sm font-medium
                            {{ $pengajuan->status_verifikasi ? 'bg-green-100 text-green-700' : 'bg-red-200 text-red-600' }}">
                            {{ $pengajuan->status_verifikasi ? 'Sudah Diverifikasi' : 'Belum Diverifikasi' }}
                        </span>

                        {{-- STATUS ARSIP --}}
                        <span
                            class="px-3 py-1 rounded-full text-sm font-medium
                            {{ $pengajuan->status_diarsipkan ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-700' }}">
                            {{ $pengajuan->status_diarsipkan ? 'Diarsipkan' : 'Belum Diarsipkan' }}
                        </span>

                    </div>
                </div>

                {{-- DIPERIKSA OLEH --}}
                <div class="mt-6 p-5 bg-gray-50 rounded-xl border border-gray-200 shadow-sm">
                    <h3 class="font-semibold text-lg text-gray-800 mb-3">Diperiksa Oleh</h3>

                    <div class="space-y-1 text-gray-700">
                        <p><span class="font-medium">Nama:</span> {{ $pengajuan->finance_officer->name ?? '-' }}</p>
                        <p><span class="font-medium">Email:</span> {{ $pengajuan->finance_officer->email ?? '-' }}</p>
                    </div>
                </div>


                {{-- FILE PENGAJUAN --}}
                <div class="mt-6 mb-8 p-5 bg-white border border-gray-200 rounded-xl shadow-sm">
                    <h3 class="font-semibold text-lg text-gray-800 mb-3">File Pengajuan Saat Ini</h3>

                    <div class="mb-4">
                        <p class="font-medium text-gray-700">Nama File:</p>
                        <span class="text-gray-900 font-semibold">
                            {{ basename($pengajuan->path_file_pengajuan) ?? '-' }}
                        </span>
                    </div>

                    <form action="{{ route('keuangan.perbaiki', $pengajuan->id) }}" method="POST"
                        enctype="multipart/form-data" class="space-y-4">

                        @method('PUT')
                        @csrf

                        {{-- MUNCUL JIKA MASIH BOLEH DIGANTI --}}
                        @if (!$pengajuan->status_kelengkapan || !$pengajuan->status_diarsipkan)
                            <div class="mb-4">
                                <label class="block font-semibold text-gray-800 mb-2">
                                    Upload File Pengajuan Baru (Perbaikan)
                                </label>

                                <input type="file" name="file_pengajuan"
                                    class="block w-full text-sm text-gray-700
                    file:mr-4 file:py-2.5 file:px-5
                    file:rounded-lg file:border-0
                    file:text-sm file:font-semibold
                    file:bg-blue-600 file:text-white
                    hover:file:bg-blue-700
                    cursor-pointer
                    border border-gray-200 rounded-xl shadow-sm
                    focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-blue-400
                    transition duration-150">
                            </div>

                            <button type="submit"
                                class="px-5 py-2.5 bg-green-600 hover:bg-green-700 text-white font-semibold
                rounded-lg shadow-sm transition">
                                Upload Perbaikan
                            </button>
                        @else
                            <p class="text-sm text-gray-600 italic">
                                File pengajuan sudah lengkap & diarsipkan. Tidak dapat diperbarui lagi.
                            </p>
                        @endif

                    </form>
                </div>


                {{-- CATATAN --}}
                @if (isset($catatan) && $catatan)
                    <div class="mt-8 mb-8 p-6 bg-yellow-50 border-l-4 border-yellow-400 rounded-lg shadow-sm">
                        <h3 class="text-lg font-semibold text-yellow-800 mb-2 flex items-center gap-2">
                            <span>📝</span> Catatan Pengajuan
                        </h3>
                        <p class="text-yellow-900 leading-relaxed">
                            {{ $pengajuan->message }}
                        </p>
                    </div>
                @endif

                {{-- <div class="mb-8">
                    <form action="{{ route('keuangan.perbaiki', $pengajuan->id) }}" method="POST"
                        enctype="multipart/form-data" class="space-y-4">
                        @method('PUT')
                        @csrf

                        @if (!$pengajuan->status_kelengkapan || !$pengajuan->status_diarsipkan)
                            Jika dokumen BELUM lengkap ATAU BELUM diarsipkan

                            <div class="mb-4">
                                <label class="text-lg block font-semibold text-gray-800 mb-2">
                                    Perbaiki File Pengajuan
                                </label>

                                <input type="file" name="file_pengajuan"
                                    class="block w-full text-sm text-gray-700
               file:mr-4 file:py-2.5 file:px-5
               file:rounded-lg file:border-0
               file:text-sm file:font-semibold
               file:bg-blue-600 file:text-white
               hover:file:bg-blue-700
               cursor-pointer
               border border-gray-200 rounded-xl shadow-sm
               focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-blue-400
               transition duration-150">
                            </div>


                            <button type="submit"
                                class="px-5 py-2.5 bg-green-600 hover:bg-green-700 text-white font-semibold
                       rounded-lg shadow-sm transition">
                                Upload Perbaikan
                            </button>
                        @else
                            Jika SUDAH lengkap DAN SUDAH diarsipkan
                            <div class="p-4 bg-gray-50 border border-gray-200 rounded-lg">
                                <p class="text-gray-700 font-medium mb-1">File Pengajuan:</p>
                                <span class="text-gray-900 font-semibold">
                                    {{ basename($pengajuan->path_file_pengajuan) }}
                                </span>
                            </div>
                        @endif

                    </form>
                </div> --}}




                {{-- TABEL DOKUMEN --}}
                <div class="overflow-x-auto rounded-lg shadow-md border border-gray-200">
                    <table class="min-w-full bg-white text-sm">

                        {{-- HEADER --}}
                        <thead class="bg-gray-50 text-gray-700 uppercase text-xs tracking-wider">
                            <tr>
                                <th rowspan="2" class="px-4 py-3 border">No</th>
                                <th rowspan="2" class="px-4 py-3 border">Nama Dokumen & TTD</th>

                                <th colspan="2" class="px-4 py-3 border text-center">Dokumen</th>
                                <th colspan="2" class="px-4 py-3 border text-center">Tanda Tangan</th>

                                <th rowspan="2" class="px-4 py-3 border">Keterangan</th>
                            </tr>
                            <tr>
                                <th class="px-4 py-2 border text-center">Ada</th>
                                <th class="px-4 py-2 border text-center">Tidak Ada</th>

                                <th class="px-4 py-2 border text-center">Lengkap</th>
                                <th class="px-4 py-2 border text-center">Belum</th>
                            </tr>
                        </thead>

                        {{-- BODY --}}
                        <tbody class="divide-y divide-gray-200">
                            @foreach ($syaratDoc as $index => $dokumen)
                                <tr class="hover:bg-gray-50">

                                    {{-- Nomor --}}
                                    <td class="px-4 py-3 border text-gray-900 font-medium text-center">
                                        {{ $index + 1 }}
                                    </td>

                                    {{-- Nama Dokumen --}}
                                    <td class="px-4 py-3 border text-gray-900">
                                        @php
                                            if (preg_match('/^[IVX]+\.\d+/', $dokumen)) {
                                                echo "<span class='font-bold text-blue-700 text-base'>$dokumen</span>";
                                            } elseif (preg_match('/^\d+\.\d+/', $dokumen)) {
                                                echo "<span class='pl-6 text-gray-800'>$dokumen</span>";
                                            } elseif (trim($dokumen) === '') {
                                                echo "<span class='font-semibold text-gray-700 italic'>Dokumen Pendukung</span>";
                                            } else {
                                                echo "<span class='text-gray-800'>$dokumen</span>";
                                            }
                                        @endphp
                                    </td>

                                    {{-- Dokumen Ada --}}
                                    <td class="px-4 py-3 border text-center">
                                        <input type="radio" class="w-4 h-4 text-green-600" disabled
                                            {{ isset($ada[$index]) && $ada[$index] ? 'checked' : '' }}>
                                    </td>

                                    {{-- Dokumen Tidak Ada --}}
                                    <td class="px-4 py-3 border text-center">
                                        <input type="radio" class="w-4 h-4 text-red-600" disabled
                                            {{ isset($tidakada[$index]) && $tidakada[$index] ? 'checked' : '' }}>
                                    </td>

                                    {{-- TTD Lengkap --}}
                                    <td class="px-4 py-3 border text-center">
                                        <input type="radio" class="w-4 h-4 text-blue-600" disabled
                                            {{ isset($lengkap[$index]) && $lengkap[$index] ? 'checked' : '' }}>
                                    </td>

                                    {{-- TTD Belum --}}
                                    <td class="px-4 py-3 border text-center">
                                        <input type="radio" class="w-4 h-4 text-gray-600" disabled
                                            {{ isset($belum[$index]) && $belum[$index] ? 'checked' : '' }}>
                                    </td>

                                    {{-- Keterangan --}}
                                    <td class="px-4 py-3 border text-gray-900">
                                        {{ $keterangan[$index] ?? '-' }}
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>

        </div>
    </div>
</x-app-layout>
