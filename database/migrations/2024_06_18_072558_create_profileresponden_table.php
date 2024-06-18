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
        Schema::create('profileresponden', function (Blueprint $table) {
            $table->integer('ProfileRespondenId', true);
            $table->text('NamaPerusahaanInstansiPerorangan')->nullable();
            $table->text('Alamat')->nullable();
            $table->text('Pekerjaan')->nullable();
            $table->text('NomorTelepon')->nullable();
            $table->integer('Umur')->nullable();
            $table->text('Agama')->nullable();
            $table->text('JenisKelamin')->nullable();
            $table->text('StatusResponden')->nullable();
            $table->text('PendidikanTerakhir')->nullable();
            $table->text('KritikSaran')->nullable();
            $table->timestamp('ProfileRespondenCreatedAt')->nullable();
            $table->timestamp('ProfileRespondenUpdatedAt')->nullable();
            $table->timestamp('ProfileRespondenDeletedAt')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profileresponden');
    }
};
