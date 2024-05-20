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
        return $this->belongsTo(Kelas::class, 'id_kelas');
    }

    protected static function boot()
    {
        parent::boot();

        // Event listener untuk event created
        static::created(function ($siswa) {
            // Membuat user baru berdasarkan data siswa yang baru dibuat
            User::create([
                'name' => $siswa->nama_siswa,
                'email' => $siswa->email,
                'password' => $siswa->password,
            ]);
        });
    }
}
