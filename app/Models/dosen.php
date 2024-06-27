<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dosen extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nama',
        'nip',
        'no_telp',
        'email',
        'foto',
    ];
    public function tugasAkhir()
    {
        return $this->hasMany(TugasAkhir::class, 'dosen_pembimbing', 'nama'); // Specify foreign key on Dosen model
    }
}
