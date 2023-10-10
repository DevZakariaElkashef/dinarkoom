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
            $table->longText('welcome_en')->nullable();
            $table->longText('welcome_ar')->nullable();
            $table->longText('welcome_ur')->nullable();
            $table->longText('welcome_fil')->nullable();
            $table->integer('logout_time');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->dropColumn('welcome_en');
            $table->dropColumn('welcome_ar');
            $table->dropColumn('welcome_ur');
            $table->dropColumn('welcome_fil');
            $table->dropColumn('logout_time');
        });
    }
};
