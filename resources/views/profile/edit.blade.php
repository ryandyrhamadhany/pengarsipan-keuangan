<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            Edit Profile
        </h2>
    </x-slot>

    <div class="min-h-screen ">
        <div class="max-w-4xl mx-auto">
            
            {{-- HEADER SECTION - ENHANCED --}}
            <div class="mb-8 mt-8">
                <div class="relative">
                    {{-- Background Decoration --}}
                    <div class="absolute -top-4 -left-4 w-72 h-72 bg-gradient-to-br from-indigo-200 to-purple-200 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob"></div>
                    <div class="absolute -top-4 -right-4 w-72 h-72 bg-gradient-to-br from-purple-200 to-pink-200 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob animation-delay-2000"></div>
                    <div class="absolute -bottom-8 left-20 w-72 h-72 bg-gradient-to-br from-pink-200 to-indigo-200 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob animation-delay-4000"></div>
                    
                    {{-- Content --}}
                    <div class="relative">
                        <div class="flex items-center gap-4 mb-4">
                            {{-- Icon Container --}}
                            <div class="relative group">
                                <div class="absolute inset-0 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-2xl blur-lg opacity-75 group-hover:opacity-100 transition duration-300"></div>
                                <div class="relative w-16 h-16 bg-gradient-to-b from-[#003A8F] to-[#002766] rounded-2xl shadow-xl flex items-center justify-center transform group-hover:scale-110 transition duration-300">
                                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                </div>
                            </div>

                            {{-- Title & Description --}}
                            <div>
                                <h1 class="text-2xl font-bold text-gray-600 mb-2">Account Settings</h1>
                                <p class="text-gray-600 text-base flex items-center gap-2">
                                    <svg class="w-4 h-4 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    Kelola profil, preferensi keamanan, dan pengaturan akun Anda
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- MAIN CARD --}}
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100">
                
                {{-- TABS NAVIGATION --}}
                <div class="border-b border-gray-200 bg-gradient-to-r from-gray-50 to-white">
                    <div class="px-6 py-1">
                        <nav class="flex space-x-1" aria-label="Tabs">
                            <button
                                class="tab-btn group relative px-6 py-4 text-sm font-medium rounded-t-xl transition-all duration-200"
                                data-tab="profile">
                                <span class="relative z-10 flex items-center gap-2">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                    </svg>
                                    Profile
                                </span>
                                <span class="tab-indicator absolute bottom-0 left-0 right-0 h-1 bg-indigo-600 rounded-t-full transform scale-x-0 transition-transform duration-200"></span>
                            </button>

                            <button
                                class="tab-btn group relative px-6 py-4 text-sm font-medium rounded-t-xl transition-all duration-200"
                                data-tab="security">
                                <span class="relative z-10 flex items-center gap-2">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                    </svg>
                                    Security
                                </span>
                                <span class="tab-indicator absolute bottom-0 left-0 right-0 h-1 bg-indigo-600 rounded-t-full transform scale-x-0 transition-transform duration-200"></span>
                            </button>

                            <button
                                class="tab-btn group relative px-6 py-4 text-sm font-medium rounded-t-xl transition-all duration-200"
                                data-tab="danger">
                                <span class="relative z-10 flex items-center gap-2">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                                    </svg>
                                    Danger Zone
                                </span>
                                <span class="tab-indicator absolute bottom-0 left-0 right-0 h-1 bg-red-600 rounded-t-full transform scale-x-0 transition-transform duration-200"></span>
                            </button>
                        </nav>
                    </div>
                </div>

                {{-- CONTENT AREA --}}
                <div class="p-8">
                    
                    {{-- PROFILE TAB --}}
                    <div id="tab-profile" class="tab-content">
                        @include('profile.partials.update-profile-information-form')
                    </div>

                    {{-- SECURITY TAB --}}
                    <div id="tab-security" class="tab-content hidden">
                        @include('profile.partials.update-password-form')
                    </div>

                    {{-- DANGER TAB --}}
                    <div id="tab-danger" class="tab-content hidden">
                        @include('profile.partials.delete-user-form')
                    </div>

                </div>
            </div>
        </div>
    </div>

    {{-- ENHANCED TAB SCRIPT --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const tabButtons = document.querySelectorAll('.tab-btn');
            const tabContents = document.querySelectorAll('.tab-content');

            // Set initial active state
            setActiveTab(tabButtons[0], 'profile');

            tabButtons.forEach(btn => {
                btn.addEventListener('click', function() {
                    const tab = this.dataset.tab;
                    setActiveTab(this, tab);
                });
            });

            function setActiveTab(activeBtn, tabName) {
                // Hide all contents with fade effect
                tabContents.forEach(content => {
                    content.style.opacity = '0';
                    setTimeout(() => {
                        content.classList.add('hidden');
                    }, 150);
                });

                // Reset all buttons
                tabButtons.forEach(btn => {
                    btn.classList.remove('bg-white', 'text-indigo-600', 'text-red-600', 'shadow-sm');
                    btn.classList.add('text-gray-600', 'hover:text-gray-900', 'hover:bg-gray-50');
                    const indicator = btn.querySelector('.tab-indicator');
                    indicator.style.transform = 'scaleX(0)';
                });

                // Activate clicked button
                const targetContent = document.getElementById(`tab-${tabName}`);
                
                setTimeout(() => {
                    targetContent.classList.remove('hidden');
                    setTimeout(() => {
                        targetContent.style.opacity = '1';
                    }, 10);
                }, 150);

                // Style active button
                activeBtn.classList.remove('text-gray-600', 'hover:text-gray-900', 'hover:bg-gray-50');
                activeBtn.classList.add('bg-white', 'shadow-sm');
                
                if (tabName === 'danger') {
                    activeBtn.classList.add('text-red-600');
                } else {
                    activeBtn.classList.add('text-indigo-600');
                }

                // Show indicator
                const indicator = activeBtn.querySelector('.tab-indicator');
                indicator.style.transform = 'scaleX(1)';
            }
        });
    </script>

    {{-- ADDITIONAL STYLES --}}
    <style>
        .tab-content {
            transition: opacity 0.2s ease-in-out;
            opacity: 1;
        }

        .tab-btn {
            position: relative;
            transition: all 0.2s ease;
        }

        .tab-btn:hover .tab-indicator {
            transform: scaleX(0.5);
            opacity: 0.5;
        }

        .tab-btn.active .tab-indicator {
            transform: scaleX(1);
            opacity: 1;
        }
    </style>
</x-app-layout>