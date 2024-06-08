<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiPelajaran extends Model
{
    use HasFactory;

    protected $table = 'nilai_pelajaran';
    protected $fillable = [
        'id_guru',
        'id_siswa',
        'id_matpel',
        'uts',
        'uas',
        'nilai',
    ];

    public function guru()
    {
        return $this->belongsTo(Guru::class, 'id_guru');
    }

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'id_siswa');
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas');
    }
    public function mataPelajaran()
    {
        return $this->belongsTo(MataPelajaran::class, 'id_matpel');
    }
}
