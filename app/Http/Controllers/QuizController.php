<?php
// app/Http/Controllers/QuizController.php
namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    // Show the pre-assessment quiz
    public function showPreAssessment()
    {
        $quiz = Quiz::all(); // Get all questions from the quizzes table
        return view('pre-assessment', compact('quiz'));
    }

    // Handle the submission of the pre-assessment quiz
    public function submitPreAssessment(Request $request)
    {
        $score = 0;
        foreach ($request->input('answers') as $quiz_id => $answer) {
            $quiz = Quiz::find($quiz_id);
            if ($quiz->correct_answer == $answer) {
                $score++;
            }
        }

        // Store the score in the user table
        $user = Auth::user();
        $user->score = $score;
        $user->save();

        // Unlock levels based on score
        $this->unlockLevels($score);

        return redirect()->route('dashboard');
    }

    // Unlock levels based on the score
    protected function unlockLevels($score)
    {
        $user = Auth::user();
        if ($score >= 80) {
            $user->current_level = 'level_3';
        } elseif ($score >= 50) {
            $user->current_level = 'level_2';
        } else {
            $user->current_level = 'level_1';
        }
        $user->save();
    }
}
