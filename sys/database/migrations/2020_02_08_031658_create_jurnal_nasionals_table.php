<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJurnalNasionalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jurnal_nasionals', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_jurnal')->nullable();
            $table->enum('terindeks', ['Sinta', 'Arjuna'])->nullable();
            $table->enum('standart_tatakelola', ['Q1', 'Q2', 'Q3', 'Q4', 'Q5','Q6'])->nullable();
            $table->string('almt_url')->nullable();
            $table->string('artikel')->nullable();
            $table->string('cover_depan')->nullable();
            $table->string('daftar_isi')->nullable();
            $table->string('lain_lain')->nullable();
            $table->integer('kewajiban_khususes_id')->unsigned()->nullable();
            $table->foreign('kewajiban_khususes_id')->references('id')->on('kewajiban_khususes')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('jurnal_nasionals');
    }
}
