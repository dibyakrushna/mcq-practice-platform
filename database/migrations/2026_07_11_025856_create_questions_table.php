<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('subject_id')
                ->constrained()
                ->cascadeOnDelete();
            $table->text('question_text');
            $table->string('image')->nullable();
            $table->text('explanation')->nullable();
            $table->enum('difficulty', [
                'easy',
                'medium',
                'hard'
            ])->default('medium');
            $table->unsignedInteger('marks')->default(1);
            $table->unsignedInteger('negative_marks')->default(0);
            $table->boolean('status')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};
