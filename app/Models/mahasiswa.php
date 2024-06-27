<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mahasiswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'nim',
        'prodi',
        'foto',
    ];

    public function tugasAkhir()
    {
        return $this->hasMany(TugasAkhir::class, 'id_mahasiswa','nama');
    }
}
