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
        Schema::create('nilai', function (Blueprint $table) {
            $table->integer('NilaiId', true);
            $table->integer('NilaiRespondenId')->nullable()->index('nilai_ibfk_2');
            $table->integer('NilaiPertanyaanId')->nullable()->index('nilaipertanyaanid');
            $table->integer('NilaiSangatBaik')->nullable();
            $table->integer('NilaiBaik')->nullable();
            $table->integer('NilaiKurangBaik')->nullable();
            $table->integer('NilaiTidakBaik')->nullable();
            $table->timestamp('NilaiCreatedAt')->nullable();
            $table->timestamp('NilaiUpdatedAt')->nullable();
            $table->timestamp('NilaiDeletedAt')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilai');
    }
};
