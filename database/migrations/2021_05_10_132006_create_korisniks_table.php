<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKorisniksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('korisniks', function (Blueprint $table) {
            $table->id();
            $table->string('ImePrezime');
            $table->string('Email')->unique();
            $table->string('JMBG')->nullable();
            $table->string('KorisnickoIme')->nullable();
            $table->string('Sifra')->nullable();
            $table->string('Foto')->nullable();
            $table->foreignId('tipkorisnika_id')->constrained('tipkorisnikas');                
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
        Schema::dropIfExists('korisniks');
    }
}
