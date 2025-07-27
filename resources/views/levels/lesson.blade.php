<!-- resources/views/levels/lesson.blade.php -->

@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto py-8">
    <h1 class="text-3xl font-bold text-purple-700 mb-8">Lesson for Level {{ $level }}</h1>

    <div class="bg-white p-6 rounded-lg shadow">
        <p class="text-lg text-gray-700">{{ $lessonContent }}</p>
        <a href="{{ route('levels.post-assessment', $level) }}" class="mt-4 inline-block bg-purple-600 text-white py-2 px-4 rounded-md">Go to Post-assessment</a>
    </div>
</div>
@endsection
