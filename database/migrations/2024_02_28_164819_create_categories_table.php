<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id(); 
            $table->string('libelle'); // Libellé avec contrainte unique pour empêcher les doublons
            $table->string('categorie_code')->unique(); // Code catégorie avec contrainte unique
            $table->text('description')->nullable(); // Description optionnelle
            $table->timestamps(); // Champs horodatés de création et de mise à jour
        });

    }

    public function down(): void
    {

        Schema::dropIfExists('categories'); // Supprimer la table catégories
    }
};