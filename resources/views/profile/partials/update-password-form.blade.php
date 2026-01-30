<section class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100">
    {{-- HEADER WITH GRADIENT --}}
    <div class="relative bg-gradient-to-b from-[#003A8F] to-[#002766] px-8 py-4">
        <div class="absolute inset-0 bg-black/10"></div>
        <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHZpZXdCb3g9IjAgMCA2MCA2MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPjxnIGZpbGw9IiNmZmYiIGZpbGwtb3BhY2l0eT0iMC4xIj48cGF0aCBkPSJNMzYgMzRjMC0yLjIxIDEuNzktNCA0LTRzNCAxLjc5IDQgNC0xLjc5IDQtNCA0LTQtMS43OS00LTR6bTAgMTBjMC0yLjIxIDEuNzktNCA0LTRzNCAxLjc5IDQgNC0xLjc5IDQtNCA0LTQtMS43OS00LTR6Ii8+PC9nPjwvZz48L3N2Zz4=')] opacity-30"></div>
        <div class="relative">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-3">
                    <div class="w-12 h-12 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center ring-2 ring-white/30">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-xl font-semibold text-white">
                            {{ __('Update Password') }}
                        </h2>
                        <p class="mt-1 text-sm text-white/90">
                            {{ __('Pastikan akun Anda menggunakan kata sandi yang panjang dan acak agar tetap aman.') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- FORM CONTENT --}}
    <div class="px-8 py-6">
        <form method="post" action="{{ route('password.update') }}" class="space-y-6">
            @csrf
            @method('put')
            {{-- CURRENT PASSWORD --}}
            <div class="group" x-data="{ show: false }">
                <x-input-label for="update_password_current_password" :value="__('Current Password')" class="text-gray-700 font-semibold mb-2 flex items-center space-x-2" />
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400 group-focus-within:text-rose-500 transition-colors duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                        </svg>
                    </div>
                    <x-text-input 
                        id="update_password_current_password" 
                        name="current_password" 
                        x-bind:type="show ? 'text' : 'password'" 
                        class="pl-12 pr-12 block w-full rounded-lg border-gray-300 shadow-sm focus:border-rose-500 focus:ring-rose-500 focus:ring-1 transition-all duration-200 hover:border-gray-400 bg-gray-50 focus:bg-white" 
                        autocomplete="current-password"
                        placeholder="Enter your current password"
                    />
                    <button 
                        type="button"
                        @click="show = !show"
                        class="absolute inset-y-0 right-0 pr-4 flex items-center text-gray-400 hover:text-gray-600 transition-colors focus:outline-none">
                        <svg x-show="!show" class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                        <svg x-show="show" x-cloak class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                        </svg>
                    </button>
                </div>
                <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
            </div>

            {{-- NEW PASSWORD WITH STRENGTH METER --}}
            <div class="group" x-data="{ 
                show: false, 
                strength: 0, 
                password: '',
                strengthText: '',
                strengthColor: '',
                checks: {
                    length: false,
                    uppercase: false,
                    lowercase: false,
                    number: false,
                    special: false
                },
                calculateStrength() {
                    let score = 0;
                    this.checks.length = this.password.length >= 8;
                    this.checks.uppercase = /[A-Z]/.test(this.password);
                    this.checks.lowercase = /[a-z]/.test(this.password);
                    this.checks.number = /[0-9]/.test(this.password);
                    this.checks.special = /[^a-zA-Z0-9]/.test(this.password);
                    
                    if (this.checks.length) score++;
                    if (this.checks.uppercase && this.checks.lowercase) score++;
                    if (this.checks.number) score++;
                    if (this.checks.special) score++;
                    if (this.password.length >= 12) score++;
                    
                    this.strength = score;
                    
                    if (score <= 1) {
                        this.strengthText = 'Very Weak';
                        this.strengthColor = 'text-red-600';
                    } else if (score === 2) {
                        this.strengthText = 'Weak';
                        this.strengthColor = 'text-orange-600';
                    } else if (score === 3) {
                        this.strengthText = 'Fair';
                        this.strengthColor = 'text-yellow-600';
                    } else if (score === 4) {
                        this.strengthText = 'Good';
                        this.strengthColor = 'text-lime-600';
                    } else {
                        this.strengthText = 'Very Strong';
                        this.strengthColor = 'text-green-600';
                    }
                }
            }">
                <x-input-label for="update_password_password" :value="__('New Password')" class="text-gray-700 font-semibold mb-2" />
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400 group-focus-within:text-rose-500 transition-colors duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z" />
                        </svg>
                    </div>
                    <x-text-input 
                        id="update_password_password" 
                        name="password" 
                        x-bind:type="show ? 'text' : 'password'" 
                        class="pl-12 pr-12 block w-full rounded-lg border-gray-300 shadow-sm focus:border-rose-500 focus:ring-rose-500 focus:ring-1 transition-all duration-200 hover:border-gray-400 bg-gray-50 focus:bg-white" 
                        autocomplete="new-password"
                        placeholder="Create a strong password"
                        x-model="password"
                        @input="calculateStrength()"
                    />
                    <button 
                        type="button"
                        @click="show = !show"
                        class="absolute inset-y-0 right-0 pr-4 flex items-center text-gray-400 hover:text-gray-600 transition-colors focus:outline-none">
                        <svg x-show="!show" class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                        <svg x-show="show" x-cloak class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                        </svg>
                    </button>
                </div>
                
                {{-- ADVANCED PASSWORD STRENGTH METER --}}
                <div x-show="password.length > 0" x-transition class="mt-3 space-y-3">
                    <div class="flex items-center justify-between">
                        <span class="text-xs font-semibold text-gray-600">Password Strength:</span>
                        <span 
                            class="text-xs font-bold"
                            :class="strengthColor"
                            x-text="strengthText">
                        </span>
                    </div>
                    
                    <div class="relative">
                        <div class="w-full bg-gray-200 rounded-full h-2.5 overflow-hidden">
                            <div 
                                class="h-2.5 rounded-full transition-all duration-500 ease-out"
                                :class="{
                                    'bg-gradient-to-r from-red-500 to-red-600': strength <= 1,
                                    'bg-gradient-to-r from-orange-500 to-orange-600': strength === 2,
                                    'bg-gradient-to-r from-yellow-500 to-yellow-600': strength === 3,
                                    'bg-gradient-to-r from-lime-500 to-lime-600': strength === 4,
                                    'bg-gradient-to-r from-green-500 to-green-600': strength === 5
                                }"
                                :style="`width: ${strength * 20}%`">
                            </div>
                        </div>
                    </div>

                    {{-- REQUIREMENTS CHECKLIST --}}
                    <div class="grid grid-cols-2 gap-2 p-3 bg-gray-50 rounded-lg border border-gray-200">
                        <div class="flex items-center space-x-2">
                            <svg class="w-4 h-4 flex-shrink-0" :class="checks.length ? 'text-green-500' : 'text-gray-300'" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            <span class="text-xs" :class="checks.length ? 'text-gray-700 font-medium' : 'text-gray-400'">8+ characters</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <svg class="w-4 h-4 flex-shrink-0" :class="checks.uppercase ? 'text-green-500' : 'text-gray-300'" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            <span class="text-xs" :class="checks.uppercase ? 'text-gray-700 font-medium' : 'text-gray-400'">Uppercase (A-Z)</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <svg class="w-4 h-4 flex-shrink-0" :class="checks.lowercase ? 'text-green-500' : 'text-gray-300'" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            <span class="text-xs" :class="checks.lowercase ? 'text-gray-700 font-medium' : 'text-gray-400'">Lowercase (a-z)</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <svg class="w-4 h-4 flex-shrink-0" :class="checks.number ? 'text-green-500' : 'text-gray-300'" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            <span class="text-xs" :class="checks.number ? 'text-gray-700 font-medium' : 'text-gray-400'">Numbers (0-9)</span>
                        </div>
                        <div class="flex items-center space-x-2 col-span-2">
                            <svg class="w-4 h-4 flex-shrink-0" :class="checks.special ? 'text-green-500' : 'text-gray-300'" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            <span class="text-xs" :class="checks.special ? 'text-gray-700 font-medium' : 'text-gray-400'">Special characters (!@#$%)</span>
                        </div>
                    </div>
                </div>
                
                <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
            </div>

            {{-- CONFIRM PASSWORD --}}
            <div class="group" x-data="{ show: false }">
                <x-input-label for="update_password_password_confirmation" :value="__('Confirm Password')" class="text-gray-700 font-semibold mb-2" />
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400 group-focus-within:text-rose-500 transition-colors duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <x-text-input 
                        id="update_password_password_confirmation" 
                        name="password_confirmation" 
                        x-bind:type="show ? 'text' : 'password'" 
                        class="pl-12 pr-12 block w-full rounded-lg border-gray-300 shadow-sm focus:border-rose-500 focus:ring-rose-500 focus:ring-1 transition-all duration-200 hover:border-gray-400 bg-gray-50 focus:bg-white" 
                        autocomplete="new-password"
                        placeholder="Re-enter your new password"
                    />
                    <button 
                        type="button"
                        @click="show = !show"
                        class="absolute inset-y-0 right-0 pr-4 flex items-center text-gray-400 hover:text-gray-600 transition-colors focus:outline-none">
                        <svg x-show="!show" class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                        <svg x-show="show" x-cloak class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                        </svg>
                    </button>
                </div>
                <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
            </div>

            {{-- ACTION BUTTONS --}}
            <div class="flex items-center justify-end pt-4 border-t border-gray-200">
                <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-3">
                    <x-primary-button class="inline-flex items-center justify-center px-6 py-2 bg-gradient-to-b from-[#003A8F] to-[#002766] text-white font-bold rounded-lg shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        {{ __('Update Password') }}
                    </x-primary-button>

                    @if (session('status') === 'password-updated')
                        <div
                            x-data="{ show: true }"
                            x-show="show"
                            x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="opacity-0 transform scale-90 translate-x-4"
                            x-transition:enter-end="opacity-100 transform scale-100 translate-x-0"
                            x-transition:leave="transition ease-in duration-300"
                            x-transition:leave-start="opacity-100 transform scale-100"
                            x-transition:leave-end="opacity-0 transform scale-90"
                            x-init="setTimeout(() => show = false, 4000)"
                            class="inline-flex items-center px-4 py-3 bg-gradient-to-r from-green-50 to-emerald-50 border-2 border-green-200 rounded-xl shadow-sm">
                            <div class="flex items-center space-x-2">
                                <div class="w-6 h-6 bg-green-500 rounded-full flex items-center justify-center animate-bounce">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                                    </svg>
                                </div>
                                <span class="text-sm font-bold text-green-700">{{ __('Password updated successfully!') }}</span>
                            </div>
                        </div>
                    @endif
                </div>

                <button 
                    type="reset"
                    class="inline-flex items-center justify-center px-6 py-2 text-gray-700 bg-gray-100 hover:bg-gray-200 font-semibold rounded-lg transition-all duration-200 border border-gray-300 hover:border-gray-400">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                    </svg>
                    {{ __('Reset') }}
                </button>
            </div>
        </form>
    </div>
</section>