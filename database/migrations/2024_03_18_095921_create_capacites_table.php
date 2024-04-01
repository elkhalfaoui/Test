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
        Schema::create('capacites', function (Blueprint $table) {
            $table->id();
            $table->string('etablissement');
            $table->string('service');
            $table->string('filiere');
            $table->string('niveau_etudes');
            $table->bigInteger('capaciteP1');
            $table->bigInteger('capaciteP2');
            $table->bigInteger('capaciteP3');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('capacites');
    }
};
