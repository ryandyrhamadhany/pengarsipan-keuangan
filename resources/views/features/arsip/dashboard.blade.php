<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight">
            {{ __('Arsip') }}
        </h2>
    </x-slot>

    <div class="mx-auto max-w-7xl p-4">


        {{-- hero section --}}
        <div class="flex items-center justify-between rounded-t-md bg-[#003A8F] p-6 shadow-md">
            {{-- name --}}
            <div class="flex items-center">
                <div class="rounded-md p-4 text-sm font-semibold">
                    <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="50"
                        height="50" viewBox="0 0 48 48">
                        <path
                            d="M44,17v21c0,2.76-2.24,5-5,5H9c-2.76,0-5-2.24-5-5V20h35c0.55,0,1-0.45,1-1s-0.45-1-1-1H4V9c0-1.65,1.35-3,3-3h8.14	c1.53,0,2.9,0.85,3.58,2.21l1.62,3.24c0.17,0.34,0.51,0.55,0.9,0.55H39C41.76,12,44,14.24,44,17z">
                        </path>
                    </svg>
                </div>
                <div>
                    <div class="text-2xl font-semibold text-white">
                        Arsip Keuangan TVRI
                    </div>
                    <div class="mt-1 text-sm text-white">
                        Selamat datang di sistem pengarsipan divisi keuangan TVRI.
                    </div>
                </div>
            </div>
            {{-- role --}}
            <div class="rounded-md bg-white p-4">
                <div class="mb-4 border-b border-gray-200 pb-4">
                    <div class="text-sm font-semibold text-gray-700">
                        Divisi
                    </div>
                    <div class="text-xs text-gray-500">
                        Divisi anda adalah <span class="font-semibold">{{ $user->role }}</span>
                    </div>
                </div>
                <div>
                    <div class="text-sm font-semibold text-gray-700">
                        Akses
                    </div>
                    @if (
                        $user->role == 'Administrator' ||
                            $user->role == 'Tata Usaha' ||
                            $user->role == 'Kepala' ||
                            $user->is_privileged == 1)
                        <div class="text-xs text-gray-500">
                            Anda bisa mengakses arsip dan <span class="font-semibold">bisa memodifikasi arsip</span>
                        </div>
                    @else
                        <div class="text-xs text-gray-500">
                            Anda bisa mengakses arsip namun <span class="font-semibold">tidak bisa memodifikasi
                                arsip</span>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="rounded-b-md border border-gray-200 bg-white p-4 shadow-md">
            {{-- Search bar --}}
            <form method="GET" action="{{ route('admin.search') }}" class="mb-8 space-y-2">
                <div>
                    {{-- <div class="mb-2 text-sm font-medium text-gray-700">
                        Cari Arsip
                    </div> --}}
                    <input type="text" name="search" value="{{ request('search') }}"
                        class="w-full rounded-md border border-gray-300 py-2 text-gray-800 placeholder-gray-400"
                        placeholder="Cari nama Arsip...">
                </div>

                {{-- Date Range & Buttons --}}
                <div class="flex justify-between">
                    {{-- Date Inputs --}}
                    <div class="flex gap-2">
                        <div class="flex items-center">
                            <div
                                class="w-full rounded-l-md border-b border-l border-t border-gray-300 px-2 py-1.5 text-sm font-medium text-gray-700">
                                Mulai Tanggal</div>
                            <input type="date" name="start_date" value="{{ request('start_date') }}"
                                class="w-full rounded-r-md border border-gray-300 px-2 py-1 text-gray-700">
                        </div>
                        <div class="flex items-center">
                            <div
                                class="w-full rounded-l-md border-b border-l border-t border-gray-300 px-2 py-1.5 text-sm font-medium text-gray-700">
                                Sampai Tanggal</div>
                            <input type="date" name="end_date" value="{{ request('end_date') }}"
                                class="w-full rounded-r-md border border-gray-300 px-2 py-1 text-gray-700">
                        </div>
                    </div>

                    {{-- Action Buttons --}}
                    <button type="submit"
                        class="inline-flex items-center justify-center gap-2 rounded-md bg-[#003A8F] px-4 py-1.5 font-medium text-white shadow-sm transition-colors hover:bg-[#002a71]">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                        Cari
                    </button>
                </div>
            </form>

            {{-- cabinet --}}
            <div class="mt-4 rounded-md border border-gray-200">

                <div class="p-4">
                    <div class="flex justify-between">

                        <div class="flex items-center gap-4">
                            <div class="rounded-md bg-[#003A8F] p-2">
                                <svg class="h-7 w-7 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M2 6a2 2 0 012-2h4l2 2h4a2 2 0 012 2v1H8a3 3 0 00-3 3v1.5a1.5 1.5 0 01-3 0V6z"
                                        clip-rule="evenodd" />
                                    <path d="M6 12a2 2 0 012-2h8a2 2 0 012 2v2a2 2 0 01-2 2H2h2a2 2 0 002-2v-2z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-gray-800">Daftar Kabinet</h3>
                                <div class="text-xs text-gray-500">
                                    silahkan cari arsip dari kabinet yang tersedia
                                </div>
                            </div>
                        </div>

                        <a href="{{ route('cabinet.create') }}"
                            class="group inline-flex items-center gap-2 rounded-md bg-green-500 px-4 py-2 font-semibold text-white transition-all duration-300 hover:bg-green-600">
                            <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                                    clip-rule="evenodd" />
                            </svg>
                            Tambah Kabinet
                        </a>
                    </div>
                </div>
                @php $no = 1; @endphp
                @foreach ($cabinets as $cabinet)
                    <div
                        class="flex items-center justify-between border-t border-gray-200 p-4 transition-all duration-300 hover:bg-gray-200">

                        {{-- Link utama --}}
                        <a href="{{ route('cabinet.show', $cabinet->id) }}"
                            class="inline-flex w-full items-center justify-between gap-4">
                            <div class="inline-flex items-center gap-4">
                                {{-- Number Badge --}}
                                <div class="flex h-10 w-10 items-center justify-center rounded-md bg-gray-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        class="fill-current text-white" version="1.1" id="mdi-file-cabinet"
                                        width="20" height="20" viewBox="0 0 24 24">
                                        <path
                                            d="M14,8H10V6H14V8M20,4V20C20,21.11 19.11,22 18,22H6C4.89,22 4,21.11 4,20V4A2,2 0 0,1 6,2H18C19.11,2 20,2.9 20,4M18,13H6V20H18V13M18,4H6V11H18V4M14,15H10V17H14V15Z" />
                                    </svg>
                                </div>
                                {{-- Cabinet Info --}}
                                <div class="text-base font-medium text-gray-700">
                                    {{ $cabinet->cabinet_name }}
                                </div>
                            </div>
                            <div class="inline-flex items-center gap-4">
                                <div class="ml-4 border-r-2 border-blue-900 pr-4 text-sm text-gray-500">
                                    Category : <span class="ml-2">{{ $cabinet->category->count() }}</span>
                                </div>
                            </div>
                        </a>

                        @if (
                            $user->role == 'Administrator' ||
                                $user->role == 'Tata Usaha' ||
                                $user->role == 'Kepala' ||
                                $user->is_privileged == 1)
                            {{-- Tombol Aksi --}}
                            <div class="ml-4 flex items-center gap-2">
                                {{-- Edit Button --}}
                                <a href="{{ route('cabinet.edit', $cabinet->id) }}"
                                    class="group/btn flex items-center justify-center rounded-md bg-yellow-500 p-2 transition-all duration-200 hover:bg-yellow-600"
                                    title="Edit Kabinet">
                                    <svg class="h-4 w-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                    </svg>
                                </a>

                                {{-- Delete Button --}}
                                <form action="{{ route('cabinet.destroy', $cabinet->id) }}" method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus kabinet ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="group/btn flex items-center justify-center rounded-md bg-red-500 p-2 hover:bg-red-600"
                                        title="Hapus Kabinet">
                                        <svg class="h-4 w-4 text-white transition-all duration-200"
                                            fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>

            @if (
                $user->role == 'Administrator' ||
                    $user->role == 'Tata Usaha' ||
                    $user->role == 'Kepala' ||
                    $user->is_privileged == 1)
            @else
            @endif
        </div>
    </div>
</x-app-layout>
