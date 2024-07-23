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
        Schema::create('survey_questions_translations', function (Blueprint $table) {
            $table->unsignedBigInteger('survey_question_id');
            $table->unsignedBigInteger('language_id');
            $table->string('text');
            $table->foreign('survey_question_id')->references('id')->on('survey_questions')->onDelete('cascade');
            $table->foreign('language_id')->references('id')->on('languages')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('survey_questions_translations');
    }
};
