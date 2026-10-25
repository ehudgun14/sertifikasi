<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class CariController extends Controller
{
    public function index(){
        $user = session()->get('username');
        $kelas =  DB::table('certifications')
        ->join('students', 'students.nrp', '=', 'certifications.nrp')
        ->join('kelas', 'kelas.id', '=', 'certifications.kelas')
        ->select('certifications.id', 'certifications.name as certname','kelas.kelas as kelasname', 'certifications.nrp', 'kelas.tanggal', 'students.name as studentname','certifications.aktifitas','certifications.activities')
        ->paginate(10);
        return view('cari', compact('kelas', 'user'));
    }

    public function actioncarisertifikat(Request $request){
        $user = session()->get('username');
        $cari = $request->cari;
        $kelas = DB::table('certifications')
        ->join('students', 'students.nrp', '=', 'certifications.nrp')
        ->join('kelas', 'kelas.id', '=', 'certifications.kelas')
        ->select('certifications.id', 'certifications.name as certname','kelas.kelas as kelasname', 'certifications.nrp',  'kelas.tanggal', 'students.name as studentname','certifications.aktifitas','certifications.activities')
        ->where('certifications.name','like',"%".$cari."%")
        ->orWhere('certifications.nrp', 'like', "%".$cari."%")
        ->orWhere('kelas.kelas', 'like', "%".$cari."%")
        ->orWhere('kelas.tanggal','like',"%".$cari."%")
        ->orWhere('students.name', 'like', "%".$cari."%")
        ->paginate(10);
        if ($request->ajax() || $request->wantsJson()) {
            return response()->json($kelas);
        }

        return view('cari',compact('kelas','user'));
    }      
}
