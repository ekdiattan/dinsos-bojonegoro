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
        Schema::create('pertanyaan', function (Blueprint $table) {
            $table->integer('PertanyaanId', true);
            $table->text('Pertanyaan')->nullable();
            $table->timestamp('PertanyaanCreatedAt')->nullable();
            $table->timestamp('PertanyaanUpdatedAt')->nullable();
            $table->timestamp('PertanyaanDeletedAt')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pertanyaan');
    }
};
