<?php

// app/Http/Controllers/LessonController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function show($level)
    {
        // Fetch the lesson content for the given level
        $lessonContent = "Python is a high-level programming language used in various domains like web development, data analysis, and more.";

        return view('levels.lesson', compact('lessonContent', 'level'));
    }
}
