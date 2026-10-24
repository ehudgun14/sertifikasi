<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GajiPegawai extends Model
{
    use HasFactory;
    protected $fillable = [
        'nomerinduk',
        'nama',
        'jk',
        'alamat',
        'telp',
        'gajipokok',
        'simkoperasi',
        'dansos',
        'tunjangankerja',
        'hadir',
        'jam'
    ];
}
