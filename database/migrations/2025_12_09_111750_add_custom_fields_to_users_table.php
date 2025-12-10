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
        Schema::table('users', function (Blueprint $table) {
            $table->string('profession')->nullable();
            $table->string('organization')->nullable();
            $table->text('bio')->nullable();
            $table->string('referral_source')->nullable();
            $table->string('linkedin_url')->nullable();
            $table->string('instagram_handle')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'profession',
                'organization',
                'bio',
                'referral_source',
                'linkedin_url',
                'instagram_handle',
            ]);
        });
    }
};
