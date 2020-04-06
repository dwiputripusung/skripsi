<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class seminar_internasional_terindeks extends Model
{
    protected $fillable = ['nama_seminar', 'tmpt_seminar', 'penyelenggara', 'almt_url', 'artikel', 'cover_depan_prosiding', 'daftar_isi_prosiding', 'lain_lain', 'kewajiban_khususes_id'];

    public function kewajiban_khusus()
    {
        return $this->belongsTo(Kewajiban_khusus::class, 'kewajiban_khususes_id');
    }

    public function dosen()
    {
        return $this->hasMany(Dosen::class, 'seminar_internasional_terindeks_id');
    }
}
