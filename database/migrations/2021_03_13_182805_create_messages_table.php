<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('nome_paziente', '80')->nullable();
            $table->text('testo_messaggio');
            $table->text('email');
            //non sono riuscito a settare unique la mail, mi dava questo errore: Syntax error or access violation: 1170 BLOB/TEXT column 'email' used in key specification without a key length.
        
            $table->string('cellulare', '20')->nullable();
            $table->string('nome_utente', '80')->nullable();
            $table->boolean('disabilità');
            //da verificare se usare boolean o altro



            
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
        Schema::dropIfExists('messages');
    }
}
