<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Pengajuan Terverifikasi
        </h2>
    </x-slot>

    @include('bendahara.partials.list-pengajuan', ['pengajuans' => $pengajuans])
</x-app-layout>
