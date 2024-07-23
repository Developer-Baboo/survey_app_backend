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
        Schema::create('surveys', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['profile', 'survey']);
            $table->string('name');
            $table->integer('order')->nullable();
            $table->decimal('full_reward', 8, 2);
            $table->integer('timer_hours')->nullable();
            $table->decimal('reduced_reward', 8, 2);
            $table->dateTime('expiry')->nullable();
            $table->boolean('status');
            $table->dateTime('pushed_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surveys');
    }
};
