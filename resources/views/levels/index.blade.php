@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto py-16 px-4">
    <h1 class="text-3xl font-bold text-purple-700 mb-8">Your Learning Levels</h1>
    <div class="grid md:grid-cols-3 gap-6">
        @foreach ($levels as $level)
            <div class="bg-white border rounded-lg shadow p-6 hover:shadow-lg transition">
                <h2 class="text-xl font-bold text-purple-600">{{ $level['title'] }}</h2>
                <p class="text-gray-600 mt-2">{{ $level['desc'] }}</p>
                <a href="#" class="mt-4 inline-block text-purple-600 hover:underline font-medium">Start</a>
            </div>
        @endforeach
    </div>
</div>
@endsection
