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
        Schema::table('contact_us', function (Blueprint $table) {
            $table->unsignedBigInteger('replay_id')->nullable();
            $table->foreign('replay_id')->references('id')->on('contact_us')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('contact_us', function (Blueprint $table) {
            $table->dropForeign(['replay_id']);
            $table->dropColumn('replay_id');
        });
    }
};
