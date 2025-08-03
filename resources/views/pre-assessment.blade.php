<!-- resources/views/pre-assessment.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Pre-Assessment Quiz</h1>

    <form action="{{ url('/pre-assessment') }}" method="POST">
        @csrf
        @foreach($quiz as $question)
            <div class="mb-4">
                <label for="question_{{ $question->id }}" class="form-label">{{ $question->question }}</label>
                @foreach($question->choices as $choice)
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="answers[{{ $question->id }}]" value="{{ $choice }}" id="question_{{ $question->id }}_{{ $loop->index }}">
                        <label class="form-check-label" for="question_{{ $question->id }}_{{ $loop->index }}">{{ $choice }}</label>
                    </div>
                @endforeach
            </div>
        @endforeach

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
