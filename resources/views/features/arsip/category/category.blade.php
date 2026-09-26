<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold tracking-tight text-gray-800">
            Input Arsip
        </h2>
    </x-slot>

    <div class="mx-auto max-w-7xl p-4">

        <div class="flex justify-between w-full items-center">
            <div>
                <a href="{{ route('arsip') }}"
                    class="inline-flex items-center gap-2 rounded-full border border-gray-200 bg-white px-2 py-2 text-gray-700 shadow-md transition-all duration-200 ease-in-out hover:bg-gray-400 ">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2"d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                </a>
            </div>
            <div class="rounded-md border border-gray-300 bg-yellow-50 p-2 shadow-md">
                <div class="flex justify-start gap-2 items-center">
                    <div class="font-medium text-gray-700">
                        Path
                    </div>
                    <div class="bg-white px-2 border border-gray-200 rounded-md text-sm text-gray-500">
                        {{ $cabinet->cabinet_name }} /
                    </div>
                </div>
            </div>
            <div class=" flex justify-end">
                <form action="{{ route('category.index') }}" method="GET">
                    <input type="text" name="id_cabinet" value="{{ $cabinet->id }}" class="hidden">
                    <button type="submit"
                        class="inline-flex items-center gap-2 rounded-md bg-green-500 px-4 py-2 font-medium text-white shadow-md transition-all duration-200 hover:bg-green-600">
                        <img src="https://img.icons8.com/?size=20&id=EkK2AS8KSyo0&format=png&color=ffffff"
                            class="w-5" />
                        Setting Kategori
                    </button>
                </form>
            </div>
        </div>

        <div class="rounded-t-md bg-[#003A8F] p-4 mt-6">
            <div class="text-white text-2xl font-semibold">
                Category
            </div>
            <div class="text-white text-xs mt-2">
                silahkan pilih category yang tersedia di <span class="font-bold">{{ $cabinet->cabinet_name }}</span>
            </div>
        </div>
        <div class="rounded-b-md border border-gray-300 bg-white shadow-md p-4">
            <div class="grid grid-cols-5 gap-4 w-full">
                @foreach ($categories as $cate)
                    <a href="" class="p-4 inline-flex justify-center bg-white shadow-md rounded-md border border-gray-300 hover:-translate-y-1 transition-all duration-200">
                        <div class="flex flex-col items-center">
                            <div>
                                <svg class="h-20 w-20 text-gray-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M2 6a2 2 0 012-2h4l2 2h4a2 2 0 012 2v1H8a3 3 0 00-3 3v1.5a1.5 1.5 0 01-3 0V6z"
                                        clip-rule="evenodd" />
                                    <path d="M6 12a2 2 0 012-2h8a2 2 0 012 2v2a2 2 0 01-2 2H2h2a2 2 0 002-2v-2z" />
                                </svg>
                            </div>
                            <div class="text-xl text-gray-700 font-semibold">
                                {{ $cate->category_name }}
                            </div>
                            <div class="text-xs text-gray-500">
                                count arsip
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
