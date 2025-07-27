<?php

// app/Http/Controllers/PreAssessmentController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PreAssessmentController extends Controller
{
    public function show($level)
    {
        // Here you can fetch questions related to the level from the database or use hardcoded questions
        $questions = [
            ['id' => 1, 'question' => 'What is Python used for?', 'options' => ['Web development', 'Data analysis', 'Game development', 'All of the above']],
            ['id' => 2, 'question' => 'What does Python code look like?', 'options' => ['Easy to understand', 'Very complex', 'Requires compilation', 'None of the above']],
        ];

        return view('levels.pre-assessment', compact('questions', 'level'));
    }
}
