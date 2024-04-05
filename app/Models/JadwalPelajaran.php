<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalPelajaran extends Model
{
    use HasFactory;

    protected $table = 'jadwal_pelajaran';
    protected $fillable = [
        'id_kelas',
        'id_matpel',
        'id_guru',
        'hari',
        'jam_mulai',
        'jam_selesai',
    ];

    public function kelas() {
        return $this->belongsTo(Kelas::class, 'id_kelas');
    }

    public function matpel() {
        return $this->belongsTo(MataPelajaran::class, 'id_matpel');
    }
    
    public function guru() {
        return $this->belongsTo(Guru::class, 'id_guru');
    }
}
