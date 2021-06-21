<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    use HasFactory;
    protected $table = "nilais";
    protected $fillable = [
        'mahasiswa_id',
        'matakuliah_id',
        'nilai'
    ];
    public function mahasiswa()
    {
        return $this->belongsTo('App\Models\Mahasiswa');
    }

    public function matakuliah()
    {
        return $this->belongsTo('App\Models\Matakuliah');
    }
}