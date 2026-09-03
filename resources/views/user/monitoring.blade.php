<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Semua Status submit') }}
        </h2>
    </x-slot>

    <div class="py-6 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-2 lg:px-4">
            <div class="bg-white overflow-hidden shadow-md rounded-md">
                <div class="p-4 space-y-8">
                    {{-- Header Dashboard --}}
                    <div class="bg-[#003A8F] text-white p-8 rounded-md shadow-md">
                        <div class="flex items-center justify-between">
                            <div>
                                <h2 class="text-2xl font-bold">Pengajuan saya</h2>
                                <p class="text-white/90 text-sm mt-1">Kelola dan pantau semua pengajuan keuangan anda
                                    dalam satu tempat</p>
                            </div>
                        </div>
                    </div>

                    {{-- Main Content --}}
                    <div class="space-y-8">

                        {{-- ======================== BAGIAN 1: submit Diproses ======================== --}}
                        <div class="space-y-4">
                            {{-- Section Header --}}
                            <div class="flex items-center justify-between pb-3 border-b-2 border-gray-200">
                                <div class="flex items-center space-x-3">
                                    <div class="p-2 bg-blue-100 rounded-md flex items-center justify-center">
                                        <svg class="text-blue-700 fill-current" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="30" height="30" viewBox="0 0 32 32">
                                        <path d="M 16 4 C 9.382813 4 4 9.382813 4 16 C 4 22.617188 9.382813 28 16 28 C 22.617188 28 28 22.617188 28 16 C 28 9.382813 22.617188 4 16 4 Z M 14.96875 6.0625 C 14.980469 6.0625 14.988281 6.0625 15 6.0625 C 15.035156 6.585938 15.46875 7 16 7 C 16.53125 7 16.964844 6.585938 17 6.0625 C 21.738281 6.527344 25.472656 10.261719 25.9375 15 C 25.414063 15.035156 25 15.46875 25 16 C 25 16.53125 25.414063 16.964844 25.9375 17 C 25.472656 21.738281 21.738281 25.472656 17 25.9375 C 16.964844 25.414063 16.53125 25 16 25 C 15.46875 25 15.035156 25.414063 15 25.9375 C 10.261719 25.472656 6.527344 21.738281 6.0625 17 C 6.585938 16.964844 7 16.53125 7 16 C 7 15.46875 6.585938 15.035156 6.0625 15 C 6.527344 10.269531 10.246094 6.539063 14.96875 6.0625 Z M 15 9 L 15 16.40625 L 15.28125 16.71875 L 19.28125 20.71875 L 20.71875 19.28125 L 17 15.5625 L 17 9 Z"></path>
                                        </svg>
                                    </div>
                                    <h3 class="text-lg font-semibold text-gray-800">Pengajuan dalam proses</h3>
                                </div>
                                <span class="px-3 py-1 bg-gray-100 text-gray-700 text-sm font-medium rounded-md">
                                    {{ $proses_submissions->where('requirements_status', 'Belum Lengkap')->where('status_verifikasi', 0)->count() }}
                                    Item
                                </span>
                            </div>

                            {{-- List Items --}}
                            <div class="space-y-3">
                                @php $no = 1; @endphp

                                @forelse ($proses_submissions as $proses)
                                    @if ($proses->requirements_status == 'Belum Lengkap' && $proses->verification_status == 0)
                                        <div
                                            class="flex items-center p-4 bg-white border border-gray-200 rounded-md hover:bg-gray-100 shadow-md transition-all duration-200">
                                            {{-- Number Badge --}}
                                            <div class="bg-yellow-300 text-white p-2 rounded-md"> 
                                                <img src="https://img.icons8.com/?size=30&id=94703&format=png&color=ffffff" alt="">
                                            </div>

                                            {{-- Content --}}
                                            <a href="{{ route('submit.show', $proses->id) }}" class="flex-1 px-6">
                                                <div class="text-lg font-semibold text-gray-800 mb-2 pb-2 border-b border-gray-200 truncate">
                                                    {{ $proses->budget_submission_name }}
                                                </div>

                                                <div class="flex flex-wrap items-center justify-between">
                                                    <div class="flex flex-wrap items-center gap-2">
                                                        <span
                                                            class="inline-flex items-center px-2 py-1 text-xs font-medium rounded-md bg-blue-100 text-blue-700">
                                                            <svg class="w-3 h-3 mr-1" fill="currentColor"
                                                                viewBox="0 0 20 20">
                                                                <circle cx="10" cy="10" r="3" />
                                                            </svg>
                                                            Proses
                                                        </span>
    
                                                        @if ($proses->requirements_status == 'Belum Lengkap')
                                                            <span
                                                                class="inline-flex items-center px-2 py-1 text-xs font-medium rounded-md bg-yellow-100 text-yellow-700">
                                                                <svg class="w-3 h-3 mr-1" fill="none"
                                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        stroke-width="2"
                                                                        d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                                                </svg>
                                                                Belum Lengkap
                                                            </span>
                                                        @endif
    
                                                        <span
                                                            class="inline-flex items-center px-2 py-1 text-xs font-medium rounded-md bg-red-100 text-red-700">
                                                            <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor"
                                                                viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                            </svg>
                                                            Belum Diverifikasi
                                                        </span>
    
                                                        @if ($proses->is_return == 1)
                                                            <span
                                                                class="inline-flex items-center px-2 py-1 text-xs font-medium rounded-md bg-orange-100 text-orange-700">
                                                                <svg class="w-3 h-3 mr-1" fill="none"
                                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        stroke-width="2"
                                                                        d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6" />
                                                                </svg>
                                                                Dikembalikan
                                                            </span>
                                                        @endif
    
                                                        @if ($proses->is_archive == 1)
                                                            <span
                                                                class="inline-flex items-center px-2 py-1 text-xs font-medium rounded-md bg-purple-100 text-purple-700">
                                                                <svg class="w-3 h-3 mr-1" fill="none"
                                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        stroke-width="2"
                                                                        d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                                                                </svg>
                                                                Diarsipkan
                                                            </span>
                                                        @endif
                                                    </div>

                                                    <div class="text-xs text-gray-500 ml-2">
                                                        {{ $proses->updated_at->diffForHumans() }}
                                                    </div>
                                                </div>
                                            </a>

                                            {{-- Action Buttons --}}
                                            <div class="flex gap-2 flex-shrink-0">
                                                <a href="{{ route('submit.edit', $proses->id) }}"
                                                    class="p-2 bg-yellow-500 hover:bg-yellow-600 text-white text-sm font-medium rounded-md transition-colors"
                                                    title="Edit">
                                                    <svg class="text-white fill-current" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 24 24">
                                                        <path d="M 18 2 L 15.585938 4.4140625 L 19.585938 8.4140625 L 22 6 L 18 2 z M 14.076172 5.9238281 L 3 17 L 3 21 L 7 21 L 18.076172 9.9238281 L 14.076172 5.9238281 z"></path>
                                                    </svg>
                                                </a>

                                                <form action="{{ route('submit.destroy', $proses->id) }}" method="POST"
                                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus submit ini?');">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button
                                                        class="p-2 bg-red-500 hover:bg-red-600 text-white text-sm font-medium rounded-md transition-colors"
                                                        title="Hapus">
                                                        <svg class="text-white fill-current" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 24 24">
                                                            <path d="M 10 2 L 9 3 L 3 3 L 3 5 L 21 5 L 21 3 L 15 3 L 14 2 L 10 2 z M 4.3652344 7 L 6.0683594 22 L 17.931641 22 L 19.634766 7 L 4.3652344 7 z"></path>
                                                        </svg>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    @endif
                                @empty
                                    <div class="text-center py-12 bg-gray-50 rounded-md">
                                        <div
                                            class="w-16 h-16 bg-gray-200 rounded-full flex items-center justify-center mx-auto mb-3">
                                            <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                        </div>
                                        <p class="text-gray-500 font-medium">Belum ada submit dalam proses</p>
                                        <p class="text-gray-400 text-sm mt-1">submit yang sedang diproses akan
                                            muncul di sini</p>
                                    </div>
                                @endforelse
                            </div>
                        </div>

                        {{-- ======================== BAGIAN 2: SEMUA submit ======================== --}}
                        <div class="space-y-4">
                            {{-- Section Header --}}
                            <div class="flex items-center justify-between pb-3 border-b-2 border-gray-200">
                                <div class="flex items-center space-x-3">
                                    <div class="p-2 bg-gray-100 rounded-md flex items-center justify-center">
                                        <svg class="text-gray-600 fill-current" fill="none" stroke="currentColor" width="30" height="30"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                                        </svg>
                                    </div>
                                    <h3 class="text-lg font-semibold text-gray-800">Semua submit</h3>
                                </div>
                                <span class="px-3 py-1 bg-gray-100 text-gray-700 text-sm font-medium rounded-md">
                                    {{ $all_submissions->count() }} Item
                                </span>
                            </div>

                            {{-- List Items --}}
                            <div class="space-y-3">
                                @php $no = 1; @endphp

                                @forelse ($all_submissions as $all)
                                    <div
                                        class="flex items-center p-4 bg-white border border-gray-200 hover:bg-gray-100 shadow-md rounded-md transition-all duration-200">
                                        {{-- Number Badge --}}
                                        <div
                                            class="p-2 flex items-center justify-center bg-gray-300 font-semibold text-sm rounded-md">
                                            <svg class="text-white fill-current" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="30" height="30" viewBox="0 0 24 24">
                                                <path d="M14,2H6C4.9,2,4,2.9,4,4v16c0,1.1,0.9,2,2,2h12c1.1,0,2-0.9,2-2V8L14,2z M16,18H8v-2h8V18z M16,14H8v-2h8V14z M13,9V3.5 L18.5,9H13z"></path>
                                            </svg>
                                        </div>

                                        {{-- Content --}}
                                        <a href="{{ route('submit.show', $all->id) }}" class="flex-1 px-6">
                                            <div class="font-semibold text-gray-800 mb-2 pb-2 text-lg border-b border-gray-200">
                                                {{ $all->budget_submission_name }}
                                            </div>

                                            <div class="flex flex-wrap items-center justify-between">
                                                <div class="flex flex-wrap items-center gap-2">
                                                    @if ($all->requirements_status == 'Belum Lengkap')
                                                        <span
                                                            class="inline-flex items-center px-2 py-1 text-xs font-medium rounded-md bg-yellow-100 text-yellow-700">
                                                            <svg class="w-3 h-3 mr-1" fill="none"
                                                                stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                                            </svg>
                                                            Belum Lengkap
                                                        </span>
                                                    @elseif($all->requirements_status == 'Lengkap')
                                                        <span
                                                            class="inline-flex items-center px-2 py-1 text-xs font-medium rounded-md bg-green-100 text-green-700">
                                                            <svg class="w-3 h-3 mr-1" fill="none"
                                                                stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                            </svg>
                                                            Lengkap
                                                        </span>
                                                    @else
                                                        <span
                                                            class="inline-flex items-center px-2 py-1 text-xs font-medium rounded-md bg-gray-100 text-gray-700">
                                                            <svg class="w-3 h-3 mr-1" fill="none"
                                                                stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                            </svg>
                                                            Belum Diperiksa
                                                        </span>
                                                    @endif
    
                                                    @if ($all->verification_status == 1)
                                                        <span
                                                            class="inline-flex items-center px-2 py-1 text-xs font-medium rounded-md bg-green-100 text-green-700">
                                                            <svg class="w-3 h-3 mr-1" fill="none"
                                                                stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                                            </svg>
                                                            Diverifikasi
                                                        </span>
                                                    @else
                                                        <span
                                                            class="inline-flex items-center px-2 py-1 text-xs font-medium rounded-md bg-red-100 text-red-700">
                                                            <svg class="w-3 h-3 mr-1" fill="none"
                                                                stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                            </svg>
                                                            Belum Diverifikasi
                                                        </span>
                                                    @endif
    
                                                    @if ($all->is_archive == 1)
                                                        <span
                                                            class="inline-flex items-center px-2 py-1 text-xs font-medium rounded-md bg-blue-100 text-blue-700">
                                                            <svg class="w-3 h-3 mr-1" fill="none"
                                                                stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                                                            </svg>
                                                            Diarsipkan
                                                        </span>
                                                    @endif
                                                </div>

                                                <div class="text-xs text-gray-500">
                                                    {{ $all->created_at->diffForHumans() }}
                                                </div>
                                            </div>
                                        </a>

                                        {{-- Action Buttons --}}
                                        @if (!$all->is_archive)
                                            <div class="flex gap-2 flex-shrink-0">
                                                <a href="{{ route('submit.edit', $all->id) }}"
                                                    class="p-2 bg-yellow-500 hover:bg-yellow-600 text-white text-sm font-medium rounded-md transition-colors"
                                                    title="Edit">
                                                    <svg class="text-white fill-current" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 24 24">
                                                        <path d="M 18 2 L 15.585938 4.4140625 L 19.585938 8.4140625 L 22 6 L 18 2 z M 14.076172 5.9238281 L 3 17 L 3 21 L 7 21 L 18.076172 9.9238281 L 14.076172 5.9238281 z"></path>
                                                    </svg>
                                                </a>

                                                <form action="{{ route('submit.destroy', $all->id) }}" method="POST"
                                                    onsubmit="return confirm('Yakin ingin menghapus submit ini?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="p-2 bg-red-500 hover:bg-red-600 text-white text-sm font-medium rounded-md transition-colors"
                                                        title="Hapus">
                                                        <svg class="text-white fill-current" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 24 24">
                                                            <path d="M 10 2 L 9 3 L 3 3 L 3 5 L 21 5 L 21 3 L 15 3 L 14 2 L 10 2 z M 4.3652344 7 L 6.0683594 22 L 17.931641 22 L 19.634766 7 L 4.3652344 7 z"></path>
                                                        </svg>
                                                    </button>
                                                </form>
                                            </div>
                                        @endif
                                    </div>
                                @empty
                                    <div class="text-center py-12 bg-gray-50 rounded-md">
                                        <div
                                            class="w-16 h-16 bg-gray-200 rounded-full flex items-center justify-center mx-auto mb-3">
                                            <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                                            </svg>
                                        </div>
                                        <p class="text-gray-500 font-medium">Belum ada submit</p>
                                        <p class="text-gray-400 text-sm mt-1">Buat submit baru untuk memulai</p>
                                    </div>
                                @endforelse

                                {{ $all_submissions->links() }}
                            </div>
                        </div>

                        {{-- ======================== BAGIAN 3: submit Selesai ======================== --}}
                        <div class="space-y-4">
                            {{-- Section Header --}}
                            <div class="flex items-center justify-between pb-3 border-b-2 border-gray-200">
                                <div class="flex items-center space-x-3">
                                    <div class="p-2 bg-green-100 rounded-md flex items-center justify-center">
                                        <svg class="text-green-600" fill="none" stroke="currentColor" width="30" height="30"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                    </div>
                                    <h3 class="text-lg font-semibold text-gray-800">submit Diverifikasi atau Selesai
                                    </h3>
                                </div>
                                <span class="px-3 py-1 bg-gray-100 text-gray-700 text-sm font-medium rounded-md">
                                    {{ $archive_submit->where('status_kelengkapan', 'Lengkap')->where('status_verifikasi', 1)->count() }}
                                    Item
                                </span>
                            </div>

                            {{-- List Items --}}
                            <div class="space-y-3">
                                @php $no = 1; @endphp

                                @forelse ($archive_submit as $archived)
                                    @if ($archived->requirements_status == 'Lengkap' && $archived->verification_status == 1)
                                        <div
                                            class="flex items-center p-4 bg-white border border-gray-200 hover:bg-gray-100 rounded-md shadow-md transition-all duration-200">
                                            {{-- Number Badge --}}
                                            <div
                                                class="flex-shrink-0 p-2 flex items-center justify-center bg-lime-300 font-semibold text-sm rounded-md">
                                                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="30" height="30" viewBox="0 0 48 48">
                                                <path d="M44,17v21c0,2.76-2.24,5-5,5H9c-2.76,0-5-2.24-5-5V20h35c0.55,0,1-0.45,1-1s-0.45-1-1-1H4V9c0-1.65,1.35-3,3-3h8.14	c1.53,0,2.9,0.85,3.58,2.21l1.62,3.24c0.17,0.34,0.51,0.55,0.9,0.55H39C41.76,12,44,14.24,44,17z"></path>
                                                </svg>
                                            </div>

                                            {{-- Content --}}
                                            <a href="{{ route('submit.show', $archived->id) }}" class="flex-1 px-6">
                                                <div class="font-semibold text-gray-800 mb-2 pb-2 border-b border-gray-200">
                                                    {{ $archived->budget_submission_name }}
                                                </div>

                                                <div class="flex flex-wrap items-center justify-between">
                                                    <div class="flex flex-wrap items-center gap-2">
                                                        @if ($archived->verification_status == 1)
                                                            <span
                                                                class="inline-flex items-center px-2.5 py-1 text-xs font-medium rounded-md bg-green-100 text-green-700">
                                                                <svg class="w-3 h-3 mr-1" fill="none"
                                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        stroke-width="2"
                                                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                                </svg>
                                                                Selesai
                                                            </span>
                                                        @endif
    
                                                        <span
                                                            class="inline-flex items-center px-2.5 py-1 text-xs font-medium rounded-md bg-green-100 text-green-700">
                                                            <svg class="w-3 h-3 mr-1" fill="none"
                                                                stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                            </svg>
                                                            Lengkap
                                                        </span>
    
                                                        <span
                                                            class="inline-flex items-center px-2.5 py-1 text-xs font-medium rounded-md bg-green-100 text-green-700">
                                                            <svg class="w-3 h-3 mr-1" fill="none"
                                                                stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                                            </svg>
                                                            Diverifikasi
                                                        </span>
    
                                                        @if ($archived->is_archive == 1)
                                                            <span
                                                                class="inline-flex items-center px-2.5 py-1 text-xs font-medium rounded-md bg-blue-100 text-blue-700">
                                                                <svg class="w-3 h-3 mr-1" fill="none"
                                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        stroke-width="2"
                                                                        d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                                                                </svg>
                                                                Diarsipkan
                                                            </span>
                                                        @endif
                                                    </div>

                                                    <div class="text-xs text-gray-500">
                                                        {{ $all->created_at->diffForHumans() }}
                                                    </div>
                                                </div>
                                            </a>

                                            {{-- Action Buttons --}}
                                            @if (!$archived->is_archive)
                                                <div class="flex gap-2 flex-shrink-0">
                                                    <a href="{{ route('submit.edit', $archived->id) }}"
                                                        class="p-2 bg-yellow-500 hover:bg-yellow-600 text-white text-sm font-medium rounded-md transition-colors"
                                                        title="Edit">
                                                        <svg class="text-white fill-current" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 24 24">
                                                        <path d="M 18 2 L 15.585938 4.4140625 L 19.585938 8.4140625 L 22 6 L 18 2 z M 14.076172 5.9238281 L 3 17 L 3 21 L 7 21 L 18.076172 9.9238281 L 14.076172 5.9238281 z"></path>
                                                    </svg>
                                                    </a>

                                                    <form action="{{ route('submit.destroy', $archived->id) }}"
                                                        method="POST"
                                                        onsubmit="return confirm('Yakin ingin menghapus submit ini?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="p-2 bg-red-500 hover:bg-red-600 text-white text-sm font-medium rounded-md transition-colors"
                                                            title="Hapus">
                                                            <svg class="text-white fill-current" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 24 24">
                                                            <path d="M 10 2 L 9 3 L 3 3 L 3 5 L 21 5 L 21 3 L 15 3 L 14 2 L 10 2 z M 4.3652344 7 L 6.0683594 22 L 17.931641 22 L 19.634766 7 L 4.3652344 7 z"></path>
                                                            </svg>
                                                        </button>
                                                    </form>
                                                </div>
                                            @endif
                                        </div>
                                    @endif
                                @empty
                                    <div class="text-center py-12 bg-gray-50 rounded-md">
                                        <div
                                            class="w-16 h-16 bg-gray-200 rounded-full flex items-center justify-center mx-auto mb-3">
                                            <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                        </div>
                                        <p class="text-gray-500 font-medium">Belum ada submit yang selesai</p>
                                    </div>
                                @endforelse

                                {{ $archive_submit->links() }}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
