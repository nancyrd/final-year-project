@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $level->title }}</h1>
    <p>Stage: {{ $stage->title }}</p>
    <p>{{ $level->description }}</p>
    
    <!-- Your level content here -->
</div>
@endsection