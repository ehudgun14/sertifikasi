<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Dosen;
use App\Models\Student;
use App\Models\KelasCertification;
use App\Models\Nilai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class KelasController extends Controller
{
    public function index(){
        $user = session()->get('username');
        $kelas = DB::table('kelas')
        ->join('dosens', 'dosens.nim_dosen', '=', 'kelas.pengajar')
        ->select('kelas.id', 'kelas.kelas', 	'kelas.periode', 	'kelas.tanggal', 	'dosens.nama_dosen as pengajar')
        ->paginate(5);
        $dosen = Dosen::all();
        return view('kelas', compact('kelas', 'dosen','user'));
    }

    public function getinputpeserta(){
        $peserta = Student::orderBy('nrp','asc')->get();
        return response()->json($peserta);
    }
    public function actionsubmitkelas(Request $request){
        Kelas::create([
            'kelas' => $request->nama_kelas,
            'periode' => $request->periode,
            'tanggal' => $request->tanggal_selesai,
            'pengajar' => $request->pengajar
        ]);
        return redirect()->back();
    }

    public function cariinputpeserta(Request $request){
        $peserta = Student::where('nrp','like',"%".$request->peserta."%")->orWhere('name','like',"%".$request->peserta."%")->orderBy('nrp','asc')->get();
        return response()->json($peserta);
    }
    public function getpengajar(Request $request){
        $pengajar = Dosen::where('nama_dosen', $request->nama)->pluck('nim_dosen');
        return response()->json($pengajar);
    }
    public function getpeserta(Request $request){
        $peserta = DB::table('kelas_certifications')
            ->join('students', 'students.nrp', '=', 'kelas_certifications.student')
            ->select('students.nrp', 'students.name','students.prodi')
            ->where('kelas_certifications.kelas', $request->kelas)
            ->get();
        return response()->json($peserta);
    }
    public function actionsubmitpeserta(Request $request){
        KelasCertification::create([
            'kelas' => $request->kelas,
            'student' => $request->student
        ]);
        Nilai::create([
            'kelas' => $request->kelas,
            'student' => $request->student,
            'nilai1' => 0,
            'nilai2' => 0,
            'nilai3' => 0,
            'nilaitotal' => 0
        ]);
        return;
    }
    public function editsubmitkelas(Request $request){
        Kelas::where('id', $request->id)->update([ 'kelas' => $request->nama_kelasedit,
        'periode' => $request->periodeedit,
        'tanggal' => $request->tanggal_selesaiedit,
        'pengajar' => $request->pengajaredit]);
        return redirect()->back();
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
        $dosen = Dosen::all();
        return view('kelas', compact('kelas', 'dosen','user'));
    }      

}

