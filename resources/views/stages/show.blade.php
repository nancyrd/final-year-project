<!-- resources/views/stages/show.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container py-4">
    @if(session('assessment_result'))
        <div class="alert alert-{{ session('assessment_result.passed') ? 'success' : 'warning' }} mb-4">
            <h4 class="alert-heading">
                {{ session('assessment_result.passed') ? '🎉 Congratulations!' : '😊 Good Start!' }}
            </h4>
            <p>
                You scored {{ session('assessment_result.score') }}/{{ session('assessment_result.total') }}.
                {{ session('assessment_result.message') }}
            </p>
        </div>
    @endif
    
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h2 class="mb-0">{{ $stage->title }}</h2>
        </div>
        
        <div class="card-body">
            <p class="lead">{{ $stage->description }}</p>
            
            <hr>
            
            <h3 class="mb-3">Levels</h3>
            
            <div class="list-group">
                @foreach($levels as $level)
                    @php
                        $hasAccess = $user->levelAccess()
                            ->where('level_id', $level->id)
                            ->where('unlocked', true)
                            ->exists();
                    @endphp
                    
                    @if($hasAccess)
                        <a href="{{ route('level.show', ['stage' => $stage, 'level' => $level]) }}" 
                           class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="mb-1">{{ $level->title }}</h5>
                                <p class="mb-1 text-muted">{{ $level->description }}</p>
                            </div>
                            <span class="badge bg-success rounded-pill">Available</span>
                        </a>
                    @else
                        <div class="list-group-item list-group-item-light d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="mb-1">{{ $level->title }}</h5>
                                <p class="mb-1 text-muted">{{ $level->description }}</p>
                            </div>
                            <span class="badge bg-secondary rounded-pill">Locked</span>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection