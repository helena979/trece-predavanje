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
                $table->id();
                $table->unsignedBigInteger('pismo_id');
                $table->unsignedBigInteger('format_id');
                $table->unsignedBigInteger('jezik_id');
                $table->unsignedBigInteger('povez_id');
                $table->unsignedBigInteger('izdavac_id');
                $table->string('naslov');
                $table->string('sadrzaj',2048);
                $table->string('ISBN',20);
                $table->integer('brojstrana');
                $table->integer('ukupnoprimjeraka');
                $table->integer('izdatoprimjeraka');
                $table->integer('rezervisanoprimjeraka');
                $table->date('datumizdavanja');
                $table->foreign('pismo_id')->references('id')->on('pismos')->onDelete('cascade');
                $table->foreign('format_id')->references('id')->on('formats')->onDelete('cascade');
                $table->foreign('jezik_id')->references('id')->on('jeziks')->onDelete('cascade');
                $table->foreign('povez_id')->references('id')->on('povezs')->onDelete('cascade');
                $table->foreign('izdavac_id')->references('id')->on('izdavacs')->onDelete('cascade');
    
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
