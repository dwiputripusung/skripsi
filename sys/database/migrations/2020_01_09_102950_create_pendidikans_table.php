<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePendidikansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendidikans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_kegiatan');
            $table->enum('jenis_kegiatan', ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L']);
            $table->string('buktipenugasan_bebankerja');
            $table->string('buktipenugasan_bebankerja_ket');
            $table->float('sks_bebankerja');
            $table->string('masa_penugasan');
            $table->string('buktidokumen_kinerja');
            $table->string('buktidokumen_kinerja_ket');
            $table->float('sks_kinerja');
            $table->enum('rekomendasi', ['Selesai', 'Lanjutkan', 'Gagal', 'Lainnya', 'Beban Lebih']);
            $table->enum('status1_bk', ['Belum diperiksa', 'Terima', 'Tolak'])->default('Belum diperiksa');
            $table->string('komen1_bk')->nullable();
            $table->enum('status2_bk', ['Belum diperiksa', 'Terima', 'Tolak'])->default('Belum diperiksa');
            $table->string('komen2_bk')->nullable();
            $table->enum('status1_k', ['Belum diperiksa', 'Terima', 'Tolak'])->default('Belum diperiksa');
            $table->string('komen1_k')->nullable();
            $table->enum('status2_k', ['Belum diperiksa', 'Terima', 'Tolak'])->default('Belum diperiksa');
            $table->string('komen2_k')->nullable();
            $table->integer('dosen_id')->unsigned();
            $table->foreign('dosen_id')->references('id')->on('dosens')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('asesor1_id')->unsigned()->nullable();
            $table->foreign('asesor1_id')->references('id')->on('dosens')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('asesor2_id')->unsigned()->nullable();
            $table->foreign('asesor2_id')->references('id')->on('dosens')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('pendidikans');
    }
}
