<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight">
            {{ __('Pengajuan Keuangan') }}
        </h2>
    </x-slot>

    <div class="min-h-screen py-6">
        <div class="mx-auto max-w-3xl sm:px-6 lg:px-8">
            {{-- Main Card --}}
            <div class="overflow-hidden rounded-md border border-gray-200 bg-white shadow-md">
                {{-- Form Section --}}
                <div class="p-8">
                    <div class="border-b-2 border-blue-900 pb-6">
                        <h2 class="text-lg font-bold text-blue-900">
                            Buat Pengajuan Keuangan
                        </h2>
                        <p class="mt-1 text-xs text-gray-500">
                            Lengkapi formulir untuk mengajukan keuangan
                        </p>
                    </div>
                    <form action="{{ route('submit.store') }}" method="POST" enctype="multipart/form-data"
                        class="space-y-6 mt-10">
                        @csrf

                        {{-- <div class="rounded-md border-2 border-yellow-500 bg-yellow-100 p-2">   // masih penting !!
                            <div class="font-semibold text-yellow-700">
                                Note!
                            </div>
                            <div class="text-xs text-yellow-600">
                                jika ingin mengajukan dokumen untuk PPSPM silahkan berikan nama pengajuan dengan kata
                                kunci yang jelas misalkan kata kunci <strong>Gaji</strong> contohnya:
                                <strong>Gaji</strong> Divisi Program April 2026
                            </div>
                        </div> --}}

                        <div class="">
                            <label class="text-xs font-medium text-gray-500">
                                Nama Pengajuan
                            </label>
                            <div class="w-full border-b-2 border-gray-300">
                                <input type="text" name="name"
                                    class="w-full border-none bg-transparent p-0 py-2 text-base text-gray-700 focus:outline-none focus:ring-0"
                                    placeholder="Contoh: Pengajuan Pembelian Laptop untuk Tim IT" required>
                            </div>
                        </div>

                        {{-- Metode Pembayaran & Sumber Dana --}}
                        <div class="grid grid-cols-1 gap-8 md:grid-cols-2">
                            {{-- Metode Pembayaran --}}
                            <div class="">
                                <label class="block text-xs font-medium text-gray-500">
                                    Metode Pembayaran
                                </label>
                                <div class="border-b-2 border-gray-300">
                                    <select name="payment_method" id="payment_method"
                                        class="w-full border-none bg-transparent px-1 py-2 text-base text-gray-500 focus:outline-none focus:ring-0"
                                        required>
                                        <option value="" selected disabled> Pilih metode pembayaran
                                        </option>
                                        @foreach ($payment_method as $payment)
                                            <option value="{{ $payment->id }}" class="px-4">
                                                {{ $payment->payment_method_name }} - {{ $payment->sub_category }}
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
                                        <option value="" selected disabled>Pilih sumber dana
                                        </option>
                                        @foreach ($funding_source as $funding)
                                            <option value="{{ $funding->id }}" class="px-4">
                                                {{ $funding->funding_source_name }} - {{ $funding->sub_category }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        {{-- File Upload --}}
                        <div class="space-y-2">
                            <label class="block text-xs font-medium text-gray-500">
                                Dokumen PDF Pengajuan
                            </label>
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
                                        Pilih berkas pengajuan...
                                    </p>
                                    <p class="mt-0.5 text-xs text-gray-500">Format: PDF | Maksimal: 50MB</p>
                                </div>
                                <span class="rounded-md bg-[#003A8F]/10 px-4 py-2 text-sm font-medium text-[#003A8F]">
                                    Browse
                                </span>
                            </label>

                            {{-- component input file --}}
                            <input id="file" name="file" type="file" accept="application/pdf" class="hidden"
                                onchange="document.getElementById('filename').innerText = this.files[0]?.name ?? 'Pilih berkas pengajuan...'"
                                required>
                        </div>

                        {{-- Divider --}}
                        <div class="border-t border-gray-200"></div>

                        {{-- Submit Button --}}
                        <div class="flex items-center justify-end space-x-3">
                            <a href="{{ route('submit.index') }}"
                                class="rounded-md border border-gray-300 px-6 py-2.5 font-medium text-gray-700 transition-colors hover:bg-gray-50">
                                Batal
                            </a>
                            <button type="submit"
                                class="rounded-md bg-green-600 px-6 py-2.5 font-medium text-white shadow-sm transition-colors hover:bg-green-700">
                                Kirim Pengajuan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
