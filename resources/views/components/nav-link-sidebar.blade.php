@props(['href'])

<a href="{{ $href }}"
   class="block px-4 py-2 rounded-lg text-gray-700
          hover:bg-blue-50 hover:text-blue-600
          transition">
    {{ $slot }}
</a>
