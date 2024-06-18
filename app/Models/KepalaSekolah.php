<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KepalaSekolah extends Model
{
    use HasFactory;

    protected $table = 'kepala_sekolah';
    protected $fillable = [
        'nip',
        'nama',
        'jenis_kelamin',
        'alamat',
        'no_telepon',
        'email',
        'password',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    protected static function boot()
    {
        parent::boot();

        // Event listener untuk event created
        static::created(function ($kepsek) {
            // Membuat user baru berdasarkan data guru yang baru dibuat
            $user = User::create([
                'name' => $kepsek->nama,
                'email' => $kepsek->email,
                'password' => $kepsek->password,
            ]);
            
            if ($user) {
                $user->assignRole('kepala sekolah');
                $kepsek->user_id = $user->id; 
                $kepsek->save();
            }
        });
    }
}
