<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Pengajuan Keuangan') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gradient-to-br from-gray-50 to-gray-100 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- Main Card --}}
            <div class="bg-white shadow-2xl rounded-xl overflow-hidden border border-gray-200">
                {{-- Header Banner --}}
                <div class="relative bg-gradient-to-b from-[#003A8F] to-[#002766] p-4">
                    <div class="absolute inset-0 bg-black/10"></div>
                    <div
                        class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHZpZXdCb3g9IjAgMCA2MCA2MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPjxnIGZpbGw9IiNmZmYiIGZpbGwtb3BhY2l0eT0iMC4xIj48cGF0aCBkPSJNMzYgMzRjMC0yLjIxIDEuNzktNCA0LTRzNCAxLjc5IDQgNC0xLjc5IDQtNCA0LTQtMS43OS00LTR6bTAgMTBjMC0yLjIxIDEuNzktNCA0LTRzNCAxLjc5IDQgNC0xLjc5IDQtNCA0LTQtMS43OS00LTR6Ii8+PC9nPjwvZz48L3N2Zz4=')] opacity-20">
                    </div>

                    <div class="relative flex flex-col md:flex-row md:items-center md:justify-between">
                        <div class="flex items-center space-x-4">
                            <div
                                class="w-10 h-10 bg-white/20 backdrop-blur-sm rounded-lg flex items-center justify-center ring-2 ring-white/30 shadow-xl">
                                <img src="https://img.icons8.com/?size=30&id=KTP9v004hvTf&format=png&color=ffffff"
                                    alt="">
                            </div>
                            <div>
                                <h2 class="text-lg font-bold text-white">
                                    Buat Pengajuan Keuangan
                                </h2>
                                <p class="text-sm text-white/90 mt-1 flex items-center space-x-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                                    </svg>
                                    <span>Lengkapi formulir untuk mengajukan keuangan</span>
                                </p>
                            </div>
                        </div>

                        <div
                            class="mt-4 md:mt-0 flex items-center space-x-2 px-4 py-2 bg-white/20 backdrop-blur-sm rounded-lg">
                            <div class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></div>
                            <span class="text-sm font-medium text-white">Status: Aktif</span>
                        </div>
                    </div>
                </div>

                {{-- Form Section --}}
                <div class="px-8 py-4">
                    <form action="{{ route('pengajuan.store') }}" method="POST" enctype="multipart/form-data"
                        class="space-y-6">
                        @csrf

                        {{-- Nama Pengajuan Section --}}
                        <div
                            class="relative overflow-hidden rounded-2xl bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50 border-2 border-blue-200 p-6 shadow-md hover:shadow-xl transition-shadow duration-300">
                            <div
                                class="absolute top-0 right-0 -mt-4 -mr-4 w-32 h-32 bg-blue-200 rounded-full opacity-20 blur-3xl">
                            </div>

                            <div class="relative">
                                <div class="flex items-center justify-between mb-5">
                                    <div class="flex items-center space-x-3">
                                        <div
                                            class="w-12 h-12 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-xl flex items-center justify-center shadow-lg">
                                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                                            </svg>
                                        </div>
                                        <div>
                                            <label class="text-lg font-bold text-gray-800">Nama Pengajuan</label>
                                            <p class="text-xs text-gray-600 mt-0.5">Langkah 1 dari 4</p>
                                        </div>
                                    </div>
                                    <span
                                        class="px-3 py-1 bg-blue-100 text-blue-700 text-xs font-semibold rounded-full">Wajib
                                        diisi</span>
                                </div>

                                <div class="space-y-3">
                                    <input type="text" name="nama_pengajuan"
                                        class="w-full border-2 border-gray-300 rounded-xl p-4 text-gray-800 font-medium placeholder-gray-400 focus:ring-4 focus:ring-blue-200 focus:border-blue-500 focus:outline-none transition-all duration-200 bg-white shadow-sm hover:border-blue-400"
                                        placeholder="Contoh: Pengajuan Pembelian Laptop untuk Tim IT" required>

                                    <div
                                        class="flex items-start space-x-2 p-3 bg-blue-100 rounded-lg border border-blue-200">
                                        <svg class="w-5 h-5 text-blue-600 mt-0.5 flex-shrink-0" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        <div class="text-xs text-blue-800">
                                            <p class="font-semibold mb-1">Tips Penamaan:</p>
                                            <ul class="list-disc list-inside space-y-0.5 ml-1">
                                                <li>Gunakan nama yang jelas dan spesifik</li>
                                                <li>Sertakan tujuan atau departemen terkait</li>
                                                <li>Hindari singkatan yang ambigu</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Metode Pembayaran & Sumber Dana Section --}}
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            {{-- Metode Pembayaran --}}
                            <div
                                class="relative overflow-hidden rounded-2xl bg-gradient-to-br from-emerald-50 via-teal-50 to-cyan-50 border-2 border-emerald-200 p-6 shadow-md hover:shadow-xl transition-shadow duration-300">
                                <div
                                    class="absolute top-0 right-0 -mt-4 -mr-4 w-32 h-32 bg-emerald-200 rounded-full opacity-20 blur-3xl">
                                </div>

                                <div class="relative">
                                    <div class="flex items-center justify-between mb-5">
                                        <div class="flex items-center space-x-3">
                                            <div
                                                class="w-12 h-12 bg-gradient-to-br from-emerald-500 to-teal-600 rounded-xl flex items-center justify-center shadow-lg">
                                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                                                </svg>
                                            </div>
                                            <div>
                                                <label class="text-lg font-bold text-gray-800">Metode Pembayaran</label>
                                                <p class="text-xs text-gray-600 mt-0.5">Langkah 2 dari 4</p>
                                            </div>
                                        </div>
                                        <span
                                            class="px-3 py-1 bg-emerald-100 text-emerald-700 text-xs font-semibold rounded-full">Wajib
                                            dipilih</span>
                                    </div>

                                    <div class="space-y-3">
                                        <select name="payment_method" id="payment_method"
                                            class="w-full border-2 border-gray-300 rounded-xl p-4 text-gray-800 font-medium focus:ring-4 focus:ring-emerald-200 focus:border-emerald-500 focus:outline-none transition-all duration-200 bg-white shadow-sm hover:border-emerald-400 appearance-none cursor-pointer"
                                            style="background-image: url('data:image/svg+xml;charset=UTF-8,%3csvg xmlns=%27http://www.w3.org/2000/svg%27 viewBox=%270 0 24 24%27 fill=%27none%27 stroke=%27currentColor%27 stroke-width=%272%27 stroke-linecap=%27round%27 stroke-linejoin=%27round%27%3e%3cpolyline points=%276 9 12 15 18 9%27%3e%3c/polyline%3e%3c/svg%3e');
                                            background-repeat: no-repeat;
                                            background-position: right 1rem center;
                                            background-size: 1.5em 1.5em;
                                            padding-right: 3rem;"
                                            required>
                                            <option value="" selected disabled class="text-gray-400">Pilih metode
                                                pembayaran...</option>
                                            @foreach ($payment_method as $payment)
                                                <option value="{{ $payment->id }}" class="text-gray-800">
                                                    {{ $payment->payment_method_name }} - {{ $payment->sub_category }}
                                                </option>
                                            @endforeach
                                        </select>

                                        <div
                                            class="flex items-start space-x-2 p-3 bg-emerald-100 rounded-lg border border-emerald-200">
                                            <svg class="w-5 h-5 text-emerald-600 mt-0.5 flex-shrink-0" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            <p class="text-xs text-emerald-800">
                                                Pilih metode pembayaran yang sesuai dengan kebutuhan pengajuan Anda
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Sumber Dana --}}
                            <div
                                class="relative overflow-hidden rounded-2xl bg-gradient-to-br from-amber-50 via-orange-50 to-yellow-50 border-2 border-amber-200 p-6 shadow-md hover:shadow-xl transition-shadow duration-300">
                                <div
                                    class="absolute top-0 right-0 -mt-4 -mr-4 w-32 h-32 bg-amber-200 rounded-full opacity-20 blur-3xl">
                                </div>

                                <div class="relative">
                                    <div class="flex items-center justify-between mb-5">
                                        <div class="flex items-center space-x-3">
                                            <div
                                                class="w-12 h-12 bg-gradient-to-br from-amber-500 to-orange-600 rounded-xl flex items-center justify-center shadow-lg">
                                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                            </div>
                                            <div>
                                                <label class="text-lg font-bold text-gray-800">Sumber Dana</label>
                                                <p class="text-xs text-gray-600 mt-0.5">Langkah 3 dari 4</p>
                                            </div>
                                        </div>
                                        <span
                                            class="px-3 py-1 bg-amber-100 text-amber-700 text-xs font-semibold rounded-full">Wajib
                                            dipilih</span>
                                    </div>

                                    <div class="space-y-3">
                                        <select name="funding_source" id="funding_source"
                                            class="w-full border-2 border-gray-300 rounded-xl p-4 text-gray-800 font-medium focus:ring-4 focus:ring-amber-200 focus:border-amber-500 focus:outline-none transition-all duration-200 bg-white shadow-sm hover:border-amber-400 appearance-none cursor-pointer"
                                            style="background-image: url('data:image/svg+xml;charset=UTF-8,%3csvg xmlns=%27http://www.w3.org/2000/svg%27 viewBox=%270 0 24 24%27 fill=%27none%27 stroke=%27currentColor%27 stroke-width=%272%27 stroke-linecap=%27round%27 stroke-linejoin=%27round%27%3e%3cpolyline points=%276 9 12 15 18 9%27%3e%3c/polyline%3e%3c/svg%3e');
                                            background-repeat: no-repeat;
                                            background-position: right 1rem center;
                                            background-size: 1.5em 1.5em;
                                            padding-right: 3rem;"
                                            required>
                                            <option value="" selected disabled class="text-gray-400">Pilih
                                                sumber
                                                dana...</option>
                                            @foreach ($funding_source as $funding)
                                                <option value="{{ $funding->id }}" class="text-gray-800">
                                                    {{ $funding->funding_source_name }} - {{ $funding->sub_category }}
                                                </option>
                                            @endforeach
                                        </select>

                                        <div
                                            class="flex items-start space-x-2 p-3 bg-amber-100 rounded-lg border border-amber-200">
                                            <svg class="w-5 h-5 text-amber-600 mt-0.5 flex-shrink-0" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            <p class="text-xs text-amber-800">
                                                Pastikan memilih sumber dana yang sesuai dengan jenis pengajuan
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- File Upload Section --}}
                        <div
                            class="relative overflow-hidden rounded-2xl bg-gradient-to-br from-purple-50 via-pink-50 to-rose-50 border-2 border-purple-200 p-6 shadow-md hover:shadow-xl transition-shadow duration-300">
                            <div
                                class="absolute top-0 right-0 -mt-4 -mr-4 w-32 h-32 bg-purple-200 rounded-full opacity-20 blur-3xl">
                            </div>

                            <div class="relative">
                                <div class="flex items-center justify-between mb-5">
                                    <div class="flex items-center space-x-3">
                                        <div
                                            class="w-12 h-12 bg-gradient-to-br from-purple-500 to-pink-600 rounded-xl flex items-center justify-center shadow-lg">
                                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                            </svg>
                                        </div>
                                        <div>
                                            <label class="text-lg font-bold text-gray-800">Dokumen PDF
                                                Pengajuan</label>
                                            <p class="text-xs text-gray-600 mt-0.5">Langkah 4 dari 4</p>
                                        </div>
                                    </div>
                                    <span
                                        class="px-3 py-1 bg-purple-100 text-purple-700 text-xs font-semibold rounded-full">Wajib
                                        (.pdf)</span>
                                </div>

                                <div class="space-y-3">
                                    {{-- Upload Box --}}
                                    <label for="file"
                                        class="flex items-center space-x-4 p-5 border-2 border-dashed border-gray-300 rounded-xl cursor-pointer hover:bg-purple-50 hover:border-purple-400 transition-all duration-200 bg-white">
                                        <div
                                            class="flex-shrink-0 w-12 h-12 bg-gradient-to-br from-purple-500 to-pink-600 rounded-xl flex items-center justify-center shadow-md">
                                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                            </svg>
                                        </div>
                                        <div class="flex-1 overflow-hidden">
                                            <p id="filename" class="text-sm font-semibold text-gray-700 truncate">
                                                Pilih
                                                berkas pengajuan...</p>
                                            <p class="text-xs text-gray-400 mt-1">Format: PDF | Maksimal: 50MB</p>
                                        </div>
                                        <span
                                            class="hidden md:block text-xs font-bold text-purple-600 bg-purple-100 px-4 py-2 rounded-lg hover:bg-purple-200 transition-colors">Browse</span>
                                    </label>

                                    <input id="file" name="file" type="file" accept="application/pdf"
                                        class="hidden"
                                        onchange="document.getElementById('filename').innerText = this.files[0]?.name ?? 'Pilih berkas pengajuan...'"
                                        required>

                                    <div
                                        class="flex items-start space-x-2 p-3 bg-purple-100 rounded-lg border border-purple-200">
                                        <svg class="w-5 h-5 text-purple-600 mt-0.5 flex-shrink-0" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        <div class="text-xs text-purple-800">
                                            <p class="font-semibold mb-1">Persyaratan Dokumen:</p>
                                            <ul class="list-disc list-inside space-y-0.5 ml-1">
                                                <li>Dokumen harus dalam format PDF</li>
                                                <li>Pastikan file sudah ditandatangani</li>
                                                <li>Ukuran maksimal 50MB</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Submit Button Section --}}
                        <div
                            class="relative overflow-hidden rounded-2xl bg-gradient-to-br from-green-50 via-emerald-50 to-teal-50 border-2 border-green-200 p-6 shadow-md">
                            <div
                                class="absolute top-0 right-0 -mt-4 -mr-4 w-32 h-32 bg-green-200 rounded-full opacity-20 blur-3xl">
                            </div>

                            <div class="relative">
                                <div class="flex items-center space-x-3 mb-4">
                                    <div
                                        class="w-12 h-12 bg-gradient-to-br from-green-500 to-emerald-600 rounded-xl flex items-center justify-center shadow-lg">
                                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-lg font-bold text-gray-800">Siap untuk mengirim?</p>
                                        <p class="text-xs text-gray-600">Pastikan semua data sudah benar sebelum
                                            mengirim
                                        </p>
                                    </div>
                                </div>

                                {{-- Tombol Kirim --}}
                                <button type="submit"
                                    class="group relative w-full bg-gradient-to-r from-green-500 via-emerald-600 to-teal-600 hover:from-green-600 hover:via-emerald-700 hover:to-teal-700 text-white px-6 py-4 rounded-xl shadow-lg hover:shadow-2xl font-bold text-lg transform hover:-translate-y-1 transition-all duration-300 overflow-hidden">
                                    <div
                                        class="absolute inset-0 bg-white opacity-0 group-hover:opacity-20 transition-opacity duration-300">
                                    </div>
                                    <span class="relative flex items-center justify-center space-x-3">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                                        </svg>
                                        <span>Kirim Pengajuan Sekarang</span>
                                        <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform duration-300"
                                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                        </svg>
                                    </span>
                                </button>

                                <p class="text-xs text-center text-gray-500 mt-3">
                                    Dengan mengirim, Anda menyetujui bahwa data yang dimasukkan adalah benar dan valid
                                </p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
