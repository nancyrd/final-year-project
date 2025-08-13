<?php

// database/migrations/[timestamp]_create_user_level_progress_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('user_level_progress', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('level_id')->constrained()->cascadeOnDelete();
            $table->integer('score')->default(0);
            $table->boolean('completed')->default(false);
            $table->timestamps();
            
            // Ensure one progress record per user-level combination
            $table->unique(['user_id', 'level_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_level_progress');
    }
};