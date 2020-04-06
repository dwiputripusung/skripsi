<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class paten extends Model
{
    protected $fillable = ['jenis_hki', 'no_sertifikat', 'almt_url', 'sertifikat', 'deskripsi_paten', 'lain_lain', 'kewajiban_khususes_id'];

    public function kewajiban_khusus()
    {
        return $this->belongsTo(Kewajiban_khusus::class, 'kewajiban_khususes_id');
    }

    public function dosen()
    {
        return $this->hasMany(Dosen::class, 'paten_id');
    }
}
