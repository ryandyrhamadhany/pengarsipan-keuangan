<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            Create User
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow-lg sm:rounded-xl p-8">

                <h3 class="text-2xl font-semibold text-gray-700 mb-6">
                    Update Akun
                </h3>

                {{-- FORM --}}
                <form action="{{ route('account.update', $user->id) }}" method="POST" class="space-y-6">
                    @method('PUT')
                    @csrf

                    {{-- NAME --}}
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Nama Lengkap</label>
                        <input type="text" name="name" value="{{ $user->name }}"
                            class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300"
                            placeholder="Masukkan nama lengkap" required>
                    </div>

                    {{-- EMAIL --}}
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Email</label>
                        <input type="email" name="email" value="{{ $user->email }}"
                            class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300"
                            placeholder="Masukkan email" required>
                    </div>

                    {{-- PASSWORD --}}
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Password</label>
                        <input type="password" name="password"
                            class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300"
                            placeholder="Biarkan kosong jika tidak ingin mengubah password">

                    </div>

                    {{-- ROLE --}}
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Role</label>
                        <select name="role" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300"
                            required>
                            <option value="" disabled selected>Pilih Divisi</option>
                            <option value="Kepala">Kepala Kantor</option>
                            <option value="Program">Program</option>
                            <option value="Berita">Berita</option>
                            <option value="Teknik">Teknik</option>
                            <option value="KMB">KMB</option>
                            <option value="Promo">Promo</option>
                            <option value="Umum">Umum</option>
                            <option value="Tata usaha">Tata usaha</option>
                            <option value="Pengembangan usaha">Pengembangan usaha</option>
                            <option value="Keuangan">Keuangan</option>
                            <option value="Bendahara">Bendahara</option>
                            <option value="Admin">Admin</option>
                        </select>
                    </div>

                    <div class="flex justify-between items-center pt-4">

                        {{-- Tombol Kembali --}}
                        <a href="{{ route('account.index') }}"
                            class="inline-flex items-center gap-2 px-5 py-3 bg-gray-300 hover:bg-gray-400
               text-gray-800 font-semibold rounded-xl shadow transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                            </svg>
                            Kembali
                        </a>

                        {{-- Tombol Buat Akun --}}
                        <button type="submit"
                            class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold
               rounded-xl shadow transition">
                            Update Akun
                        </button>
                    </div>
                </form>

            </div>

        </div>
    </div>
</x-app-layout>
