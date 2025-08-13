<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Stage;

class DashboardController extends Controller
{
    public function index()
{
    $user = auth()->user();
    $stages = ['variables', 'loops', 'functions'];

    $stageData = [];

    foreach ($stages as $stage) {
        $progress = $user->{$stage . '_progress'} ?? [];

        $stageData[$stage] = [
            'score' => $progress['assessment_score'] ?? null,
            'assessment_completed' => $progress['assessment_completed'] ?? false,
            'unlocked_levels' => $progress['unlocked_levels'] ?? [],
            'completed_levels' => $progress['completed_levels'] ?? [],
            'fully_completed' => $progress['fully_completed'] ?? false,
        ];
    }

    return view('dashboard', compact('stageData'));
}

}