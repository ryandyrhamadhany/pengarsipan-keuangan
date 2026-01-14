<x-app-layout>
    <x-slot name="header">
<<<<<<< HEAD
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Semua Arsip Digital') }}
            </h2>
            <div class="flex items-center gap-2 px-3 py-2 bg-blue-50 rounded-lg border border-blue-200">
                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                </svg>
                <span class="text-sm font-semibold text-blue-700">{{ count($result) }} Divisi</span>
            </div>
        </div>
=======
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Semua Arsip Digital') }}
        </h2>
>>>>>>> main
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- Header Banner --}}
            <div class="mb-4 bg-gradient-to-b from-[#003A8F] to-[#002766] rounded-lg shadow-xl overflow-hidden">
                <div class="px-8 py-2 relative">
                    {{-- Decorative circles --}}
                    <div class="absolute top-0 right-0 w-64 h-64 bg-white/10 rounded-full -mr-32 -mt-32"></div>
                    <div class="absolute bottom-0 left-0 w-48 h-48 bg-white/10 rounded-full -ml-24 -mb-24"></div>
                    
                    <div class="relative z-10">
                        <div class="flex items-center gap-4 mb-4">
                            <div class="p-4 bg-white/20 backdrop-blur-sm rounded-2xl shadow-lg">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-semibold text-white mb-2">
                                    Arsip Digital Setiap Divisi
                                </h3>
                                <p class="text-blue-100 text-sm">
                                    Kelola dan akses arsip digital berdasarkan divisi
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Content Section --}}
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-100">
                <div class="p-4">
                    @php $no = 1; @endphp

                    @forelse ($result as $archive)
                        <div class="group mb-5 last:mb-0">
                            {{-- Card Item --}}
                            <a href="{{ route('digital.show', $archive->id) }}" 
                               class="block relative overflow-hidden rounded-2xl bg-gradient-to-br from-white to-gray-50 border-2 border-gray-200 hover:border-blue-400 shadow-sm hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
                                
                                {{-- Gradient Accent Bar --}}
                                <div class="absolute left-0 top-0 bottom-0 w-2 bg-gradient-to-b from-blue-500 to-indigo-600 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                                
                                <div class="flex items-center p-6 relative">
                                    {{-- Number Badge --}}
                                    <div class="flex-shrink-0 relative">
                                        <div class="w-16 h-16 flex items-center justify-center bg-gradient-to-br from-blue-500 via-blue-600 to-indigo-600 text-white font-bold text-xl rounded-2xl shadow-lg group-hover:scale-110 group-hover:rotate-3 transition-all duration-300">
                                            {{ $no++ }}
                                        </div>
                                        {{-- Badge decoration --}}
                                        <div class="absolute -top-1 -right-1 w-5 h-5 bg-yellow-400 rounded-full border-2 border-white opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                                    </div>

                                    {{-- Content --}}
                                    <div class="flex-1 px-6">
                                        {{-- Division Name --}}
                                        <h4 class="text-xl font-bold text-gray-800 mb-2 group-hover:text-blue-600 transition-colors duration-300">
                                            {{ $archive->divisi_name }}
                                        </h4>

                                        {{-- Meta Info --}}
                                        <div class="flex flex-wrap items-center gap-4 text-sm">
                                            <span class="flex items-center gap-2 text-gray-600 group-hover:text-blue-600 transition-colors">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                                </svg>
                                                <span class="font-medium">Lihat Arsip Digital</span>
                                            </span>
                                            
                                            <span class="flex items-center gap-2 text-gray-500">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"></path>
                                                </svg>
                                                <span>Departemen</span>
                                            </span>
                                        </div>
                                    </div>

                                    {{-- Arrow Button --}}
                                    <div class="flex-shrink-0">
                                        <div class="relative w-14 h-14">
                                            {{-- Background circle --}}
                                            <div class="absolute inset-0 bg-gradient-to-br from-gray-100 to-gray-200 rounded-2xl group-hover:from-blue-500 group-hover:to-indigo-600 transition-all duration-300"></div>
                                            
                                            {{-- Arrow icon --}}
                                            <div class="absolute inset-0 flex items-center justify-center">
                                                <svg class="w-6 h-6 text-gray-500 group-hover:text-white group-hover:translate-x-1 transition-all duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Hover effect bottom bar --}}
                                <div class="h-1 bg-gradient-to-r from-blue-500 via-indigo-500 to-purple-500 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></div>
                            </a>
                        </div>
                    @empty
                        {{-- Empty State --}}
                        <div class="flex flex-col items-center justify-center py-20">
                            <div class="relative mb-8">
                                {{-- Decorative circles --}}
                                <div class="absolute inset-0 bg-blue-100 rounded-full animate-ping opacity-20"></div>
                                <div class="relative w-20 h-20 bg-gradient-to-br from-blue-100 to-indigo-100 rounded-full flex items-center justify-center shadow-lg">
                                    <svg class="w-10 h-10 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                                    </svg>
                                </div>
                            </div>
                            
                            <h3 class="text-lg font-medium text-gray-700 mb-3">Belum Ada Data Arsip</h3>
                            <p class="text-gray-500 text-sm mb-4 text-center max-w-md">
                                Arsip digital dari setiap divisi akan ditampilkan di sini setelah ditambahkan
                            </p>
                            
                            <div class="inline-flex items-center gap-2 px-6 py-2 bg-blue-50 text-blue-600 rounded-xl border border-blue-200">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span class="font-medium">Mulai tambahkan arsip pertama Anda</span>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    <style>
        @keyframes ping {
            75%, 100% {
                transform: scale(1.5);
                opacity: 0;
            }
        }
        .animate-ping {
            animation: ping 1.5s cubic-bezier(0, 0, 0.2, 1) infinite;
        }
    </style>
</x-app-layout>