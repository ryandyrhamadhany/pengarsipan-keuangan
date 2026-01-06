<aside class="w-64 min-h-screen bg-gradient-to-b from-[#003A8F] to-[#002766] text-white shadow-2xl flex flex-col transition-all duration-300 hover:shadow-blue-500/20 relative overflow-hidden">
    <!-- Background Decorative Elements -->
    <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-[#1890FF] to-[#0050C8]"></div>
    <div class="absolute -top-20 -right-20 w-40 h-40 bg-blue-500/10 rounded-full blur-xl"></div>
    <div class="absolute -bottom-20 -left-20 w-40 h-40 bg-purple-500/10 rounded-full blur-xl"></div>
    
    {{-- LOGO ENHANCED --}}
    <div class="h-20 flex items-center justify-center bg-gray-800/50 backdrop-blur-sm border border-gray-700/30 hover:bg-gray-800/70 backdrop-blur-sm relative z-10 px-4">
        <a href="{{ route('dashboard') }}" class="group flex items-center space-x-3 transition-all duration-300 hover:scale-105">
            <div class="relative">
                <div class="absolute inset-0 bg-gradient-to-r from-blue-500 to-purple-500 rounded-xl blur opacity-70 group-hover:opacity-100 transition-opacity"></div>
                <x-application-logo class="h-10 w-10 text-white relative z-10" />
            </div>
            <div class="flex flex-col">
                <span class="font-bold text-lg tracking-tight">ARSIP DIGITAL</span>
                <span class="text-xs text-gray-400 font-medium">{{ Auth::user()->role }}</span>
            </div>
        </a>
    </div>

    {{-- USER PROFILE CARD --}}
    <div class="p-4 border-b border-gray-700/50 relative z-10">
        <div class="flex items-center space-x-3 p-3 rounded-xl bg-gray-800/50 backdrop-blur-sm border border-gray-700/30 hover:bg-gray-800/70 transition-all duration-300">
            <div class="relative">
                <div class="w-12 h-12 rounded-full bg-gradient-to-r from-blue-500 to-purple-500 flex items-center justify-center text-white font-bold text-lg">
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                </div>
                <div class="absolute bottom-0 right-0 w-3 h-3 rounded-full bg-green-500 border-2 border-gray-800"></div>
            </div>
            <div class="flex-1 min-w-0">
                <p class="font-semibold text-sm truncate">{{ Auth::user()->name }}</p>
                <p class="text-xs text-gray-400 truncate">{{ Auth::user()->email }}</p>
            </div>
        </div>
    </div>

    {{-- MAIN NAVIGATION --}}
    <nav class="flex-1 p-4 space-y-1 overflow-y-auto relative z-10">
        @php
            $role = Auth::user()->role;

            $roleDashboard = match ($role) {
                'Admin' => route('admin.dashboard'),
                'Keuangan' => route('keuangan.dashboard'),
                'Bendahara' => route('bendahara.dashboard'),
                default => route('user.dashboard'),
            };

            $roleInputArsip = match ($role) {
                'Admin', 'Bendahara' => route('admin.archive'),
                'Keuangan' => route('keuangan.input'),
                default => '#',
            };

            $roleKelolaUser = $role === 'Admin'
                ? route('account.index')
                : '#';

            $pengajuan = in_array($role, ['Admin','Keuangan'])
                ? '#'
                : route('pengajuan.index');

            $worklist = in_array($role, ['Admin','Keuangan'])
                ? '#'
                : route('user.worklist');

            $roleDigitalArsip = in_array($role, ['Keuangan','Bendahara'])
                ? route('digital.index')
                : '#';
            
            // Define icons for each menu item
            $icons = [
                'Dashboard' => 'M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6',
                'Input Arsip' => 'M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z',
                'Kelola User' => 'M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5 3.75V14.25m0 3.75h-6m6 0h-6m0 0V8.25',
                'Digital Arsip' => 'M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4',
                'Pengajuan' => 'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z',
                'Worklist' => 'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2'
            ];
            
            // Define menu items based on role
            $menuItems = [];
            
            if ($role === 'Admin') {
                $menuItems = [
                    ['label' => 'Dashboard', 'href' => $roleDashboard, 'icon' => $icons['Dashboard']],
                    ['label' => 'Input Arsip', 'href' => $roleInputArsip, 'icon' => $icons['Input Arsip']],
                    ['label' => 'Kelola User', 'href' => $roleKelolaUser, 'icon' => $icons['Kelola User']],
                ];
            } elseif ($role === 'Keuangan') {
                $menuItems = [
                    ['label' => 'Dashboard', 'href' => $roleDashboard, 'icon' => $icons['Dashboard']],
                    ['label' => 'Pengajuan', 'href' => route('keuangan.pengajuan'), 'icon' => $icons['Pengajuan']],
                    ['label' => 'Digital Arsip', 'href' => $roleDigitalArsip, 'icon' => $icons['Digital Arsip']],
                    ['label' => 'Input Arsip', 'href' => $roleInputArsip, 'icon' => $icons['Input Arsip']],
                ];
            } elseif ($role === 'Bendahara') {
                $menuItems = [
                    ['label' => 'Dashboard', 'href' => $roleDashboard, 'icon' => $icons['Dashboard']],
                    [
                        'label' => 'Pengajuan',
                        'href'  => route('bendahara.pengajuan'),
                        'icon'  => $icons['Pengajuan']
                    ],
                    ['label' => 'Digital Arsip', 'href' => $roleDigitalArsip, 'icon' => $icons['Digital Arsip']],
                    ['label' => 'Input Arsip', 'href' => $roleInputArsip, 'icon' => $icons['Input Arsip']],
                ];
            } else {
                $menuItems = [
                    ['label' => 'Dashboard', 'href' => $roleDashboard, 'icon' => $icons['Dashboard']],
                    ['label' => 'Pengajuan', 'href' => $pengajuan, 'icon' => $icons['Pengajuan']],
                    ['label' => 'Worklist', 'href' => $worklist, 'icon' => $icons['Worklist']],
                ];
            }
        @endphp

        <div class="mb-4 px-3">
            <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2">Menu Utama</p>
        </div>
        
        @foreach($menuItems as $item)
            @php
                $isActive = request()->url() == $item['href'] && $item['href'] != '#';
                $isDisabled = $item['href'] == '#';
            @endphp
            
            <a href="{{ $item['href'] }}" 
               @if($isDisabled) onclick="return false;" @endif
               class="group flex items-center px-4 py-3 rounded-xl transition-all duration-300 
                      {{ $isActive 
                         ? 'bg-gradient-to-r from-[#0050C8]/25 to-[#1890FF]/25 shadow-lg' 
                         : '' }}
                      {{ $isDisabled ? 'opacity-50 cursor-not-allowed' : '' }}">
                
                <div class="relative mr-3">
                    <svg class="w-5 h-5 {{ $isActive ? 'border-[#1890FF]' : 'text-gray-400 group-hover:text-gray-300' }}" 
                         fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $item['icon'] }}"></path>
                    </svg>
                    
                    @if($isActive)
                        <div class="absolute -inset-1 bg-blue-500/10 rounded-full blur-sm"></div>
                    @endif
                </div>
                
                <span class="font-medium text-sm">{{ $item['label'] }}</span>
                
                @if($isActive)
                    <div class="ml-auto">
                        <div class="w-2 h-2 rounded-full bg-white animate-pulse"></div>
                    </div>
                @endif
                
                @if($isDisabled)
                    <div class="ml-auto">
                        <span class="text-xs px-2 py-1 rounded bg-gray-700/50 text-gray-400">Soon</span>
                    </div>
                @endif
            </a>
        @endforeach
    </nav>

    {{-- BOTTOM SECTION --}}
    <div class="p-4 border-t border-gray-700/50 relative z-10 mt-auto">
        <div class="p-3 rounded-xl bg-gray-800/50 backdrop-blur-sm border border-gray-700/30">
            <a href="{{ route('logout') }}" 
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
               class="flex items-center justify-center w-full py-2 px-4 rounded-lg bg-gradient-to-r from-gray-800 to-gray-900 border border-gray-700 text-gray-300 hover:text-white hover:border-gray-600 transition-all duration-300 group">
                <svg class="w-4 h-4 mr-2 text-gray-400 group-hover:text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                </svg>
                <span class="text-sm font-medium">Keluar</span>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                @csrf
            </form>
        </div>
    </div>
</aside>

<style>
    /* Smooth scrolling for the sidebar */
    nav::-webkit-scrollbar {
        width: 4px;
    }
    
    nav::-webkit-scrollbar-track {
        background: rgba(255, 255, 255, 0.05);
        border-radius: 10px;
    }
    
    nav::-webkit-scrollbar-thumb {
        background: rgba(59, 130, 246, 0.5);
        border-radius: 10px;
    }
    
    nav::-webkit-scrollbar-thumb:hover {
        background: rgba(59, 130, 246, 0.8);
    }
    
    /* Animation for active menu item */
    @keyframes pulse-glow {
        0%, 100% { opacity: 1; }
        50% { opacity: 0.7; }
    }
    
    .animate-pulse {
        animation: pulse-glow 2s infinite;
    }
    
    /* Hover effect for menu items */
    .group:hover .group-hover\:scale-105 {
        transform: scale(1.05);
    }
</style>

<script>
    // Add subtle interaction effects
    document.addEventListener('DOMContentLoaded', function() {
        const menuItems = document.querySelectorAll('nav a:not([onclick*="return false"])');
        
        menuItems.forEach(item => {
            item.addEventListener('mouseenter', function() {
                this.style.transform = 'translateX(5px)';
            });
            
            item.addEventListener('mouseleave', function() {
                this.style.transform = 'translateX(0)';
            });
        });
        
        // Add active state indicator animation
        const activeIndicator = document.querySelector('.bg-gradient-to-r.from-blue-600\\/20');
        if (activeIndicator) {
            setInterval(() => {
                activeIndicator.classList.toggle('from-blue-600/20');
                activeIndicator.classList.toggle('from-blue-600/30');
            }, 3000);
        }
    });
</script>

<!-- testtest -->