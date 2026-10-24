<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GajiGuru extends Model
{
    use HasFactory;
    protected $fillable = [
        'tahunbulan',
        'guru_id',
        'gajipokok',
        'tunjanganjabatan',
        'tunjangankerja',
        'walikelas',
        'hadir',
        'jam',
        'status',
        'tgl_diberikan',
    ];
}
