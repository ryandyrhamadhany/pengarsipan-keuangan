<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight">
            {{ __('Verifikasi Final Pengajuan') }}
        </h2>
    </x-slot>

    {{-- TOMBOL KEMBALI --}}
    <div class="py-6">
        <div class="mx-auto max-w-7xl sm:px-2 lg:px-4">
            <a href="{{ route('verify.list.bendahara') }}"
                class="inline-flex items-center gap-2 rounded-md border border-gray-300 bg-white px-4 py-2 text-gray-700 shadow-md transition-all duration-200 hover:bg-gray-100">
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

                {{-- SECTION 1: HEADER INFORMASI PENGAJUAN --}}
                <div class="rounded-md border border-gray-200 bg-white">
                    {{-- Header --}}
                    <div class="border-b border-gray-200 p-4">

                        <div class="flex items-center gap-4">
                            <div class="rounded-md border border-gray-200 bg-white p-2">
                                <svg class="h-6 w-6 text-gray-700" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                            </div>
                            <div class="text-xl font-bold text-gray-700">
                                {{ $pengajuan->budget_submission_name }}
                            </div>
                        </div>
                    </div>

                    <div class="space-y-6 p-6">
                        {{-- Info Pemohon --}}
                        <div>
                            <div class="grid grid-cols-1 gap-4 md:grid-cols-3">
                                <div class="rounded-md border border-gray-200 bg-white p-4">
                                    <div class="mb-2 flex items-center gap-2">
                                        <svg class="h-4 w-4 text-gray-500" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                        </svg>
                                        <p class="text-xs font-medium text-gray-500">Nama Pemohon</p>
                                    </div>
                                    <p class="pl-6 text-sm font-semibold text-gray-700">{{ $pengajuan->user->name }}</p>
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
                                    <p class="break-all pl-6 text-sm font-medium text-gray-700">
                                        {{ $pengajuan->user->email }}</p>
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
                                    <p class="pl-6 text-sm font-medium text-gray-700">
                                        {{ $pengajuan->user->role }}</p>
                                </div>
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
                                    <h4 class="text-xs font-medium text-gray-500">Metode Pembayaran</h4>
                                </div>
                                <p class="pl-6 text-sm font-medium text-gray-700">
                                    {{ $pengajuan->payment_method->payment_method_name . ' - ' ?? '-' }}{{ $pengajuan->payment_method->sub_category }}
                                </p>
                            </div>

                            <div class="rounded-md border border-gray-200 bg-white p-4">
                                <div class="mb-2 flex items-center gap-2">
                                    <svg class="h-4 w-4 text-gray-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <h4 class="text-xs font-medium text-gray-500">Sumber Dana</h4>
                                </div>
                                <p class="pl-6 text-sm font-medium text-gray-700">
                                    {{ $pengajuan->funding_source->funding_source_name . ' - ' ?? '-' }}{{ $pengajuan->funding_source->sub_category }}
                                </p>
                            </div>
                        </div>

                        {{-- Timeline --}}
                        <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                            <div class="rounded-md border border-gray-200 bg-white p-4">
                                <div class="mb-2 flex items-center gap-2">
                                    <svg class="h-4 w-4 text-gray-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    <p class="text-xs font-medium text-gray-500">Tanggal Dibuat</p>
                                </div>
                                <p class="pl-6 text-sm font-semibold text-gray-700">
                                    {{ $pengajuan->created_at->translatedFormat('d M Y — H:i') }}
                                </p>
                            </div>

                            <div class="rounded-md border border-gray-200 bg-white p-4">
                                <div class="mb-2 flex items-center gap-2">
                                    <svg class="h-4 w-4 text-gray-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <p class="text-xs font-medium text-gray-500">Terakhir Diupdate</p>
                                </div>
                                <p class="pl-6 text-sm font-semibold text-gray-700">
                                    {{ $pengajuan->updated_at->translatedFormat('d M Y — H:i') }}
                                </p>
                            </div>
                        </div>

                        {{-- Status Badges --}}
                        <div class="rounded-md border border-gray-200 bg-white p-4">
                            <div class="mb-3 flex items-center gap-2">
                                <svg class="h-5 w-5 text-gray-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <h4 class="font-semibold text-gray-800">Status Pengajuan</h4>
                            </div>

                            <div class="flex flex-wrap items-center gap-2">
                                @if ($pengajuan->is_archive == 1)
                                    <span
                                        class="inline-flex items-center rounded-md bg-green-100 px-2 py-1 text-xs font-medium text-green-700">
                                        <svg class="mr-1 h-3 w-3" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        Selesai
                                    </span>
                                @else
                                    <span
                                        class="inline-flex items-center rounded-md bg-yellow-100 px-2 py-1 text-xs font-medium text-yellow-700">
                                        <svg class="mr-1 h-3 w-3" fill="currentColor" viewBox="0 0 20 20">
                                            <circle cx="10" cy="10" r="3" />
                                        </svg>
                                        Menunggu Tanda Tangan Bendahara
                                    </span>
                                @endif

                                @if ($pengajuan->requirements_status == 'Lengkap')
                                    <span
                                        class="inline-flex items-center rounded-md bg-green-100 px-2 py-1 text-xs font-medium text-green-700">
                                        <svg class="mr-1 h-3 w-3" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        Lengkap
                                    </span>
                                @endif

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
                                @endif

                                @if ($pengajuan->is_archive == 1)
                                    <span
                                        class="inline-flex items-center rounded-md bg-green-100 px-2 py-1 text-xs font-medium text-green-700">
                                        <svg class="mr-1 h-3 w-3" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                                        </svg>
                                        Diarsipkan
                                    </span>
                                @else
                                    <span
                                        class="inline-flex items-center rounded-md bg-orange-100 px-2 py-1 text-xs font-medium text-orange-700">
                                        <svg class="mr-1 h-3 w-3" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M20.25 7.5l-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" />
                                        </svg>
                                        Belum Arsip
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                {{-- SECTION 2: PEMERIKSA --}}
                <div class="rounded-md border border-gray-200 bg-white">
                    <div class="border-b border-gray-200 p-4">
                        <div class="flex items-center gap-2">
                            <div class="rounded-md border border-gray-200 bg-white p-2">
                                <svg class="h-5 w-5 text-gray-700" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <h3 class="text-lg font-semibold text-gray-700">Diperiksa Oleh</h3>
                        </div>
                    </div>

                    <div class="p-6">
                        <div class="grid grid-cols-1 gap-4 md:grid-cols-3">
                            <div class="rounded-md border border-gray-200 bg-gray-100 p-4">
                                <p class="mb-2 text-xs font-medium text-gray-500">Nama</p>
                                <p class="text-sm font-semibold text-gray-700">
                                    {{ $pengajuan->finance_officer->name ?? '-' }}</p>
                            </div>

                            <div class="rounded-md border border-gray-200 bg-gray-100 p-4">
                                <p class="mb-2 text-xs font-medium text-gray-500">Email</p>
                                <p class="break-all text-sm font-medium text-gray-700">
                                    {{ $pengajuan->finance_officer->email ?? '-' }}</p>
                            </div>

                            <div class="rounded-md border border-gray-200 bg-gray-100 p-4">
                                <p class="mb-2 text-xs font-medium text-gray-500">Divisi</p>
                                <p class="text-sm font-medium capitalize text-gray-700">
                                    {{ $pengajuan->finance_officer->role ?? '-' }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- SECTION 2: PEMERIKSA --}}
                <div class="rounded-md border border-gray-200 bg-white">
                    <div class="border-b border-gray-200 p-4">
                        <div class="flex items-center gap-2">
                            <div class="rounded-md border border-gray-200 bg-white p-2">
                                <svg class="h-5 w-5 text-gray-700" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <h3 class="text-lg font-semibold text-gray-700">Diperiksa Oleh Bendahara</h3>
                        </div>
                    </div>

                    <div class="p-6">
                        <div class="grid grid-cols-1 gap-4 md:grid-cols-3">
                            <div class="rounded-md border border-gray-200 bg-gray-100 p-4">
                                <p class="mb-1 text-xs font-medium text-gray-500">Nama</p>
                                <p class="text-sm font-semibold text-gray-700">
                                    {{ $pengajuan->revenue_officer->name ?? '-' }}</p>
                            </div>

                            <div class="rounded-md border border-gray-200 bg-gray-100 p-4">
                                <p class="mb-1 text-xs font-medium text-gray-500">Email</p>
                                <p class="break-all text-sm font-medium text-gray-700">
                                    {{ $pengajuan->revenue_officer->email ?? '-' }}</p>
                            </div>

                            <div class="rounded-md border border-gray-200 bg-gray-100 p-4">
                                <p class="mb-1 text-xs font-medium text-gray-500">Divisi</p>
                                <p class="text-sm font-medium capitalize text-gray-700">
                                    {{ $pengajuan->revenue_officer->role ?? '-' }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- SECTION 3: FILE PENGAJUAN --}}
                <div class="rounded-md border border-gray-200 bg-white">
                    <div class="border-b border-gray-200 p-4">
                        <div class="flex items-center gap-2">
                            <div class="rounded-md border border-gray-200 p-2">
                                <svg class="h-5 w-5 text-gray-500" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                            </div>
                            <div class="text-lg font-semibold text-gray-700">File Pengajuan</div>
                        </div>
                    </div>

                    <div class="border-b border-blue-200 bg-blue-50 p-4">
                        <div class="flex items-start gap-2">
                            <svg class="mt-0.5 h-5 w-5 flex-shrink-0 text-blue-500" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <p class="text-sm text-blue-700">
                                Mohon untuk <span class="font-semibold">menandatangani dokumen pengajuan</span>
                                sebelum dilakukan proses verifikasi final.
                            </p>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-xs font-medium text-gray-500">Nama File</p>
                                <p class="truncate text-sm font-semibold text-gray-900">
                                    {{ basename($pengajuan->path_file_submission) ?? '-' }}
                                </p>
                            </div>
                            <div class="flex gap-2">
                                <a href="{{ route('file.stream', $pengajuan->id) }}" target="_blank"
                                    class="inline-flex items-center gap-2 rounded-md bg-blue-600 px-4 py-2 text-sm font-semibold text-white shadow-sm transition-all duration-200 hover:bg-blue-700">
                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                    Lihat
                                </a>

                                <a href="{{ route('file.download', $pengajuan->id) }}"
                                    class="inline-flex items-center gap-2 rounded-md bg-gray-100 px-4 py-2 text-sm font-semibold text-gray-700 shadow-sm transition-all duration-200 hover:bg-gray-200">
                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                    </svg>
                                    Download
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    {{-- SECTION 4: FORM VERIFIKASI --}}
                    <div class="rounded-t-md border-t border-l border-r border-gray-200 p-4">
                        <div class="flex gap-2 items-center">
                            <div class="rounded-md border border-gray-200 bg-white p-2">
                                <svg class="h-5 w-5 text-gray-700" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div class="text-lg font-semibold text-gray-700">
                                Verifikasi
                            </div>
                        </div>
                    </div>
                    <div class="border-t border-l border-r border-blue-200 bg-blue-50 p-4">
                        <div class="flex items-start gap-2">
                            <svg class="mt-0.5 h-5 w-5 flex-shrink-0 text-blue-500" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <p class="text-sm text-blue-700">
                                Silakan isi data dibawah ini untuk <span class="font-semibold">verifikasi pengajuan</span> final.
                            </p>
                        </div>
                    </div>
                    {{-- Upload Form --}}
                    <form action="{{ route('verify.bendahara', $pengajuan->id) }}" method="POST"
                        enctype="multipart/form-data" class="space-y-4 border border-gray-200 p-4 rounded-b-md">
                        @method('PUT')
                        @csrf
    
                        @if (!$pengajuan->requirements_status || !$pengajuan->is_archive)
                            {{-- Upload File --}}
                            <div class="rounded-md border border-gray-200 bg-gray-100 p-4">
                                <div class="mb-4 flex items-center gap-2">
                                    <svg class="h-5 w-5 text-gray-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                    </svg>
                                    <label class="font-semibold text-gray-700">Upload File Bertanda
                                        Tangan</label>
                                </div>
    
                                <input type="file" name="file_pengajuan" accept="application/pdf" required
                                    class="block w-full cursor-pointer text-sm text-gray-700 file:mr-4 file:rounded-md file:border-0 file:bg-blue-600 file:px-4 file:py-2.5 file:text-sm file:font-semibold file:text-white file:shadow-sm file:transition-all file:duration-200 hover:file:bg-blue-700 hover:file:shadow-md">
                                <p class="mt-2 text-xs text-gray-500">Format: PDF | Maksimal: 50MB</p>
                            </div>
    
                            {{-- Biaya --}}
                            <div class="rounded-md border border-gray-200 bg-gray-100 p-4">
                                <div class="mb-4 flex items-center gap-2">
                                    <svg class="h-5 w-5 text-gray-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <label class="font-semibold text-gray-700">Biaya yang Dibayarkan</label>
                                </div>
    
                                <div class="relative">
                                    <span
                                        class="absolute inset-y-0 left-0 flex items-center pl-3 font-medium text-gray-600">Rp</span>
                                    <input type="number" name="biaya" value="{{ $pengajuan->biaya ?? '' }}"
                                        placeholder="0" min="0" required
                                        class="w-full rounded-md border border-gray-300 bg-white py-2.5 pl-10 pr-3 text-sm text-gray-800 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-500">
                                </div>
                                <p class="mt-2 text-xs text-gray-500">Masukkan nominal biaya sesuai dokumen
                                    pengajuan</p>
                            </div>
    
                            {{-- Nomor Kuitansi --}}
                            <div class="rounded-md border border-gray-200 bg-gray-100 p-4">
                                <div class="mb-4 flex items-center gap-2">
                                    <svg class="h-5 w-5 text-gray-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14" />
                                    </svg>
                                    <label class="font-semibold text-gray-700">Nomor Kuitansi</label>
                                </div>
    
                                <input type="text" name="kuitansi" value="{{ $kuitansi ?? '' }}"
                                    placeholder="Contoh: KWT/2024/001"
                                    class="w-full rounded-md border border-gray-300 bg-white px-3 py-2.5 text-sm text-gray-800 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-500">
                                <p class="mt-2 text-xs text-gray-500">Opsional - Gunakan format sesuai standar
                                    institusi</p>
                            </div>
    
                            {{-- Nomor SPBy --}}
                            <div class="rounded-md border border-gray-200 bg-gray-100 p-4">
                                <div class="mb-4 flex items-center gap-2">
                                    <svg class="h-5 w-5 text-gray-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                    <label class="font-semibold text-gray-700">Nomor SPBy</label>
                                </div>
    
                                <input type="text" name="no_spby" value="{{ $no_spm ?? '' }}"
                                    placeholder="Contoh: SPBy/2024/001"
                                    class="w-full rounded-md border border-gray-300 bg-white px-3 py-2.5 text-sm text-gray-800 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-500">
                                <p class="mt-2 text-xs text-gray-500">Opsional - Nomor Surat Perintah Bayar</p>
                            </div>
    
                            {{-- Metode Pembayaran & Sumber Dana --}}
                            <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                                <div class="rounded-md border border-gray-200 bg-gray-100 p-4">
                                    <div class="mb-4 flex items-center gap-2">
                                        <svg class="h-5 w-5 text-gray-500" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                                        </svg>
                                        <label class="font-semibold text-gray-700">Metode Pembayaran</label>
                                    </div>
    
                                    <select name="payment_method" required
                                        class="w-full rounded-md border border-gray-300 bg-white p-2.5 text-sm text-gray-800 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-500">
                                        <option value="" disabled selected>--- Pilih metode pembayaran
                                            ---</option>
                                        @foreach ($payment_method as $payment)
                                            <option value="{{ $payment->id }}">
                                                {{ $payment->payment_method_name }} -
                                                {{ $payment->sub_category }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
    
                                <div class="rounded-md border border-gray-200 bg-gray-100 p-4">
                                    <div class="mb-4 flex items-center gap-2">
                                        <svg class="h-5 w-5 text-gray-500" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        <label class="font-semibold text-gray-700">Sumber Dana</label>
                                    </div>
    
                                    <select name="funding_source" required
                                        class="w-full rounded-md border border-gray-300 bg-white p-2.5 text-sm text-gray-800 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-500">
                                        <option value="" disabled selected>--- Pilih sumber dana ---
                                        </option>
                                        @foreach ($funding_source as $funding)
                                            <option value="{{ $funding->id }}">
                                                {{ $funding->funding_source_name }} -
                                                {{ $funding->sub_category }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
    
                            {{-- Cabinet Arsip --}}
                            <div class="rounded-md border border-gray-200 bg-gray-100 p-4">
                                <div class="mb-4 flex items-center gap-2">
                                    <svg class="h-5 w-5 text-gray-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                                    </svg>
                                    <label class="font-semibold text-gray-700">Cabinet Arsip</label>
                                </div>
    
                                <select name="cabinet_id" required
                                    class="w-full rounded-md border border-gray-300 bg-white p-2.5 text-sm text-gray-800 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-500">
                                    <option value="" disabled selected>— Pilih cabinet arsip —</option>
                                    @foreach ($cabinets as $cabinet)
                                        <option value="{{ $cabinet->id }}">{{ $cabinet->cabinet_name }}
                                        </option>
                                    @endforeach
                                </select>
                                <p class="mt-2 text-xs text-gray-500">Pilih cabinet sesuai kategori agar arsip
                                    mudah dicari</p>
                            </div>
    
                            {{-- Submit Button --}}
                            <button type="submit"
                                class="flex w-full items-center justify-center gap-2 rounded-md bg-emerald-600 px-8 py-3 font-semibold text-white shadow-sm transition-all duration-200 hover:bg-emerald-700">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                Upload dan Verifikasi Final
                            </button>
                        @else
                            {{-- Status Locked --}}
                            <div class="rounded-md border border-gray-200 bg-gray-100 p-6 text-center">
                                <div class="mb-3 flex justify-center">
                                    <div class="flex h-12 w-12 items-center justify-center rounded-full bg-gray-200">
                                        <svg class="h-6 w-6 text-gray-500" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                        </svg>
                                    </div>
                                </div>
                                <p class="mb-1 text-sm font-semibold text-gray-700">File Sudah Diarsipkan</p>
                                <p class="text-xs text-gray-500">Tidak dapat diperbarui lagi</p>
                            </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
