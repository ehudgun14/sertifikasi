<?php

namespace App\Http\Controllers;

use App\Models\Certification;
use App\Models\Tab;
use App\Models\Pengguna;
use App\Models\Student;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use setasign\Fpdi\Fpdi;
use \FPDF;
use Illuminate\Support\Facades\DB;

class QrCodeController extends Controller
{
    public function index(){
        $sertifikasi = Certification::latest()->paginate(5);
        return view('sertifikasi', compact('sertifikasi'));
    }
    public function actionupload(Request $request){
        $filepath=public_path("template.pdf");
        $outputfilepath = public_path("sertifikat_". $request->nrp .".pdf");
        $namamahasiswa = Student::where('nrp', $request->nrp)->value('name');
        
        $fileqr = $request->file('qr');
        $file_name = $fileqr->getClientOriginalName();
        $fileqr->move('qr',$file_name);
        $this->fillPDFFile($filepath, $outputfilepath, $request->sertifikasi, $request->nrp,$namamahasiswa, $request->judul,$request->nilai1, $request->nilai2, $request->nilai3, $file_name);
        
        $filem = "sertifikat_".$request->nrp.".pdf";
        Certification::create([
            'nrp' => $request->nrp,
            'prodi' => $request->prodi,
            'aktifitas' => $request->judul,
            'activities' => $request->titles,
            'file' => $filem
        ]);
        return redirect()->back();
    }
    public function fillPDFFile($file, $outputFilePath, $nomor, $nrp, $nama, $judul, $nilai1, $nilai2, $nilai3, $fileqr){
        $fpdi = new FPDI;

        $count = $fpdi->setSourceFile($file);

        for ($i=1; $i<=$count; $i++) {
            $template = $fpdi->importPage($i);
            $size = $fpdi->getTemplateSize($template);
            $fpdi->AddFont("GreatVibes-Regular", "", "GreatVibes-Regular.php",public_path("fonts"));
            $fpdi->AddFont("Lovelo Black", "", "LoveloBlack.php",public_path("fonts"));
            $fpdi->AddPage($size['orientation'], array($size['width'], $size['height']));
            $fpdi->useTemplate($template);
            $left = $fpdi->GetPageWidth()/2;

            $fpdi->SetFont("Lovelo Black", "", 16);
            $fpdi->SetTextColor(1,1,1);
            $top = 65;
            $fpdi->Text($left -($fpdi->GetStringWidth($nomor)/2),$top,$nomor);
            $fpdi->SetFont("GreatVibes-Regular", "", 70);
            $fpdi->SetTextColor(1,1,1);
            $top = 103;
            $fpdi->Text($left -($fpdi->GetStringWidth($nama)/2),$top,$nama);
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
            $fpdi->Text(156,$top,$nilai3+$nilai2+$nilai1);
            $fpdi->Image('qr/'.$fileqr, 50,30, 20, 20);
        }
        return $fpdi->Output($outputFilePath, 'F');
    }
    public function generateqr(Request $request){
        if($request->has('qr')){
            $file = $request->file('qr');
            $nama_file = $file->getClientOriginalName();
            $f= QrCode::size(200)
                    ->format('png')->generate(
                "http://127.0.0.1:8000/sertifikasidetails/$nama_file",
            );
            return response()->json([
                'png' =>  "data:image/png;base64,".base64_encode($f).""      
            ], 200);
        }
    }    

    public function actioncari(Request $request){
        $cari = $request->cari;
        $sertifikasi = Certification::where('nama','like',"%".$cari."%")->paginate();
        return view('sertifikasi',compact('sertifikasi'));
    }      
}


