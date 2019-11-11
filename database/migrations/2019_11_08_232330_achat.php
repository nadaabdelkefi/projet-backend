<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Achat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Achat', function (Blueprint $table) {
            $table->bigIncrements('achat_id');
            $table->integer('user_id')->unsigned()->unique();
            $table->foreign('user_id')->references('user_id')->on('User')->onDelete('cascade');
            $table->integer('produit_id')->unsigned()->unique();
            $table->foreign('produit_id')->references('produit_id')->on('Produit')->onDelete('cascade');
            $table->integer('quantite');
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
        //
    }
}
