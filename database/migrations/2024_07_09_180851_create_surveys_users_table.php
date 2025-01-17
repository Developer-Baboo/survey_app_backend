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
        Schema::create('surveys_users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('surveyee_id');
            $table->unsignedBigInteger('survey_id');
            $table->foreign('surveyee_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('survey_id')->references('id')->on('surveys')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surveys_users');
    }
};
