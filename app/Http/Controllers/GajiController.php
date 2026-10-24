<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gaji;
use App\Imports\GajiImport;
use App\Models\Pegawai;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Aligment;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Log;


class GajiController extends Controller
{
    private $username;
    public function index(){
        $this->username = session()->get('username');
        $user = $this->username;
        $gaji = [];
        $file = null;
        return view('gaji', compact('user', 'gaji', 'file'));
    }
    public function deleteimport(Request $request){
        $gaji = [];
        return view('gaji', compact('user', 'gaji'));
    }
    public function impor(Request $request){
        $this->username = session()->get('username');
        $this->password = session()->get('password');
        $user = $this->username;
        $file = $request->file('csvfile');
        $import = new GajiImport;
        Excel::import($import, $file);
        $gaji= $import->getArray();
        return view('gaji', compact('user', 'gaji', 'file'));
    }
}

