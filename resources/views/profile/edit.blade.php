<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    {{-- TOMBOL KEMBALI --}}
    <div class="#">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-3">
            <a href="{{ route('dashboard') }}"
               class="inline-flex items-center gap-2 bg-gray-200 text-gray-700 font-medium px-4 py-2 rounded-lg hover:bg-gray-300 transition shadow-sm">
                ← Kembali
            </a>
        </div>
    </div>

    {{-- KONTEN --}}
    <div class="pt-4 pb-10">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 space-y-6">

            {{-- UPDATE PROFILE (LEBIH DEKAT) --}}
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                @include('profile.partials.update-profile-information-form')
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                @include('profile.partials.update-password-form')
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                @include('profile.partials.delete-user-form')
            </div>

        </div>
    </div>
</x-app-layout>
