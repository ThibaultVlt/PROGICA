<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Exécute la migration.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('owners', function (Blueprint $table) {
        $table->id();
        $table->string('first_name'); //Nom
        $table->string('last_name'); //Prénom
        $table->string('phone_number', 10)->unique(); //Numéro de téléphone limiter à 10 caractères
        $table->timestamps();
    });

        // Ajouter la colonne owner_id dans la table gites
        Schema::table('gites', function (Blueprint $table) {
            $table->foreignId('owner_id')->nullable()->constrained('owners')->onDelete('set null');
        });
    }

    /**
     * Annule la migration.
     *
     * @return void
     */
    public function down()
    {
        // Supprimer la colonne owner_id dans la table gites
        Schema::table('gites', function (Blueprint $table) {
            $table->dropForeign(['owner_id']);
            $table->dropColumn('owner_id');
        });

        Schema::dropIfExists('owners');
    }
};
