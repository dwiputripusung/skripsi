<?php

namespace App;
 
use Illuminate\Database\Eloquent\Model;

class Asesor extends Model
{
    protected $fillable = ['dosen_id', 'asesor1_id', 'asesor2_id'];

    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'dosen_id');
    }

    public function asesor1()
    {
        return $this->belongsTo(Dosen::class, 'asesor1_id');
    }

    public function asesor2()
    {
        return $this->belongsTo(Dosen::class, 'asesor2_id');
    }
}
