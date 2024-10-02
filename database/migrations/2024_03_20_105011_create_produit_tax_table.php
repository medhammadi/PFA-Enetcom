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


         Schema::table('products', function (Blueprint $table) {
             $table->foreignIdFor(\App\Models\Tax::class)->constrained()->cascadeOnDelete();
         });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
         Schema::table('products', function (Blueprint $table) {
             $table->dropForeign('produits_tax_id_foreign'); // Supprimer la contrainte de clé étrangère
         });
        
    }
};