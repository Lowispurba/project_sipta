<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class penilaian extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_tugasakhir',
        'dosen_penguji',
        'nilai',
        'komentar',
    ];

    public function tugasAkhir()
    {
        return $this->belongsTo(TugasAkhir::class, 'id_tugasakhir');
    }

    public function dosenPenguji()
    {
        return $this->belongsTo(dosen::class, 'dosen_penguji');
    }
}
