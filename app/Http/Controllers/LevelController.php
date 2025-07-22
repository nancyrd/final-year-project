<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LevelController extends Controller
{
    public function index()
{
    // Example levels data (for now static)
    $levels = [
        ['title' => 'Variables', 'desc' => 'Start with the basics of storing data'],
        ['title' => 'Loops', 'desc' => 'Repeat actions with while and for loops'],
        ['title' => 'Functions', 'desc' => 'Bundle your code into reusable logic'],
    ];

    return view('levels.index', compact('levels'));
}

}
