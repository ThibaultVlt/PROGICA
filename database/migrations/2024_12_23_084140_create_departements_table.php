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
        Schema::create('departements', function (Blueprint $table) {
          $table->id();
          $table->string('name'); // Nom du département
          $table->string('code'); // Code du département (par ex. 27 pour Eure)
          $table->foreignId('region_id')->constrained('regions')->onDelete('cascade'); // Relation avec la région
          $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('departements');
    }
};
