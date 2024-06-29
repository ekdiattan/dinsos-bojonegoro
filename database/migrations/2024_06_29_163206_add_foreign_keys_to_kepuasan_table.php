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
        Schema::table('kepuasan', function (Blueprint $table) {
            $table->foreign(['KepuasanProfileRespondenId'], 'kepuasan_ibfk_1')->references(['ProfileRespondenId'])->on('profileresponden')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('kepuasan', function (Blueprint $table) {
            $table->dropForeign('kepuasan_ibfk_1');
        });
    }
};
