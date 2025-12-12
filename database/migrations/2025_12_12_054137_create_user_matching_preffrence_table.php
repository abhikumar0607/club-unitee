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
        Schema::create('user_matching_preffrence', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('play_style')->nullable();
            $table->string('travel_radius')->nullable();
            $table->string('handicafe_prefernce')->nullable();
            $table->string('fitness_level_prefernce')->nullable();
            $table->string('availability_prefernce')->nullable();
            $table->string('looking_for_prefernce')->nullable();
            $table->string('skill_level_prefernce')->nullable();
            $table->string('course_play_prefernce')->nullable();
            $table->string('intrest_prefrence')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_matching_preffrence');
    }
};
