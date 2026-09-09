<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            Daftar Pengajuan
        </h2>
    </x-slot>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-2 lg:px-4">
            {{-- ================= SEARCH & FILTER ================= --}}
            <div class="bg-white rounded-md shadow-md border border-gray-200 p-6 mb-4">
                <form method="GET" action="{{route('verification.search')}}" class="space-y-5">
                    
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
                                class="inline-flex items-center justify-center gap-2 px-6 py-2.5 bg-[#003A8F] hover:bg-[#003A9F] text-white font-medium rounded-md shadow-sm transition-colors">
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

            {{-- ================= DAFTAR PENGAJUAN ================= --}}
            <div class="bg-white rounded-md shadow-md border border-gray-200 p-6 mb-4">
                <div class="flex items-center justify-between mb-6 pb-4 border-b border-gray-200">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-800">Pengajuan yang sedang anda proses</h3>
                        <p class="text-sm text-gray-500 mt-0.5">Total: {{ $my_proses->count() }} pengajuan</p>
                    </div>
                </div>

                <div class="space-y-3">
                    @php $no = 1; @endphp

                    @forelse ($my_proses as $proses)
                        <div
                            class="flex items-center p-4 bg-white border border-gray-200 rounded-md shadow-md hover:bg-gray-100 transition-all duration-200">

                            {{-- NOMOR --}}
                            <div class="p-2 flex items-center justify-center bg-yellow-300 font-semibold text-sm rounded-md">
                                <svg class="text-white fill-current" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="30" height="30" viewBox="0 0 24 24">
                                    <path d="M 16.064453 2 C 15.935453 2 15.8275 2.0966094 15.8125 2.2246094 L 15.695312 3.2363281 C 15.211311 3.4043017 14.773896 3.6598036 14.394531 3.9882812 L 13.457031 3.5839844 C 13.339031 3.5329844 13.202672 3.5774531 13.138672 3.6894531 L 12.201172 5.3105469 C 12.136172 5.4215469 12.166531 5.563625 12.269531 5.640625 L 13.078125 6.2402344 C 13.030702 6.4865104 13 6.7398913 13 7 C 13 7.2601087 13.030702 7.5134896 13.078125 7.7597656 L 12.269531 8.359375 C 12.166531 8.435375 12.137172 8.5774531 12.201172 8.6894531 L 13.138672 10.310547 C 13.202672 10.422547 13.339031 10.468969 13.457031 10.417969 L 14.394531 10.011719 C 14.773896 10.340196 15.211311 10.595698 15.695312 10.763672 L 15.8125 11.775391 C 15.8275 11.903391 15.935453 12 16.064453 12 L 17.935547 12 C 18.064547 12 18.1725 11.903391 18.1875 11.775391 L 18.304688 10.763672 C 18.789173 10.59553 19.227802 10.340666 19.607422 10.011719 L 20.542969 10.414062 C 20.660969 10.465063 20.797328 10.420594 20.861328 10.308594 L 21.798828 8.6875 C 21.863828 8.5765 21.833469 8.4344219 21.730469 8.3574219 L 20.923828 7.7578125 C 20.970992 7.5121818 21 7.2593796 21 7 C 21 6.7398913 20.969298 6.4865104 20.921875 6.2402344 L 21.730469 5.640625 C 21.833469 5.564625 21.862828 5.4225469 21.798828 5.3105469 L 20.861328 3.6894531 C 20.797328 3.5774531 20.660969 3.5310312 20.542969 3.5820312 L 19.605469 3.9882812 C 19.226104 3.6598036 18.788689 3.4043017 18.304688 3.2363281 L 18.1875 2.2246094 C 18.1725 2.0966094 18.064547 2 17.935547 2 L 16.064453 2 z M 17 5.25 C 17.966 5.25 18.75 6.034 18.75 7 C 18.75 7.967 17.966 8.75 17 8.75 C 16.034 8.75 15.25 7.967 15.25 7 C 15.25 6.034 16.034 5.25 17 5.25 z M 7.0644531 9 C 6.9354531 9 6.8275 9.0966094 6.8125 9.2246094 L 6.6386719 10.710938 C 5.8314079 10.940599 5.1026855 11.35237 4.5175781 11.921875 L 3.1582031 11.335938 C 3.0402031 11.284937 2.9038438 11.329406 2.8398438 11.441406 L 1.9023438 13.0625 C 1.8373437 13.1735 1.8677031 13.315578 1.9707031 13.392578 L 3.1679688 14.279297 C 3.0687954 14.672064 3 15.076469 3 15.5 C 3 15.923531 3.0687954 16.327936 3.1679688 16.720703 L 1.9707031 17.609375 C 1.8677031 17.685375 1.8383437 17.827453 1.9023438 17.939453 L 2.8398438 19.560547 C 2.9038438 19.672547 3.0402031 19.717016 3.1582031 19.666016 L 4.5175781 19.078125 C 5.1026855 19.64763 5.8314079 20.059401 6.6386719 20.289062 L 6.8125 21.775391 C 6.8275 21.903391 6.9354531 22 7.0644531 22 L 8.9355469 22 C 9.0645469 22 9.1725 21.903391 9.1875 21.775391 L 9.3613281 20.289062 C 10.168592 20.059401 10.897314 19.64763 11.482422 19.078125 L 12.841797 19.664062 C 12.959797 19.715062 13.096156 19.670594 13.160156 19.558594 L 14.097656 17.9375 C 14.162656 17.8265 14.132297 17.684422 14.029297 17.607422 L 12.832031 16.720703 C 12.931205 16.327936 13 15.923531 13 15.5 C 13 15.076469 12.931205 14.672064 12.832031 14.279297 L 14.029297 13.390625 C 14.132297 13.314625 14.161656 13.172547 14.097656 13.060547 L 13.160156 11.439453 C 13.096156 11.327453 12.959797 11.282984 12.841797 11.333984 L 11.482422 11.921875 C 10.897314 11.35237 10.168592 10.940599 9.3613281 10.710938 L 9.1875 9.2246094 C 9.1725 9.0966094 9.0645469 9 8.9355469 9 L 7.0644531 9 z M 8 13.5 C 9.105 13.5 10 14.395 10 15.5 C 10 16.605 9.105 17.5 8 17.5 C 6.895 17.5 6 16.605 6 15.5 C 6 14.395 6.895 13.5 8 13.5 z"></path>
                                </svg>
                            </div>

                            {{-- KONTEN LIST --}}
                            <a href="{{ route('verify.item.keuangan', $proses->id) }}" class="flex-1 px-6">
                                {{-- Nama Pengajuan --}}
                                <div class="font-semibold text-gray-800 mb-2 text-lg pb-2 border-b border-gray-200 truncate">
                                    {{ $proses->budget_submission_name }}
                                </div>

                                <div class="flex justify-between">
                                    {{-- STATUS --}}
                                    <div class="flex flex-wrap items-center gap-2">
                                        {{-- Status Sedang Proses --}}
                                        @if ($proses->requirements_status == 'Belum Lengkap' && $proses->verification_status == 0)
                                            <span
                                                class="inline-flex items-center px-2 py-1 text-xs font-medium rounded-md bg-yellow-100 text-yellow-700">
                                                Proses
                                            </span>
                                        @endif
    
                                        {{-- Status Kelengkapan --}}
                                        @if ($proses->requirements_status == 'Belum Lengkap')
                                            <span
                                                class="inline-flex items-center px-2 py-1 text-xs font-medium rounded-md bg-yellow-100 text-yellow-700">
                                                Belum Lengkap
                                            </span>
                                        @endif
    
                                        {{-- Status Verifikasi --}}
                                        @if ($proses->verification_status == 0)
                                            <span
                                                class="inline-flex items-center px-2 py-1 text-xs font-medium rounded-md bg-red-100 text-red-700">
                                                Belum Diverifikasi
                                            </span>
                                        @endif

                                        @if ($proses->requirements_status == 'Belum Lengkap' && $proses->is_return == 0)
                                            <span
                                                class="inline-flex items-center px-2 py-1 text-xs font-medium rounded-md bg-orange-100 text-orange-700">
                                                Diperbaiki
                                            </span>
                                        @endif
                                    </div>
                                    <div class="flex gap-2">
                                        {{-- Pengaju --}}
                                        {{-- <div class="text-xs text-gray-500 mb-2">
                                            Diajukan oleh: <span class="font-medium text-gray-700">{{ $proses->user->name }}</span>
                                        </div> --}}
                                        <div class="text-xs text-gray-500 mb-2">
                                            divisi: <span class="font-medium text-gray-700">{{ $proses->user->role }}</span> |
                                        </div>
                                        <div class="text-xs text-gray-500">
                                            {{ $proses->created_at->diffForHumans() }}
                                        </div>
                                    </div>
                                </div>
                            </a>

                            {{-- Arrow Icon --}}
                            <div class="flex-shrink-0">
                                <svg class="w-5  h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-12 bg-gray-50 rounded-md">
                            <div class="w-16 h-16 bg-gray-200 rounded-full flex items-center justify-center mx-auto mb-3">
                                <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2">
                                    </path>
                                </svg>
                            </div>
                            <p class="text-gray-500 font-medium">Tidak Ada Pengajuan</p>
                            <p class="text-gray-400 text-sm mt-1">
                                {{ request('search') || request('status') ? 'Tidak ada pengajuan yang sesuai dengan filter' : 'Belum ada pengajuan yang perlu diperiksa' }}
                            </p>
                        </div>
                    @endforelse
                    <div>
                        {{$my_proses->links()}}
                    </div>
                </div>
            </div>

            {{-- ================= DAFTAR PENGAJUAN ================= --}}
            <div class="bg-white rounded-md shadow-md border border-gray-200 p-6 mb-4">
                <div class="flex items-center justify-between mb-6 pb-4 border-b border-gray-200">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-800">Pengajuan Belum diperiksa</h3>
                        <p class="text-sm text-gray-500 mt-0.5">Total: {{ $not_check_submit->count() }} pengajuan</p>
                    </div>
                </div>

                <div class="space-y-3">
                    @php $no = 1; @endphp

                    @forelse ($not_check_submit as $submit)
                        <div
                            class="flex items-center p-4 bg-white border border-gray-200 rounded-md shadow-md hover:bg-gray-100 transition-all duration-200">

                            {{-- NOMOR --}}
                            <div class="p-2 flex items-center justify-center bg-gray-300 font-semibold text-sm rounded-md">
                                <svg class="text-white fill-current" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="30" height="30" viewBox="0 0 50 50">
                                <path d="M 30.398438 2 L 7 2 L 7 48 L 43 48 L 43 14.601563 Z M 30 15 L 30 4.398438 L 40.601563 15 Z"></path>
                                </svg>
                            </div>

                            {{-- KONTEN LIST --}}
                            <a href="{{ route('verify.item.keuangan', $submit->id) }}" class="flex-1 px-6">
                                {{-- Nama Pengajuan --}}
                                <div class="font-semibold text-gray-800 mb-2 text-lg pb-2 border-b border-gray-200 truncate">
                                    {{ $submit->budget_submission_name }}
                                </div>

                                {{-- STATUS --}}
                                <div class="flex justify-between">
                                    <div class="flex flex-wrap items-center gap-2">
                                        {{-- Status Sedang Proses --}}
                                        @if ($submit->requirements_status == 'Belum Lengkap' && $submit->verification_status == 0)
                                            <span
                                                class="inline-flex items-center px-2.5 py-1 text-xs font-medium rounded-md bg-yellow-100 text-yellow-700">
                                                Proses
                                            </span>
                                        @endif
    
                                        {{-- Status Kelengkapan --}}
                                        @if ($submit->requirements_status == 'Belum Lengkap')
                                            <span
                                                class="inline-flex items-center px-2 py-1 text-xs font-medium rounded-md bg-yellow-100 text-yellow-700">
                                                Belum Lengkap
                                            </span>
                                        @elseif($submit->requirements_status == 'Lengkap')
                                            <span
                                                class="inline-flex items-center px-2 py-1 text-xs font-medium rounded-md bg-green-100 text-green-700">
                                                Lengkap
                                            </span>
                                        @else
                                            <span
                                                class="inline-flex items-center px-2 py-1 text-xs font-medium rounded-md bg-red-100 text-red-700">
                                                Belum Diperiksa
                                            </span>
                                        @endif
    
                                        {{-- Status Verifikasi --}}
                                        @if ($submit->verification_status == 1)
                                            <span
                                                class="inline-flex items-center px-2 py-1 text-xs font-medium rounded-md bg-green-100 text-green-700">
                                                Diverifikasi
                                            </span>
                                        @else
                                            <span
                                                class="inline-flex items-center px-2 py-1 text-xs font-medium rounded-md bg-red-100 text-red-700">
                                                Belum Diverifikasi
                                            </span>
                                        @endif
    
                                        {{-- Status Arsip --}}
                                        @if ($submit->is_archive == 1)
                                            <span
                                                class="inline-flex items-center px-2 py-1 text-xs font-medium rounded-md bg-blue-100 text-blue-700">
                                                Diarsipkan
                                            </span>
                                        @endif
                                    </div>
                                    <div class="flex gap-2">
                                        {{-- Pengaju --}}
                                        {{-- <div class="text-xs text-gray-500 mb-2">
                                            Diajukan oleh: <span class="font-medium text-gray-700">{{ $submit->user->name }}</span> |
                                        </div> --}}
                                        <div class="text-xs text-gray-500 mb-2">
                                            divisi: <span class="font-medium text-gray-700">{{ $submit->user->role }}</span> |
                                        </div>
                                        <div class="text-xs text-gray-500">
                                            {{ $submit->created_at->diffForHumans() }}
                                        </div>
                                    </div>
                                </div>
                            </a>
                            {{-- Arrow Icon --}}
                            <div class="flex-shrink-0">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                                    </path>
                                </svg>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-12 bg-gray-50 rounded-md">
                            <div class="w-16 h-16 bg-gray-200 rounded-full flex items-center justify-center mx-auto mb-3">
                                <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2">
                                    </path>
                                </svg>
                            </div>
                            <p class="text-gray-500 font-medium">Tidak Ada Pengajuan</p>
                            <p class="text-gray-400 text-sm mt-1">
                                {{ request('search') || request('status') ? 'Tidak ada pengajuan yang sesuai dengan filter' : 'Belum ada pengajuan yang perlu diperiksa' }}
                            </p>
                        </div>
                    @endforelse

                    <div>
                        {{$not_check_submit->links()}}
                    </div>
                </div>
            </div>

            {{-- ================= DAFTAR PENGAJUAN ================= --}}
            <div class="bg-white rounded-md shadow-md border border-gray-200 p-6 mb-4">
                <div class="flex items-center justify-between mb-6 pb-4 border-b border-gray-200">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-800">Semua Pengajuan</h3>
                        <p class="text-sm text-gray-500 mt-0.5">Total: {{ $all_submit->count() }} pengajuan</p>
                    </div>
                </div>

                <div class="space-y-3">
                    @php $no = 1; @endphp

                    @forelse ($all_submit as $all)
                        <div
                            class="flex items-center p-4 bg-white border border-gray-200 rounded-md shadow-md hover:bg-gray-100 transition-all duration-200">

                            {{-- NOMOR --}}
                            <div class="p-2 flex items-center justify-center bg-gray-300 font-semibold text-sm rounded-md">
                                <svg class="text-white fill-current" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="30" height="30" viewBox="0 0 24 24">
                                    <path d="M14,2H6C4.9,2,4,2.9,4,4v16c0,1.1,0.9,2,2,2h12c1.1,0,2-0.9,2-2V8L14,2z M16,18H8v-2h8V18z M16,14H8v-2h8V14z M13,9V3.5 L18.5,9H13z"></path>
                                </svg>
                            </div>

                            {{-- KONTEN LIST --}}
                            <a href="{{ route('verify.item.keuangan', $all->id) }}" class="flex-1 px-6">
                                {{-- Nama Pengajuan --}}
                                <div class="font-semibold text-gray-800 mb-2 text-lg pb-2 border-b border-gray-200 truncate">
                                    {{ $all->budget_submission_name }}
                                </div>

                                <div class="flex justify-between">
                                    {{-- STATUS --}}
                                    <div class="flex flex-wrap items-center gap-2">
                                        {{-- Status Sedang Proses --}}
                                        @if ($all->requirements_status == 'Belum Lengkap' && $all->verification_status == 0)
                                            <span
                                                class="inline-flex items-center px-2 py-1 text-xs font-medium rounded-md bg-yellow-100 text-yellow-700">
                                                Proses
                                            </span>
                                        @elseif ($all->requirements_status == 'Lengkap' && $all->verification_status == 1 && $all->is_archive == 1)
                                            <span
                                                class="inline-flex items-center px-2 py-1 text-xs font-medium rounded-md bg-green-100 text-green-700">
                                                Selesai
                                            </span>
                                        @endif
    
                                        {{-- Status Kelengkapan --}}
                                        @if ($all->requirements_status == 'Belum Lengkap')
                                            <span
                                                class="inline-flex items-center px-2 py-1 text-xs font-medium rounded-md bg-yellow-100 text-yellow-700">
                                                Belum Lengkap
                                            </span>
                                        @elseif($all->requirements_status == 'Lengkap')
                                            <span
                                                class="inline-flex items-center px-2 py-1 text-xs font-medium rounded-md bg-green-100 text-green-700">
                                                Lengkap
                                            </span>
                                        @else
                                            <span
                                                class="inline-flex items-center px-2 py-1 text-xs font-medium rounded-md bg-red-100 text-red-700">
                                                Belum Diperiksa
                                            </span>
                                        @endif
    
                                        {{-- Status Verifikasi --}}
                                        @if ($all->verification_status == 1)
                                            <span
                                                class="inline-flex items-center px-2 py-1 text-xs font-medium rounded-md bg-green-100 text-green-700">
                                                Diverifikasi
                                            </span>
                                        @else
                                            <span
                                                class="inline-flex items-center px-2 py-1 text-xs font-medium rounded-md bg-red-100 text-red-700">
                                                Belum Diverifikasi
                                            </span>
                                        @endif
    
                                        {{-- Status Arsip --}}
                                        @if ($all->is_archive == 1)
                                            <span
                                                class="inline-flex items-center px-2 py-1 text-xs font-medium rounded-md bg-blue-100 text-blue-700">
                                                Diarsipkan
                                            </span>
                                        @endif
                                    </div>
                                    <div class="flex gap-2">
                                        {{-- Pengaju --}}
                                        {{-- <div class="text-xs text-gray-500 mb-2">
                                            Diajukan oleh: <span class="font-medium text-gray-700">{{ $all->user->name }}</span>
                                        </div> --}}
                                        <div class="text-xs text-gray-500 mb-2">
                                            divisi: <span class="font-medium text-gray-700">{{ $all->user->role }}</span>  |
                                        </div>
                                        <div class="text-xs text-gray-500">
                                            {{ $all->created_at->diffForHumans() }}
                                        </div>
                                    </div>
                                </div>
                            </a>

                            {{-- Arrow Icon --}}
                            <div class="flex-shrink-0">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                                    </path>
                                </svg>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-12 bg-gray-50 rounded-md">
                            <div class="w-16 h-16 bg-gray-200 rounded-full flex items-center justify-center mx-auto mb-3">
                                <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2">
                                    </path>
                                </svg>
                            </div>
                            <p class="text-gray-500 font-medium">Tidak Ada Pengajuan</p>
                            <p class="text-gray-400 text-sm mt-1">
                                {{ request('search') || request('status') ? 'Tidak ada pengajuan yang sesuai dengan filter' : 'Belum ada pengajuan yang perlu diperiksa' }}
                            </p>
                        </div>
                    @endforelse
                    <div>
                        {{$all_submit->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
