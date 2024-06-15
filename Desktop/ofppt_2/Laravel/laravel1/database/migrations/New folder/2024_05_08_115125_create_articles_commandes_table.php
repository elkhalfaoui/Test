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
        Schema::create('articles_commandes', function (Blueprint $table) {
            $table->bigInteger('article_id')->unsigned();
            $table->bigInteger('commande_id')->unsigned();
            $table->integer('quantitec')->unsigned();
            $table->primary(['article_id', 'commande_id']);
            $table->foreign('article_id')->references('id')->on('articles');
            $table->foreign('commande_id')->references('id')->on('commandes');
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
        Schema::dropIfExists('articles_commandes');
    }
};
