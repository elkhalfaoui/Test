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
        Schema::create('demande_comptes', function (Blueprint $table) {
            $table->id();
            $table->string("nom", 100);
            $table->string("prenom", 100);
            $table->string("email", 100);
            $table->string("telephone", 20);
            $table->tinyInteger("typeCompte");
            $table->string("ppr", 10);
            $table->string("etablissement", 20);
            $table->string("service", 50);
            $table->string("status", 20)->default("demande");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('demande_comptes');
    }
};
