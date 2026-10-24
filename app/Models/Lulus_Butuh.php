<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lulus_Butuh extends Model
{
    use HasFactory;
    protected $fillable = [
        'student',
        'serah_hardcopy',
        'validator_serah_hardcopy',
        'paraf_serah_hardcopy',
        'serah_cd_softcopy',
        'deskripsi_terima_bebas_perpustakaan',
        'terima_bebas_perpustakaan',
        'pembayaran_lunas_sidang_ulang',
        'validator_pembayaran_lunas_sidang_ulang',
        'deskripsi_terima_bebas_bakeu',
        'terima_bebas_bakeu',
        'penyelesaian_bebas_tanggungan',
        'validator_penyelesaian_bebas_tanggungan',
        'paraf_penyelesaian_bebas_tanggungan',
        'terima_lolos_akun_akses',
        'validator_terima_lolos_akun_akses',
        'paraf_terima_lolos_akun_akses',
        'deskripsi_penyelesaian_lainnya',
        'penyelesaian_lainnya',
        'terima_lolos_nilai_skk',
        'validator_terima_lolos_nilai_skk',
        'paraf_terima_lolos_nilai_skk',
        'deskripsi_penyelesaian_lainnya_2',
        'penyelesaian_lainnya_2',
        'terima_lolos_sertifikasi_bahasa',
        'validator_terima_lolos_sertifikasi_bahasa',
        'paraf_terima_lolos_sertifikasi_bahasa',
        'terima_lolos_sertifikasi_lain',
        'terima_krs_semester',
        'validator_terima_krs_semester',
        'paraf_terima_krs_semester',
        'terima_rekap_transkrip',
        'terima_lolos_sertifikasi_prodi',
        'deskripsi_publikasi_karya_ilmiah',
        'publikasi_karya_ilmiah',
        'deskripsi_terima_lolos_surat_keterangan',
        'terima_lolos_surat_keterangan',
        'eligible_pin',
        'validator_eligible_pin',
        'paraf_eligible_pin',
        'jumlah_sks_terakhir',
        'ipk_terakhir',
        'validasi_skpi',
        'terima_lolos_yusidium',
        'qr_code',
        'penanda_tangan',
        'paraf_final'
    ];
}
