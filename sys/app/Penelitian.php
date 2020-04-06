<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penelitian extends Model
{
    protected $fillable = ['nama_kegiatan', 'jenis_kegiatan', 'buktipenugasan_bebankerja', 'buktipenugasan_bebankerja_ket', 'sks_bebankerja', 'masa_penugasan', 'buktidokumen_kinerja', 'buktidokumen_kinerja_ket', 'sks_kinerja', 'rekomendasi', 'status1_bk', 'komen1_bk', 'status2_bk', 'komen2_bk', 'status1_k', 'komen1_k', 'status2_k', 'komen2_k', 'dosen_id', 'asesor1_id', 'asesor2_id'];
    
    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'dosen_id');
    }
}