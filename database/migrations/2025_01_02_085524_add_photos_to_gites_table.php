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
        Schema::table('gites', function (Blueprint $table) {
          $table->json('photos')->nullable(); //Stockage des photos en JSON ajouter à la table gites
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('gites', function (Blueprint $table) {
            //
        });
    }
};
