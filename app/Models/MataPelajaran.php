<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MataPelajaran extends Model
{
    use HasFactory;

    protected $table = 'mata_pelajaran';
    protected $fillable = [
        'nama_pelajaran',
        'kkm'
    ];

    public function jadwalPelajarans() {
        return $this->hasMany(JadwalPelajaran::class, 'id_matpel');
    }
}
