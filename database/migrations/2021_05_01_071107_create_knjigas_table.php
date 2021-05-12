<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKnjigasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('knjigas', function (Blueprint $table) {
            $table->id('Id');
            $table->string('Naslov',256);
            $table->int('BrojStrana');
            $table->id('PismoId')->unique();
            $table->id('JezikId')->unique();
            $table->id('PovezId')->unique();
            $table->id('FormatId')->unique();
            $table->id('IzdavacId')->unique();
            $table->date('DatumIzdavanja');
            $table->string('ISBN',20);
            $table->int('UkupnoPrimjeraka');
            $table->int('IzdatoPrimjeraka');
            $table->int('RezervisanoPrimjeraka');
            $table->string('Sadrzaj',4128);
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
        Schema::dropIfExists('knjigas');
    }
}
