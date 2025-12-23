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

        {{-- SIDEBAR --}}
        <aside class="w-60 bg-white border-r shadow-sm fixed left-0 top-0 h-screen z-50">
            @include('layouts.sidebar')
        </aside>

        {{-- MAIN CONTENT --}}
        <div class="ml-60 flex-1 flex flex-col">

            {{-- TOP NAV --}}
            @include('layouts.navigation')

            {{-- PAGE HEADER --}}
            @isset($header)
                <header class="bg-white shadow">
                    <div class="px-10 py-2">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            {{-- SLOT CONTENT --}}
            <main class="flex-1 p-6">
                {{ $slot }}
            </main>
        </div>
    </div>
</div>

    {{-- SWEETALERT --}}
    <script>
        @if (session('success'))
            Swal.fire({ icon: 'success', title: 'Berhasil', text: "{{ session('success') }}", timer: 2000, showConfirmButton: false })
        @endif
        @if (session('error'))
            Swal.fire({ icon: 'error', title: 'Gagal', text: "{{ session('error') }}" })
        @endif
        @if (session('warning'))
            Swal.fire({ icon: 'warning', title: 'Peringatan', text: "{{ session('warning') }}" })
        @endif
        @if (session('info'))
            Swal.fire({ icon: 'info', title: 'Informasi', text: "{{ session('info') }}" })
        @endif
    </script>
</body>


</html>
