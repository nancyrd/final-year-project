<?php

// database/seeders/InitialStageSeeder.php
namespace Database\Seeders;

use App\Models\Question;
use App\Models\Stage;
use App\Models\Level;
use Illuminate\Database\Seeder;

class InitialStageSeeder extends Seeder
{
    public function run()
{
    // Create first stage
    $stage = Stage::create([
        'title' => 'Python Basics',
        'description' => 'Introduction to Python programming for complete beginners',
        'order' => 1
    ]);

    // Create levels for this stage WITH descriptions
    $levels = [
        [
            'title' => 'Variables and Data Types',
            'description' => 'Learn about Python variables and basic data types',
            'order' => 1
        ],
        [
            'title' => 'Input and Output',
            'description' => 'Learn how to handle user input and display output',
            'order' => 2
        ],
        [
            'title' => 'Conditional Statements',
            'description' => 'Learn about if/else statements and decision making',
            'order' => 3
        ],
        [
            'title' => 'Loops',
            'description' => 'Learn about for and while loops',
            'order' => 4
        ],
        [
            'title' => 'Functions',
            'description' => 'Learn how to create and use functions',
            'order' => 5
        ],
    ];

        foreach ($levels as $level) {
            Level::create(array_merge($level, ['stage_id' => $stage->id]));
        }

        // Create pre-assessment questions
        $questions = [
            [
                'question_text' => 'What is Python primarily used for?',
                'options' => [
                    'a' => 'Only building websites',
                    'b' => 'Data analysis, automation, and many other applications',
                    'c' => 'Creating hardware devices',
                    'd' => 'Designing user interfaces'
                ],
                'correct_answer' => 'b'
            ],
            [
                'question_text' => 'Which of these is a correct Python variable name?',
                'options' => [
                    'a' => '1st_variable',
                    'b' => 'my-variable',
                    'c' => '_my_variable',
                    'd' => 'global'
                ],
                'correct_answer' => 'c'
            ],
            [
                'question_text' => 'What does the print() function do?',
                'options' => [
                    'a' => 'Takes a photo with your webcam',
                    'b' => 'Displays text on the screen',
                    'c' => 'Sends a document to your printer',
                    'd' => 'Creates a PDF file'
                ],
                'correct_answer' => 'b'
            ],
            [
                'question_text' => 'Which symbol is used for comments in Python?',
                'options' => [
                    'a' => '//',
                    'b' => '#',
                    'c' => '--',
                    'd' => '/*'
                ],
                'correct_answer' => 'b'
            ],
            [
                'question_text' => 'What will be the output of: print(3 + 2 * 2)',
                'options' => [
                    'a' => '10',
                    'b' => '7',
                    'c' => 'Error',
                    'd' => '3 + 2 * 2'
                ],
                'correct_answer' => 'b'
            ],
            // Add more questions as needed
        ];

        foreach ($questions as $question) {
            Question::create(array_merge($question, [
                'stage_id' => $stage->id,
                'type' => 'pre_assessment'
            ]));
        }
    }
}