<?php

// app/Http/Controllers/StageController.php
namespace App\Http\Controllers;

use App\Models\Stage;
use Illuminate\Http\Request;

class StageController extends Controller
{
   public function show(Stage $stage)
    {
        // Check if user needs to take pre-assessment first
        $hasTakenPreAssessment = auth()->user()->assessments()
            ->where('stage_id', $stage->id)
            ->where('type', 'pre_assessment')
            ->exists();
            
        if (!$hasTakenPreAssessment) {
            return redirect()->route('assessment.pre.show', $stage);
        }
        
        return view('stages.show', [
            'stage' => $stage,
            'levels' => $stage->levels,
            'user' => auth()->user()
        ]);
    }



    public function showPreAssessment($stageName)
{
    return view('stages.pre-assessment', [
        'stageName' => $stageName,
        'stageTitle' => match($stageName) {
            'variables' => 'Variables Castle',
            'loops' => 'Loops Lagoon',
            'functions' => 'Functions Fortress',
            default => 'Python Basics'
        }
    ]);
}



public function processAssessment(Request $request, $stageName)
{
    $user = auth()->user();
    $percentage = $request->input('score');
    $correctAnswers = $request->input('correct_answers');
    $totalQuestions = $request->input('total_questions');

    // Determine unlocked levels based on score
    $unlockedLevels = ($percentage >= 80) ? [1, 2, 3] : [1];

    // Save to database
    $user->update([
        "{$stageName}_assessment_score" => $percentage,
        "{$stageName}_unlocked_levels" => $unlockedLevels
    ]);

    // Determine redirect URL based on unlocked levels
    $redirectUrl = route('stage.level', [
        'stage' => $stageName,
        'level' => ($percentage >= 80) ? 1 : 1 // Always start with level 1
    ]);

    return response()->json([
        'success' => true,
        'redirect_url' => $redirectUrl,
        'unlocked_levels' => $unlockedLevels
    ]);
}


public function showLevel($stage, $level)
{
    $user = auth()->user();
    $unlockedLevels = $user->{"{$stage}_unlocked_levels"} ?? [1];

    // Check if level is unlocked
    if (!in_array($level, $unlockedLevels)) {
        return redirect()->back()->with('error', 'This level is locked!');
    }

    return view("stages.{$stage}.level{$level}", [
        'stage' => $stage,
        'currentLevel' => $level,
        'unlockedLevels' => $unlockedLevels
    ]);
}


public function submitAssessment(Request $request, $stageName)
{
    $user = auth()->user();
    $score = $request->input('score');
    $totalQuestions = $request->input('total_questions');
    $percentage = ($score / $totalQuestions) * 100;

    // Determine unlocked levels
    $unlockedLevels = ($percentage >= 80) ? [1, 2, 3] : [1];

    // Update user progress
    $progress = $user->{$stageName.'_progress'} ?? [];
    $progress = array_merge($progress, [
        'assessment_completed' => true,
        'assessment_score' => $percentage,
        'unlocked_levels' => $unlockedLevels,
        'completed_levels' => $progress['completed_levels'] ?? []
    ]);

    $user->update([
        $stageName.'_progress' => $progress
    ]);

    return response()->json([
        'success' => true,
        'unlocked_levels' => $unlockedLevels,
        'redirect_url' => route('stage.level', [$stageName, 1])
    ]);
}






public function completeLevel(Request $request, $stageName, $level)
{
    $user = auth()->user();
    $progress = $user->{$stageName.'_progress'} ?? [];
    
    // Add this level to completed levels if not already there
    $completedLevels = $progress['completed_levels'] ?? [];
    if (!in_array($level, $completedLevels)) {
        $completedLevels[] = $level;
        sort($completedLevels);
    }
    
    // Check if all levels are completed
    $allLevelsCompleted = count($completedLevels) === 3;
    
    $user->update([
        $stageName.'_progress' => array_merge($progress, [
            'completed_levels' => $completedLevels,
            'fully_completed' => $allLevelsCompleted
        ])
    ]);

    return response()->json([
        'success' => true,
        'next_level' => $level < 3 ? $level + 1 : null,
        'all_completed' => $allLevelsCompleted
    ]);
}



}