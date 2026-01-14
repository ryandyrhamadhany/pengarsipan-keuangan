<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aplikasi Pengajuan dan Arsip Keuangan</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700" rel="stylesheet" />

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-white border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <h1 class="text-xl font-bold text-gray-900">FinanceApp</h1>
                </div>
                @if (Route::has('login'))
                    <div class="flex items-center space-x-4">
                        @auth
                            <a href="{{ url('/dashboard') }}"
                                class="text-gray-700 hover:text-gray-900 px-4 py-2 text-sm font-medium">
                                Dashboard
                            </a>
                        @else
                            <a href="{{ route('login') }}"
                                class="text-gray-700 hover:text-gray-900 px-4 py-2 text-sm font-medium">
                                Masuk
                            </a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}"
                                    class="bg-blue-900 text-white hover:bg-blue-800 px-6 py-2 text-sm font-medium transition-colors">
                                    Daftar
                                </a>
                            @endif
                        @endauth
                    </div>
                @endif
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="bg-white py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-4xl font-bold text-gray-900 sm:text-5xl md:text-6xl">
                    Aplikasi Pengajuan dan<br>Arsip Keuangan
                </h2>
                <p class="mt-6 max-w-2xl mx-auto text-xl text-gray-600">
                    Kelola pengajuan keuangan dan arsip dokumen secara digital dengan sistem yang aman, efisien, dan
                    terstruktur untuk meningkatkan produktivitas organisasi Anda.
                </p>

                <!-- CTA Buttons -->
                @if (Route::has('login'))
                    <div class="mt-10 flex justify-center gap-4">
                        @guest
                            <a href="{{ route('register') }}"
                                class="bg-blue-900 text-white px-8 py-3 text-base font-medium hover:bg-blue-800 transition-colors">
                                Daftar Sekarang
                            </a>
                            <a href="{{ route('login') }}"
                                class="bg-white text-blue-900 px-8 py-3 text-base font-medium border border-blue-900 hover:bg-gray-50 transition-colors">
                                Masuk
                            </a>
                        @else
                            <a href="{{ url('/dashboard') }}"
                                class="bg-blue-900 text-white px-8 py-3 text-base font-medium hover:bg-blue-800 transition-colors">
                                Buka Dashboard
                            </a>
                        @endguest
                    </div>
                @endif
            </div>
        </div>
    </section>

    <!-- Features Grid -->
    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h3 class="text-3xl font-bold text-gray-900">Fitur Unggulan</h3>
                <p class="mt-4 text-lg text-gray-600">Solusi lengkap untuk manajemen keuangan digital</p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div class="bg-white p-8 border border-gray-200">
                    <div class="w-12 h-12 bg-blue-900 flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                    <h4 class="text-xl font-semibold text-gray-900 mb-3">Pengajuan Digital</h4>
                    <p class="text-gray-600">Ajukan permohonan keuangan secara online dengan proses yang cepat dan mudah
                        tanpa perlu dokumen fisik.</p>
                </div>

                <!-- Feature 2 -->
                <div class="bg-white p-8 border border-gray-200">
                    <div class="w-12 h-12 bg-blue-900 flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                        </svg>
                    </div>
                    <h4 class="text-xl font-semibold text-gray-900 mb-3">Arsip Terorganisir</h4>
                    <p class="text-gray-600">Simpan dan kelola semua dokumen keuangan dalam satu sistem yang terstruktur
                        dan mudah diakses kapan saja.</p>
                </div>

                <!-- Feature 3 -->
                <div class="bg-white p-8 border border-gray-200">
                    <div class="w-12 h-12 bg-blue-900 flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                        </svg>
                    </div>
                    <h4 class="text-xl font-semibold text-gray-900 mb-3">Tracking Status</h4>
                    <p class="text-gray-600">Pantau status pengajuan secara real-time dengan notifikasi otomatis untuk
                        setiap perubahan status.</p>
                </div>

                <!-- Feature 4 -->
                <div class="bg-white p-8 border border-gray-200">
                    <div class="w-12 h-12 bg-blue-900 flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                        </svg>
                    </div>
                    <h4 class="text-xl font-semibold text-gray-900 mb-3">Keamanan Data</h4>
                    <p class="text-gray-600">Sistem keamanan berlapis untuk melindungi data keuangan dengan enkripsi dan
                        backup otomatis.</p>
                </div>

                <!-- Feature 5 -->
                <div class="bg-white p-8 border border-gray-200">
                    <div class="w-12 h-12 bg-blue-900 flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                        </svg>
                    </div>
                    <h4 class="text-xl font-semibold text-gray-900 mb-3">Laporan Lengkap</h4>
                    <p class="text-gray-600">Generate laporan keuangan dengan berbagai format untuk memudahkan analisis
                        dan audit.</p>
                </div>

                <!-- Feature 6 -->
                <div class="bg-white p-8 border border-gray-200">
                    <div class="w-12 h-12 bg-blue-900 flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                    <h4 class="text-xl font-semibold text-gray-900 mb-3">Multi User Role</h4>
                    <p class="text-gray-600">Kelola akses pengguna dengan berbagai level untuk menjaga integritas dan
                        alur persetujuan.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Benefits Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div>
                    <h3 class="text-3xl font-bold text-gray-900 mb-6">Keuntungan Menggunakan Sistem Kami</h3>
                    <div class="space-y-6">
                        <div class="flex gap-4">
                            <div class="flex-shrink-0">
                                <div
                                    class="w-8 h-8 bg-blue-900 text-white flex items-center justify-center text-sm font-semibold">
                                    1</div>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900 mb-2">Efisiensi Waktu</h4>
                                <p class="text-gray-600">Proses pengajuan yang lebih cepat hingga 70% dibanding metode
                                    manual.</p>
                            </div>
                        </div>
                        <div class="flex gap-4">
                            <div class="flex-shrink-0">
                                <div
                                    class="w-8 h-8 bg-blue-900 text-white flex items-center justify-center text-sm font-semibold">
                                    2</div>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900 mb-2">Paperless</h4>
                                <p class="text-gray-600">Hemat biaya operasional dan ramah lingkungan dengan sistem
                                    digital.</p>
                            </div>
                        </div>
                        <div class="flex gap-4">
                            <div class="flex-shrink-0">
                                <div
                                    class="w-8 h-8 bg-blue-900 text-white flex items-center justify-center text-sm font-semibold">
                                    3</div>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900 mb-2">Transparansi</h4>
                                <p class="text-gray-600">Tingkatkan akuntabilitas dengan audit trail yang jelas dan
                                    terperinci.</p>
                            </div>
                        </div>
                        <div class="flex gap-4">
                            <div class="flex-shrink-0">
                                <div
                                    class="w-8 h-8 bg-blue-900 text-white flex items-center justify-center text-sm font-semibold">
                                    4</div>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900 mb-2">Akses Mudah</h4>
                                <p class="text-gray-600">Akses dokumen dari mana saja dan kapan saja melalui perangkat
                                    apapun.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-100 p-12 flex items-center justify-center">
                    <div class="text-center">
                        <svg class="w-48 h-48 mx-auto text-blue-900" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                        <p class="mt-4 text-lg font-semibold text-gray-700">Sistem Terpercaya</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-3 gap-8">
                <div>
                    <h4 class="text-lg font-semibold mb-4">Aplikasi Pengajuan dan Arsip Keuangan</h4>
                    <p class="text-gray-400 text-sm">
                        Solusi digital untuk mengelola pengajuan dan arsip dokumen keuangan dengan efisien dan aman.
                    </p>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-4">Quick Links</h4>
                    <ul class="space-y-2 text-sm">
                        @if (Route::has('login'))
                            @guest
                                <li><a href="{{ route('login') }}" class="text-gray-400 hover:text-white">Masuk</a></li>
                                <li><a href="{{ route('register') }}" class="text-gray-400 hover:text-white">Daftar</a>
                                </li>
                            @else
                                <li><a href="{{ url('/dashboard') }}" class="text-gray-400 hover:text-white">Dashboard</a>
                                </li>
                            @endguest
                        @endif
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-4">Developer</h4>
                    <div class="text-sm text-gray-400 space-y-4">
                        <!-- Developer 1 -->
                        <div>
                            <p class="text-white font-medium">Ryandy Rhamadhany</p>
                            <p class="text-gray-400">Backend Developer</p>
                            <p>
                                Instagram:
                                <a href="https://instagram.com/username1" target="_blank"
                                    class="text-white hover:text-gray-300">
                                    @username1
                                </a>
                            </p>
                        </div>

                        <!-- Developer 2 -->
                        <div>
                            <p class="text-white font-medium">Muhammad Maulidi</p>
                            <p class="text-gray-400">Frontend Developer</p>
                            <p>
                                Instagram:
                                <a href="https://instagram.com/username2" target="_blank"
                                    class="text-white hover:text-gray-300">
                                    @username2
                                </a>
                            </p>
                        </div>

                        <!-- Developer 3 -->
                        <div>
                            <p class="text-white font-medium">Muhammad Rio Bisma Saputra</p>
                            <p class="text-gray-400">Frontend Developer</p>
                            <p>
                                Instagram:
                                <a href="https://instagram.com/username3" target="_blank"
                                    class="text-white hover:text-gray-300">
                                    @username3
                                </a>
                            </p>
                        </div>
                    </div>
                </div>

            </div>
            <div class="border-t border-gray-800 mt-8 pt-8 text-center text-sm text-gray-400">
                <p>&copy; {{ date('Y') }} Aplikasi Pengajuan dan Arsip Keuangan. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>

</html>
