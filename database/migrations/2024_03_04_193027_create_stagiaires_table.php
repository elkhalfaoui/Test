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
        Schema::create('stagiaires', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->string('email');
            $table->string('telephone');
            $table->string('etablissement');
            $table->string('service');
            $table->date('date_debut');
            $table->date('date_fin');
            $table->string('sujet');
            $table->string('etablissement_origine');
            $table->string('niveau_etudes');
            $table->string('status');
            $table->string('image')->nullable(true);
            $table->string('type_stage');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stagiaires');
    }
};
