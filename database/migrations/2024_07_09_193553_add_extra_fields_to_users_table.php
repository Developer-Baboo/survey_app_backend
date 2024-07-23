<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddExtraFieldsToUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('first_name');
            $table->string('last_name');
            $table->boolean('approved')->default(false);
            $table->string('referral_link')->nullable();
            $table->integer('referral_share_count')->default(0);
            $table->unsignedBigInteger('current_survey_id')->nullable();
            $table->dateTime('current_survey_deadline')->nullable();
            $table->decimal('unlocked_amount', 8, 2)->nullable();
            $table->unsignedBigInteger('language_id');
            $table->text('city');
            $table->string('phone_number');
            $table->string('otp')->nullable();
            $table->dateTime('otp_expiry')->nullable();
            $table->string('email')->change(); // Change email column to be unique if it's not already
            $table->enum('provider', ['facebook', 'google'])->nullable();
            $table->foreign('language_id')->references('id')->on('languages')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('first_name');
            $table->dropColumn('last_name');
            $table->dropColumn('approved');
            $table->dropColumn('referral_link');
            $table->dropColumn('referral_share_count');
            $table->dropColumn('current_survey_id');
            $table->dropColumn('current_survey_deadline');
            $table->dropColumn('unlocked_amount');
            $table->dropForeign(['language_id']);
            $table->dropColumn('language_id');
            $table->dropColumn('city');
            $table->dropColumn('phone_number');
            $table->dropColumn('otp');
            $table->dropColumn('otp_expiry');
            $table->dropColumn('provider');
        });
    }
}
