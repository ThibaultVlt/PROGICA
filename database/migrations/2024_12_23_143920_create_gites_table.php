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
            $table->boolean('pets')->default(false)->change(); //animaux de compagnie O/N
            $table->boolean('dishwasher')->default(false)->change(); //lave vaisselle O/N
            $table->boolean('washing_machine')->default(false)->change(); //lave linge O/N
            $table->boolean('air_conditioning')->default(false)->change(); //climatisation O/N
            $table->boolean('tv')->default(false)->change(); //télévision O/N
            $table->boolean('terrace')->default(false)->change(); //télévision O/N
            $table->boolean('barbecue')->default(false)->change(); //barbecue O/N
            $table->boolean('private_pool')->default(false)->change(); //piscine privée O/N
            $table->boolean('shared_pool')->default(false)->change(); //piscine partagée O/N
            $table->boolean('tennis')->default(false)->change(); //tennis O/N
            $table->boolean('tennis_table')->default(false)->change(); //ping pong O/N
            $table->boolean('end_cleaning')->default(false)->change(); //ménage fin de séjour O/N
            $table->boolean('linen_rental')->default(false)->change(); //location de linge O/N
            $table->boolean('internet')->default(false)->change(); //accès internet O/N
            $table->integer('price'); // prix
            $table->foreignId('ville_id')->constrained('villes')->onDelete('cascade');
            $table->foreignId('owner_id')->constrained('owners')->onDelete('cascade');
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
