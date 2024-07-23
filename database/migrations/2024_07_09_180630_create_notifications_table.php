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
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('targeted_user_id');
            $table->unsignedBigInteger('target_entity_id');
            $table->enum('type', ['wallet_withdrawal_request', 'new_survey_availabile', 'max_invites_reached']);
            $table->dateTime('viewed_at')->nullable();
            $table->dateTime('opened_at')->nullable();
            $table->foreign('targeted_user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
