{{-- ================= SEARCH & FILTER ================= --}}
<div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
    <form method="GET" action="#" class="space-y-4">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

            {{-- Search --}}
            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-2">Cari Pengajuan</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    <input type="text" name="search" value="{{ request('search') }}"
                        class="block w-full pl-10 pr-3 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-400 focus:border-emerald-400 focus:outline-none"
                        placeholder="Cari nama pengajuan...">
                </div>
            </div>

            {{-- Filter Status --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                <select name="status"
                    class="block w-full px-3 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-400 focus:border-emerald-400 focus:outline-none">
                    <option value="">Semua Status</option>
                    <option value="belum_diperiksa"
                        {{ request('status') == 'belum_diperiksa' ? 'selected' : '' }}>
                        Belum Diperiksa
                    </option>
                    <option value="belum_lengkap"
                        {{ request('status') == 'belum_lengkap' ? 'selected' : '' }}>
                        Belum Lengkap
                    </option>
                    <option value="lengkap" {{ request('status') == 'lengkap' ? 'selected' : '' }}>
                        Lengkap
                    </option>
                    <option value="belum_diverifikasi"
                        {{ request('status') == 'belum_diverifikasi' ? 'selected' : '' }}>
                        Belum Diverifikasi
                    </option>
                    <option value="diverifikasi"
                        {{ request('status') == 'diverifikasi' ? 'selected' : '' }}>
                        Diverifikasi
                    </option>
                    <option value="diarsipkan"
                        {{ request('status') == 'diarsipkan' ? 'selected' : '' }}>
                        Diarsipkan
                    </option>
                </select>
            </div>

        </div>

        {{-- Buttons --}}
        <div class="flex gap-3">
            <button type="submit"
                class="inline-flex items-center gap-2 px-5 py-2.5 bg-gradient-to-b from-[#003A8F] to-[#002766] text-white font-medium rounded-lg shadow-sm">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z">
                    </path>
                </svg>
                Filter
            </button>
            <a href="#"
                class="inline-flex items-center gap-2 px-5 py-2.5 bg-gray-200 text-gray-700 font-medium rounded-lg">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15">
                    </path>
                </svg>
                Reset
            </a>
        </div>
    </form>
</div>

{{-- ================= DAFTAR PENGAJUAN ================= --}}
<div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
    <div class="flex items-center justify-between mb-6 pb-4 border-b border-gray-200">
        <div class="flex items-center gap-3">
            <div class="p-2 bg-emerald-100 rounded-lg">
                <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" s  troke-linejoin="round" stroke-width="2"
                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4">
                    </path>
                </svg>
            </div>
            <div>
                <h3 class="text-lg font-semibold text-gray-800">Daftar Pengajuan</h3>
                <p class="text-xs text-gray-500 mt-0.5">Total: {{ $pengajuans->count() }} pengajuan
                </p>
            </div>
        </div>
    </div>

    @php $no = 1; @endphp

    @forelse ($pengajuans as $pengajuan)
        <div class="group relative mb-4 last:mb-0">
            <div
                class="flex items-center p-5 bg-gray-50 rounded-xl shadow-sm border border-gray-200 hover:shadow-md hover:border-emerald-300 transition-all duration-300">

                {{-- NOMOR --}}
                <div
                    class="flex-shrink-0 w-10 h-10 flex items-center justify-center bg-gradient-to-br from-emerald-500 to-emerald-600 text-white font-bold text-sm rounded-lg shadow-md">
                    {{ $no++ }}
                </div>

                {{-- KONTEN LIST --}}
                <a href="{{ route('keuangan.check', $pengajuan->id) }}" class="flex-1 px-6">
                    {{-- Nama Pengajuan --}}
                    <div class="font-semibold text-base text-gray-800 mb-3 break-words">
                        {{ $pengajuan->pengajuan_name }}
                    </div>

                    {{-- Pengaju --}}
                    <div class="text-xs text-gray-500 mb-2">
                        Diajukan oleh: <span
                            class="font-medium text-gray-700">{{ $pengajuan->user->name }}</span>
                    </div>

                    {{-- STATUS --}}
                    <div class="flex flex-wrap items-center gap-2">
                        {{-- Status Sedang Proses --}}
                        @if (
                            ($pengajuan->status_kelengkapan == 'Belum Lengkap' || $pengajuan->status_kelengkapan == 'Belum Diperiksa') &&
                                $pengajuan->status_verifikasi == 0)
                            <span
                                class="px-3 py-1 text-xs font-medium rounded-full bg-yellow-100 text-yellow-700">
                                Sedang Proses
                            </span>
                        @endif

                        {{-- Status Kelengkapan --}}
                        @if ($pengajuan->status_kelengkapan == 'Belum Lengkap')
                            <span
                                class="px-3 py-1 text-xs font-medium rounded-full bg-yellow-100 text-yellow-700">
                                Belum Lengkap
                            </span>
                        @elseif($pengajuan->status_kelengkapan == 'Lengkap')
                            <span
                                class="px-3 py-1 text-xs font-medium rounded-full bg-green-100 text-green-700">
                                Lengkap
                            </span>
                        @else
                            <span
                                class="px-3 py-1 text-xs font-medium rounded-full bg-red-100 text-red-700">
                                Belum Diperiksa
                            </span>
                        @endif

                        {{-- Status Verifikasi --}}
                        @if ($pengajuan->status_verifikasi == 1)
                            <span
                                class="px-3 py-1 text-xs font-medium rounded-full bg-green-100 text-green-700">
                                Diverifikasi
                            </span>
                        @else
                            <span
                                class="px-3 py-1 text-xs font-medium rounded-full bg-red-100 text-red-700">
                                Belum Diverifikasi
                            </span>
                        @endif

                        {{-- Status Arsip --}}
                        @if ($pengajuan->status_diarsipkan == 1)
                            <span
                                class="px-3 py-1 text-xs font-medium rounded-full bg-blue-100 text-blue-700">
                                Diarsipkan
                            </span>
                        @endif
                    </div>
                </a>

                {{-- Arrow Icon --}}
                <div class="flex-shrink-0 ml-4">
                    <div
                        class="w-10 h-10 flex items-center justify-center bg-gray-100 rounded-lg group-hover:bg-emerald-500 transition-all duration-300">
                        <svg class="w-5 h-5 text-gray-400 group-hover:text-white transition-all duration-300"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5l7 7-7 7"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="text-center py-12">
            <div
                class="w-20 h-20 bg-gray-200 rounded-full flex items-center justify-center mx-auto mb-4">
                <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2">
                    </path>
                </svg>
            </div>
            <p class="text-gray-500 font-medium text-lg mb-2">Tidak Ada Pengajuan</p>
            <p class="text-gray-400 text-sm">
                {{ request('search') || request('status') ? 'Tidak ada pengajuan yang sesuai dengan filter' : 'Belum ada pengajuan yang perlu diperiksa' }}
            </p>
        </div>
    @endforelse
</div>

</div>
</div>
</div>