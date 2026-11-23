<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight">
            {{ __('Pengajuan') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="mx-auto max-w-3xl sm:px-6 lg:px-8">
            {{-- MAIN CARD --}}
            <div class="overflow-hidden rounded-md border border-gray-200 bg-white shadow-sm">
                <div class="p-8">
                    {{-- Header --}}
                    <div class="border-b-2 border-blue-900 pb-6">
                        <h2 class="text-lg font-bold text-blue-900">
                            Edit Pengajuan
                        </h2>
                        <p class="mt-1 text-xs text-gray-500">
                            Silahkan ubah beberapa data dari pengajuan anda
                        </p>
                    </div>

                    <form action="{{ route('submit.update', $submission->id) }}" method="POST"
                        enctype="multipart/form-data" class="mt-10 space-y-6">
                        @method('PUT')
                        @csrf

                        {{-- Nama Pengajuan --}}
                        <div class="">
                            <label class="text-xs font-medium text-gray-500">
                                Nama Pengajuan
                            </label>
                            <div class="w-full border-b-2 border-gray-300">
                                <input type="text" name="name" value="{{ $submission->budget_submission_name }}"
                                    class="w-full border-none bg-transparent p-0 py-2 text-base text-gray-700 focus:outline-none focus:ring-0"
                                    placeholder="Contoh: Pengajuan Pembelian Laptop untuk Tim IT" required>
                            </div>
                            {{-- <label class="block text-sm font-medium text-gray-700">
                                Nama Pengajuan <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="name" value="{{ $submission->budget_submission_name }}"
                                class="w-full rounded-md border border-gray-300 px-4 py-2.5 text-gray-900 transition-colors focus:border-[#003A8F] focus:outline-none focus:ring-2 focus:ring-[#003A8F]"
                                placeholder="Contoh: Pengajuan Pembelian Alat Tulis Kantor" required>
                            <p class="text-xs text-gray-500">
                                Gunakan nama yang jelas dan deskriptif agar mudah diidentifikasi
                            </p> --}}
                        </div>

                        {{-- Metode Pembayaran & Sumber Dana --}}
                        <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                            {{-- Metode Pembayaran --}}
                            <div class="">
                                <label class="text-xs font-medium text-gray-500">
                                    Metode Pembayaran
                                </label>
                                <div class="border-b-2 border-gray-300">
                                    <select name="payment_method" id="payment_method"
                                        class="w-full border-none bg-transparent p-0 py-2 text-base text-gray-500 focus:outline-none focus:ring-0"
                                        required>
                                        <option value="" selected disabled> Pilih metode pembayaran
                                        </option>
                                        @foreach ($payment_method as $payment)
                                            <option value="{{ $payment->id }}"
                                                {{ $submission->assigned_payment_method == $payment->id ? 'selected' : '' }}>
                                                {{ $payment->payment_method_name }} - {{ $payment->sub_category }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                {{-- <label class="block text-sm font-medium text-gray-700">
                                    Metode Pembayaran <span class="text-red-500">*</span>
                                </label>
                                <select name="payment_method" id="payment_method"
                                    class="w-full rounded-md border border-gray-300 px-4 py-2.5 text-gray-900 transition-colors focus:border-[#003A8F] focus:outline-none focus:ring-2 focus:ring-[#003A8F]"
                                    required>
                                    <option value="">Pilih metode pembayaran</option>
                                    @foreach ($payment_method as $payment)
                                        <option value="{{ $payment->id }}"
                                            {{ $submission->assigned_payment_method == $payment->id ? 'selected' : '' }}>
                                            {{ $payment->payment_method_name }} - {{ $payment->sub_category }}
                                        </option>
                                    @endforeach
                                </select> --}}
                            </div>

                            {{-- Sumber Dana --}}
                            <div class="">
                                <label class="text-xs font-medium text-gray-500">
                                    Sumber Dana
                                </label>
                                <div class="border-b-2 border-gray-300">
                                    <select name="funding_source" id="funding_source"
                                        class="w-full border-none bg-transparent p-0 py-2 text-base text-gray-500 focus:outline-none focus:ring-0"
                                        required>
                                        <option value="" selected disabled>Pilih sumber dana
                                        </option>
                                        @foreach ($funding_source as $funding)
                                            <option value="{{ $funding->id }}"
                                                {{ $submission->assigned_funding_source == $funding->id ? 'selected' : '' }}>
                                                {{ $funding->funding_source_name }} - {{ $funding->sub_category }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                {{-- <label class="block text-sm font-medium text-gray-700">
                                    Sumber Dana <span class="text-red-500">*</span>
                                </label>
                                <select name="funding_source" id="funding_source"
                                    class="w-full rounded-md border border-gray-300 px-4 py-2.5 text-gray-900 transition-colors focus:border-[#003A8F] focus:outline-none focus:ring-2 focus:ring-[#003A8F]"
                                    required>
                                    <option value="">Pilih sumber dana</option>
                                    @foreach ($funding_source as $funding)
                                        <option value="{{ $funding->id }}"
                                            {{ $submission->assigned_funding_source == $funding->id ? 'selected' : '' }}>
                                            {{ $funding->funding_source_name }} - {{ $funding->sub_category }}
                                        </option>
                                    @endforeach
                                </select> --}}
                            </div>
                        </div>

                        {{-- File Upload --}}
                        <div class="">

                            {{-- File Saat Ini --}}
                            @if ($submission->path_file_submission)
                                <div class="mb-4">
                                    <div class="mb-2 text-xs text-gray-500">File Pengajuan Saat Ini</div>
                                    <div class="flex items-center justify-between">
                                        <div class="min-w-0 flex-1">
                                            <p class="break-all text-base font-medium text-gray-700">
                                                {{ basename($submission->path_file_submission) }}
                                            </p>
                                        </div>
                                        <a href="{{ route('file.stream', $submission->id) }}" target="_blank"
                                            class="ml-4 rounded-md bg-green-600 px-4 py-2 text-sm font-medium text-white transition-colors hover:bg-green-700">
                                            Lihat File
                                        </a>
                                    </div>
                                </div>
                            @endif

                            {{-- Upload File Baru --}}
                            <div>
                                <div class="mb-2 text-xs text-gray-500">
                                    Pilih File Pengajuan Baru
                                </div>
                                <label for="file"
                                    class="flex cursor-pointer items-center space-x-3 rounded-md border border-gray-300 bg-gray-50 p-4 transition-colors hover:border-[#003A8F] hover:bg-[#003A8F]/5">
                                    <div
                                        class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-md bg-[#003A8F]">
                                        <svg class="h-5 w-5 text-white" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                        </svg>
                                    </div>
                                    <div class="flex-1">
                                        <p id="filename" class="text-sm font-medium text-gray-700">
                                            {{ $submission->path_file_submission ? 'Pilih file baru (opsional)' : 'Pilih berkas pengajuan...' }}
                                        </p>
                                        <p class="mt-0.5 text-xs text-gray-500">Format: PDF | Maksimal: 50MB</p>
                                    </div>
                                    <span
                                        class="rounded-md bg-[#003A8F]/10 px-4 py-2 text-sm font-medium text-[#003A8F]">
                                        Browse
                                    </span>
                                </label>
                                <input id="file" name="file" type="file" accept="application/pdf"
                                    class="hidden"
                                    onchange="document.getElementById('filename').innerText = this.files[0]?.name ?? '{{ $submission->path_file_pengajuan ? 'Pilih file baru (opsional)' : 'Pilih berkas pengajuan...' }}'">
                                @if ($submission->path_file_pengajuan)
                                    <p class="mt-2 text-xs text-gray-500">
                                        Biarkan kosong jika tidak ingin mengubah file
                                    </p>
                                @endif
                            </div>
                        </div>

                        {{-- Divider --}}
                        <div class="border-t border-gray-200"></div>

                        {{-- Buttons --}}
                        <div class="flex items-center justify-end space-x-3">
                            <a href="{{ route('submit.index') }}"
                                class="rounded-md border border-gray-300 px-6 py-2.5 font-medium text-gray-700 transition-colors hover:bg-gray-50">
                                Batal
                            </a>
                            <button type="submit"
                                class="rounded-md bg-green-600 px-6 py-2.5 font-medium text-white shadow-sm transition-colors hover:bg-green-700">
                                Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
