<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class karya_monumental extends Model
{
    protected $fillable = ['lingkup_kegiatan', 'tempat_publikasi', 'bukti_karya', 'peer_reviewer', 'lain_lain', 'kewajiban_khususes_id'];

    public function kewajiban_khusus()
    {
        return $this->belongsTo(Kewajiban_khusus::class, 'kewajiban_khususes_id');
    }

    public function dosen()
    {
        return $this->hasMany(Dosen::class, 'karya_monumental_id');
    }
}
