<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jadwal extends Model
{
    use HasFactory;

    protected $table = 'jadwals';

    protected $fillable = [
        'id_tugasakhir',
        'id_ruang',
        'tanggal',
        'waktu',
    ];

    // Relationships (optional)
    public function tugasAkhir()
    {
        return $this->belongsTo(TugasAkhir::class, 'id_tugasakhir');
    }

    public function ruang()
    {
        return $this->belongsTo(ruangan::class, 'id_ruang');
    }
}
