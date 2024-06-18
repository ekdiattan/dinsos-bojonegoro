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
        Schema::table('nilai', function (Blueprint $table) {
            $table->foreign(['NilaiPertanyaanId'], 'nilai_ibfk_1')->references(['PertanyaanId'])->on('pertanyaan')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['NilaiRespondenId'], 'nilai_ibfk_2')->references(['ProfileRespondenId'])->on('profileresponden')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('nilai', function (Blueprint $table) {
            $table->dropForeign('nilai_ibfk_1');
            $table->dropForeign('nilai_ibfk_2');
        });
    }
};
