<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fakultas extends Model
{
    protected $fillable = ['nama'];

    public function jurusan()
    {
        return $this->hasMany(Jurusan::class, 'fakultas_id');
    }
}
