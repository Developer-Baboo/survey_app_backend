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
        Schema::create('survey_responses', function (Blueprint $table) {
            $table->unsignedBigInteger('surveys_users_id');
            $table->unsignedBigInteger('survey_question_id');
            $table->unsignedBigInteger('survey_question_option_id')->nullable();
            $table->string('text')->nullable();
            $table->foreign('surveys_users_id')->references('id')->on('surveys_users')->onDelete('cascade');
            $table->foreign('survey_question_id')->references('id')->on('survey_questions')->onDelete('cascade');
            $table->foreign('survey_question_option_id')->references('id')->on('survey_question_options')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('survey_responses');
    }
};
