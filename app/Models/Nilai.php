<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    use HasFactory;
    protected $fillable = [
        'kelas',
        'student',
        'nilai1',
        'nilai2',
        'nilai3',
        'nilaitotal'
    ];
}
