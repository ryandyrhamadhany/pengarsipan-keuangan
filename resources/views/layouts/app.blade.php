<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="font-sans antialiased bg-gray-100">
    <div class="flex min-h-screen">
 
        <div class="h-min-screen w-20">
            <!-- Ruang kosong ini menahan konten utama agar tidak tergeser ke kiri di belakang sidebar -->
        </div>

        <livewire:sidebar />

        {{-- <div class="w-60 bg-white border-r shadow-sm fixed left-0 top-0 h-screen z-50">
        </div> --}}

        {{-- MAIN CONTENT --}}
        <div class="flex-1 flex flex-col">

            {{-- TOP NAV --}}
            @include('layouts.navigation')

            {{-- SLOT CONTENT --}}
            <main class="">
                {{ $slot }}
            </main>
        </div>
    </div>
    {{-- SWEETALERT --}}
    <script>
        const flash = {
            success: @json(session('success')),
            error: @json(session('error')),
            warning: @json(session('warning')),
            info: @json(session('info')),
            validation: @json($errors->all()), 
        };

        if (flash.validation && flash.validation.length > 0) {
            Swal.fire({
                icon: 'error',
                title: 'Terjadi Kesalahan',
                text: flash.validation.join(', '), // Menggabungkan semua error dipisah tanda koma
                confirmButtonText: 'Coba Periksa Lagi'
            });
        }

        if (flash.success) {
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: flash.success,
                timer: 2000,
                showConfirmButton: false
            })
        }
        if (flash.error) {
            Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text: flash.error
            })
        }
        if (flash.warning) {
            Swal.fire({
                icon: 'warning',
                title: 'Peringatan',
                text: flash.warning
            })
        }
        if (flash.info) {
            Swal.fire({
                icon: 'info',
                title: 'Informasi',
                text: flash.info
            })
        }
    </script>
</body>


</html>