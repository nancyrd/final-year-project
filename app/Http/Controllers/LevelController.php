<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LevelController extends Controller
{
    public function index()
    {
        // Here you can fetch the levels from the database or use a hardcoded list
        $levels = [
            ['id' => 1, 'title' => 'Introduction to Python', 'description' => 'Learn the basics of Python programming.'],
            ['id' => 2, 'title' => 'Variables & Data Types', 'description' => 'Learn how to use variables in Python.'],
        ];

        return view('levels.index', compact('levels'));
    }
    
    public function show($level)
    {
        // Show the lesson page for the selected level
        // Here you can fetch the lesson content related to the selected level
        $lessonContent = "This is a lesson content for Level {$level}.";

        return view('levels.lesson', compact('lessonContent', 'level'));
    }

    public function submit(Request $request, $level)
    {
        // Handle the form submission for the lesson or post-assessment quiz
        // For example, process the answers here or calculate familiarity score

        // Redirect to the post-assessment page after the user submits their answers
        return redirect()->route('levels.post-assessment', ['level' => $level]);
    }
}
