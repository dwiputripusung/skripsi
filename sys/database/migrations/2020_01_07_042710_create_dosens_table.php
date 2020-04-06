<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDosensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dosens', function (Blueprint $table) {
            $table->increments('id');
            $table->string('no_sertifikat')->nullable();
            $table->string('no_sertifikat_upload')->nullable();
            $table->string('nip')->nullable();
            $table->string('nidn')->nullable();
            $table->string('nira')->nullable();
            $table->string('nama')->nullable();
            $table->string('gelar_depan')->nullable();
            $table->string('gelar_belakang')->nullable();
            $table->string('pt')->nullable();
            $table->string('alamat_pt')->nullable();
            $table->string('nama_rektor')->nullable();
            $table->string('nama_dekan')->nullable();
            $table->string('nama_kajur')->nullable();
            $table->enum('jab_fungsional', ['Asisten Ahli', 'Lektor', 'Lektor Kepala', 'Profesor'])->nullable();
            $table->enum('golongan', ['III.b', 'III.c', 'III.d', 'IV.a', 'IV.b', 'IV.c', 'IV.d'])->nullable();
            $table->string('tgl_lhr')->nullable();
            $table->string('tmpt_lhr')->nullable();
            $table->string('pend_s1')->nullable();
            $table->string('ijazah_s1')->nullable();
            $table->string('pend_s2')->nullable();
            $table->string('ijazah_s2')->nullable();
            $table->string('pend_s3')->nullable();
            $table->string('ijazah_s3')->nullable();
            $table->enum('jenis_dosen', ['Dosen Biasa', 'Profesor', 'Dosen Dengan Tugas Tambahan', 'Profesor Dengan Tugas Tambahan'])->nullable();
            $table->string('bid_ilmu')->nullable();
            $table->string('no_hp')->nullable();
            $table->string('thn_akademik')->nullable();
            $table->enum('semester', ['Ganjil', 'Genap'])->nullable();
            $table->string('email')->nullable();
            $table->string('ktp')->nullable();
            $table->string('foto')->nullable();
            $table->string('password');
            $table->enum('level', ['0', '1'])->default('0'); // 0 Dosen,  1 Asesor
            $table->integer('jurusan_id')->unsigned()->nullable();
            $table->foreign('jurusan_id')->references('id')->on('jurusans')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('dosens');
    }
}
