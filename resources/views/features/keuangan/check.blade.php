<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight">
            {{ __('Periksa Kelengkapan Pengajuan') }}
        </h2>
    </x-slot>

    {{-- TOMBOL KEMBALI --}}
    <div class="py-6">
        <div class="mx-auto max-w-7xl sm:px-2 lg:px-4">
            <a href="{{ route('verify.list.keuangan') }}"
                class="inline-flex items-center gap-2 rounded-md border border-gray-200 bg-white px-4 py-2 text-gray-700 shadow-md transition-all duration-200 hover:bg-gray-100">
                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                <span class="font-medium">Kembali</span>
            </a>
        </div>
    </div>

    <div class="min-h-screen pb-6">
        <div class="mx-auto max-w-7xl sm:px-2 lg:px-4">
            <div class="space-y-4 rounded-md border border-gray-200 bg-white p-4 shadow-md">

                {{-- Informasi Pengajuan --}}
                <div class="rounded-md border border-gray-200 bg-white shadow-sm">
                    {{-- Header --}}
                    <div class="border-b border-gray-200 p-4">
                        <div class="flex items-center gap-4">
                            <div class="rounded-md border border-gray-200 bg-white p-2">
                                <svg class="h-6 w-6 text-gray-700" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-gray-700">
                                    {{ $pengajuan->budget_submission_name }}
                                </h3>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-6 p-6">
                        {{-- Info Pengaju --}}
                        <div class="grid grid-cols-3 gap-4">
                            <div class="rounded-md border border-gray-200 bg-white p-4">
                                <div class="mb-2 flex items-center gap-2">
                                    <svg class="h-4 w-4 text-gray-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                    <p class="text-xs font-medium text-gray-500">Pengaju</p>
                                </div>
                                <div class="pl-6 text-sm font-medium text-gray-700">{{ $pengajuan->user->name }}</div>
                            </div>

                            <div class="rounded-md border border-gray-200 bg-white p-4">
                                <div class="mb-2 flex items-center gap-2">
                                    <svg class="h-4 w-4 text-gray-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>
                                    <p class="text-xs font-medium text-gray-500">Email</p>
                                </div>
                                <div class="break-all pl-6 text-sm font-medium text-gray-700">
                                    {{ $pengajuan->user->email }}</div>
                            </div>

                            <div class="rounded-md border border-gray-200 bg-white p-4">
                                <div class="mb-2 flex items-center gap-2">
                                    <svg class="h-4 w-4 text-gray-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                    </svg>
                                    <p class="text-xs font-medium text-gray-500">Divisi</p>
                                </div>
                                <div class="pl-6 text-sm font-medium text-gray-700">{{ $pengajuan->user->role }}</div>
                            </div>
                        </div>

                        {{-- Metode Pembayaran & Sumber Dana --}}
                        <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                            <div class="rounded-md border border-gray-200 bg-white p-4">
                                <div class="mb-2 flex items-center gap-2">
                                    <svg class="h-4 w-4 text-gray-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                                    </svg>
                                    <h4 class="text-xs font-semibold text-gray-500">Metode Pembayaran</h4>
                                </div>
                                <div class="pl-6 text-sm font-medium text-gray-700">
                                    {{ $pengajuan->payment_method->payment_method_name . ' - ' ?? '-' }}{{ $pengajuan->payment_method->sub_category }}
                                </div>
                            </div>

                            <div class="rounded-md border border-gray-200 bg-white p-4">
                                <div class="mb-2 flex items-center gap-2">
                                    <svg class="h-4 w-4 text-gray-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <h4 class="text-xs font-semibold text-gray-500">Sumber Dana</h4>
                                </div>
                                <p class="pl-6 text-sm font-medium text-gray-700">
                                    {{ $pengajuan->funding_source->funding_source_name . ' - ' ?? '-' }}{{ $pengajuan->funding_source->sub_category }}
                                </p>
                            </div>
                        </div>

                        {{-- Timestamp --}}
                        <div class="flex flex-wrap items-center gap-6 border-t border-gray-200 pt-4">
                            <div class="flex items-center gap-2 text-gray-600">
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                <span class="text-sm">Dibuat: <span
                                        class="font-semibold text-gray-900">{{ $pengajuan->created_at->translatedFormat('d M Y — H:i') }}</span></span>
                            </div>
                            <div class="flex items-center gap-2 text-gray-600">
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span class="text-sm">Update: <span
                                        class="font-semibold text-gray-900">{{ $pengajuan->updated_at->translatedFormat('d M Y — H:i') }}</span></span>
                            </div>
                        </div>

                        {{-- status --}}
                        <div class="flex flex-wrap items-center gap-2">
                            {{-- Status Sedang Proses --}}
                            @if ($pengajuan->requirements_status == 'Belum Lengkap' && $pengajuan->verification_status == 0)
                                <span
                                    class="inline-flex items-center rounded-md bg-yellow-100 px-2 py-1 text-xs font-medium text-yellow-700">
                                    <svg class="mr-1 h-3 w-3" fill="currentColor" viewBox="0 0 20 20">
                                        <circle cx="10" cy="10" r="3" />
                                    </svg>
                                    Proses
                                </span>
                            @elseif ($pengajuan->requirements_status == 'Lengkap' && $pengajuan->verification_status == 1 && $pengajuan->is_archive == 1)
                                <span
                                    class="inline-flex items-center rounded-md bg-green-100 px-2 py-1 text-xs font-medium text-green-700">
                                    <svg class="mr-1 h-3 w-3" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    Selesai
                                </span>
                            @endif

                            {{-- Status Kelengkapan --}}
                            @if ($pengajuan->requirements_status == 'Belum Lengkap')
                                <span
                                    class="inline-flex items-center rounded-md bg-yellow-100 px-2 py-1 text-xs font-medium text-yellow-700">
                                    <svg class="mr-1 h-3 w-3" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                    </svg>
                                    Belum Lengkap
                                </span>
                            @elseif($pengajuan->requirements_status == 'Lengkap')
                                <span
                                    class="inline-flex items-center rounded-md bg-green-100 px-2 py-1 text-xs font-medium text-green-700">
                                    <svg class="mr-1 h-3 w-3" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    Lengkap
                                </span>
                            @else
                                <span
                                    class="inline-flex items-center rounded-md bg-gray-100 px-2 py-1 text-xs font-medium text-gray-700">
                                    <svg class="mr-1 h-3 w-3" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                    Belum Diperiksa
                                </span>
                            @endif

                            {{-- Status Verifikasi --}}
                            @if ($pengajuan->verification_status == 1)
                                <span
                                    class="inline-flex items-center rounded-md bg-green-100 px-2 py-1 text-xs font-medium text-green-700">
                                    <svg class="mr-1 h-3 w-3" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                    </svg>
                                    Diverifikasi
                                </span>
                            @else
                                <span
                                    class="inline-flex items-center rounded-md bg-red-100 px-2 py-1 text-xs font-medium text-red-700">
                                    <svg class="mr-1 h-3 w-3" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                    Belum Diverifikasi
                                </span>
                            @endif

                            {{-- Status Arsip --}}
                            @if ($pengajuan->is_archive == 1)
                                <span
                                    class="inline-flex items-center rounded-md bg-blue-100 px-2 py-1 text-xs font-medium text-blue-700">
                                    <svg class="mr-1 h-3 w-3" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                                    </svg>
                                    Diarsipkan
                                </span>
                            @endif

                            @if (
                                $pengajuan->requirements_status == 'Belum Lengkap' &&
                                    $pengajuan->verification_status == 0 &&
                                    $pengajuan->is_return == 0)
                                <span
                                    class="inline-flex items-center rounded-md bg-orange-100 px-2 py-1 text-xs font-medium text-orange-700">
                                    <svg class="mr-1 h-3 w-3" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16.862 4.487l1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125" />
                                    </svg>
                                    Diperbaiki
                                </span>
                            @endif
                        </div>

                        {{-- Diperiksa Oleh --}}
                        <div>
                            <div class="mb-2 text-sm font-semibold text-gray-700">Diperiksa Oleh</div>
                            <div class="rounded-md border border-gray-200 bg-gray-100 p-4">
                                <div class="grid grid-cols-2">
                                    <div>
                                        <p class="mb-1 text-xs font-medium text-gray-500">Nama</p>
                                        <p class="text-sm font-semibold text-gray-700">
                                            {{ $pengajuan->finance_officer->name ?? '-' }}
                                        </p>
                                    </div>
                                    <div>
                                        <p class="mb-1 text-xs font-medium text-gray-500">Email</p>
                                        <p class="break-all text-sm font-semibold text-gray-700">
                                            {{ $pengajuan->finance_officer->email ?? '-' }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Diperiksa Oleh --}}
                        <div>
                            <div class="mb-2 text-sm font-semibold text-gray-700">Diperiksa Oleh Bendahara</div>
                            <div class="rounded-md border border-gray-200 bg-gray-100 p-4">
                                <div class="grid grid-cols-2">
                                    <div>
                                        <p class="mb-1 text-xs font-medium text-gray-500">Nama</p>
                                        <p class="text-sm font-semibold text-gray-700">
                                            {{ $pengajuan->revenue_officer->name ?? '-' }}
                                        </p>
                                    </div>
                                    <div>
                                        <p class="mb-1 text-xs font-medium text-gray-500">Email</p>
                                        <p class="break-all text-sm font-semibold text-gray-700">
                                            {{ $pengajuan->revenue_officer->email ?? '-' }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- File Pengajuan --}}
                <div class="rounded-md border border-gray-200 bg-white shadow-sm">
                    <div class="border-b border-gray-200 bg-gray-100 p-4">
                        <div class="flex items-center gap-3">
                            <div class="rounded-md border border-gray-200 bg-white p-2 shadow-sm">
                                <svg class="h-5 w-5 text-gray-500" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <h3 class="text-lg font-semibold text-gray-700">File Pengajuan</h3>
                        </div>
                    </div>

                    <div class="flex items-center justify-between rounded-md p-4">
                        <div>
                            <p class="mb-2 text-xs font-medium text-gray-500">Nama File</p>
                            <p class="truncate text-sm font-semibold text-gray-700">
                                {{ basename($pengajuan->path_file_submission) }}
                            </p>
                        </div>

                        <div class="flex gap-2">
                            <a href="{{ route('file.stream', $pengajuan->id) }}" target="_blank"
                                class="inline-flex items-center gap-2 rounded-md bg-emerald-600 px-4 py-2 text-sm font-semibold text-white transition-all duration-200 hover:bg-emerald-700">
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                                Lihat
                            </a>
                            <a href="{{ route('file.download', $pengajuan->id) }}"
                                class="inline-flex items-center gap-2 rounded-md bg-blue-600 px-4 py-2 text-sm font-semibold text-white transition-all duration-200 hover:bg-blue-700">
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                </svg>
                                Download
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Form Checklist --}}
                <form action="{{ route('verify.keuangan', $pengajuan->id) }}" method="POST">
                    @method('PUT')
                    @csrf

                    {{-- Tabel Checklist --}}
                    <div class="overflow-hidden rounded-md border border-gray-200 bg-white shadow-sm">
                        <div class="border-b border-gray-200 bg-white p-4">
                            <div class="flex items-center gap-2">
                                <div class="rounded-md border border-gray-200 bg-white p-2 shadow-sm">
                                    <svg class="h-5 w-5 text-purple-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                                    </svg>
                                </div>
                                <div class="text-lg font-semibold text-gray-700">Checklist Dokumen & Tanda Tangan
                                </div>
                            </div>
                        </div>

                        <div class="p-6">
                            <div class="overflow-x-auto rounded-md border border-gray-200">
                                <table class="min-w-full bg-white text-sm">
                                    <thead class="bg-gray-100 text-xs text-gray-700">
                                        <tr>
                                            <th rowspan="2"
                                                class="border-b border-r border-gray-300 px-4 py-3 text-center">No
                                            </th>
                                            <th rowspan="2" class="border-b border-r border-gray-300 px-4 py-3">
                                                Nama Dokumen & TTD
                                            </th>
                                            <th colspan="3"
                                                class="border-b border-r border-gray-300 px-4 py-3 text-center">
                                                Dokumen</th>
                                            <th colspan="2"
                                                class="border-b border-r border-gray-300 px-4 py-3 text-center">Tanda
                                                Tangan</th>
                                            <th rowspan="2" class="border-b border-gray-300 px-4 py-3 text-center">
                                                Keterangan</th>
                                        </tr>
                                        <tr>
                                            <th class="border border-gray-300 px-4 py-2 text-center">Ada</th>
                                            <th class="border border-gray-300 px-4 py-2 text-center">Tidak Ada</th>
                                            <th class="border border-gray-300 px-4 py-2 text-center">Tidak diperlukan
                                            </th>
                                            <th class="border border-gray-300 px-4 py-2 text-center">Lengkap</th>
                                            <th class="border border-gray-300 px-4 py-2 text-center">Belum</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($syaratDoc as $index => $dokumen)
                                            <tr class="transition-colors hover:bg-gray-100">
                                                <td
                                                    class="border-t border-r border-gray-300 px-4 py-3 text-center font-medium text-gray-900">
                                                    {{ $index + 1 }}
                                                </td>

                                                <td class="border-t border-r border-gray-300 px-4 py-3 text-gray-900">
                                                    {{ $syaratDoc[$index] }}
                                                </td>

                                                <td class="border-t border-r border-gray-300 px-4 py-3 text-center">
                                                    <input type="radio" name="ada[{{ $index }}]"
                                                        value="1"
                                                        {{ isset($ada[$index]) && $ada[$index] ? 'checked' : '' }}
                                                        class="h-5 w-5 text-green-600 focus:ring-green-500">
                                                </td>

                                                <td class="border-t border-r border-gray-300 px-4 py-3 text-center">
                                                    <input type="radio" name="ada[{{ $index }}]"
                                                        value="0"
                                                        {{ isset($tidakada[$index]) && $tidakada[$index] ? 'checked' : '' }}
                                                        class="h-5 w-5 text-red-600 focus:ring-red-500">
                                                </td>

                                                <td class="border-t border-r border-gray-300 px-4 py-3 text-center">
                                                    <input type="radio" name="ada[{{ $index }}]"
                                                        value="2"
                                                        {{ isset($tidakperlu[$index]) && $tidakperlu[$index] ? 'checked' : '' }}
                                                        class="h-5 w-5 text-yellow-600 focus:ring-yellow-500">
                                                </td>

                                                <td class="border-t border-r border-gray-300 px-4 py-3 text-center">
                                                    <input type="radio" name="ttd[{{ $index }}]"
                                                        value="1"
                                                        {{ isset($lengkap[$index]) && $lengkap[$index] ? 'checked' : '' }}
                                                        class="h-5 w-5 text-blue-600 focus:ring-blue-500">
                                                </td>

                                                <td class="border-t border-r border-gray-300 px-4 py-3 text-center">
                                                    <input type="radio" name="ttd[{{ $index }}]"
                                                        value="0"
                                                        {{ isset($belum[$index]) && $belum[$index] ? 'checked' : '' }}
                                                        class="h-5 w-5 text-gray-600 focus:ring-gray-500">
                                                </td>

                                                <td class="border-t border-gray-300 px-4 py-3">
                                                    <input type="text" name="keterangan[{{ $index }}]"
                                                        value="{{ $keterangan[$index] ?? '' }}"
                                                        class="w-full rounded-md border-gray-300 text-sm focus:border-purple-500 focus:ring-2 focus:ring-purple-500"
                                                        placeholder="Catatan...">
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    {{-- File Kelengkapan (Metadata) --}}
                    <div class="my-4 rounded-md border border-blue-200 bg-blue-50 p-4">
                        <div class="flex items-start gap-2">
                            <svg class="mt-0.5 h-5 w-5 flex-shrink-0 text-blue-600" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <div class="flex-1">
                                <p class="mb-1 text-sm font-semibold text-blue-900">Informasi Tambahan</p>
                                <p class="mb-3 text-xs text-blue-700">File metadata excel kelengkapan pengajuan
                                    (opsional)</p>
                                <a href="{{ route('file.access.metadata', $pengajuan->id) }}"
                                    class="inline-flex items-center gap-2 rounded-md bg-blue-600 px-4 py-2 text-sm font-medium text-white shadow-sm transition-all duration-200 hover:bg-blue-700">
                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                    </svg>
                                    Download File Metadata
                                </a>
                            </div>
                        </div>
                    </div>

                    {{-- Catatan Pengembalian --}}
                    <div class="mb-4 rounded-md border-l-2 border-yellow-400 bg-yellow-50 p-4">
                        <div class="mb-1 text-base font-semibold text-yellow-900">Catatan Jika Belum Lengkap
                        </div>
                        <div class="text-xs text-yellow-700">Tuliskan alasan pengembalian jika dokumen belum
                            lengkap atau saran perbaikan
                        </div>
                        <textarea name="catatan" rows="4"
                            class="mt-4 w-full rounded-md border border-yellow-200 bg-white p-3 text-sm shadow-sm focus:border-yellow-500 focus:ring-2 focus:ring-yellow-500"
                            placeholder="Contoh: Dokumen tanda tangan kepala divisi belum lengkap dan sarankan metode pembayaran dan sumber dana yang lebih baik jika perlu...">{{ $pengajuan->message }}</textarea>
                    </div>

                    {{-- Tombol Submit --}}
                    @if ($pengajuan->is_archive == 1)
                        <div class="flex justify-end">
                            <div
                                class="my-4 inline-flex cursor-not-allowed items-center gap-2 rounded-md border border-gray-300 bg-gray-100 px-6 py-4 text-base font-semibold text-gray-500 shadow-sm">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                                File Sudah Diarsipkan
                            </div>
                        </div>
                    @else
                        <div class="flex justify-end">
                            <button type="submit" name="aksi" value="lengkap"
                                class="my-4 inline-flex items-center gap-2 rounded-md bg-emerald-600 px-6 py-4 text-base font-semibold text-white shadow-sm transition-all duration-200 hover:bg-emerald-700">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                                Selesaikan Pemeriksaan
                            </button>
                        </div>
                    @endif
                </form>
                
            </div>
        </div>
    </div>
</x-app-layout>
