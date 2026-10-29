<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Nilai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NilaiController extends Controller
{
    public function index(){
        $user = session()->get('username');
        $kelas = DB::table('kelas')
        ->join('dosens', 'dosens.nim_dosen', '=', 'kelas.pengajar')
        ->select('kelas.id', 'kelas.kelas', 	'kelas.periode', 	'kelas.tanggal', 	'dosens.nama_dosen as pengajar')
        ->paginate(5);
        return view('nilai', compact('kelas','user'));
    }
    public function getnilaipeserta(Request $request){
        $peserta = DB::table('nilais')
            ->join('kelas', 'kelas.id', '=', 'nilais.kelas')
            ->join('students', 'students.nrp', '=', 'nilais.student')
            ->select('nilais.id','students.nrp', 'students.name', 'nilais.nilai1','nilais.nilai2','nilais.nilai3','nilais.nilaitotal')
            ->where('nilais.kelas', $request->kelas)
            ->get();
        return response()->json($peserta);
    }

    public function actionsubmitnilaipeserta(Request $request){
        Nilai::where('id', $request->id)->update(['nilai1' => $request->nilai1, 'nilai2' => $request->nilai2, 'nilai3' => $request->nilai3, 'nilaitotal' => $request->nilait]);
        return;
    }

    public function actioncarikelas(Request $request){
        $user = session()->get('username');
        $cari = $request->cari;
        $kelas = DB::table('kelas')
        ->join('dosens', 'dosens.nim_dosen', '=', 'kelas.pengajar')
        ->select('kelas.id', 'kelas.kelas', 'kelas.periode', 'kelas.tanggal', 	'dosens.nama_dosen as pengajar')
        ->where('kelas.kelas','like',"%".$cari."%")
        ->orWhere('kelas.periode', 'like', "%".$cari."%")
        ->orWhere('kelas.tanggal', 'like', "%".$cari."%")
        ->orWhere('kelas.pengajar','like',"%".$cari."%")
        ->paginate(5);
        if ($request->ajax() || $request->wantsJson()) {
            return response()->json($kelas);
        }
        return view('nilai', compact('kelas','user'));
    }     
}
