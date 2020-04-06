<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJurnalNasionalTerakreditasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jurnal_nasional_terakreditasis', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_jurnal')->nullable();
            $table->enum('bahasa_jurnal', ['Indonesia', 'Arab', 'Inggris', 'Perancis', 'Rusia', 'Spanyol', 'Tiongkok'])->nullable();
            $table->enum('akreditasi', ['A', 'B'])->nullable();
            $table->string('almt_url')->nullable();
            $table->enum('status_doaj', ['Tidak Terindeks', 'Green Thick'])->nullable();
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
        Schema::dropIfExists('jurnal_nasional_terakreditasis');
    }
}
