<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dokumen extends Model
{
    use HasFactory;

    protected $table = 'dokumens';

    protected $fillable = [
        'id_tugasakhir',
        'nama',
        'lokasi',
        'file',
    ];

    public function tugasAkhir()
    {
        return $this->belongsTo(TugasAkhir::class, 'id_tugasakhir');
    }
}
