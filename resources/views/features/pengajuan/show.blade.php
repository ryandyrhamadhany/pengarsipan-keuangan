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
                                            {{ $pengajuan->payment_method->payment_method_name . ' - ' ?? '-' }}
                                            {{ $pengajuan->payment_method->sub_category }}
                                        </p>
                                    </div>
                                    <div class="">
                                        <p class="mb-1 text-base font-bold text-gray-700">Sumber Dana</p>
                                        <p class="text-sm text-gray-500">
                                            {{ $pengajuan->funding_source->funding_source_name . ' - ' ?? '-' }}
                                            {{ $pengajuan->funding_source->sub_category }}
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
                                                class="rounded-md bg-blue-100 px-3 py-1 text-xs font-medium text-blue-700">
                                                Dalam Proses
                                            </div>
                                        @endif

                                        @if ($pengajuan->requirements_status == 'Belum Diperiksa')
                                            <div
                                                class="rounded-md bg-gray-100 px-3 py-1 text-xs font-medium text-gray-700">
                                                {{ $pengajuan->requirements_status }}
                                            </div>
                                        @else
                                            <div
                                                class="{{ $pengajuan->requirements_status == 'Lengkap' ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }} rounded-md px-3 py-1 text-xs font-medium">
                                                {{ $pengajuan->requirements_status }}
                                            </div>
                                        @endif
                                        <div
                                            class="{{ $pengajuan->verification_status ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }} rounded-md px-3 py-1 text-xs font-medium">
                                            {{ $pengajuan->verification_status ? 'Diverifikasi' : 'Belum Diverifikasi' }}
                                        </div>

                                        <div
                                            class="{{ $pengajuan->is_archive ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-700' }} rounded-md px-3 py-1 text-xs font-medium">
                                            {{ $pengajuan->is_archive ? 'Diarsipkan' : 'Belum Diarsipkan' }}
                                        </div>

                                        @if ($pengajuan->is_return == 1)
                                            <div
                                                class="{{ $pengajuan->is_return ? 'bg-yellow-100 text-yellow-700' : '' }} rounded-md px-3 py-1 text-xs font-medium">
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
                                        <svg class="h-4 w-4 shrink-0 text-gray-500" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                        <span class="w-16 shrink-0">Dibuat</span>
                                        <span class="font-medium text-gray-800">:
                                            {{ $pengajuan->created_at->translatedFormat('d M Y — H:i') }}</span>
                                    </div>
                                    <div class="flex items-center gap-2 text-sm text-gray-500">
                                        <svg class="h-4 w-4 shrink-0 text-gray-500" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
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
                                    <form action="" class="space-y-6">
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
                                                                {{ $payment->payment_method_name }} -
                                                                {{ $payment->sub_category }}
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
                                                                {{ $funding->funding_source_name }} -
                                                                {{ $funding->sub_category }}
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
                                <a href="{{ route('file.stream', $pengajuan->id) }}" target="_blank"
                                    class="inline-block rounded-md bg-green-600 px-4 py-2 text-sm font-medium text-white transition-colors hover:bg-green-700">
                                    Lihat File
                                </a>
                            </div>
                        </div>
                    </div>

                    {{-- Header Informasi
                    <div class="rounded-md border border-gray-200 bg-white p-6 shadow-sm">
                        Header dengan border biru

                        Timestamp
                        <div class="mb-4 flex flex-wrap gap-6 border-b border-gray-200 pb-4">
                            <div class="flex items-center gap-2 text-sm text-gray-600">
                                <svg class="h-4 w-4 text-gray-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                <span>Dibuat: <span
                                        class="font-medium text-gray-800">{{ $pengajuan->created_at->translatedFormat('d M Y — H:i') }}</span></span>
                            </div>

                            <div class="flex items-center gap-2 text-sm text-gray-600">
                                <svg class="h-4 w-4 text-gray-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span>Update: <span
                                        class="font-medium text-gray-800">{{ $pengajuan->updated_at->translatedFormat('d M Y — H:i') }}</span></span>
                            </div>
                        </div>

                        Metode Pembayaran & Sumber Dana
                        <div class="mb-4 grid grid-cols-1 gap-4 md:grid-cols-2">
                            <div class="rounded-md border border-gray-200 bg-gray-50 p-4">
                                <p class="mb-1 text-xs font-medium text-gray-500">Metode Pembayaran</p>
                                <p class="text-sm font-semibold text-gray-800">
                                    {{ $pengajuan->payment_method->payment_method_name . ' - ' ?? '-' }}
                                    {{ $pengajuan->payment_method->sub_category }}
                                </p>
                            </div>

                            <div class="rounded-md border border-gray-200 bg-gray-50 p-4">
                                <p class="mb-1 text-xs font-medium text-gray-500">Sumber Dana</p>
                                <p class="text-sm font-semibold text-gray-800">
                                    {{ $pengajuan->funding_source->funding_source_name . ' - ' ?? '-' }}
                                    {{ $pengajuan->funding_source->sub_category }}
                                </p>
                            </div>
                        </div>

                        Status Badges
                        <div class="mb-4 flex flex-wrap gap-2 border-b border-gray-200 pb-4">
                            @if ($pengajuan->requirements_status == 'Belum Lengkap' && $pengajuan->verification_status == 0)
                                <span class="rounded-md bg-blue-100 px-3 py-1 text-xs font-medium text-blue-700">
                                    Dalam Proses
                                </span>
                            @endif

                            @if ($pengajuan->requirements_status == 'Belum Diperiksa')
                                <span class="rounded-md bg-gray-100 px-3 py-1 text-xs font-medium text-gray-700">
                                    {{ $pengajuan->requirements_status }}
                                </span>
                            @else
                                <span
                                    class="{{ $pengajuan->requirements_status == 'Lengkap' ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }} rounded-md px-3 py-1 text-xs font-medium">
                                    {{ $pengajuan->requirements_status }}
                                </span>
                            @endif

                            <span
                                class="{{ $pengajuan->verification_status ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }} rounded-md px-3 py-1 text-xs font-medium">
                                {{ $pengajuan->verification_status ? 'Diverifikasi' : 'Belum Diverifikasi' }}
                            </span>

                            <span
                                class="{{ $pengajuan->is_archive ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-700' }} rounded-md px-3 py-1 text-xs font-medium">
                                {{ $pengajuan->is_archive ? 'Diarsipkan' : 'Belum Diarsipkan' }}
                            </span>

                            @if ($pengajuan->is_return == 1)
                                <span
                                    class="{{ $pengajuan->is_return ? 'bg-yellow-100 text-yellow-700' : '' }} rounded-md px-3 py-1 text-xs font-medium">
                                    Dikembalikan
                                </span>
                            @endif

                        </div>

                        Diperiksa Oleh
                        <div>
                            <p class="mb-3 text-sm font-semibold text-gray-700">Diperiksa Oleh</p>
                            <div class="rounded-md border border-gray-200 bg-gray-50 p-4">
                                <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                                    <div>
                                        <p class="mb-1 text-xs font-medium text-gray-500">Nama</p>
                                        <p class="text-sm font-semibold text-gray-800">
                                            {{ $pengajuan->finance_officer->name ?? '-' }}
                                        </p>
                                    </div>
                                    <div>
                                        <p class="mb-1 text-xs font-medium text-gray-500">Email</p>
                                        <p class="break-all text-sm font-semibold text-gray-800">
                                            {{ $pengajuan->finance_officer->email ?? '-' }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        Diperiksa Oleh
                        <div>
                            <p class="mb-3 mt-3 text-sm font-semibold text-gray-700">Diperiksa Oleh Bendahara</p>
                            <div class="rounded-md border border-gray-200 bg-gray-50 p-4">
                                <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                                    <div>
                                        <p class="mb-1 text-xs font-medium text-gray-500">Nama</p>
                                        <p class="text-sm font-semibold text-gray-800">
                                            {{ $pengajuan->revenue_officer->name ?? '-' }}
                                        </p>
                                    </div>
                                    <div>
                                        <p class="mb-1 text-xs font-medium text-gray-500">Email</p>
                                        <p class="break-all text-sm font-semibold text-gray-800">
                                            {{ $pengajuan->revenue_officer->email ?? '-' }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    Message
                    <div class="rounded-md border border-gray-200 bg-white p-6 shadow-sm">
                        <div class="mb-4 border-l-4 border-yellow-400 pl-4">
                            <h3 class="text-lg font-semibold text-gray-800">Pesan Kritik dan Saran</h3>
                        </div>

                        @if (isset($pengajuan->message) && !empty($pengajuan->message))
                            <div class="rounded-md border border-yellow-200 bg-yellow-50 p-4">
                                <div class="flex items-start gap-3">
                                    <svg class="mt-0.5 h-5 w-5 flex-shrink-0 text-yellow-600" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                                    </svg>
                                    <div class="flex-1">
                                        <p class="whitespace-pre-line text-sm leading-relaxed text-gray-800">
                                            {{ $pengajuan->message }}</p>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="rounded-md border border-gray-200 bg-gray-50 p-4">
                                <div class="flex items-start gap-3">
                                    <svg class="mt-0.5 h-5 w-5 flex-shrink-0 text-gray-400" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <div class="flex-1">
                                        <p class="text-sm italic text-gray-500">Tidak ada pesan kritik dan saran</p>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div> --}}

                    {{-- File Pengajuan
                    <div class="rounded-md border border-gray-200 bg-white p-6 shadow-sm">
                        <div class="mb-2 flex items-center justify-between">
                            <h3 class="mb-4 font-semibold text-gray-800">File Pengajuan</h3>
                            @if ($pengajuan->is_return)
                                <div
                                    class="flex items-center rounded-md bg-yellow-100 px-2 py-1 text-xs text-yellow-700">
                                    <svg class="mr-1 h-3 w-3" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                    </svg>
                                    Pengajuan dikembalikan silakan perbaiki dan lengkapi syarat sesuai checklist yang
                                    tertera
                                </div>
                            @endif
                        </div>

                        File Saat Ini
                        <div
                            class="mb-4 flex items-center justify-between rounded-md border border-gray-200 bg-gray-50 p-4">
                            <div class="min-w-0 flex-1">
                                <p class="mb-1 text-xs text-gray-500">File Saat Ini:</p>
                                <p class="break-all text-sm font-medium text-gray-800">
                                    {{ basename($pengajuan->path_file_submission) ?? '-' }}
                                </p>
                            </div>
                            <a href="{{ route('file.stream', $pengajuan->id) }}" target="_blank"
                                class="ml-4 rounded-md bg-green-600 px-4 py-2 text-sm font-medium text-white transition-colors hover:bg-green-700">
                                Lihat File
                            </a>
                        </div>

                        Form Upload Perbaikan
                        @if (!$pengajuan->verification_status && !$pengajuan->is_archive)
                            <form action="{{ route('submit.fixing', $pengajuan->id) }}" method="POST"
                                enctype="multipart/form-data" class="space-y-4">
                                @method('PUT')
                                @csrf

                                <div>
                                    <label class="mb-2 block text-sm font-medium text-gray-700">
                                        Upload File Pengajuan Baru (Perbaikan)
                                    </label>

                                    Metode Pembayaran & Sumber Dana
                                    <div class="mb-4 grid grid-cols-1 gap-4 md:grid-cols-2">
                                        Metode Pembayaran
                                        <div class="space-y-2">
                                            <label class="block text-sm font-medium text-gray-700">
                                                Metode Pembayaran <span class="text-red-500">*</span>
                                            </label>
                                            <select name="payment_method" id="payment_method"
                                                class="w-full rounded-md border border-gray-300 px-4 py-2.5 text-gray-900 transition-colors focus:border-[#003A8F] focus:outline-none focus:ring-2 focus:ring-[#003A8F]"
                                                required>
                                                <option value="" disabled>Pilih metode pembayaran</option>
                                                @foreach ($payment_method as $payment)
                                                    <option value="{{ $payment->id }}"
                                                        {{ $pengajuan->assigned_payment_method == $payment->id ? 'selected' : '' }}>
                                                        {{ $payment->payment_method_name }} -
                                                        {{ $payment->sub_category }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        Sumber Dana
                                        <div class="space-y-2">
                                            <label class="block text-sm font-medium text-gray-700">
                                                Sumber Dana <span class="text-red-500">*</span>
                                            </label>
                                            <select name="funding_source" id="funding_source"
                                                class="w-full rounded-md border border-gray-300 px-4 py-2.5 text-gray-900 transition-colors focus:border-[#003A8F] focus:outline-none focus:ring-2 focus:ring-[#003A8F]"
                                                required>
                                                <option value="" disabled>Pilih sumber dana</option>
                                                @foreach ($funding_source as $funding)
                                                    <option value="{{ $funding->id }}"
                                                        {{ $pengajuan->assigned_funding_source == $funding->id ? 'selected' : '' }}>
                                                        {{ $funding->funding_source_name }} -
                                                        {{ $funding->sub_category }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    Upload File
                                    <div class="space-y-2">
                                        <label class="block text-sm font-medium text-gray-700">
                                            File Pengajuan (PDF) <span class="text-red-500">*</span>
                                        </label>
                                        <input type="file" name="file_pengajuan" accept="application/pdf"
                                            class="w-full rounded-md border border-gray-300 px-4 py-2.5 text-gray-900 transition-colors file:mr-4 file:rounded-md file:border-0 file:bg-[#003A8F] file:px-4 file:py-2 file:text-sm file:font-semibold file:text-white hover:file:bg-[#002766] focus:border-[#003A8F] focus:outline-none focus:ring-2 focus:ring-[#003A8F]"
                                            required>
                                        <p class="mt-1 text-xs text-gray-500">Format: PDF | Maksimal: 50MB</p>
                                    </div>
                                </div>

                                <button type="submit"
                                    class="inline-flex items-center gap-2 rounded-md bg-green-600 px-5 py-2.5 font-medium text-white transition-colors hover:bg-green-700">
                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                    </svg>
                                    Upload Perbaikan
                                </button>
                            </form>
                        @else
                            <div class="rounded-md border border-blue-200 bg-blue-50 p-4">
                                <div class="flex items-start gap-3">
                                    <svg class="mt-0.5 h-5 w-5 text-blue-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <div>
                                        <p class="mb-1 text-sm font-medium text-blue-800">File Tidak Dapat Diperbarui
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
                    </div> --}}

                    {{-- Catatan --}}
                    {{-- @if (isset($pengajuan->message) && $pengajuan->message)
                        <div class="rounded-md border-l-4 border-yellow-400 bg-yellow-50 p-4">
                            <div class="flex items-start gap-3">
                                <svg class="mt-0.5 h-5 w-5 text-yellow-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                                <div>
                                    <h3 class="mb-1 text-sm font-semibold text-yellow-800">Catatan Pengajuan</h3>
                                    <p class="text-sm text-yellow-900">{{ $pengajuan->message }}</p>
                                </div>
                            </div>
                        </div>
                    @endif --}}

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
                    {{-- <div class="rounded-md border border-gray-200 bg-white p-6 shadow-sm">
                        <h3 class="mb-4 font-semibold text-gray-800">Checklist Dokumen</h3>

                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
