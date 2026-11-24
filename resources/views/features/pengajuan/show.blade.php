<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Detail Pengajuan') }}
        </h2>
    </x-slot>

    {{-- TOMBOL KEMBALI --}}
    <div class="py-4">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        </div>
    </div>

    <div class="pb-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden rounded-md bg-white shadow-md">
                <div class="p-6">
                    <a href="{{ route('submit.index') }}"
                        class="mb-4 inline-flex items-center gap-2 bg-white text-gray-700 transition-all duration-200 hover:-translate-x-1 hover:text-blue-500">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        <span class="text-sm font-medium">Kembali</span>
                    </a>

                    {{-- nama pengajuan --}}
                    <div class="mb-6 border-l-4 border-[#003A8F] pl-4">
                        <h3 class="text-xl font-bold text-gray-700">
                            {{ $pengajuan->budget_submission_name }}
                        </h3>
                    </div>

                    <div class="mb-10 flex w-full gap-2">
                        <div class="w-[60%]">
                            {{-- informasi pengaju --}}
                            <div class="rounded-md border border-gray-300 p-4">
                                <div class="mb-4 text-base font-bold text-gray-700">
                                    Informasi pengaju
                                </div>
                                <div class="space-y-2">
                                    <div class="flex text-sm text-gray-500">
                                        <span class="w-20">Nama</span>
                                        <span>: {{ $pengajuan->user->name }}</span>
                                    </div>
                                    <div class="flex text-sm text-gray-500">
                                        <span class="w-20">Email</span>
                                        <span>: {{ $pengajuan->user->email }}</span>
                                    </div>
                                    <div class="flex text-sm text-gray-500">
                                        <span class="w-20">Divisi</span>
                                        <span>: {{ $pengajuan->user->role }}</span>
                                    </div>
                                </div>

                                {{-- Metode Pembayaran & Sumber Dana --}}
                                <div class="mt-8 grid grid-cols-2 gap-4">
                                    <div class="">
                                        <p class="mb-1 text-base font-bold text-gray-700">Metode Pembayaran</p>
                                        <p class="text-sm text-gray-500">
                                            {{ $pengajuan->payment_method->payment_method_name }}
                                            {{ isset($pengajuan->payment_method->sub_category) ? ' - ' . $pengajuan->payment_method->sub_category : ' ' }}
                                        </p>
                                    </div>
                                    <div class="">
                                        <p class="mb-1 text-base font-bold text-gray-700">Sumber Dana</p>
                                        <p class="text-sm text-gray-500">
                                            {{ $pengajuan->funding_source->funding_source_name }}
                                            {{ isset($pengajuan->funding_source->sub_category) ? ' - ' . $pengajuan->funding_source->sub_category : ' ' }}
                                        </p>
                                    </div>
                                </div>
                                {{-- status pengajuan --}}
                                <div class="mt-8">
                                    <div class="mb-2 text-base font-bold text-gray-700">
                                        Status Pengajuan
                                    </div>
                                    <div class="flex flex-col items-start gap-2">
                                        @if ($pengajuan->requirements_status == 'Belum Lengkap' && $pengajuan->verification_status == 0)
                                            <div
                                                class="flex items-center rounded-md bg-blue-100 px-2 py-1 text-xs font-medium text-blue-700">
                                                <svg class="mr-1 h-3 w-3" fill="currentColor" viewBox="0 0 20 20">
                                                    <circle cx="10" cy="10" r="3" />
                                                </svg>
                                                Dalam Proses
                                            </div>
                                        @endif

                                        @if ($pengajuan->requirements_status == 'Lengkap' && $pengajuan->verification_status == 1 && $pengajuan->is_archive == 1)
                                            <div
                                                class="flex items-center rounded-md bg-green-100 px-2.5 py-1 text-xs font-medium text-green-700">
                                                <svg class="mr-1 h-3 w-3" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                                Selesai
                                            </div>
                                        @endif

                                        @if ($pengajuan->requirements_status == 'Lengkap')
                                            <div
                                                class="flex items-center rounded-md bg-green-100 px-2 py-1 text-xs font-medium text-green-700">
                                                <svg class="mr-1 h-3 w-3" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                                {{ $pengajuan->requirements_status }}
                                            </div>
                                        @elseif($pengajuan->requirements_status == 'Belum Lengkap')
                                            <div
                                                class="flex items-center rounded-md bg-yellow-100 px-2 py-1 text-xs font-medium text-yellow-700">
                                                <svg class="mr-1 h-3 w-3" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                                </svg>
                                                {{ $pengajuan->requirements_status }}
                                            </div>
                                        @else
                                            <div
                                                class="flex items-center rounded-md bg-gray-100 px-2 py-1 text-xs font-medium text-gray-700">
                                                <svg class="mr-1 h-3 w-3" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                </svg>
                                                {{ $pengajuan->requirements_status }}
                                            </div>
                                        @endif

                                        @if ($pengajuan->verification_status == 1)
                                            <div
                                                class="flex items-center rounded-md bg-green-100 px-2 py-1 text-xs font-medium text-green-700">
                                                <svg class="mr-1 h-3 w-3" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                                </svg>
                                                Diverifikasi
                                            </div>
                                        @else
                                            <div
                                                class="flex items-center rounded-md bg-red-100 px-2 py-1 text-xs font-medium text-red-700">
                                                <svg class="mr-1 h-3 w-3" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                </svg>
                                                Belum Diverifikasi
                                            </div>
                                        @endif

                                        @if ($pengajuan->is_archive == 1)
                                            <div
                                                class="flex items-center rounded-md bg-blue-100 px-2 py-1 text-xs font-medium text-blue-700">
                                                <svg class="mr-1 h-3 w-3" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                                                </svg>
                                                Diarsipkan
                                            </div>
                                        @else
                                            <div
                                                class="flex items-center rounded-md bg-gray-100 px-2 py-1 text-xs font-medium text-gray-700">
                                                <svg class="mr-1 h-3 w-3" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                                                </svg>
                                                Belum Diarsipkan
                                            </div>
                                        @endif

                                        @if ($pengajuan->is_return == 1)
                                            <div
                                                class="flex items-center rounded-md bg-orange-100 px-2 py-1 text-xs font-medium text-orange-700">
                                                <svg class="mr-1 h-3 w-3" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6" />
                                                </svg>
                                                Dikembalikan
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                {{-- catatan pengajuan --}}
                                <div class="mt-8">
                                    <div class="mb-4 text-base font-bold text-gray-700">
                                        Pesan kritik Dan Saran
                                    </div>
                                    <div
                                        class="rounded-md border border-yellow-300 bg-yellow-50 p-2 text-sm text-yellow-700">
                                        {{ $pengajuan->message ?? 'Tidak ada pesan kritik dan saran' }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="w-[40%] space-y-2">
                            {{-- informasi tanggal --}}
                            <div class="rounded-md border border-gray-300 p-4">
                                <div class="mb-4 text-base font-bold text-gray-700">
                                    Tanggal
                                </div>
                                <div class="space-y-2">
                                    <div class="flex items-center gap-2 text-sm text-gray-500">
                                        <svg class="h-4 w-4 shrink-0 text-gray-500" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                        <span class="w-16 shrink-0">Dibuat</span>
                                        <span class="font-medium text-gray-800">:
                                            {{ $pengajuan->created_at->translatedFormat('d M Y — H:i') }}</span>
                                    </div>
                                    <div class="flex items-center gap-2 text-sm text-gray-500">
                                        <svg class="h-4 w-4 shrink-0 text-gray-500" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        <span class="w-16 shrink-0">Update</span>
                                        <span class="font-medium text-gray-800">:
                                            {{ $pengajuan->updated_at->translatedFormat('d M Y — H:i') }}</span>
                                    </div>
                                </div>
                            </div>
                            {{-- informasi verifikator --}}
                            <div class="rounded-md border border-gray-300 p-4">
                                <div class="mb-4 text-base font-bold text-gray-700">
                                    Verifikator keuangan
                                </div>
                                <div class="space-y-2">
                                    <div class="flex text-sm text-gray-500">
                                        <span class="w-20">Nama</span>
                                        <span>: {{ $pengajuan->finance_officer->name ?? '-' }}</span>
                                    </div>
                                    <div class="flex text-sm text-gray-500">
                                        <span class="w-20">Email</span>
                                        <span>: {{ $pengajuan->finance_officer->email ?? '-' }}</span>
                                    </div>
                                </div>
                            </div>
                            {{-- informasi bendahara --}}
                            <div class="rounded-md border border-gray-300 p-4">
                                <div class="mb-4 text-base font-bold text-gray-700">
                                    Bendahara
                                </div>
                                <div class="space-y-2">
                                    <div class="flex text-sm text-gray-500">
                                        <span class="w-20">Nama</span>
                                        <span>: {{ $pengajuan->revenue_officer->name ?? '-' }}</span>
                                    </div>
                                    <div class="flex text-sm text-gray-500">
                                        <span class="w-20">Email</span>
                                        <span>: {{ $pengajuan->revenue_officer->email ?? '-' }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mb-4 flex w-full gap-2">
                        <div class="w-[60%]">
                            <div class="rounded-md border border-gray-300 p-4">
                                <div class="mb-4 flex items-center justify-between">
                                    <div class="text-base font-bold text-gray-700">
                                        Perbaikan Pengajuan
                                    </div>
                                    @if ($pengajuan->is_return)
                                        <div
                                            class="flex items-center rounded-md bg-yellow-100 px-2 py-1 text-xs text-yellow-700">
                                            <svg class="mr-1 h-3 w-3" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                            </svg>
                                            Pengajuan dikembalikan!!
                                            {{-- silakan perbaiki dan lengkapi syarat sesuai checklist yang tertera --}}
                                        </div>
                                    @endif
                                </div>
                                @if ($pengajuan->is_return)
                                    <div class="mb-4 text-sm text-yellow-500">
                                        Silakan perbaiki dan lengkapi syarat sesuai checklist yang tertera
                                    </div>
                                    <form action="{{ route('submit.fixing', $pengajuan->id) }}" class="space-y-6">
                                        {{-- Metode Pembayaran & Sumber Dana --}}
                                        <div class="mb-4 grid grid-cols-1 gap-4 md:grid-cols-2">
                                            {{-- Metode Pembayaran --}}
                                            <div class="">
                                                <label class="block text-xs font-medium text-gray-500">
                                                    Metode Pembayaran
                                                </label>
                                                <div class="border-b-2 border-gray-300">
                                                    <select name="payment_method" id="payment_method"
                                                        class="w-full border-none bg-transparent px-1 py-2 text-base text-gray-500 focus:outline-none focus:ring-0"
                                                        required>
                                                        <option value="" disabled>Pilih metode pembayaran
                                                        </option>
                                                        @foreach ($payment_method as $payment)
                                                            <option value="{{ $payment->id }}"
                                                                {{ $pengajuan->assigned_payment_method == $payment->id ? 'selected' : '' }}>
                                                                {{ $payment->payment_method_name }}
                                                                {{ isset($payment->sub_category) ? ' - ' . $payment->sub_category : ' ' }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            {{-- Sumber Dana --}}
                                            <div class="">
                                                <label class="block text-xs font-medium text-gray-500">
                                                    Sumber Dana
                                                </label>
                                                <div class="border-b-2 border-gray-300">
                                                    <select name="funding_source" id="funding_source"
                                                        class="w-full border-none bg-transparent px-1 py-2 text-base text-gray-500 focus:outline-none focus:ring-0"
                                                        required>
                                                        <option value="" disabled>Pilih sumber dana</option>
                                                        @foreach ($funding_source as $funding)
                                                            <option value="{{ $funding->id }}"
                                                                {{ $pengajuan->assigned_funding_source == $funding->id ? 'selected' : '' }}>
                                                                {{ $funding->funding_source_name }}
                                                                {{ isset($funding->sub_category) ? ' - ' . $funding->sub_category : ' ' }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="space-y-2">
                                            <label class="block text-xs font-medium text-gray-500">
                                                Dokumen PDF Pengajuan
                                            </label>
                                            <label for="file"
                                                class="flex cursor-pointer items-center space-x-3 rounded-md border border-gray-300 bg-gray-50 p-4 transition-colors hover:border-[#003A8F] hover:bg-[#003A8F]/5">
                                                <div
                                                    class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-md bg-[#003A8F]">
                                                    <svg class="h-5 w-5 text-white" fill="none"
                                                        stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                                    </svg>
                                                </div>
                                                <div class="flex-1">
                                                    <p id="filename" class="text-sm font-medium text-gray-700">
                                                        Pilih berkas pengajuan...
                                                    </p>
                                                    <p class="mt-0.5 text-xs text-gray-500">Format: PDF | Maksimal:
                                                        50MB</p>
                                                </div>
                                                <span
                                                    class="rounded-md bg-[#003A8F]/10 px-4 py-2 text-sm font-medium text-[#003A8F]">
                                                    Browse
                                                </span>
                                            </label>

                                            {{-- component input file --}}
                                            <input id="file" name="file_pengajuan" type="file"
                                                accept="application/pdf" class="hidden"
                                                onchange="document.getElementById('filename').innerText = this.files[0]?.name ?? 'Pilih berkas pengajuan...'"
                                                required>
                                        </div>
                                        <button type="submit"
                                            class="inline-flex items-center gap-2 rounded-md bg-green-600 px-5 py-2.5 font-medium text-white transition-colors hover:bg-green-700">
                                            <svg class="h-4 w-4" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                            </svg>
                                            Upload Perbaikan
                                        </button>
                                    </form>
                                @endif
                                @if ($pengajuan->is_return == 0 && $pengajuan->requirements_status == 'Belum Lengkap')
                                    <div class="text-xs text-gray-500">
                                        Pengajuan Sudah Diperbaiki dan Dikirimkan Kembali
                                    </div>
                                @endif
                                @if ($pengajuan->requirements_status == 'Belum Diperiksa')
                                    <div class="text-xs text-gray-500">
                                        Pengajuan Belum Diperiksa
                                    </div>
                                @endif
                                @if ($pengajuan->requirements_status == 'Lengkap' && $pengajuan->verification_status)
                                    <div class="text-xs text-green-500">
                                        Pengajuan Sudah Diverifikasi
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="w-[40%]">
                            <div class="rounded-md border border-gray-300 p-4">
                                <div class="mb-4 text-base font-bold text-gray-700">
                                    Dokumen anda sekarang
                                </div>
                                <div class="mb-4 flex items-center gap-2">
                                    <div class="rounded-md text-sm font-semibold">
                                        <svg class="fill-current text-gray-500" xmlns="http://www.w3.org/2000/svg"
                                            x="0px" y="0px" width="40" height="40" viewBox="0 0 24 24">
                                            <path
                                                d="M14,2H6C4.9,2,4,2.9,4,4v16c0,1.1,0.9,2,2,2h12c1.1,0,2-0.9,2-2V8L14,2z M16,18H8v-2h8V18z M16,14H8v-2h8V14z M13,9V3.5 L18.5,9H13z">
                                            </path>
                                        </svg>
                                    </div>
                                    <div>
                                        <div class="truncate text-sm text-gray-700">
                                            {{ basename($pengajuan->path_file_submission) ?? '-' }}
                                        </div>
                                        <div class="text-xs text-gray-500">
                                            Ukuran : {{ $filesize }}
                                        </div>
                                    </div>
                                </div>
                                <a href="{{ route('submit.stream', $pengajuan->id) }}" target="_blank"
                                    class="inline-block rounded-md bg-green-600 px-4 py-2 text-sm font-medium text-white transition-colors hover:bg-green-700">
                                    Lihat File
                                </a>
                            </div>
                        </div>
                    </div>

                    {{-- Tabel Dokumen --}}
                    <div
                        class="rounded-t-md border-l border-r border-t border-gray-300 p-4 text-lg font-bold text-gray-700">
                        Checklist Dokumen
                    </div>
                    <div class="overflow-x-auto rounded-b-md border border-gray-300">
                        <table class="min-w-full bg-white text-sm">
                            <thead class="bg-gray-100 text-xs text-gray-700">
                                <tr>
                                    <th rowspan="2"
                                        class="border-b border-r border-gray-300 px-4 py-3 text-center">No
                                    </th>
                                    <th rowspan="2" class="border-b border-r border-gray-300 px-4 py-3">Nama
                                        Dokumen & TTD
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
                                    <th class="border border-gray-300 px-4 py-2 text-center">Tidak diperlukan</th>
                                    <th class="border border-gray-300 px-4 py-2 text-center">Lengkap</th>
                                    <th class="border border-gray-300 px-4 py-2 text-center">Belum</th>
                                </tr>
                            </thead>

                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($syaratDoc as $index => $dokumen)
                                    <tr class="hover:bg-gray-50">
                                        <td
                                            class="border-r border-t border-gray-300 px-4 py-3 text-center font-medium text-gray-900">
                                            {{ $no++ }}
                                        </td>

                                        <td class="border-r border-t border-gray-300 px-4 py-3 text-gray-900">
                                            {{ $dokumen }}
                                        </td>

                                        <td class="border-r border-t border-gray-300 px-4 py-3 text-center">
                                            <input type="radio" class="h-4 w-4 text-green-600" disabled
                                                {{ isset($ada[$index]) && $ada[$index] ? 'checked' : '' }}>
                                        </td>

                                        <td class="border-r border-t border-gray-300 px-4 py-3 text-center">
                                            <input type="radio" class="h-4 w-4 text-red-600" disabled
                                                {{ isset($tidakada[$index]) && $tidakada[$index] ? 'checked' : '' }}>
                                        </td>

                                        <td class="border-r border-t border-gray-300 px-4 py-3 text-center">
                                            <input type="radio" class="h-4 w-4 text-yellow-600" disabled
                                                {{ isset($tidakperlu[$index]) && $tidakperlu[$index] ? 'checked' : '' }}>
                                        </td>

                                        <td class="border-r border-t border-gray-300 px-4 py-3 text-center">
                                            <input type="radio" class="h-4 w-4 text-blue-600" disabled
                                                {{ isset($lengkap[$index]) && $lengkap[$index] ? 'checked' : '' }}>
                                        </td>

                                        <td class="border-r border-t border-gray-300 px-4 py-3 text-center">
                                            <input type="radio" class="h-4 w-4 text-gray-600" disabled
                                                {{ isset($belum[$index]) && $belum[$index] ? 'checked' : '' }}>
                                        </td>

                                        <td class="border-r border-t border-gray-300 px-4 py-3 text-gray-900">
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
</x-app-layout>
