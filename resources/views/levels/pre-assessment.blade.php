@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h2 class="text-2xl font-bold text-center">Pre-Assessment Quiz</h2>
    <p class="text-center text-gray-600">Take this quiz to help us understand your current knowledge of Python.</p>

    <form action="{{ route('pre-assessment.submit') }}" method="POST">
        @csrf
        @foreach($quiz as $question)
        <div class="my-4">
            <p class="font-semibold">{{ $question->question }}</p>
            @foreach($question->options as $option)
            <div class="form-check">
                <input type="radio" class="form-check-input" name="answers[{{ $question->id }}]" value="{{ $option }}" required>
                <label class="form-check-label">{{ $option }}</label>
            </div>
            @endforeach
        </div>
        @endforeach
        <button type="submit" class="btn btn-primary">Submit Quiz</button>
    </form>
</div>
@endsection
