<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $table = 'siswa';
    protected $fillable = [
        'nis',
        'nama_siswa',
        'id_kelas',
        'jenis_kelamin',
        'alamat',
        'no_telepon',
        'email',
        'password',
    ];

    public function kelas() {
        return $this->belongsTo(Kelas::class);
    }
}
