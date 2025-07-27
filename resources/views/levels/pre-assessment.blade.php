<!-- resources/views/levels/pre-assessment.blade.php -->

@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto py-8">
    <h1 class="text-3xl font-bold text-purple-700 mb-8">Pre-assessment for Level {{ $level }}</h1>

    <form action="{{ route('levels.lesson', $level) }}" method="POST">
        @csrf
        @foreach($questions as $question)
        <div class="mb-6">
            <p class="font-semibold text-lg">{{ $question['question'] }}</p>
            @foreach($question['options'] as $option)
            <div class="mt-2">
                <input type="radio" name="question_{{ $question['id'] }}" value="{{ $option }}" required>
                <label>{{ $option }}</label>
            </div>
            @endforeach
        </div>
        @endforeach

        <button type="submit" class="bg-purple-600 text-white py-2 px-4 rounded-md">Submit Pre-assessment</button>
    </form>
</div>
@endsection
