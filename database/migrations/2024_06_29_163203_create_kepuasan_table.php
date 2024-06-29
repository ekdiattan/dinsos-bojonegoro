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
        Schema::create('kepuasan', function (Blueprint $table) {
            $table->integer('KepuasanId', true);
            $table->integer('KepuasanSangatPuas')->nullable();
            $table->integer('KepuasanPuas')->nullable();
            $table->integer('KepuasanCukupPuas')->nullable();
            $table->integer('KepuasanTidakPuas')->nullable();
            $table->timestamp('KepuasanCreatedAt')->nullable();
            $table->timestamp('KepuasanUpdatedAt')->nullable();
            $table->timestamp('KepuasanDeletedAt')->nullable();
            $table->integer('KepuasanProfileRespondenId')->nullable()->index('kepuasanprofilerespondenid');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kepuasan');
    }
};
