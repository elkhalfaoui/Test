<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('module_stagiaire', function (Blueprint $table) {
            
            $table->bigInteger('module_id')->unsigned();
            $table->bigInteger('stagiaire_id')->unsigned();
            $table->primary('module_id', 'stagiaire_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('module_stagiaire');
    }
};
