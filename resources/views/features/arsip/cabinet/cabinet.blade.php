<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Input Arsip') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto">
        {{-- Header Section with Search --}}
        <div class="bg-white rounded-md shadow-sm border border-gray-200 p-6 mb-6">
            <form method="GET" action="{{route('admin.search')}}" class="space-y-5">
                
                {{-- Search --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Cari Pengajuan</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                        <input type="text" name="search" value="{{ request('search') }}"
                            class="block w-full pl-10 pr-3 py-2.5 border border-gray-300 rounded-md text-gray-900 placeholder-gray-400 focus:ring-1 focus:ring-blue-600 focus:border-blue-600 transition-colors"
                            placeholder="Cari nama pengajuan...">
                    </div>
                </div>

                {{-- Date Range & Buttons --}}
                <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-4">
                    
                    {{-- Date Inputs --}}
                    <div class="flex flex-col sm:flex-row gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Mulai Tanggal</label>
                            <input type="date" name="start_date" value="{{ request('start_date') }}"
                                class="block w-full px-3 py-2.5 border border-gray-300 rounded-md text-gray-900 focus:ring-1 focus:ring-blue-600 focus:border-blue-600 transition-colors">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Sampai Tanggal</label>
                            <input type="date" name="end_date" value="{{ request('end_date') }}"
                                class="block w-full px-3 py-2.5 border border-gray-300 rounded-md text-gray-900 focus:ring-1 focus:ring-blue-600 focus:border-blue-600 transition-colors">
                        </div>
                    </div>

                    {{-- Action Buttons --}}
                    <div class="flex gap-3">
                        <a href="{{ url()->current() }}"
                            class="inline-flex items-center justify-center gap-2 px-5 py-2.5 bg-white border border-gray-300 hover:bg-gray-50 text-gray-700 font-medium rounded-md transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15">
                                </path>
                            </svg>
                            Reset
                        </a>
                        <button type="submit"
                            class="inline-flex items-center justify-center gap-2 px-6 py-2.5 bg-[#003A8F] hover:bg-[#002a71] text-white font-medium rounded-md shadow-sm transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                            Cari
                        </button>
                    </div>
                </div>

            </form>
        </div>

        {{-- Header Kabinet with Stats --}}
        <div class="bg-gradient-to-r from-white to-gray-50 shadow-sm rounded-2xl p-4 border border-gray-200 mb-4">
            <div class="flex justify-between items-center">
                <div class="flex items-center gap-4">
                    <div class="p-3 bg-[#003A8F] rounded-xl">
                        <svg class="w-7 h-7 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4l2 2h4a2 2 0 012 2v1H8a3 3 0 00-3 3v1.5a1.5 1.5 0 01-3 0V6z" clip-rule="evenodd"/>
                            <path d="M6 12a2 2 0 012-2h8a2 2 0 012 2v2a2 2 0 01-2 2H2h2a2 2 0 002-2v-2z"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-gray-800">Daftar Kabinet</h3>
                        <p class="text-sm text-gray-500 mt-1">Total: <span class="font-semibold text-green-600">{{ $cabinets->count() }}</span> kabinet tersedia</p>
                    </div>
                </div>

                <a href="{{ route('cabinet.create') }}" 
                   class="inline-flex items-center gap-2 bg-green-500 hover:bg-green-600 text-white font-semibold px-6 py-3 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 group">
                    <svg class="w-5 h-5 transition-transform duration-300" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd"/>
                    </svg>
                    Tambah Kabinet
                </a>
            </div>
        </div>

        {{-- Daftar Kabinet --}}
        @if ($cabinets->count() > 0)
            <div class="bg-white border border-gray-200 rounded-2xl shadow-sm overflow-hidden">
                
                @php $no = 1; @endphp
                @foreach ($cabinets as $cabinet)
                    <div class="group relative flex items-center justify-between p-6 transition-all duration-300 hover:bg-indigo-50 {{ !$loop->last ? 'border-b border-gray-100' : '' }}">
                        
                        {{-- Link utama --}}
                        <a href="{{ route('cabinet.show', $cabinet->id) }}" class="flex items-center gap-5 flex-1 pl-2">
                            
                            {{-- Number Badge --}}
                            <div class="relative">
                                <div class="w-10 h-10 flex items-center justify-center rounded-lg bg-gradient-to-b from-[#003A8F] to-[#002766] text-white font-bold text-lg shadow-lg">
                                    {{ $no++ }}
                                </div>
                            </div>

                            {{-- Cabinet Info --}}
                            <div class="space-y-2 flex-1">
                                <p class="text-gray-900 font-bold text-lg">
                                    {{ $cabinet->cabinet_name }}
                                </p>

                                <div class="flex items-center gap-3">
                                    <span class="inline-flex items-center gap-2 px-2 py-1.5 rounded-lg text-sm font-medium text-gray-700 bg-gray-100">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z" clip-rule="evenodd"/>
                                        </svg>
                                        {{ $cabinet->cabinet_code ?? 'Tidak ada kode' }}
                                    </span>
                                </div>
                            </div>

                            {{-- Arrow Indicator --}}
                            {{-- <svg class="w-6 h-6 text-gray-400 group-hover:text-indigo-600 group-hover:translate-x-2 transition-all duration-300" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                            </svg> --}}
                        </a>

                        {{-- Tombol Aksi --}}
                        <div class="flex items-center gap-2 ml-6">
                            {{-- Edit Button --}}
                            <a href="{{ route('cabinet.edit', $cabinet->id) }}" 
                               class="group/btn flex items-center justify-center bg-yellow-500 hover:bg-yellow-600 transition-all duration-200 rounded-xl p-3" 
                               title="Edit Kabinet">
                                <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"/>
                                </svg>
                            </a>

                            {{-- Delete Button --}}
                            <form action="{{ route('cabinet.destroy', $cabinet->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus kabinet ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="group/btn flex items-center justify-center bg-red-500 hover:bg-red-600 rounded-xl p-3" 
                                        title="Hapus Kabinet">
                                    <svg class="w-5 h-5 text-white transition-all duration-200" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                    </svg>
                                </button>
                            </form>
                        </div>

                    </div>
                @endforeach
            </div>

            {{-- Pagination (if needed) --}}
            @if(method_exists($cabinets, 'links'))
            <div class="mt-6">
                {{ $cabinets->links() }}
            </div>
            @endif

        @else
            {{-- Empty State --}}
            <div class="bg-white rounded-2xl shadow-lg p-16 text-center border-2 border-dashed border-gray-300">
                <div class="inline-flex items-center justify-center w-24 h-24 bg-gray-100 rounded-full mb-6">
                    <svg class="w-12 h-12 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4l2 2h4a2 2 0 012 2v1H8a3 3 0 00-3 3v1.5a1.5 1.5 0 01-3 0V6z" clip-rule="evenodd"/>
                        <path d="M6 12a2 2 0 012-2h8a2 2 0 012 2v2a2 2 0 01-2 2H2h2a2 2 0 002-2v-2z"/>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-700 mb-3">Belum Ada Kabinet</h3>
                <p class="text-gray-500 mb-8 max-w-md mx-auto">
                    Mulai dengan menambahkan kabinet baru untuk mengatur arsip dokumen Anda.
                </p>
            </div>
        @endif
    </div>
</x-app-layout>