<?php

// app/Http/Controllers/PostAssessmentController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostAssessmentController extends Controller
{
    public function show($level)
    {
        // Fetch the post-assessment questions for the level
        $questions = [
            ['id' => 1, 'question' => 'What is the syntax for printing something in Python?', 'options' => ['print()', 'echo()', 'write()', 'console.log()']],
            ['id' => 2, 'question' => 'Which of these is not a valid data type in Python?', 'options' => ['String', 'Integer', 'Boolean', 'Char']],
        ];

        return view('levels.post-assessment', compact('questions', 'level'));
    }
}
