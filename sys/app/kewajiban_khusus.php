<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kewajiban_khusus extends Model
{
    protected $fillable = ['periode', 'tahun', 'judul_karya', 'jenis_karya', 'status', 'komen', 'dosen_id'];

    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'dosen_id');
    }
}
