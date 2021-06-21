<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;
    protected $fillable = [
        'nim', 'nama', 'jurusan_id', 'prodi_id'
    ];

    public function jurusan()
    {
        return $this->belongsTo('App\Models\Jurusan');
    }

    public function prodi()
    {
        return $this->belongsTo('App\Models\Prodi');
    }
}