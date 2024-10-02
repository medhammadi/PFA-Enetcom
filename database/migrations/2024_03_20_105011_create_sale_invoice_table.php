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


         Schema::table('sales', function (Blueprint $table) {
             $table->foreignIdFor(\App\Models\Invoice::class)->constrained()->cascadeOnDelete();
         });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
         Schema::table('sales', function (Blueprint $table) {
             $table->dropForeign('sales_invoice_id_foreign'); // Supprimer la contrainte de clé étrangère
         });
        
    }
};