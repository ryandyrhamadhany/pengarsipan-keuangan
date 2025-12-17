<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pengajuan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg sm:rounded-xl p-8 border border-gray-100">

                <h2 class="text-2xl font-bold mb-6 text-gray-700">
                    Buat Pengajuan Keuangan
                </h2>

                <form action="{{ route('pengajuan.store') }}" method="POST" enctype="multipart/form-data"
                    class="space-y-6">
                    @csrf

                    {{-- Nama Pengajuan --}}
                    <div>
                        <label class="block text-gray-600 font-medium mb-1">Nama Pengajuan</label>
                        <input type="text" name="nama_pengajuan"
                            class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-400 focus:border-blue-400 transition"
                            placeholder="Contoh: Pengajuan Pembelian Alat" required>
                    </div>

                    {{-- Divisi --}}
                    {{-- <div>
                        <label class="block text-gray-600 font-medium mb-1">Divisi / Bagian</label>
                        <select name="divisi"
                            class="w-full border border-gray-300 rounded-lg p-3 bg-white focus:ring-2 focus:ring-blue-400 focus:border-blue-400 transition"
                            required>
                            <option value="">Pilih divisi / bagian</option>
                            @foreach ($roles as $role)
                                @if ($role->role_name !== 'Admin')
                                    <option value="{{ $role->id }}"
                                        {{ Auth::user()->role_id == $role->id ? 'selected' : '' }}>
                                        {{ $role->role_name }}
                                    </option>
                                @endif
                            @endforeach
                        </select>
                    </div> --}}

                    {{-- File --}}
                    <div>
                        <label class="block text-gray-600 font-medium mb-1">File PDF Pengajuan</label>

                        <div class="flex items-center gap-3">
                            <label for="file"
                                class="bg-blue-600 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-700 cursor-pointer transition">
                                Pilih File
                            </label>

                            <span id="filename" class="text-gray-500 text-sm">Belum ada file dipilih</span>
                        </div>

                        <input id="file" name="file" type="file" accept="application/pdf" class="hidden"
                            onchange="document.getElementById('filename').innerText = this.files[0]?.name ?? 'Belum ada file dipilih'">
                    </div>

                    {{-- Tombol Submit --}}
                    <div>
                        <button type="submit"
                            class="w-full mt-6 bg-blue-600 text-white p-3 rounded-lg shadow hover:bg-blue-700 transition font-semibold">
                            Kirim Pengajuan
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</x-app-layout>
