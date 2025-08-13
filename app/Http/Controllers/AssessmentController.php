<?php

// app/Http/Controllers/AssessmentController.php
namespace App\Http\Controllers;

use App\Models\Stage;
use App\Models\Question;
use App\Models\UserAssessment;
use App\Models\UserLevelAccess;
use Illuminate\Http\Request;

class AssessmentController extends Controller
{
    public function showPreAssessment(Stage $stage)
    {
        // Check if user already took this pre-assessment
        $existingAssessment = UserAssessment::where('user_id', auth()->id())
            ->where('stage_id', $stage->id)
            ->where('type', 'pre_assessment')
            ->first();
            
        if ($existingAssessment) {
            return redirect()->route('stage.show', $stage);
        }
        
        $questions = $stage->preAssessmentQuestions()->inRandomOrder()->get();
        
        return view('assessments.pre-assessment', [
            'stage' => $stage,
            'questions' => $questions
        ]);
    }
    
    public function submitPreAssessment(Request $request, Stage $stage)
    {
        $questions = $stage->preAssessmentQuestions;
        $score = 0;
        
        foreach ($questions as $question) {
            $userAnswer = $request->input('question_'.$question->id);
            if ($userAnswer === $question->correct_answer) {
                $score++;
            }
        }
        
        $totalQuestions = $questions->count();
        $passingScore = ceil($totalQuestions * 0.7); // 70% to pass
        $passed = $score >= $passingScore;
        
        // Record assessment result
        UserAssessment::create([
            'user_id' => auth()->id(),
            'stage_id' => $stage->id,
            'type' => 'pre_assessment',
            'score' => $score,
            'passed' => $passed
        ]);
        
        // Handle level unlocking
        if ($passed) {
            // Unlock all levels in this stage
            foreach ($stage->levels as $level) {
                UserLevelAccess::updateOrCreate(
                    ['user_id' => auth()->id(), 'level_id' => $level->id],
                    ['unlocked' => true]
                );
            }
            
            $message = "Great job! You unlocked all levels in this stage.";
        } else {
            // Only unlock first level
            $firstLevel = $stage->levels()->orderBy('order')->first();
            UserLevelAccess::updateOrCreate(
                ['user_id' => auth()->id(), 'level_id' => $firstLevel->id],
                ['unlocked' => true]
            );
            
            $message = "You've unlocked the first level. Complete it to unlock more!";
        }
        
        return redirect()->route('stage.show', $stage)
            ->with('assessment_result', [
                'passed' => $passed,
                'score' => $score,
                'total' => $totalQuestions,
                'message' => $message
            ]);
    }
}