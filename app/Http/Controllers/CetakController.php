<?php

namespace App\Http\Controllers;
use App\Models\Kelas;
use App\Models\Certification;
use App\Models\Nilai;
use App\Models\Student;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use setasign\Fpdi\Fpdi;
use \FPDF;
use Illuminate\Support\Str;
use Log;

class CetakController extends Controller
{
    public function index(){
        $user = session()->get('username');
        $kelas = DB::table('kelas')
        ->join('dosens', 'dosens.nim_dosen', '=', 'kelas.pengajar')
        ->select('kelas.id', 'kelas.kelas', 	'kelas.periode', 	'kelas.tanggal', 	'dosens.nama_dosen as pengajar')
        ->paginate(5);
        return view('cetak', compact('kelas', 'user'));
    }

    public function getcetakpeserta(Request $request){
        $peserta = DB::table('certifications')
            ->join('students', 'students.nrp', '=', 'certifications.nrp')
            ->select('certifications.name as certname','certifications.nrp', 'students.name as studentname','certifications.aktifitas')
            ->where('certifications.kelas', $request->kelas)
            ->get();
        return response()->json($peserta);
    }

    public function deletecetakpeserta(Request $request){
        $idc = DB::table('certifications')->where('file', $request->id_cetak)->first()->id;
        $cetak = Certification::findOrFail($idc);
        $cetak->delete();
        $response = Http::asForm()->post("https://krs.widyakartika.ac.id/delete_sertifikasi.php", [
            "idsertifikasi" => $request->id_cetak
        ]);
        return redirect()->back();
    }

    public function getinputcetak(Request $request){
        $student = DB::table('kelas_certifications')
        ->join('students', 'students.nrp' ,'=', 'kelas_certifications.student')
        ->select('kelas_certifications.student','students.name')
        ->where('kelas_certifications.kelas',$request->kelas)
        ->get();
        return response()->json($student); 
    }

    public function actionsubmitcetak(Request $request){
        if (str_contains($request->namakelassertifikasi,"Inggris") or str_contains($request->namakelassertifikasi,"English") or str_contains($request->namakelassertifikasi,"INGGRIS") or str_contains($request->namakelassertifikasi,"ENGLISH") or str_contains($request->namakelassertifikasi, "EPT")){
            $filepath=public_path("template.pdf");
            $outputfilepath = public_path('/files/'.$request->no_sertifikasi."_".$request->mahasiswainput .".pdf");
            $nama_mahasiswa = Student::where('nrp', $request->mahasiswainput)->value('name');
            $namamahasiswa = Str::title($nama_mahasiswa);
            $nilai1 = Nilai::where('kelas', $request->idkelassertifikasi)->where('student', $request->mahasiswainput)->value('nilai1');
            $nilai2 = Nilai::where('kelas', $request->idkelassertifikasi)->where('student', $request->mahasiswainput)->value('nilai2');
            $nilai3 = Nilai::where('kelas', $request->idkelassertifikasi)->where('student', $request->mahasiswainput)->value('nilai3');
            $nilait = Nilai::where('kelas', $request->idkelassertifikasi)->where('student', $request->mahasiswainput)->value('nilaitotal');
            $fileqr = $request->file('fileqr');
            $file_name = $fileqr->getClientOriginalName();
            $fileqr->move('qr',$file_name);
            $this->fillPDFFile($filepath, $outputfilepath, $request->no_sertifikasi, $request->mahaiswainput,$namamahasiswa, $request->aktifitas,$nilai1, $nilai2, $nilai3, $nilait, $request->tanggal,$file_name);
            $filename = $request->no_sertifikasi."_".$request->mahasiswainput .".pdf";
        }
        else {
            $filepath=public_path("template.pdf");
            $outputfilepath = public_path('/files/'.$request->no_sertifikasi."_".$request->mahasiswainput .".pdf");
            $nama_mahasiswa = Student::where('nrp', $request->mahasiswainput)->value('name');
            $namamahasiswa =  Str::title($nama_mahasiswa);
            $nilai1 = Nilai::where('kelas', $request->idkelassertifikasi)->where('student', $request->mahasiswainput)->value('nilai1');
            $fileqr = $request->file('fileqr');
            $file_name = $fileqr->getClientOriginalName();
            $fileqr->move('qr',$file_name);
            $this->fillPDFFile2($filepath, $outputfilepath, $request->no_sertifikasi, $request->mahaiswainput,$namamahasiswa, $request->aktifitas,$nilai1,$request->tanggal,$request->namakelassertifikasi, $file_name);
            $filename = $request->no_sertifikasi."_".$request->mahasiswainput .".pdf";
        }
        $response = Http::asForm()->post("https://krs.widyakartika.ac.id/input_sertifikasi.php", [
           "idkelassertifikasi" => $request->idkelassertifikasi,
           "no_sertifikasi" => $request->no_sertifikasi,
           "mahasiswainput" => $request->mahasiswainput,
           "aktifitas" => $request->aktifitas
        ]);
        $responsebody = json_decode($response->getBody(), true);

        Certification::create([
                'name' => $filename,
                'kelas' => $request->idkelassertifikasi,
                'nrp' => $request->mahasiswainput,
                'aktifitas' => $request->aktifitas,
                'activities' => "",
                'file' => $filename
        ]);
        $filename =  $request->no_sertifikasi."_".$request->mahasiswainput .".pdf";
    //     $response2 = Http::asForm()->post("https://krs.widyakartika.ac.id/post_sertifikasi.php", [
    //        "filename" =>  $filename,
    //     ]);
    //    $responsebody2 = json_decode($response2->getBody(), true);
        return redirect()->back();
    }

    public function fillPDFFile($file, $outputFilePath, $nomor, $nrp, $nama, $judul, $nilai1, $nilai2, $nilai3, $nilait, $tanggal, $fileqr){
        $fpdi = new FPDI;

        $count = $fpdi->setSourceFile($file);

        for ($i=1; $i<=$count; $i++) {
            $template = $fpdi->importPage($i);
            $size = $fpdi->getTemplateSize($template);
            $fpdi->AddFont("GreatVibes-Regular", "", "GreatVibes-Regular.php",public_path("fonts"));
            $fpdi->AddFont("Lovelo Black", "", "LoveloBlack.php",public_path("fonts"));
            $fpdi->AddFont("Monserrat SemiBold", "", "FontsFree-Net-Montserrat-SemiBold.php", public_path("fonts"));
            $fpdi->AddPage($size['orientation'], array($size['width'], $size['height']));
            $fpdi->useTemplate($template);
            $left = $fpdi->GetPageWidth()/2;

            $fpdi->SetFont("Lovelo Black", "", 16);
            $fpdi->SetTextColor(1,1,1);
            $top = 65;
            $fpdi->Text($left -($fpdi->GetStringWidth($nomor)/2),$top,$nomor);
            $fpdi->SetFont("GreatVibes-Regular", "", 50);
            $fpdi->SetTextColor(1,1,1);
            $top = 90;
            $centerX = ($fpdi->GetPageWidth() - 180) / 2;
            $fpdi->SetXY($centerX,$top);
			$fpdi->MultiCell(180,16,$nama,0,'C');
            $fpdi->SetFont("Lovelo Black", "", 16);
            $fpdi->SetTextColor(1,1,1);
            $top = 115;
            $fpdi->Text($left -($fpdi->GetStringWidth($nrp)/2),$top,$nrp);
            $top = 147;
            $fpdi->Text(156,$top,$nilai1);
            $top = 157;
            $fpdi->Text(156,$top,$nilai2);
            $top = 167;
            $fpdi->Text(156,$top,$nilai3);
            $fpdi->SetFont("Lovelo Black", "", 20);
            $top = 177;
            $fpdi->Text(154,$top,$nilait);
            $fpdi->SetFont("Monserrat SemiBold", "", 16);
            $fpdi->SetTextColor(1,1,1);
            $top = 210;
            $date = date('F d, Y', strtotime($tanggal));
            $fpdi->Text($left -($fpdi->GetStringWidth($date)/2),$top,$date);
            $fpdi->Image('qr/'.$fileqr, 30,$top, 20, 20);
        }
        return $fpdi->Output($outputFilePath, 'F');
    }
    public function fillPDFFile2($file, $outputFilePath, $nomor, $nrp, $nama, $judul, $nilai1, $nilai2, $nilai3, $nilait, $tanggal,$kelas, $fileqr){
        $fpdi = new FPDI;

        $count = $fpdi->setSourceFile($file);

        for ($i=1; $i<=$count; $i++) {
            $template = $fpdi->importPage($i);
            $size = $fpdi->getTemplateSize($template);
            $fpdi->AddFont("GreatVibes-Regular", "", "GreatVibes-Regular.php",public_path("fonts"));
            $fpdi->AddFont("Lovelo Black", "", "LoveloBlack.php",public_path("fonts"));
            $fpdi->AddFont("Monserrat SemiBold", "", "FontsFree-Net-Montserrat-SemiBold.php", public_path("fonts"));
            $fpdi->AddPage($size['orientation'], array($size['width'], $size['height']));
            $fpdi->useTemplate($template);
            $left = $fpdi->GetPageWidth()/2;

            $fpdi->SetFont("Lovelo Black", "", 16);
            $fpdi->SetTextColor(1,1,1);
            $top = 90;
            $fpdi->Text($left -($fpdi->GetStringWidth($nomor)/2),$top,$nomor);
            $fpdi->SetFont("GreatVibes-Regular", "", 50);
            $fpdi->SetTextColor(1,1,1);
            $top = 90;
            $centerX = ($fpdi->GetPageWidth() - 180) / 2;
            $fpdi->SetXY($centerX,$top);
			$fpdi->MultiCell(180,16,$nama,0,'C');
            $fpdi->SetFont("Lovelo Black", "", 16);
            $fpdi->SetTextColor(1,1,1);
            $top = 115;
            $fpdi->Text($left -($fpdi->GetStringWidth($nrp)/2),$top,$nrp);
            $fpdi->SetFont("Monserrat SemiBold", "", 20);
            $top = 137;
            $fpdi->Text(156,$top,$namakelassertifikasi);
            $top = 147;
            $fpdi->Text(156,$top,$nilait);
            $fpdi->SetFont("Monserrat SemiBold", "", 16);
            $fpdi->SetTextColor(1,1,1);
            $top = 210;
            $date = date('F dd, Y', strtotime($tanggal));
            $fpdi->Text($left -($fpdi->GetStringWidth($date)/2),$top,$date);
            $fpdi->Image('qr/'.$fileqr, 50,30, 20, 20);
        }
        return $fpdi->Output($outputFilePath, 'F');
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
        return view('cetak', compact('kelas','user'));
    }     
}
