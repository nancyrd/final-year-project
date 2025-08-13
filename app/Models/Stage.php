<?php

// app/Models/Stage.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stage extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function levels()
    {
        return $this->hasMany(Level::class)->orderBy('order');
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function preAssessmentQuestions()
    {
        return $this->questions()->where('type', 'pre_assessment');
    }
}