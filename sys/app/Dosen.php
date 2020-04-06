<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Dosen extends Authenticatable
{
    protected $fillable = ['no_sertifikat', 'no_sertifikat_bukti', 'nip', 'nidn', 'nira', 'nama', 'gelar_depan', 'gelar_belakang', 'pt', 'alamat_pt', 'nama_rektor', 'nama_dekan', 'nama_kajur', 'jab_fungsional', 'golongan', 'tgl_lhr', 'tmpt_lhr', 'pend_s1', 'ijazah_s1', 'pend_s2', 'ijazah_s2', 'pend_s3', 'ijazah_s3', 'jenis_dosen', 'bid_ilmu', 'no_hp', 'thn_akademik', 'semester', 'email', 'ktp', 'foto', 'password', 'level', 'jurusan_id'];

    protected $hidden = ['password'];

    public function getCreatedAttribute()
    {
        return \Carbon\Carbon::parse($this->attributes['tgl_lhr'])->format('d-M-Y');
    }

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'jurusan_id');
    }

    public function pendidikan()
    {
        return $this->hasMany(Pendidikan::class, 'dosen_id');
    }

    public function penelitian()
    {
        return $this->hasMany(Penelitian::class, 'dosen_id');
    }

    public function pengabdian()
    {
        return $this->hasMany(Pengabdian::class, 'dosen_id');
    }

    public function penunjang()
    {
        return $this->hasMany(Penunjang::class, 'dosen_id');
    }

    

    public function dosen()
    {
        return $this->hasOne(Asesor::class, 'dosen_id');
    }

    public function asesor1()
    {
        return $this->hasOne(Asesor::class, 'asesor1_id');
    }

    public function asesor2()
    {
        return $this->hasOne(Asesor::class, 'asesor2_id');
    }

}
