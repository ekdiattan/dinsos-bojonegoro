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
        Schema::table('profileresponden', function (Blueprint $table) 
        {
            $table->string('Umur', 10)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        try
        {
            Schema::table('profileresponden', function (Blueprint $table) 
            {
                $table->string('Umur', 20)->change();
            });

        }
        catch (Exception $e){
            throw $e;
        }
    }
};
