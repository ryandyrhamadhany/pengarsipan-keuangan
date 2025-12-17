<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-gray-800 leading-tight flex items-center gap-3">
            Periksa Kelengkapan Pengajuan
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- CARD UTAMA --}}
            <div class="bg-white shadow-xl sm:rounded-xl border border-gray-100 p-8">

                {{-- TOMBOL KEMBALI --}}
                <div class="mb-6">
                    <a href="{{ route('keuangan.dashboard') }}"
                        class="inline-flex items-center gap-2 px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg shadow-sm transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                        </svg>
                        Kembali
                    </a>
                </div>

                {{-- INFORMASI PENGAJUAN --}}
                <div class="mb-8">
                    <h3 class="text-2xl font-bold text-gray-900 mb-1">
                        {{ $pengajuan->pengajuan_name }}
                    </h3>

                    <p class="text-gray-700 text-sm mb-1">
                        <span class="font-medium">Pengaju:</span> {{ $pengajuan->user->name }}
                    </p>
                    <p class="text-gray-700 text-sm mb-1">
                        <span>Email: </span>{{ $pengajuan->user->email }}
                    </p>
                    <p class="text-gray-700 text-sm mb-1">
                        <span class="font-medium">Divisi:</span> {{ $pengajuan->user->role }}
                    </p>

                    <div class="flex items-center gap-6 text-gray-600 text-xs mt-3">

                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0
                                    00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            Dibuat:
                            <span class="font-medium text-gray-800">
                                {{ $pengajuan->created_at->translatedFormat('d M Y — H:i') }}
                            </span>
                        </div>

                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Update:
                            <span class="font-medium text-gray-800">
                                {{ $pengajuan->updated_at->translatedFormat('d M Y — H:i') }}
                            </span>
                        </div>

                    </div>
                </div>

                {{-- FILE UTAMA --}} <div
                    class="mb-8 p-5 bg-gray-50 border rounded-xl flex justify-between items-center">
                    <div>
                        <div class="text-gray-700 text-sm">File Pengajuan:</div>
                        <div class="text-lg font-semibold text-gray-900">
                            {{ basename($pengajuan->path_file_pengajuan) }} </div>
                    </div>
                    <div class="flex gap-3"> <a href="{{ asset('storage/' . $pengajuan->path_file_pengajuan) }}"
                            target="_blank"
                            class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg shadow"> Lihat File
                        </a> <a href="{{ route('keuangan.download', $pengajuan->id) }}"
                            class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg shadow"> Download </a>
                    </div>
                </div>

                {{-- FORM CEKLIST --}}
                <form action="{{ route('keuangan.checkandupate', $pengajuan->id) }}" method="POST">
                    @method('PUT')
                    @csrf

                    <div class="overflow-x-auto rounded-lg shadow-md mb-8">
                        <table class="min-w-full bg-white text-sm border border-gray-700 rounded-lg overflow-hidden">


                            <thead class="bg-gray-50 text-gray-700 uppercase text-xs tracking-wider">
                                <tr>
                                    <th rowspan="2" class="px-4 py-3 border text-center">No</th>
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

                            <tbody class="divide-y divide-gray-200">
                                @foreach ($syaratDoc as $index => $dokumen)
                                    <tr class="hover:bg-gray-50">

                                        <td class="px-4 py-3 border text-center font-medium">
                                            {{ $index + 1 }}
                                        </td>

                                        <td class="px-4 py-3 border text-gray-900">
                                            @php
                                                if (preg_match('/^[IVX]+\.\d+/', $dokumen)) {
                                                    echo "<span class='font-bold text-blue-700'>$dokumen</span>";
                                                } elseif (preg_match('/^\d+\.\d+/', $dokumen)) {
                                                    echo "<span class='pl-6'>$dokumen</span>";
                                                } elseif (trim($dokumen) === '') {
                                                    echo "<span class='font-semibold italic text-gray-600'>Dokumen Pendukung</span>";
                                                } else {
                                                    echo $dokumen;
                                                }
                                            @endphp
                                        </td>

                                        {{-- DOKUMEN ADA --}}
                                        <td class="px-4 py-3 border text-center">
                                            <input type="radio" name="ada[{{ $index }}]" value="1"
                                                {{ isset($ada[$index]) && $ada[$index] ? 'checked' : '' }}
                                                class="w-5 h-5 text-green-600">
                                        </td>

                                        {{-- DOKUMEN TIDAK ADA --}}
                                        <td class="px-4 py-3 border text-center">
                                            <input type="radio" name="ada[{{ $index }}]" value="0"
                                                {{ isset($tidakada[$index]) && $tidakada[$index] ? 'checked' : '' }}
                                                class="w-5 h-5 text-red-600">
                                        </td>

                                        {{-- TTD LENGKAP --}}
                                        <td class="px-4 py-3 border text-center">
                                            <input type="radio" name="ttd[{{ $index }}]" value="1"
                                                {{ isset($lengkap[$index]) && $lengkap[$index] ? 'checked' : '' }}
                                                class="w-5 h-5 text-blue-600">
                                        </td>

                                        {{-- TTD BELUM --}}
                                        <td class="px-4 py-3 border text-center">
                                            <input type="radio" name="ttd[{{ $index }}]" value="0"
                                                {{ isset($belum[$index]) && $belum[$index] ? 'checked' : '' }}
                                                class="w-5 h-5 text-gray-600">
                                        </td>

                                        {{-- KETERANGAN --}}
                                        <td class="px-4 py-3 border">
                                            <input type="text" name="keterangan[{{ $index }}]"
                                                value="{{ $keterangan[$index] ?? '' }}"
                                                class="w-full border-gray-300 rounded-lg text-sm">
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>

                    <div class="mt-6 mb-10 text-sm text-gray-600">
                        <div class="font-medium text-blue-700 mb-1">
                            Informasi Tambahan (Opsional), metadata excel kelangkapan pengajuan ini
                        </div>
                        <div class="flex items-center gap-4">
                            <a href="{{ asset('storage/' . $pengajuan->path_file_status_kelengkapan) }}"
                                class="text-green-600 hover:text-green-800 underline">Download</a>
                        </div>
                    </div>

                    {{-- STATUS KELENGKAPAN & VERIFIKASI --}}
                    {{-- <div class="mb-10">
                        <h3 class="text-lg font-bold text-gray-900 mb-3">Tandai Status Kelengkapan & Verifikasi
                            Pengajuan</h3>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                            STATUS KELENGKAPAN
                            <div class="p-5 bg-gray-50 border rounded-xl shadow-sm">
                                <label class="block text-sm font-semibold text-gray-700 mb-2">
                                    Status Kelengkapan Dokumen
                                </label>
                                <select name="kelengkapan"
                                    class="w-full px-4 py-2 border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 text-sm">
                                    <option value="">Pilih status kelengkapan</option>
                                    <option value="Lengkap"
                                        {{ $pengajuan->status_kelengkapan == 'Lengkap' ? 'selected' : '' }}>Lengkap
                                    </option>
                                    <option value="Belum Lengkap"
                                        {{ $pengajuan->status_kelengkapan == 'Belum Lengkap' || $pengajuan->status_kelengkapan == 'Belum Diperiksa' ? 'selected' : '' }}>
                                        Belum
                                        Lengkap</option>
                                </select>
                            </div>

                            STATUS VERIFIKASI
                            <div class="p-5 bg-gray-50 border rounded-xl shadow-sm">
                                <label class="block text-sm font-semibold text-gray-700 mb-2">
                                    Status Verifikasi Pengajuan
                                </label>
                                <select name="verifikasi"
                                    class="w-full px-4 py-2 border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 text-sm">
                                    <option value="">Pilih status verifikasi</option>
                                    <option value="1" {{ $pengajuan->status_verifikasi == 1 ? 'selected' : '' }}>
                                        Diverifikasi</option>
                                    <option value="0" {{ $pengajuan->status_verifikasi == 0 ? 'selected' : '' }}>
                                        Belum Diverifikasi</option>
                                </select>
                            </div>

                        </div>
                    </div> --}}


                    {{-- CATATAN PENGEMBALIAN --}}
                    <div class="mt-8 mb-8 p-6 bg-yellow-50 border-l-4 border-yellow-400 rounded-xl">
                        <h3 class="text-lg font-bold text-yellow-900 mb-2">Catatan Jika Belum Lengkap</h3>
                        <textarea name="catatan" rows="4" class="w-full p-3 border rounded-lg bg-white shadow-sm"
                            placeholder="Tuliskan alasan pengembalian jika dokumen belum lengkap...">{{ $pengajuan->message }}</textarea>
                    </div>

                    {{-- TOMBOL SET LENGKAP --}}
                    <button type="submit" name="aksi" value="lengkap"
                        class="px-5 py-2.5 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-lg shadow">
                        Selesaikan Check
                    </button>

                </form>

            </div>
        </div>
    </div>
</x-app-layout>
