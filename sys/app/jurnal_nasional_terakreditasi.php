<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jurnal_nasional_terakreditasi extends Model
{
    protected $fillable = ['nama_jurnal', 'bahasa_jurnal', 'akreditasi', 'almt_url', 'status_doaj', 'artikel', 'cover_depan', 'daftar_isi', 'lain_lain', 'kewajiban_khususes_id'];

    public function kewajiban_khusus()
    {
        return $this->belongsTo(Kewajiban_khusus::class, 'kewajiban_khususes_id');
    }

    public function dosen()
    {
        return $this->hasMany(Dosen::class, 'jurnal_nasional_terakreditasi_id');
    }
}
