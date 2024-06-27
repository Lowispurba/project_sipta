<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TugasAkhir extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_mahasiswa',
        'judul',
        'dosen_pembimbing',
        'tanggal',
        'status',
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(mahasiswa::class, 'id_mahasiswa','nama');
    }

    public function dosen()
    {
        return $this->belongsTo(dosen::class, 'dosen_pembimbing', 'nama'); // Specify foreign key on Dosen model
    }
    public function dokumen()
    {
        return $this->hasMany(dokumen::class, 'id_tugasakhir');
    }
}

