<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiPelajaran extends Model
{
    use HasFactory;

    protected $table = 'nilai_pelajaran';
    protected $fillable = [
        'id_siswa',
        'id_matpel',
        'nilai',
    ];
}
