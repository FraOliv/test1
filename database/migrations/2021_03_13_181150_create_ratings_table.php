<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ratings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('nome_utente', '80')->nullable();
            $table->string('data', '20');
            $table->text('body');
            //non sapevo se mettere direttamente qui il required
            $table->integer('voto');
            //forse qui da modificare per dare voto da 0 a 3

            //capire come inserire i cookie per non permettere all'utente non registrato di spammare recensioni.

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
        Schema::dropIfExists('ratings');
    }
}
