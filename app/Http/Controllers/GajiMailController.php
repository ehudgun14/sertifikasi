<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\GajiImport;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Aligment;
use Mail;
use App\Mail\GajiMail;
use PhpOffice\PhpSpreadsheet\Writer\Pdf\Mpdf;

class GajiMailController extends Controller
{
    
    public function sendMailWithAttachment(Request $request){

        $file = $request->file('gajifile');
        $import = new GajiImport;
        Excel::import($import, $file);
        $gaji= $import->getArray();

        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        $spreadsheet = $reader->load("SLIP GAJI.xlsx");
        foreach ($gaji as $gajis){
            $spreadsheet->getActiveSheet()->setCellValue('C7',$gajis['nomor']);
            $spreadsheet->getActiveSheet()->setCellValue('C8',$gajis['nama']);
            $spreadsheet->getActiveSheet()->setCellValue('C9',$gajis['jabatan']);
            $spreadsheet->getActiveSheet()->setCellValue('C11',"Rp.".$gajis['gaji_pokok']);
            $spreadsheet->getActiveSheet()->setCellValue('C12',"Rp.".$gajis['penyesuaian']);
            $spreadsheet->getActiveSheet()->setCellValue('C13',"Rp.".$gajis['penyesuaian_pendidikan']);
            $spreadsheet->getActiveSheet()->setCellValue('D14',"Rp.".$gajis['gaji_pokok2']);

            $spreadsheet->getActiveSheet()->setCellValue('C16',"Rp.".$gajis['tunjangan_jabatan']);
            $spreadsheet->getActiveSheet()->setCellValue('C17',"Rp.".$gajis['tunjangan_kepangkatan']);
            $spreadsheet->getActiveSheet()->setCellValue('C18',"Rp.".$gajis['tunjangan_transport']);
            $spreadsheet->getActiveSheet()->setCellValue('C19',"Rp.".$gajis['kelebihan_jam']);
            $spreadsheet->getActiveSheet()->setCellValue('C20',"Rp.".$gajis['rapelan']);
            $spreadsheet->getActiveSheet()->setCellValue('D21',"Rp.".$gajis['gaji_bruto']);

            $spreadsheet->getActiveSheet()->setCellValue('C24',"Rp.".$gajis['dplk']);
            $spreadsheet->getActiveSheet()->setCellValue('C25',"Rp.".$gajis['potongan_bpjs_kes']);
            $spreadsheet->getActiveSheet()->setCellValue('C26',"Rp.".$gajis['potongan_bpjs_jht']);
            $spreadsheet->getActiveSheet()->setCellValue('C27',"Rp.".$gajis['potongan_bpjs_pensiun']);
            $spreadsheet->getActiveSheet()->setCellValue('C28',"Rp.".$gajis['piutang_karyawan']);
            $spreadsheet->getActiveSheet()->setCellValue('C29',"Rp.".$gajis['piutang_karyawan_koperasi']);
            $spreadsheet->getActiveSheet()->setCellValue('C30',"Rp.".$gajis['simpanan_pokok']);
            $spreadsheet->getActiveSheet()->setCellValue('C31',"Rp.".$gajis['potongan_pajak']);
            $spreadsheet->getActiveSheet()->setCellValue('C32',"Rp.".$gajis['potongan_arisan']);
            $spreadsheet->getActiveSheet()->setCellValue('D33',"Rp.".$gajis['take_home_pays']);

            $spreadsheet->getActiveSheet()->setCellValue('D35',"Rp.".$gajis['gaji_pokok2']+$gajis['gaji_bruto']+$gajis['take_home_pays']);

            $ldate = date('Y-m-d');
            $filenm = $gajis['nama'] . "_" . $ldate . ".pdf";
            $writer =  \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Mpdf');
            $writer->save($filenm);

            $data["email"] = $gajis['email'];
            $data["title"] = "Gaji";

            Mail::send('mail.gajimail', $data, function($message) use($data, $filenm) {
                    $message->to($data["email"])->subject($data["title"])->attach(public_path($filenm));         
            });
        }
        echo "Mail send successfully !!";
        return redirect()->back();
    }
    public function sendMailWithAttachment2 (Request $request){

        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        $spreadsheet = $reader->load("SLIP GAJI.xlsx");
        $spreadsheet->getActiveSheet()->setCellValue('C7',$request->nomor);
        $spreadsheet->getActiveSheet()->setCellValue('C8',$request->nama);
        $spreadsheet->getActiveSheet()->setCellValue('C9',$request->jabatan);
        $spreadsheet->getActiveSheet()->setCellValue('C11',"Rp.".$request->gaji_pokok);
        $spreadsheet->getActiveSheet()->setCellValue('C12',"Rp.".$request->penyesuaian);
        $spreadsheet->getActiveSheet()->setCellValue('C13',"Rp.".$request->penyesuaian_pendidikan);
        $spreadsheet->getActiveSheet()->setCellValue('D14',"Rp.".$request->gaji_pokok2);

        $spreadsheet->getActiveSheet()->setCellValue('C16',"Rp.".$request->tunjangan_jabatan);
        $spreadsheet->getActiveSheet()->setCellValue('C17',"Rp.".$request->tunjangan_kepangkatan);
        $spreadsheet->getActiveSheet()->setCellValue('C18',"Rp.".$request->tunjangan_transport);
        $spreadsheet->getActiveSheet()->setCellValue('C19',"Rp.".$request->kelebihan_jam);
        $spreadsheet->getActiveSheet()->setCellValue('C20',"Rp.".$request->rapelan);
        $spreadsheet->getActiveSheet()->setCellValue('D21',"Rp.".$request->gaji_bruto);

        $spreadsheet->getActiveSheet()->setCellValue('C24',"Rp.".$request->dplk);
        $spreadsheet->getActiveSheet()->setCellValue('C25',"Rp.".$request->potongan_bpjs_kes);
        $spreadsheet->getActiveSheet()->setCellValue('C26',"Rp.".$request->potongan_bpjs_jht);
        $spreadsheet->getActiveSheet()->setCellValue('C27',"Rp.".$request->potongan_bpjs_pensiun);
        $spreadsheet->getActiveSheet()->setCellValue('C28',"Rp.".$request->piutang_karyawan);
        $spreadsheet->getActiveSheet()->setCellValue('C29',"Rp.".$request->piutang_karyawan_koperasi);
        $spreadsheet->getActiveSheet()->setCellValue('C30',"Rp.".$request->simpanan_pokok);
        $spreadsheet->getActiveSheet()->setCellValue('C31',"Rp.".$request->potongan_pajak);
        $spreadsheet->getActiveSheet()->setCellValue('C32',"Rp.".$request->potongan_arisan);
        $spreadsheet->getActiveSheet()->setCellValue('D33',"Rp.".$request->take_home_pays);

        $spreadsheet->getActiveSheet()->setCellValue('D35',"Rp.".$request->gaji_pokok2+$request->gaji_bruto+$request->take_home_pays);

        $ldate = date('Y-m-d');
        $filenm = $request->nama . "_" . $ldate . ".pdf";
        $writer =  \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Mpdf');
        $writer->save($filenm);

        $data["email"] = $request->email;
        $data["title"] = "Gaji";

        Mail::send('mail.gajimail', $data, function($message) use($data, $filenm) {
                $message->to($data["email"])->subject($data["title"])->attach(public_path($filenm));         
        });

    }
}
