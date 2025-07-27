<!-- resources/views/levels/index.blade.php -->

@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto py-8">
    <h1 class="text-3xl font-bold text-purple-700 mb-8">Choose a Level to Start</h1>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($levels as $level)
        <div class="bg-white p-6 rounded-lg shadow">
            <h2 class="text-xl font-semibold text-purple-600">{{ $level['title'] }}</h2>
            <p class="text-gray-600 mt-2">{{ $level['description'] }}</p>
            <a href="{{ route('levels.pre-assessment', $level['id']) }}" class="mt-4 inline-block text-purple-600 hover:underline">Start Pre-assessment</a>
        </div>
        @endforeach
    </div>
</div>
@endsection
