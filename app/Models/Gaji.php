<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gaji extends Model
{
    use HasFactory;
    protected $fillable = [
        'email',
        'nomor',
        'nama',
        'jabatan',
        'gaji_pokok',
        'penyesuaian',
        'penyesuaian_pendidikan',
        'gaji_pokok2',
        'tunjangan_jabatan',
        'tunjangan_kepangkatan',
        'tunjangan_transport',
        'kelebihan_jam',
        'rapelan',
        'gaji_bruto',
        'dplk',
        'potongan_bpjs_kes',
        'potongan_bpjs_jht',
        'potongan_bpjs_pensiun',
        'piutang_karyawan',
        'piutang_karyawan_koperasi',
        'simpanan_pokok',
        'potongan_pajak',
        'potongan_arisan',
        'take_home_pay'
    ];
}




