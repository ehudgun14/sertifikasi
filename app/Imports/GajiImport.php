<?php

namespace App\Imports;

use App\Models\Gaji;
use Maatwebsite\Excel\Concerns\ToArray;

class GajiImport implements ToArray
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public $data;
    public function __construct()
    {
        $this->data = [];
    }
    
    public function array(array $rows)
    {        
        foreach ($rows as $row) 
        { 
            $array = array(
                'email' => $row[0],
                'nomor' => $row[1],
                'nama' => $row[2],
                'jabatan' => $row[3],
                'gaji_pokok' => $row[4],
                'penyesuaian' => $row[5],
                'penyesuaian_pendidikan' => $row[6],
                'gaji_pokok2' => $row[7],
                'tunjangan_jabatan' => $row[8],
                'tunjangan_kepangkatan' => $row[9],
                'tunjangan_transport' => $row[10],
                'kelebihan_jam' => $row[11],
                'rapelan' => $row[12],
                'gaji_bruto' => $row[13],
                'dplk' => $row[14],
                'potongan_bpjs_kes' => $row[15],
                'potongan_bpjs_jht' => $row[16],
                'potongan_bpjs_pensiun' => $row[17],
                'piutang_karyawan' => $row[18],
                'piutang_karyawan_koperasi' => $row[19],
                'simpanan_pokok' => $row[20],
                'potongan_pajak' => $row[21],
                'potongan_arisan' => $row[22],
                'take_home_pay' => $row[23]
            );
            array_push($this->data, $array);
        }
    }
    public function getArray(): array
    {
        return $this->data;
    }
}
