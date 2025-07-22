@props(['emoji', 'title', 'desc'])

<div class="bg-white rounded-lg shadow p-6 text-center">
    <h3 class="text-lg font-semibold text-purple-600">{{ $emoji }} {{ $title }}</h3>
    <p class="mt-2 text-gray-600 text-sm">{{ $desc }}</p>
</div>
