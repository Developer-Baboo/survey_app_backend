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
        Schema::create('withdrawal_request_status_history', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('withdrawal_request_id');
            $table->unsignedBigInteger('editor_id');
            $table->enum('status', ['pending', 'approved', 'rejected', 'completed', 'failed']);
            $table->dateTime('date');
            $table->string('note');

            $table->foreign('withdrawal_request_id')->references('id')->on('withdrawal_requests')->onDelete('cascade');
            $table->foreign('editor_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('withdrawal_request_status_history');
    }
};
