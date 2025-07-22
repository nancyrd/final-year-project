@extends('layouts.app')

@section('content')
<div class="bg-white">

    {{-- Hero Section --}}
    <section class="text-center py-20 bg-gradient-to-br from-purple-100 to-white">
        <div class="max-w-4xl mx-auto px-6">
            <h1 class="text-5xl font-extrabold text-gray-900 leading-tight">
                Welcome to Python Learning, {{ Auth::user()->name }}!
            </h1>
            <p class="mt-4 text-lg text-gray-600">
                Choose where to begin — each level, quiz, and challenge is waiting for you 🎯
            </p>
            <div class="flex flex-wrap justify-center gap-4 mt-8">
                <a href="{{ route('levels.index') }}"
                    class="bg-purple-600 hover:bg-purple-700 text-white px-6 py-3 rounded-lg font-semibold text-lg shadow-md">
                    Go to Levels
                </a>
                <a href="{{ route('progress') }}"
                    class="bg-purple-100 hover:bg-purple-200 text-purple-800 px-6 py-3 rounded-lg font-semibold text-lg shadow-md">
                    View Progress
                </a>
                <a href="{{ route('help') }}"
                    class="bg-white border border-purple-300 hover:bg-purple-50 text-purple-600 px-6 py-3 rounded-lg font-semibold text-lg shadow-md">
                    Help Center
                </a>
            </div>
        </div>
    </section>

    {{-- Objectives Section --}}
    @include('partials.objectives')

    {{-- Why Learn Python --}}
    @include('partials.why-python')

    {{-- Platform Benefits --}}
    @include('partials.benefits')

</div>
@endsection
