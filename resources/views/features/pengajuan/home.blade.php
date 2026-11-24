<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Pengajuan Dokumen') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="mx-auto max-w-7xl px-4 sm:px-2 lg:px-4">
            <div class="overflow-hidden rounded-lg border border-gray-200 bg-white shadow-md">
                <div class="flex w-full">
                    <div class="w-[70%] p-4">
                        {{-- header --}}
                        <div class="mb-4 flex items-center justify-between">
                            <div class="text-lg font-bold text-gray-700">
                                Daftar Pengajuan
                            </div>
                            <form action="" action="" class="mt-2">
                                @csrf
                                <div class="flex">
                                    <input type="text" name="" id="" placeholder="cari pengajuan..."
                                        class="h-7 w-60 rounded-l-lg border border-gray-300 text-sm focus:outline-none focus:ring-0">
                                    <button type="submit" class="rounded-r-lg bg-blue-500 px-2">
                                        <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" x="0px"
                                            y="0px" width="20" height="20" viewBox="0 0 24 24">
                                            <path
                                                d="M 9 2 C 5.1458514 2 2 5.1458514 2 9 C 2 12.854149 5.1458514 16 9 16 C 10.747998 16 12.345009 15.348024 13.574219 14.28125 L 14 14.707031 L 14 16 L 20 22 L 22 20 L 16 14 L 14.707031 14 L 14.28125 13.574219 C 15.348024 12.345009 16 10.747998 16 9 C 16 5.1458514 12.854149 2 9 2 z M 9 4 C 11.773268 4 14 6.2267316 14 9 C 14 11.773268 11.773268 14 9 14 C 6.2267316 14 4 11.773268 4 9 C 4 6.2267316 6.2267316 4 9 4 z">
                                            </path>
                                        </svg>
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="mb-4 flex gap-4">
                            <a href="{{ route('submit.index') }}"
                                class="{{ $type == 'semua' ? 'border-blue-500 text-blue-500 font-bold' : 'border-gray-200 text-gray-500' }} border-b-2 p-2 text-xs">
                                Semua
                            </a>
                            <a href="{{ route('submit.type', 'kembali') }}"
                                class="{{ $type == 'kembali' ? 'border-blue-500 text-blue-500 font-bold' : 'border-gray-200 text-gray-500' }} border-b-2 p-2 text-xs">
                                Dikembalikan
                            </a>
                            <a href="{{ route('submit.type', 'belum') }}"
                                class="{{ $type == 'belum' ? 'border-blue-500 text-blue-500 font-bold' : 'border-gray-200 text-gray-500' }} border-b-2 p-2 text-xs">
                                Belum Diperiksa
                            </a>
                            <a href="{{ route('submit.type', 'arsip') }}"
                                class="{{ $type == 'arsip' ? 'border-blue-500 text-blue-500 font-bold' : 'border-gray-200 text-gray-500' }} border-b-2 p-2 text-xs">
                                Diarsipkan
                            </a>
                        </div>

                        {{-- list pengajuan --}}
                        <div class="space-y-3">
                            @php $no = 1; @endphp

                            @forelse ($items as $submit)
                                <div
                                    class="flex items-center rounded-md border border-gray-200 bg-white p-4 shadow-md transition-all duration-200 hover:bg-gray-100">
                                    {{-- Number Badge --}}
                                    <div
                                        class="flex items-center justify-center rounded-md bg-gray-300 p-2 text-sm font-semibold">
                                        <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" x="0px"
                                            y="0px" width="30" height="30" viewBox="0 0 24 24">
                                            <path
                                                d="M14,2H6C4.9,2,4,2.9,4,4v16c0,1.1,0.9,2,2,2h12c1.1,0,2-0.9,2-2V8L14,2z M16,18H8v-2h8V18z M16,14H8v-2h8V14z M13,9V3.5 L18.5,9H13z">
                                            </path>
                                        </svg>
                                    </div>

                                    {{-- Content --}}
                                    <a href="{{ route('submit.show', $submit->id) }}" class="flex-1 px-6">
                                        <div
                                            class="mb-2 border-b border-gray-200 pb-2 text-lg font-semibold text-gray-800">
                                            {{ $submit->budget_submission_name }}
                                        </div>

                                        <div class="flex flex-wrap items-center justify-between">
                                            <div class="flex flex-wrap items-center gap-2">
                                                @if (
                                                    $submit->requirements_status == 'Belum Lengkap' &&
                                                        $submit->verification_status == 0 &&
                                                        $submit->is_return == 0 &&
                                                        $type == 'kembali')
                                                    <span
                                                        class="inline-flex items-center rounded-md bg-blue-100 px-2 py-1 text-xs font-medium text-blue-700">
                                                        <svg class="mr-1 h-3 w-3" fill="currentColor"
                                                            viewBox="0 0 20 20">
                                                            <circle cx="10" cy="10" r="3" />
                                                        </svg>
                                                        Proses
                                                    </span>
                                                @endif
                                                @if (
                                                    $submit->requirements_status == 'Lengkap' &&
                                                        $submit->verification_status == 1 &&
                                                        $submit->is_archive == 1 &&
                                                        $type == 'arsip')
                                                    <span
                                                        class="inline-flex items-center rounded-md bg-green-100 px-2.5 py-1 text-xs font-medium text-green-700">
                                                        <svg class="mr-1 h-3 w-3" fill="none" stroke="currentColor"
                                                            viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                        </svg>
                                                        Selesai
                                                    </span>
                                                @endif
                                                @if ($submit->requirements_status == 'Belum Lengkap')
                                                    <span
                                                        class="inline-flex items-center rounded-md bg-yellow-100 px-2 py-1 text-xs font-medium text-yellow-700">
                                                        <svg class="mr-1 h-3 w-3" fill="none" stroke="currentColor"
                                                            viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                                        </svg>
                                                        Belum Lengkap
                                                    </span>
                                                @elseif($submit->requirements_status == 'Lengkap')
                                                    <span
                                                        class="inline-flex items-center rounded-md bg-green-100 px-2 py-1 text-xs font-medium text-green-700">
                                                        <svg class="mr-1 h-3 w-3" fill="none" stroke="currentColor"
                                                            viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                        </svg>
                                                        Lengkap
                                                    </span>
                                                @else
                                                    <span
                                                        class="inline-flex items-center rounded-md bg-gray-100 px-2 py-1 text-xs font-medium text-gray-700">
                                                        <svg class="mr-1 h-3 w-3" fill="none" stroke="currentColor"
                                                            viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                        </svg>
                                                        Belum Diperiksa
                                                    </span>
                                                @endif

                                                @if ($submit->verification_status == 1)
                                                    <span
                                                        class="inline-flex items-center rounded-md bg-green-100 px-2 py-1 text-xs font-medium text-green-700">
                                                        <svg class="mr-1 h-3 w-3" fill="none" stroke="currentColor"
                                                            viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                                        </svg>
                                                        Diverifikasi
                                                    </span>
                                                @else
                                                    <span
                                                        class="inline-flex items-center rounded-md bg-red-100 px-2 py-1 text-xs font-medium text-red-700">
                                                        <svg class="mr-1 h-3 w-3" fill="none" stroke="currentColor"
                                                            viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                        </svg>
                                                        Belum Diverifikasi
                                                    </span>
                                                @endif

                                                @if ($submit->is_archive == 1)
                                                    <span
                                                        class="inline-flex items-center rounded-md bg-blue-100 px-2 py-1 text-xs font-medium text-blue-700">
                                                        <svg class="mr-1 h-3 w-3" fill="none"
                                                            stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                                                        </svg>
                                                        Diarsipkan
                                                    </span>
                                                @endif
                                                @if ($submit->is_return == 1 && $type == 'kembali')
                                                    <span
                                                        class="inline-flex items-center rounded-md bg-orange-100 px-2 py-1 text-xs font-medium text-orange-700">
                                                        <svg class="mr-1 h-3 w-3" fill="none"
                                                            stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6" />
                                                        </svg>
                                                        Dikembalikan
                                                    </span>
                                                @endif
                                            </div>

                                            <div class="text-xs text-gray-500">
                                                {{ $submit->created_at->diffForHumans() }}
                                            </div>
                                        </div>
                                    </a>

                                    {{-- Action Buttons --}}
                                    @if (!$submit->is_archive)
                                        <div class="flex flex-shrink-0 gap-2">
                                            <a href="{{ route('submit.edit', $submit->id) }}"
                                                class="rounded-md bg-yellow-500 p-2 text-sm font-medium text-white transition-colors hover:bg-yellow-600"
                                                title="Edit">
                                                <svg class="fill-current text-white"
                                                    xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20"
                                                    height="20" viewBox="0 0 24 24">
                                                    <path
                                                        d="M 18 2 L 15.585938 4.4140625 L 19.585938 8.4140625 L 22 6 L 18 2 z M 14.076172 5.9238281 L 3 17 L 3 21 L 7 21 L 18.076172 9.9238281 L 14.076172 5.9238281 z">
                                                    </path>
                                                </svg>
                                            </a>

                                            <form action="{{ route('submit.destroy', $submit->id) }}" method="POST"
                                                onsubmit="return confirm('Yakin ingin menghapus submit ini?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="rounded-md bg-red-500 p-2 text-sm font-medium text-white transition-colors hover:bg-red-600"
                                                    title="Hapus">
                                                    <svg class="fill-current text-white"
                                                        xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                                        width="20" height="20" viewBox="0 0 24 24">
                                                        <path
                                                            d="M 10 2 L 9 3 L 3 3 L 3 5 L 21 5 L 21 3 L 15 3 L 14 2 L 10 2 z M 4.3652344 7 L 6.0683594 22 L 17.931641 22 L 19.634766 7 L 4.3652344 7 z">
                                                        </path>
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    @endif
                                </div>
                            @empty
                                <div class="rounded-md bg-gray-50 py-12 text-center">
                                    <div
                                        class="mx-auto mb-3 flex h-16 w-16 items-center justify-center rounded-full bg-gray-200">
                                        <svg class="h-8 w-8 text-gray-400" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                                        </svg>
                                    </div>
                                    <p class="font-medium text-gray-500">Belum ada submit</p>
                                    <p class="mt-1 text-sm text-gray-400">Buat submit baru untuk memulai</p>
                                </div>
                            @endforelse

                            {{ $items->links() }}
                        </div>
                    </div>
                    <div class="w-[30%] p-4">
                        <div class="mb-2 text-lg font-bold text-gray-700">
                            Upload Pengajuan
                        </div>
                        {{-- upload pengajuan --}}
                        <div
                            class="mb-2 flex w-full flex-col items-center space-y-2 rounded-lg border border-gray-200 p-6">
                            <div class="flex items-center justify-center rounded-md text-sm font-semibold">
                                <svg class="fill-current text-gray-500" xmlns="http://www.w3.org/2000/svg" x="0px"
                                    y="0px" width="50" height="50" viewBox="0 0 24 24">
                                    <path
                                        d="M14,2H6C4.9,2,4,2.9,4,4v16c0,1.1,0.9,2,2,2h12c1.1,0,2-0.9,2-2V8L14,2z M16,18H8v-2h8V18z M16,14H8v-2h8V14z M13,9V3.5 L18.5,9H13z">
                                    </path>
                                </svg>
                            </div>
                            <div class="w-52 text-center text-xs text-gray-500">Silahkan isi data yang diperlukan untuk
                                membuat pengajuan</div>
                            <a href="{{ route('submit.create') }}"
                                class="rounded-lg bg-blue-500 p-2 px-4 font-bold text-white">Buat Pengajuan</a>
                        </div>

                        {{-- statistik pengajuan divisi --}}
                        <div class="mb-6 grid grid-cols-2 gap-4">
                            <div class="p-4">
                                <div class="mb-2 text-lg font-bold text-blue-600">
                                    {{ $bulanini }}
                                </div>
                                <div class="text-xs text-blue-500">
                                    Terkirim Bulan ini
                                </div>
                            </div>
                            <div class="p-4">
                                <div class="mb-2 text-lg font-bold text-yellow-600">
                                    {{ $menunggu }}
                                </div>
                                <div class="text-xs text-yellow-500">
                                    Menunggu Verifikasi
                                </div>
                            </div>
                            <div class="p-4">
                                <div class="mb-2 text-lg font-bold text-red-600">
                                    {{ $perbaiki }}
                                </div>
                                <div class="text-xs text-red-500">
                                    Perlu Perbaikan
                                </div>
                            </div>
                            <div class="p-4">
                                <div class="mb-2 text-lg font-bold text-green-600">
                                    {{ $selesai }}
                                </div>
                                <div class="text-xs text-green-500">
                                    Pengajuan Selesai
                                </div>
                            </div>
                        </div>

                        {{-- panduan singkat --}}
                        <div class="space-y-2">
                            <div class="text-lg font-bold text-gray-700">
                                Panduan Singkat
                            </div>
                            <div class="rounded-lg border border-gray-200 p-2 text-xs text-gray-500">
                                <ul class="list-disc space-y-2 pl-5">
                                    <li>
                                        Silahkan isi judul atau nama pengajuan agar mudah dicari verifikator
                                    </li>
                                    <li>
                                        Pastikan file dokumen pengajuan yang diupload berformat pdf berukuran dibawah 50
                                        mb
                                    </li>
                                    <li>
                                        kategori pengajuan hanya sebagai request untuk verifikator dan bendahara di
                                        divisi keuangan dan yang menentukannya nanti adalah bendahara di keuangan
                                    </li>
                                </ul>
                            </div>
                            <div class="space-y-3 rounded-lg border border-gray-200 p-4">
                                <div class="flex gap-2">
                                    <span
                                        class="inline-flex items-center rounded-md bg-green-100 px-2 py-1 text-xs font-medium text-green-700">
                                        <svg class="mr-1 h-3 w-3" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                        </svg>
                                        Diverifikasi
                                    </span>
                                    <p class="text-xs text-gray-500">pengajuan sudah diverifikasi sesuai persyaratan
                                    </p>
                                </div>
                                <div class="flex gap-2">
                                    <span
                                        class="inline-flex items-center rounded-md bg-red-100 px-2 py-1 text-xs font-medium text-red-700">
                                        <svg class="mr-1 h-3 w-3" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                        Belum Diverifikasi
                                    </span>
                                    <p class="text-xs text-gray-500">pengajuan belum diverifikasi atau perlu perbaikan
                                    </p>
                                </div>
                                <div class="flex gap-2">
                                    <span
                                        class="inline-flex items-center rounded-md bg-green-100 px-2 py-1 text-xs font-medium text-green-700">
                                        <svg class="mr-1 h-3 w-3" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        Lengkap
                                    </span>
                                    <p class="text-xs text-gray-500"> pengajuan lengkap sesuai persyaratan</p>
                                </div>
                                <div class="flex gap-2">
                                    <span
                                        class="inline-flex items-center rounded-md bg-yellow-100 px-2 py-1 text-xs font-medium text-yellow-700">
                                        <svg class="mr-1 h-3 w-3" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                        </svg>
                                        Belum Lengkap
                                    </span>
                                    <p class="text-xs text-gray-500"> pengajuan belum lengkap sesuai persyaratan</p>
                                </div>
                                <div class="flex gap-2">
                                    <span
                                        class="inline-flex items-center rounded-md bg-gray-100 px-2 py-1 text-xs font-medium text-gray-700">
                                        <svg class="mr-1 h-3 w-3" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                        Belum Diperiksa
                                    </span>
                                    <p class="text-xs text-gray-500"> pengajuan belum diperiksa oleh verifikator</p>
                                </div>
                                <div class="flex gap-2">
                                    <span
                                        class="inline-flex items-center rounded-md bg-green-100 px-2.5 py-1 text-xs font-medium text-green-700">
                                        <svg class="mr-1 h-3 w-3" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        Selesai
                                    </span>
                                    <p class="text-xs text-gray-500"> pengajuan selesai melalui proses administrasi</p>
                                </div>
                                <div class="flex gap-2">
                                    <span
                                        class="inline-flex items-center rounded-md bg-blue-100 px-2 py-1 text-xs font-medium text-blue-700">
                                        <svg class="mr-1 h-3 w-3" fill="currentColor" viewBox="0 0 20 20">
                                            <circle cx="10" cy="10" r="3" />
                                        </svg>
                                        Proses
                                    </span>
                                    <p class="text-xs text-gray-500"> pengajuan dalam proses verifikasi</p>
                                </div>
                                <div class="flex gap-2">
                                    <span
                                        class="inline-flex items-center rounded-md bg-orange-100 px-2 py-1 text-xs font-medium text-orange-700">
                                        <svg class="mr-1 h-3 w-3" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6" />
                                        </svg>
                                        Dikembalikan
                                    </span>
                                    <p class="text-xs text-gray-500"> pengajuan dikembalikan perlu perbaikan</p>
                                </div>
                                <div class="flex gap-2">
                                    <span
                                        class="inline-flex items-center rounded-md bg-blue-100 px-2 py-1 text-xs font-medium text-blue-700">
                                        <svg class="mr-1 h-3 w-3" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                                        </svg>
                                        Diarsipkan
                                    </span>
                                    <p class="text-xs text-gray-500"> pengajuan diarsipkan</p>
                                </div>
                                <div class="flex gap-2">
                                    <div
                                        class="flex items-center rounded-md bg-gray-100 px-2 py-1 text-xs font-medium text-gray-700">
                                        <svg class="mr-1 h-3 w-3" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                                        </svg>
                                        Belum Diarsipkan
                                    </div>
                                    <p class="text-xs text-gray-500"> pengajuan belum diarsipkan</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
