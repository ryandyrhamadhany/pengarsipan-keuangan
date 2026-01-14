<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Pengajuan') }}
        </h2>
    </x-slot>

<<<<<<< HEAD
    {{-- Tombol Kembali --}}
=======
    {{-- TOMBOL KEMBALI --}}
>>>>>>> main
    <div class="#">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-2">
            <a href="{{ route('user.worklist') }}"
                class="inline-flex items-center gap-2 bg-gray-100 text-gray-700 px-2 py-2 rounded-full border border-gray-200
                    shadow-lg transition-all duration-200 ease-in-out hover:bg-gray-400 hover:shadow-md active:bg-gray-300 active:scale-95">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
            </a>             
        </div>
    </div>

<<<<<<< HEAD
    <div class="py-12">
=======
    <div class="min-h-screen">
>>>>>>> main
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-8 bg-gradient-to-br from-gray-50 to-blue-50/30">

<<<<<<< HEAD
                    

=======
>>>>>>> main
                    {{-- Header Informasi --}}
                    <div class="bg-gradient-to-b from-[#003A8F] to-[#002766] rounded-xl shadow-md border border-gray-200 p-6 mb-6">
                        <div class="flex items-start justify-between mb-6">
                            <div class="flex items-center gap-4">
                                <div class="p-4 bg-white/20 backdrop-blur-sm rounded-2xl">
                                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <h3 class="text-xl font-semibold text-white mb-2">
                                        {{ $pengajuan->pengajuan_name }}
                                    </h3>
                                </div>
                            </div> 
                        </div>

                        {{-- Timestamp --}}
                        <div class="flex flex-wrap items-center gap-6 mt-6 pt-4 border-t border-white/20">
                            <div class="flex items-center gap-3 text-sm">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                    </path>
                                </svg>
                                <div>
                                    <span class="text-white">Dibuat:</span>
                                    <span class="font-medium text-white ml-1">
                                        {{ $pengajuan->created_at->translatedFormat('d M Y — H:i') }}
                                    </span>
                                </div>
                            </div>

                            <div class="flex items-center gap-3 text-sm">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <div>
                                    <span class="text-white">Update:</span>
                                    <span class="font-medium text-white ml-1">
                                        {{ $pengajuan->updated_at->translatedFormat('d M Y — H:i') }}
                                    </span>
                                </div>
                            </div>
                        </div>

                        {{-- Metode Pembayaran & Sumber Dana --}}
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-8 mb-4">
                            {{-- Metode Pembayaran --}}
                            <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-5 border border-white/20">
                                <div class="flex items-center gap-2 mb-4">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/>
                                    </svg>
                                    <h3 class="text-sm font-semibold text-white">Metode Pembayaran</h3>
                                </div>
                                <div class="bg-gray-50 rounded-md px-4 py-1 border border-gray-200">
                                    <p class="text-sm font-medium text-gray-800">
                                        {{ $pengajuan->payment_method->payment_method_name ?? '-' }}
                                    </p>
                                </div>
                            </div>

                            {{-- Sumber Dana --}}
                            <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-5 border border-white/20">
                                <div class="flex items-center gap-2 mb-4">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    <h3 class="text-sm font-semibold text-white">Sumber Dana</h3>
                                </div>
                                <div class="bg-gray-50 rounded-md px-4 py-1 border border-gray-200">
                                    <p class="text-sm font-medium text-gray-800">
                                        {{ $pengajuan->funding_source->funding_source_name ?? '-' }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        {{-- Status Badges --}}
                        <div class="flex flex-wrap gap-2 pt-4">
                            @if ($pengajuan->status_kelengkapan == 'Belum Lengkap' && $pengajuan->status_verifikasi == 0)
                                <span class="px-3 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-700">
                                    Tahapan: Dalam Proses
                                </span>
                            @endif

                            <span
                                class="px-3 py-1 rounded-full text-xs font-medium
                                {{ $pengajuan->status_kelengkapan == 'Lengkap' ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }}">
                                Kelengkapan: {{ ucfirst($pengajuan->status_kelengkapan) }}
                            </span>

                            <span
                                class="px-3 py-1 rounded-full text-xs font-medium
                                {{ $pengajuan->status_verifikasi ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                                {{ $pengajuan->status_verifikasi ? 'Sudah Diverifikasi' : 'Belum Diverifikasi' }}
                            </span>

                            <span
                                class="px-3 py-1 rounded-full text-xs font-medium
                                {{ $pengajuan->status_diarsipkan ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-700' }}">
                                {{ $pengajuan->status_diarsipkan ? 'Diarsipkan' : 'Belum Diarsipkan' }}
                            </span>
                        </div>

                        {{-- Diperiksa Oleh --}}
                        <div class="bg-white/10 backdrop-blur-sm rounded-xl border border-white/20 gap-6 mt-6 pt-6 p-6 py-4">
                            <div class="flex items-center gap-3 pb-4">
                                <div class="p-2 bg-teal-100 rounded-lg">
                                    <svg class="w-5 h-5 text-teal-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                </div>
                                <h3 class="font-semibold text-lg text-white">Diperiksa Oleh</h3>
                            </div>

                            <div class="bg-gradient-to-br from-purple-50 to-pink-50 rounded-xl p-4 border-2 border-purple-200 shadow-md">
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                                    <div class="flex items-start gap-3">
                                        <div class="w-10 h-10 bg-purple-600 rounded-lg flex items-center justify-center flex-shrink-0">
                                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                            </svg>
                                        </div>
                                        <div>
                                            <div class="text-xs font-semibold text-purple-600 mb-1 uppercase tracking-wide">Nama</div>
                                            <div class="text-gray-900 font-bold">{{ $pengajuan->finance_officer->name ?? '-' }}</div>
                                        </div>
                                    </div>

                                    <div class="flex items-start gap-3">
                                        <div class="w-10 h-10 bg-pink-600 rounded-lg flex items-center justify-center flex-shrink-0">
                                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                            </svg>
                                        </div>
                                        <div>
                                            <div class="text-xs font-semibold text-pink-600 mb-1 uppercase tracking-wide">Email</div>
                                            <div class="text-gray-900 font-bold break-all">{{ $pengajuan->finance_officer->email ?? '-' }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- File Pengajuan --}}
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 mb-6">
                        <div class="flex items-center gap-3 mb-6">
                            <div class="w-8 h-8 bg-gradient-to-b from-[#003A8F] to-[#002766] rounded-lg flex items-center justify-center shadow-md">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                            </div>
                            <h3 class="font-bold text-gray-800 text-sm uppercase tracking-wide">File Pengajuan</h3>
                        </div>

                        {{-- Nama File Saat Ini dengan Tombol Lihat --}}
                        <div class="flex items-center justify-between bg-gray-50 rounded-lg p-4 mb-4 bg-gradient-to-r from-gray-50 to-blue-50 border-2 border-dashed border-gray-300 hover:border-blue-400 transition-all duration-300">
                            <div class="flex items-center gap-4 flex-1 min-w-0">
                                <div class="flex-1 min-w-0">
                                    <p class="text-xs text-gray-500 mb-1">File Saat Ini:</p>
                                    <p class="text-sm font-semibold text-gray-800 break-all">
                                        {{ basename($pengajuan->path_file_pengajuan) ?? '-' }}
                                    </p>
                                </div>

                                <a href="{{ route('view.file', $pengajuan->id) }}" target="_blank"
                                    class="group inline-flex items-center gap-2 px-5 py-3 bg-gradient-to-r from-green-500 to-emerald-600 text-white text-sm font-semibold rounded-lg shadow-lg hover:shadow-xl hover:scale-105 transition-all duration-300">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                        </path>
                                    </svg>
                                    Lihat File
                                </a>
                            </div>
                        </div>

                        {{-- Form Upload Perbaikan --}}
                        @if (!$pengajuan->status_verifikasi && !$pengajuan->status_diarsipkan)
                            <form action="{{ route('keuangan.perbaiki', $pengajuan->id) }}" method="POST"
                                enctype="multipart/form-data" class="space-y-4">
                                @method('PUT')
                                @csrf

                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                                        Upload File Pengajuan Baru (Perbaikan)
                                    </label>

                                    <input type="file" name="file_pengajuan"
                                        class="block w-full text-sm text-gray-700 file:mr-4 file:py-2.5 file:px-5
                                                file:rounded-lg file:border-0 file:text-sm file:font-semibold
                                                file:bg-blue-500 file:text-white file:cursor-pointer
                                                border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-blue-400">
                                </div>

                                <button type="submit"
                                    class="inline-flex items-center gap-2 px-5 py-2.5 bg-green-500 text-white font-semibold rounded-lg shadow-sm">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                                        </path>
                                    </svg>
                                    Upload Perbaikan
                                </button>
                            </form>
                        @else
                            <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
                                <div class="flex items-start gap-3">
                                    <svg class="w-5 h-5 text-blue-600 mt-0.5" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <div>
                                        <p class="text-sm font-medium text-blue-800 mb-1">File Tidak Dapat Diperbarui
                                        </p>
                                        <p class="text-xs text-blue-700">
                                            @if ($pengajuan->status_verifikasi && $pengajuan->status_diarsipkan)
                                                File pengajuan sudah diverifikasi dan diarsipkan.
                                            @elseif ($pengajuan->status_verifikasi)
                                                File pengajuan sudah diverifikasi.
                                            @elseif ($pengajuan->status_diarsipkan)
                                                File pengajuan sudah diarsipkan.
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>

                    {{-- Catatan --}}
                    @if (isset($catatan) && $catatan)
                        <div class="bg-yellow-50 border-l-4 border-yellow-400 rounded-lg p-5 mb-6 shadow-sm">
                            <div class="flex items-start gap-3">
                                <div class="text-2xl">📝</div>
                                <div class="flex-1">
                                    <h3 class="text-base font-semibold text-yellow-800 mb-2">Catatan Pengajuan</h3>
                                    <p class="text-sm text-yellow-900 leading-relaxed">
                                        {{ $pengajuan->message }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endif

                    {{-- Tabel Dokumen --}}
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="p-2 bg-purple-100 rounded-lg">
                                <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                                    </path>
                                </svg>
                            </div>
                            <h3 class="font-semibold text-lg text-gray-800">Checklist Dokumen</h3>
                        </div>

                        <div class="overflow-x-auto rounded-lg border border-gray-200">
                            <table class="min-w-full bg-white text-sm">
                                {{-- HEADER --}}
                                <thead class="bg-gray-100 text-gray-700 uppercase text-xs">
                                    <tr>
                                        <th rowspan="2" class="px-4 py-3 border border-gray-300 text-center">No
                                        </th>
                                        <th rowspan="2" class="px-4 py-3 border border-gray-300">Nama Dokumen & TTD
                                        </th>
                                        <th colspan="3" class="px-4 py-3 border border-gray-300 text-center">
                                            Dokumen</th>
                                        <th colspan="2" class="px-4 py-3 border border-gray-300 text-center">Tanda
                                            Tangan</th>
                                        <th rowspan="2" class="px-4 py-3 border border-gray-300 text-center">
                                            Keterangan</th>
                                    </tr>
                                    <tr>
                                        <th class="px-4 py-2 border border-gray-300 text-center">Ada</th>
                                        <th class="px-4 py-2 border border-gray-300 text-center">Tidak Ada</th>
                                        <th class="px-4 py-2 border border-gray-300 text-center">Tidak diperlukan</th>
                                        <th class="px-4 py-2 border border-gray-300 text-center">Lengkap</th>
                                        <th class="px-4 py-2 border border-gray-300 text-center">Belum</th>
                                    </tr>
                                </thead>

                                {{-- BODY --}}
                                <tbody>
                                    @foreach ($syaratDoc as $index => $dokumen)
                                        <tr class="hover:bg-gray-50">
                                            {{-- Nomor --}}
                                            <td
                                                class="px-4 py-3 border border-gray-300 text-gray-900 font-medium text-center">
                                                {{ $index + 1 }}
                                            </td>

                                            {{-- Nama Dokumen --}}
                                            <td class="px-4 py-3 border border-gray-300 text-gray-900">
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
                                            <td class="px-4 py-3 border border-gray-300 text-center">
                                                <input type="radio" class="w-4 h-4 text-green-600" disabled
                                                    {{ isset($ada[$index]) && $ada[$index] ? 'checked' : '' }}>
                                            </td>

                                            {{-- Dokumen Tidak Ada --}}
                                            <td class="px-4 py-3 border border-gray-300 text-center">
                                                <input type="radio" class="w-4 h-4 text-red-600" disabled
                                                    {{ isset($tidakada[$index]) && $tidakada[$index] ? 'checked' : '' }}>
                                            </td>

                                            {{-- Dokumen Tidak Diperlukan --}}
                                            <td class="px-4 py-3 border border-gray-300 text-center">
                                                <input type="radio" class="w-4 h-4 text-red-600" disabled
                                                    {{ isset($tidakperlu[$index]) && $tidakperlu[$index] ? 'checked' : '' }}>
                                            </td>

                                            {{-- TTD Lengkap --}}
                                            <td class="px-4 py-3 border border-gray-300 text-center">
                                                <input type="radio" class="w-4 h-4 text-blue-600" disabled
                                                    {{ isset($lengkap[$index]) && $lengkap[$index] ? 'checked' : '' }}>
                                            </td>

                                            {{-- TTD Belum --}}
                                            <td class="px-4 py-3 border border-gray-300 text-center">
                                                <input type="radio" class="w-4 h-4 text-gray-600" disabled
                                                    {{ isset($belum[$index]) && $belum[$index] ? 'checked' : '' }}>
                                            </td>

                                            {{-- Keterangan --}}
                                            <td class="px-4 py-3 border border-gray-300 text-gray-900">
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
        </div>
    </div>
</x-app-layout>
