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
        return $this->belongsTo(Jurusan::class);
    }
}
