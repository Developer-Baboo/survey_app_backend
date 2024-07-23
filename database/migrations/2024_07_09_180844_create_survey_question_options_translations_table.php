<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('survey_question_options_translations', function (Blueprint $table) {
            $table->unsignedBigInteger('survey_question_option_id');
            $table->unsignedBigInteger('language_id');
            $table->string('text');
            $table->timestamps();

            // Define a custom name for the foreign key constraint
            $table->foreign('survey_question_option_id')
                ->references('id')
                ->on('survey_question_options')
                ->onDelete('cascade')
                ->name('sqo_translations_sqo_id_foreign'); // Custom foreign key constraint name

            $table->foreign('language_id')
                ->references('id')
                ->on('languages')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('survey_question_options_translations');
    }
};
