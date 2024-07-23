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
        Schema::create('activity_log', function (Blueprint $table) {
            $table->id();
            $table->dateTime('date');
            $table->unsignedBigInteger('editor_id');
            $table->enum('scope_id', ['users', 'settings']);
            $table->enum('action', ['list', 'create', 'edit', 'delete', 'pushed', 'enable', 'disable', 'csv_export', 'view_answers', 'view_history']);
            $table->unsignedBigInteger('entity_id')->nullable();
            $table->string('ip_address');
            $table->foreign('editor_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activity_log');
    }
};
