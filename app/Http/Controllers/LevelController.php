<?php

// app/Http/Controllers/LevelController.php
namespace App\Http\Controllers;

use App\Models\Level;
use App\Models\Stage;

class LevelController extends Controller
{
    public function show(Stage $stage, Level $level)
    {
        return view('levels.show', [
            'stage' => $stage,
            'level' => $level
        ]);
    }
}