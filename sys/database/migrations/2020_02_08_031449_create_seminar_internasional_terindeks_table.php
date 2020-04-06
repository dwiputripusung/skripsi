<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeminarInternasionalTerindeksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seminar_internasional_terindeks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_seminar')->nullable();
            $table->string('tmpt_seminar')->nullable();
            $table->string('penyelenggara')->nullable();
            $table->string('almt_url')->nullable();
            $table->string('artikel')->nullable();
            $table->string('cover_depan_prosiding')->nullable();
            $table->string('daftar_isi_prosiding')->nullable();
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
        Schema::dropIfExists('seminar_internasional_terindeks');
    }
}
