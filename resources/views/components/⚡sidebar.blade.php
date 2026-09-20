<?php

use Livewire\Component;

new class extends Component {
    public bool $isOpen = false;

    public function toggleSidebar()
    {
        $this->isOpen = !$this->isOpen;
    }
};
?>

<div
    class="{{ $isOpen ? 'w-72' : 'w-20' }} fixed z-10 flex h-screen flex-col justify-between rounded-r-lg bg-gradient-to-b from-[#003A8F] to-[#002766] transition-all duration-300 ease-in-out">

    {{-- Logo Sidebar --}}
    <div>
        {{-- untuk memisahkan between dengan logo account --}}
        <div
            class="{{ $isOpen ? 'bg-gradient-to-r from-[#0141a2] to-[#003283] rounded-r-lg' : '' }} flex items-center justify-between p-4">
            @if ($isOpen)
                <img src="{{ asset('images/Logo.png') }}" class="h-12" alt="Logo">
                @guest
                    @php
                        return redirect()->route('login');
                    @endphp
                @endguest
                @php
                    $role = Auth::user()->role;
                @endphp
                <div class="flex flex-col">
                    <span
                        class="text-xm hidden bg-gradient-to-b from-[#ffffff] to-[#6895fd] bg-clip-text font-bold tracking-wide text-transparent sm:block">VVeP
                        App</span>
                    <span class="text-xs font-medium text-gray-400">{{ $role }}</span>
                </div>
            @endif
            <button wire:click="toggleSidebar"
                class="rounded p-2 text-white transition-colors duration-300 hover:bg-[#0141a2]">
                <img src="https://img.icons8.com/?size=40&id=98971&format=png&color=ffffff" alt="open"
                    class="{{ $isOpen ? 'rotate-180' : '' }} transition-transform duration-300">
            </button>
        </div>

        {{-- list of sidebar items --}}
        @guest
            @php
                return redirect()->route('login');
            @endphp
        @endguest
        @php
            $role = Auth::user()->role;

            if ($role == 'Admin') {
                // ===================================================== ADMIN
                // ganti ukuran logo 25
                $name = [
                    'dashboard' => 'Dashboard',
                    'environment' => 'Environment',
                    'arsip' => 'Arsip',
                    'user' => 'User',
                    'report' => 'Report',
                ];

                $icon = [
                    'dashboard' => 'https://img.icons8.com/?size=25&id=83326&format=png&color=ffffff',
                    'environment' => 'https://img.icons8.com/?size=25&id=78617&format=png&color=ffffff',
                    'arsip' => 'https://img.icons8.com/?size=25&id=CtZUCg7B7fpp&format=png&color=ffffff',
                    'user' => 'https://img.icons8.com/?size=25&id=eweE7sMO0ZcJ&format=png&color=ffffff',
                    'report' => 'https://img.icons8.com/?size=25&id=9iXtu2VfY_2G&format=png&color=ffffff',
                ];

                $route = [
                    'dashboard' => route('admin.dashboard'),
                    'environment' => route('admin.envi'),
                    'arsip' => route('arsip'),
                    'user' => route('account.index'),
                    'report' => route('report.administrator'),
                ];
            } elseif ($role == 'Keuangan') {
                // ===================================================== KEUANGAN
                $name = [
                    'home' => 'Home',
                    'pengajuan' => 'Pengajuan',
                    'arsip' => 'Arsip',
                    'notification' => 'Notification',
                    'report' => 'Report',
                ];

                $icon = [
                    'home' => 'https://img.icons8.com/?size=25&id=83326&format=png&color=ffffff',
                    'pengajuan' => 'https://img.icons8.com/?size=25&id=78617&format=png&color=ffffff',
                    'arsip' => 'https://img.icons8.com/?size=25&id=CtZUCg7B7fpp&format=png&color=ffffff',
                    'notification' => 'https://img.icons8.com/?size=25&id=83193&format=png&color=ffffff',
                    'report' => 'https://img.icons8.com/?size=25&id=9iXtu2VfY_2G&format=png&color=ffffff',
                ];

                $route = [
                    'home' => route('keuangan.dashboard'),
                    'pengajuan' => route('verify.list.keuangan'),
                    'arsip' => route('arsip'),
                    'notification' => route('notifications.index'),
                    'report' => route('report.keuangan'),
                ];
            } elseif ($role == 'PPSPM') {
                // ===================================================== PPSPM
                $name = [
                    'home' => 'Home',
                    'pengajuan' => 'Pengajuan',
                    'arsip' => 'Arsip',
                    'notification' => 'Notification',
                    'report' => 'Report',
                ];

                $icon = [
                    'home' => 'https://img.icons8.com/?size=25&id=83326&format=png&color=ffffff',
                    'pengajuan' => 'https://img.icons8.com/?size=25&id=78617&format=png&color=ffffff',
                    'arsip' => 'https://img.icons8.com/?size=25&id=CtZUCg7B7fpp&format=png&color=ffffff',
                    'notification' => 'https://img.icons8.com/?size=25&id=83193&format=png&color=ffffff',
                    'report' => 'https://img.icons8.com/?size=25&id=9iXtu2VfY_2G&format=png&color=ffffff',
                ];

                $route = [
                    'home' => route('keuangan.dashboard'),
                    'pengajuan' => route('verify.list.ppspm'),
                    'arsip' => route('arsip'),
                    'notification' => route('notifications.index'),
                    'report' => route('#'),
                ];
            } elseif ($role == 'Kepala') {
                // ===================================================== PPSPM
                $name = [
                    'home' => 'Home',
                    'arsip' => 'Arsip',
                    'report' => 'Report',
                ];

                $icon = [
                    'home' => 'https://img.icons8.com/?size=25&id=83326&format=png&color=ffffff',
                    'arsip' => 'https://img.icons8.com/?size=25&id=CtZUCg7B7fpp&format=png&color=ffffff',
                    'report' => 'https://img.icons8.com/?size=25&id=9iXtu2VfY_2G&format=png&color=ffffff',
                ];

                $route = [
                    'home' => route('kepala.dashboard'),
                    'arsip' => route('arsip'),
                    'report' => route('kepala.report'),
                ];
            } elseif ($role == 'Bendahara') {
                // ===================================================== BENDARAHA
                $name = [
                    'home' => 'Home',
                    'pengajuan' => 'Pengajuan',
                    'arsip' => 'Arsip',
                    'notification' => 'Notification',
                    'report' => 'Report',
                ];

                $icon = [
                    'home' => 'https://img.icons8.com/?size=25&id=83326&format=png&color=ffffff',
                    'pengajuan' => 'https://img.icons8.com/?size=25&id=78617&format=png&color=ffffff',
                    'arsip' => 'https://img.icons8.com/?size=25&id=CtZUCg7B7fpp&format=png&color=ffffff',
                    'notification' => 'https://img.icons8.com/?size=25&id=83193&format=png&color=ffffff',
                    'report' => 'https://img.icons8.com/?size=25&id=9iXtu2VfY_2G&format=png&color=ffffff',
                ];

                $route = [
                    'home' => route('bendahara.dashboard'),
                    'pengajuan' => route('verify.list.bendahara'),
                    'arsip' => route('arsip'),
                    'notification' => route('notifications.index'),
                    'report' => route('report.bendahara'),
                ];
            } else {
                // ===================================================== USER
                $name = [
                    'home' => 'Home',
                    'pengajuan' => 'Pengajuan',
                    'monitor' => 'Monitoring',
                    'notification' => 'Notification',
                    'report' => 'Report',
                ];

                $icon = [
                    'home' => 'https://img.icons8.com/?size=25&id=83326&format=png&color=ffffff',
                    'pengajuan' => 'https://img.icons8.com/?size=25&id=78617&format=png&color=ffffff',
                    'monitor' => 'https://img.icons8.com/?size=25&id=79886&format=png&color=ffffff',
                    'notification' => 'https://img.icons8.com/?size=25&id=83193&format=png&color=ffffff',
                    'report' => 'https://img.icons8.com/?size=25&id=9iXtu2VfY_2G&format=png&color=ffffff',
                ];

                $route = [
                    'home' => route('user.dashboard'),
                    'pengajuan' => route('submit.create'),
                    'monitor' => route('user.monitoring'),
                    'notification' => route('notifications.index'),
                    'report' => route('report.submiter'),
                ];
            }
        @endphp
        <div class="mt-5 flex w-full flex-col p-2">
            @if ($role == 'Admin')
                <a href="{{ $route['dashboard'] }}"
                    class="flex items-center justify-start gap-4 rounded-lg p-4 transition-colors duration-300 hover:bg-[#0141a2]">
                    <img src="{{ $icon['dashboard'] }}" alt="icon">
                    @if ($isOpen)
                        <span class="ml-2 text-white">{{ $name['dashboard'] }}</span>
                    @endif
                </a>
                <a href="{{ $route['environment'] }}"
                    class="flex items-center justify-start gap-4 rounded-lg p-4 transition-colors duration-300 hover:bg-[#0141a2]">
                    <img src="{{ $icon['environment'] }}" alt="icon">
                    @if ($isOpen)
                        <span class="ml-2 text-white">{{ $name['environment'] }}</span>
                    @endif
                </a>
                <a href="{{ $route['arsip'] }}"
                    class="flex items-center justify-start gap-4 rounded-lg p-4 transition-colors duration-300 hover:bg-[#0141a2]">
                    <img src="{{ $icon['arsip'] }}" alt="icon">
                    @if ($isOpen)
                        <span class="ml-2 text-white">{{ $name['arsip'] }}</span>
                    @endif
                </a>
                <a href="{{ $route['user'] }}"
                    class="flex items-center justify-start gap-4 rounded-lg p-4 transition-colors duration-300 hover:bg-[#0141a2]">
                    <img src="{{ $icon['user'] }}" alt="icon">
                    @if ($isOpen)
                        <span class="ml-2 text-white">{{ $name['user'] }}</span>
                    @endif
                </a>
                <a href="{{ $route['report'] }}"
                    class="flex items-center justify-start gap-4 rounded-lg p-4 transition-colors duration-300 hover:bg-[#0141a2]">
                    <img src="{{ $icon['report'] }}" alt="icon">
                    @if ($isOpen)
                        <span class="ml-2 text-white">{{ $name['report'] }}</span>
                    @endif
                </a>
            @elseif ($role == 'Keuangan')
                <a href="{{ $route['home'] }}"
                    class="flex items-center justify-start gap-4 rounded-lg p-4 transition-colors duration-300 hover:bg-[#0141a2]">
                    <img src="{{ $icon['home'] }}" alt="icon">
                    @if ($isOpen)
                        <span class="ml-2 text-white">{{ $name['home'] }}</span>
                    @endif
                </a>
                <a href="{{ $route['pengajuan'] }}"
                    class="flex items-center justify-start gap-4 rounded-lg p-4 transition-colors duration-300 hover:bg-[#0141a2]">
                    <img src="{{ $icon['pengajuan'] }}" alt="icon">
                    @if ($isOpen)
                        <span class="ml-2 text-white">{{ $name['pengajuan'] }}</span>
                    @endif
                </a>
                <a href="{{ $route['arsip'] }}"
                    class="flex items-center justify-start gap-4 rounded-lg p-4 transition-colors duration-300 hover:bg-[#0141a2]">
                    <img src="{{ $icon['arsip'] }}" alt="icon">
                    @if ($isOpen)
                        <span class="ml-2 text-white">{{ $name['arsip'] }}</span>
                    @endif
                </a>
                <a href="{{ $route['notification'] }}"
                    class="flex items-center justify-start gap-4 rounded-lg p-4 transition-colors duration-300 hover:bg-[#0141a2]">
                    <img src="{{ $icon['notification'] }}" alt="icon">
                    @if ($isOpen)
                        <span class="ml-2 text-white">{{ $name['notification'] }}</span>
                    @endif
                </a>
                <a href="{{ $route['report'] }}"
                    class="flex items-center justify-start gap-4 rounded-lg p-4 transition-colors duration-300 hover:bg-[#0141a2]">
                    <img src="{{ $icon['report'] }}" alt="icon">
                    @if ($isOpen)
                        <span class="ml-2 text-white">{{ $name['report'] }}</span>
                    @endif
                </a>
            @elseif ($role == 'Bendahara')
                <a href="{{ $route['home'] }}"
                    class="flex items-center justify-start gap-4 rounded-lg p-4 transition-colors duration-300 hover:bg-[#0141a2]">
                    <img src="{{ $icon['home'] }}" alt="icon">
                    @if ($isOpen)
                        <span class="ml-2 text-white">{{ $name['home'] }}</span>
                    @endif
                </a>
                <a href="{{ $route['pengajuan'] }}"
                    class="flex items-center justify-start gap-4 rounded-lg p-4 transition-colors duration-300 hover:bg-[#0141a2]">
                    <img src="{{ $icon['pengajuan'] }}" alt="icon">
                    @if ($isOpen)
                        <span class="ml-2 text-white">{{ $name['pengajuan'] }}</span>
                    @endif
                </a>
                <a href="{{ $route['arsip'] }}"
                    class="flex items-center justify-start gap-4 rounded-lg p-4 transition-colors duration-300 hover:bg-[#0141a2]">
                    <img src="{{ $icon['arsip'] }}" alt="icon">
                    @if ($isOpen)
                        <span class="ml-2 text-white">{{ $name['arsip'] }}</span>
                    @endif
                </a>
                <a href="{{ $route['notification'] }}"
                    class="flex items-center justify-start gap-4 rounded-lg p-4 transition-colors duration-300 hover:bg-[#0141a2]">
                    <img src="{{ $icon['notification'] }}" alt="icon">
                    @if ($isOpen)
                        <span class="ml-2 text-white">{{ $name['notification'] }}</span>
                    @endif
                </a>
                <a href="{{ $route['report'] }}"
                    class="flex items-center justify-start gap-4 rounded-lg p-4 transition-colors duration-300 hover:bg-[#0141a2]">
                    <img src="{{ $icon['report'] }}" alt="icon">
                    @if ($isOpen)
                        <span class="ml-2 text-white">{{ $name['report'] }}</span>
                    @endif
                </a>
            @elseif ($role == 'PPSPM')
                <a href="{{ $route['home'] }}"
                    class="flex items-center justify-start gap-4 rounded-lg p-4 transition-colors duration-300 hover:bg-[#0141a2]">
                    <img src="{{ $icon['home'] }}" alt="icon">
                    @if ($isOpen)
                        <span class="ml-2 text-white">{{ $name['home'] }}</span>
                    @endif
                </a>
                <a href="{{ $route['pengajuan'] }}"
                    class="flex items-center justify-start gap-4 rounded-lg p-4 transition-colors duration-300 hover:bg-[#0141a2]">
                    <img src="{{ $icon['pengajuan'] }}" alt="icon">
                    @if ($isOpen)
                        <span class="ml-2 text-white">{{ $name['pengajuan'] }}</span>
                    @endif
                </a>
                <a href="{{ $route['arsip'] }}"
                    class="flex items-center justify-start gap-4 rounded-lg p-4 transition-colors duration-300 hover:bg-[#0141a2]">
                    <img src="{{ $icon['arsip'] }}" alt="icon">
                    @if ($isOpen)
                        <span class="ml-2 text-white">{{ $name['arsip'] }}</span>
                    @endif
                </a>
                <a href="{{ $route['notification'] }}"
                    class="flex items-center justify-start gap-4 rounded-lg p-4 transition-colors duration-300 hover:bg-[#0141a2]">
                    <img src="{{ $icon['notification'] }}" alt="icon">
                    @if ($isOpen)
                        <span class="ml-2 text-white">{{ $name['notification'] }}</span>
                    @endif
                </a>
                <a href="{{ $route['report'] }}"
                    class="flex items-center justify-start gap-4 rounded-lg p-4 transition-colors duration-300 hover:bg-[#0141a2]">
                    <img src="{{ $icon['report'] }}" alt="icon">
                    @if ($isOpen)
                        <span class="ml-2 text-white">{{ $name['report'] }}</span>
                    @endif
                </a>
            @elseif ($role == 'Kepala')
                <a href="{{ $route['home'] }}"
                    class="flex items-center justify-start gap-4 rounded-lg p-4 transition-colors duration-300 hover:bg-[#0141a2]">
                    <img src="{{ $icon['home'] }}" alt="icon">
                    @if ($isOpen)
                        <span class="ml-2 text-white">{{ $name['home'] }}</span>
                    @endif
                </a>
                <a href="{{ $route['arsip'] }}"
                    class="flex items-center justify-start gap-4 rounded-lg p-4 transition-colors duration-300 hover:bg-[#0141a2]">
                    <img src="{{ $icon['arsip'] }}" alt="icon">
                    @if ($isOpen)
                        <span class="ml-2 text-white">{{ $name['arsip'] }}</span>
                    @endif
                </a>
                <a href="{{ $route['report'] }}"
                    class="flex items-center justify-start gap-4 rounded-lg p-4 transition-colors duration-300 hover:bg-[#0141a2]">
                    <img src="{{ $icon['report'] }}" alt="icon">
                    @if ($isOpen)
                        <span class="ml-2 text-white">{{ $name['report'] }}</span>
                    @endif
                </a>
            @else
                <a href="{{ $route['home'] }}"
                    class="{{ $isOpen ? 'justify-start' : 'justify-center' }} flex items-center gap-4 rounded-lg p-4 transition-colors duration-300 hover:bg-[#0141a2]">
                    <img src="{{ $icon['home'] }}" alt="icon">
                    @if ($isOpen)
                        <span class="ml-2 text-white">{{ $name['home'] }}</span>
                    @endif
                </a>
                <a href="{{ $route['pengajuan'] }}"
                    class="{{ $isOpen ? 'justify-start' : 'justify-center' }} flex items-center gap-4 rounded-lg p-4 transition-colors duration-300 hover:bg-[#0141a2]">
                    <img src="{{ $icon['pengajuan'] }}" alt="icon">
                    @if ($isOpen)
                        <span class="ml-2 text-white">{{ $name['pengajuan'] }}</span>
                    @endif
                </a>
                <a href="{{ $route['monitor'] }}"
                    class="{{ $isOpen ? 'justify-start' : 'justify-center' }} flex items-center gap-4 rounded-lg p-4 transition-colors duration-300 hover:bg-[#0141a2]">
                    <img src="{{ $icon['monitor'] }}" alt="icon">
                    @if ($isOpen)
                        <span class="ml-2 text-white">{{ $name['monitor'] }}</span>
                    @endif
                </a>
                <a href="{{ $route['notification'] }}"
                    class="{{ $isOpen ? 'justify-start' : 'justify-center' }} flex items-center gap-4 rounded-lg p-4 transition-colors duration-300 hover:bg-[#0141a2]">
                    <img src="{{ $icon['notification'] }}" alt="icon">
                    @if ($isOpen)
                        <span class="ml-2 text-white">{{ $name['notification'] }}</span>
                    @endif
                </a>
                <a href="{{ $route['report'] }}"
                    class="{{ $isOpen ? 'justify-start' : 'justify-center' }} flex items-center gap-4 rounded-lg p-4 transition-colors duration-300 hover:bg-[#0141a2]">
                    <img src="{{ $icon['report'] }}" alt="icon">
                    @if ($isOpen)
                        <span class="ml-2 text-white">{{ $name['report'] }}</span>
                    @endif
                </a>
            @endif
        </div>
    </div>

    {{-- Account Settings --}}
    <div class="mb-4 mt-auto border-t border-gray-700/50 pt-3">
        {{-- Profile Section --}}
        <div
            class="{{ $isOpen ? 'justify-between' : 'justify-center' }} flex items-center rounded-xl p-2 transition-colors duration-200 hover:bg-gray-800/50">

            {{-- User Info --}}
            <div class="flex min-w-0 items-center gap-3">
                {{-- Dynamic Avatar --}}
                <div
                    class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-blue-600 text-lg font-bold text-white shadow-sm">
                    {{ strtoupper(substr(Auth::user()->name ?? 'U', 0, 1)) }}
                </div>

                @if ($isOpen)
                    <div class="min-w-0 flex-1">
                        <p class="truncate text-sm font-semibold leading-snug text-white">
                            {{ Auth::user()->name }}
                        </p>
                        <p class="truncate text-xs text-gray-400">
                            {{ Auth::user()->email }}
                        </p>
                    </div>
                @endif
            </div>

            {{-- Logout Button (Ketika Sidebar Terbuka) --}}
            @if ($isOpen)
                <form method="POST" action="{{ route('logout') }}" class="shrink-0">
                    @csrf
                    <button type="submit" title="Logout"
                        class="group rounded-lg p-2 text-gray-400 transition-all duration-200 hover:bg-red-500/10 hover:text-red-400">
                        <svg class="h-5 w-5 transition-transform group-hover:translate-x-0.5" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                    </button>
                </form>
            @endif
        </div>

        {{-- Logout Button Icon Only (Ketika Sidebar Tertutup / Minimized) --}}
        @if (!$isOpen)
            <div class="mt-2 flex justify-center">
                <form method="POST" action="{{ route('logout') }}" class="w-full px-2">
                    @csrf
                    <button type="submit" title="Logout"
                        class="flex w-full justify-center rounded-lg p-2.5 text-gray-400 transition-colors hover:bg-red-500/10 hover:text-red-400">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                    </button>
                </form>
            </div>
        @endif
    </div>
</div>
