<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Jurusan;

class Kelas extends Model
{
    use HasFactory;

    protected $table = 'kelas';
    protected $fillable = [
        'nama_kelas',
        'id_jurusan',
        'kapasitas',
    ];

    public function jurusan() {
        return $this->belongsTo(Jurusan::class, 'id_jurusan');
    }

    public function siswa() {
        return $this->hasMany(Siswa::class, 'id_kelas');
    }

    public function jadwalPelajaran() {
        return $this->hasMany(JadwalPelajaran::class, 'id_kelas');
    }
}
