<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('stages')) {
            Schema::create('stages', function (Blueprint $table) {
                $table->id();
                $table->string('title');
                $table->text('description');
                $table->integer('order')->unique();
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('levels')) {
            Schema::create('levels', function (Blueprint $table) {
                $table->id();
                $table->foreignId('stage_id')->constrained();
                $table->string('title');
                $table->text('description');
                $table->integer('order');
                $table->timestamps();
            });
        }



          Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('stage_id')->constrained();
            $table->enum('type', ['pre_assessment', 'pro_assessment']);
            $table->text('question_text');
            $table->json('options'); // Store MCQ options as JSON
            $table->string('correct_answer'); // The key of the correct option
            $table->timestamps();
        });

        // User assessment results
        Schema::create('user_assessments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('stage_id')->constrained();
            $table->enum('type', ['pre_assessment', 'pro_assessment']);
            $table->integer('score');
            $table->boolean('passed');
            $table->timestamps();
        });

        // Track which levels users can access
        Schema::create('user_level_access', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('level_id')->constrained();
            $table->boolean('unlocked')->default(false);
            $table->timestamps();
            
            $table->unique(['user_id', 'level_id']);
        });
    }
        // Add similar existence checks for other tables...
    

    public function down()
    {
        Schema::dropIfExists('user_level_access');
        Schema::dropIfExists('user_assessments');
        Schema::dropIfExists('questions');
        Schema::dropIfExists('levels');
        Schema::dropIfExists('stages');
    }
};