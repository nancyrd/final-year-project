<?php

// app/Models/Quiz.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;

    protected $fillable = [
        'question', 'choices', 'correct_answer'
    ];

    // Decode choices from JSON
    public function getChoicesAttribute($value)
    {
        return json_decode($value, true);
    }
}
