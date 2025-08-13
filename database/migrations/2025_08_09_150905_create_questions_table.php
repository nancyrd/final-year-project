<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
 if (!Schema::hasTable('questions')) {
    Schema::create('questions', function (Blueprint $table) {
        $table->id();
        $table->foreignId('stage_id')->constrained();
        $table->enum('type', ['pre_assessment', 'pro_assessment']);
        $table->text('question_text');
        $table->json('options');
        $table->string('correct_answer');
        $table->timestamps();
    });
}
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};
