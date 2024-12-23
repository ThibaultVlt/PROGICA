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
        Schema::create('gites', function (Blueprint $table) {
            $table->id();
            $table->string('title'); //nom du Gite
            $table->longText('description'); //description du gite
            $table->integer('surface'); //surface
            $table->integer('bedrooms'); //nb de chambres
            $table->integer('bed'); //nb de couchage
            $table->boolean('pets'); //animaux de compagnie O/N
            $table->boolean('dishwasher'); //lave vaisselle O/N
            $table->boolean('washing_machine'); //lave linge O/N
            $table->boolean('air_conditioning'); //climatisation O/N
            $table->boolean('tv'); //télévision O/N
            $table->boolean('terrace'); //télévision O/N
            $table->boolean('barbecue'); //barbecue O/N
            $table->boolean('private_pool'); //piscine privée O/N
            $table->boolean('shared_pool'); //piscine partagée O/N
            $table->boolean('tennis'); //tennis O/N
            $table->boolean('tennis_table'); //ping pong O/N
            $table->boolean('end_cleaning'); //ménage fin de séjour O/N
            $table->boolean('linen_rental'); //location de linge O/N
            $table->boolean('internet'); //accès internet O/N
            $table->integer('price'); // prix
            $table->foreignId('ville_id')->constrained('villes')->onDelete('cascade'); // Relation avec la ville
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gites');
    }
};
