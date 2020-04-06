<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKaryaMonumentalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('karya_monumentals', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('lingkup_kegiatan', ['Nasional', 'Internasional'])->nullable();
            $table->string('tempat_publikasi')->nullable();
            $table->string('bukti_karya')->nullable();
            $table->string('peer_reviewer')->nullable();
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
        Schema::dropIfExists('karya_monumentals');
    }
}
