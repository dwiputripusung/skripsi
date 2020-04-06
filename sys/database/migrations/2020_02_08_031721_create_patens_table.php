<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patens', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('jenis_hki', ['Nasional', 'Internasional'])->nullable();
            $table->string('no_sertifikat')->nullable();
            $table->string('almt_url')->nullable();
            $table->string('sertifikat')->nullable();
            $table->string('deskripsi_paten')->nullable();
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
        Schema::dropIfExists('patens');
    }
}
