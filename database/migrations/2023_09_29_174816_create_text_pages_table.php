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
        Schema::create('text_pages', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('type')->comment('0 => aboutus - 1 => terms');
            $table->longText('content_ar');
            $table->longText('content_en');
            $table->longText('content_ur');
            $table->longText('content_fil');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('text_pages');
    }
};
