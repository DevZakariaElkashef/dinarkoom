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
        Schema::table('settings', function (Blueprint $table) {
            $table->string('facebook_icone')->nullable();
            $table->string('whatsapp_icone')->nullable();
            $table->string('youtube_icone')->nullable();
            $table->string('twitter_icone')->nullable();
            $table->string('linkedin_icone')->nullable();
            $table->string('pinterest_icone')->nullable();
            $table->string('instagram_icone')->nullable();
            $table->string('snapchat_icone')->nullable();
            $table->string('tiktok_icone')->nullable();
            $table->string('home_gif_images')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('settings', function (Blueprint $table) {
            //
        });
    }
};
