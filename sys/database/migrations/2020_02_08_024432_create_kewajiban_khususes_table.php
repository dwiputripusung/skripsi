<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKewajibanKhususesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kewajiban_khususes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('periode')->nullable();
            $table->integer('tahun')->nullable();
            $table->string('judul_karya')->nullable();
            $table->enum('jenis_karya', ['Jurnal Internasional Bereputasi', 'Jurnal Internasional', 'Seminar Internasional Terindeks', 'Jurnal Nasional Terakreditasi', 'Jurnal Nasional', 'Paten', 'Karya Monumental'])->nullable();
            $table->enum('status', ['Belum diperiksa', 'Terima', 'Tolak'])->default('Belum diperiksa');
            $table->string('komen')->nullable();
            $table->integer('dosen_id')->unsigned()->nullable();
            $table->foreign('dosen_id')->references('id')->on('dosens')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('kewajiban_khususes');
    }
}
