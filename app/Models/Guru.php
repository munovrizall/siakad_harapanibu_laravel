<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;

    protected $table = 'guru';
    protected $fillable = [
        'nip',
        'nama_guru',
        'jenis_kelamin',
        'alamat',
        'no_telepon',
        'email',
        'password',
    ];

    public function jadwalPelajaran()
    {
        return $this->hasMany(JadwalPelajaran::class, 'id_guru');
    }

    protected static function boot()
    {
        parent::boot();

        // Event listener untuk event created
        static::created(function ($guru) {
            // Membuat user baru berdasarkan data guru yang baru dibuat
            $user = User::create([
                'name' => $guru->nama_guru,
                'email' => $guru->email,
                'password' => $guru->password,
            ]);
            
            if ($user) {
                $user->assignRole('guru');
            }
        });
    }
}
