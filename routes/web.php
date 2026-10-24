<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SertifikasiController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\QrCodeController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\CetakController;
use App\Http\Controllers\CariController;
use App\Http\Controllers\GajiController;
use App\Http\Controllers\GajiMailController;
use App\Http\Controllers\LulusButuhController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', function () {
    return view('welcome');
});
Route::group(['middleware' => 'auth'], function () {
     Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard');
});
Route::get('/login', [LoginController::class,'index'])->name('login');
Route::post('actionupload',[QrCodeController::class,'actionupload'])->name('actionupload');
Route::get('/qrcode', [QrCodeController::class,'index'])->name('sertifikasi');
Route::post('actionlogin', [Controller::class,'actionlogin'])->name('actionlogin');
Route::post('actionloging', [DashboardController::class,'actionloging'])->name('actionloging');
Route::post('logout', [DashboardController::class,'actionlogout'])->name('actionlogout');
Route::post('actionpost', [DashboardController::class,'actionpost'])->name('actionpost');
Route::get('actioncari',[QrCodeController::class,'actioncari'])->name('actioncari');
Route::post('generateqr', [QrCodeController::class,'generateqr'])->name('generateqr');
Route::get('/kelassertifikasi', [KelasController::class,'index'])->name('kelassertifikasi');
Route::post('actionsubmitkelas', [KelasController::class,'actionsubmitkelas'])->name('actionsubmitkelas');
Route::post('editsubmitkelas', [KelasController::class,'editsubmitkelas'])->name('editsubmitkelas');
Route::post('actionsubmitpeserta', [KelasController::class, 'actionsubmitpeserta'])->name('actionsubmitpeserta');
Route::post('getpeserta', [KelasController::class, 'getpeserta'])->name('getpeserta');
Route::post('getpengajar', [KelasController::class, 'getpengajar'])->name('getpengajar');
Route::post('getinputpeserta', [KelasController::class, 'getinputpeserta'])->name('getinputpeserta');
Route::post('cariinputpeserta', [KelasController::class, 'cariinputpeserta'])->name('cariinputpeserta');
Route::get('/nilaisertifikasi', [NilaiController::class, 'index'])->name('nilaisertifikasi');
Route::post('getnilaipeserta', [NilaiController::class, 'getnilaipeserta'])->name('getnilaipeserta');
Route::post('actionsubmitnilaipeserta', [NilaiController::class, 'actionsubmitnilaipeserta'])->name('actionsubmitnilaipeserta');
Route::get('/cetaksertifikasi', [CetakController::class, 'index'])->name('cetaksertifikasi');
Route::post('actionsubmitcetak', [CetakController::class, 'actionsubmitcetak'])->name('actionsubmitcetak');
Route::post('getcetakpeserta', [CetakController::class, 'getcetakpeserta'])->name('getcetakpeserta');
Route::post('getinputcetak', [CetakController::class, 'getinputcetak'])->name('getinputcetak');
Route::post('deletecetakpeserta', [CetakController::class, 'deletecetakpeserta'])->name('deletecetakpeserta');
Route::get('/carisertifikasi', [CariController::class, 'index'])->name('carisertifikasi');
Route::get('actioncarisertifikat',[CariController::class,'actioncarisertifikat'])->name('actioncarisertifikat');
Route::get('actioncarikelas',[KelasController::class,'actioncarikelas'])->name('actioncarikelas');
Route::get('actioncarikelasdarinilai',[NilaiController::class,'actioncarikelas'])->name('actioncarikelasdarinilai');
Route::get('actioncarikelasdaricetak',[CetakController::class,'actioncarikelas'])->name('actioncarikelasdaricetak');
Route::get('/lulusbutuh',[LulusButuhController::class, 'index'])->name('lulusbutuh');
Route::post('gantiTerimaBebasTanggungan',[LulusButuhController::class, 'gantiTerimaBebasTanggungan'])->name('gantiTerimaBebasTanggungan');
Route::post('gantiPembayaranLainnya',[LulusButuhController::class, 'gantiPembayaranLainnya'])->name('gantiPembayaranLainnya');
Route::post('gantiPembayaranLunasDataPembangunan',[LulusButuhController::class, 'gantiPembayaranLunasDataPembangunan'])->name('gantiPembayaranLunasDataPembangunan');
Route::post('gantiPembayaranLunasBiayaPendidikan',[LulusButuhController::class, 'gantiPembayaranLunasBiayaPendidikan'])->name('gantiPembayaranLunasBiayaPendidikan');
Route::post('gantiPembayaranLunasBiayaSkripsi',[LulusButuhController::class, 'gantiPembayaranLunasBiayaSkripsi'])->name('gantiPembayaranLunasBiayaSkripsi');
Route::post('gantiTerimaBebasTanggunganBakeu',[LulusButuhController::class, 'gantiTerimaBebasTanggunganBakeu'])->name('gantiTerimaBebasTanggunganBakeu');
Route::post('gantiPenyelesaianBebasTanggungan',[LulusButuhController::class, 'gantiPenyelesaianBebasTanggungan'])->name('gantiPenyelesaianBebasTanggungan');
Route::post('gantiTerimaBebasTanggunganIct',[LulusButuhController::class, 'gantiTerimaBebasTanggunganIct'])->name('gantiTerimaBebasTanggunganIct');
Route::post('gantiPenyelesaianLainnya2',[LulusButuhController::class, 'gantiPenyelesaianLainnya2'])->name('gantiPenyelesaianLainnya2');
Route::post('gantiTerimaLolosNilaiSKK',[LulusButuhController::class, 'gantiTerimaLolosNilaiSKK'])->name('gantiTerimaLolosNilaiSKK');
Route::post('gantiPenyelesaianLainnya3',[LulusButuhController::class, 'gantiPenyelesaianLainnya3'])->name('gantiPenyelesaianLainnya3');
Route::post('gantiTerimaLolosSertifikasiBahasa',[LulusButuhController::class, 'gantiTerimaLolosSertifikasiBahasa'])->name('gantiTerimaLolosSertifikasiBahasa');
Route::post('gantiTerimaLolosSertifikasiLain',[LulusButuhController::class, 'gantiTerimaLolosSertifikasiLain'])->name('gantiTerimaLolosSertifikasiLain');
Route::post('gantiTerimaLolosKRSSemester',[LulusButuhController::class, 'gantiTerimaLolosKRSSemester'])->name('gantiTerimaLolosKRSSemester');
Route::post('gantiTerimaRekapTranskrip',[LulusButuhController::class, 'gantiTerimaRekapTranskrip'])->name('gantiTerimaRekapTranskrip');
Route::post('gantiTerimaLolosSertifikasiProdi',[LulusButuhController::class, 'gantiTerimaLolosSertifikasiProdi'])->name('gantiTerimaLolosSertifikasiProdi');
Route::post('gantiTerimaLolosSuratKeterangan',[LulusButuhController::class, 'gantiTerimaLolosSuratKeterangan'])->name('gantiTerimaLolosSuratKeterangan');
Route::post('gantiKesesuaianJumlahSks',[LulusButuhController::class, 'gantiKesesuaianJumlahSks'])->name('gantiKesesuaianJumlahSks');
Route::post('gantiKelulusanMataKuliah',[LulusButuhController::class, 'gantiKelulusanMataKuliah'])->name('gantiKelulusanMataKuliah');
Route::post('validatorTerimaBebasTanggungan',[LulusButuhController::class, 'validatorTerimaBebasTanggungan'])->name('validatorTerimaBebasTanggungan');
Route::post('parafTerimaBebasTanggungan',[LulusButuhController::class, 'parafTerimaBebasTanggungan'])->name('parafTerimaBebasTanggungan');
Route::post('deskripsiPembayaranLainnya',[LulusButuhController::class, 'deskripsiPembayaranLainnya'])->name('deskripsiPembayaranLainnya');
Route::post('validatorPembayaranLunasDataPembangunan',[LulusButuhController::class, 'validatorPembayaranLunasDataPembangunan'])->name('validatorPembayaranLunasDataPembangunan');
Route::post('parafPembayaranLunasDataPembangunan',[LulusButuhController::class, 'parafPembayaranLunasDataPembangunan'])->name('parafPembayaranLunasDataPembangunan');
Route::post('deskripsiTerimaBebasTanggunganBakeu',[LulusButuhController::class, 'deskripsiTerimaBebasTanggunganBakeu'])->name('deskripsiTerimaBebasTanggunganBakeu');
Route::post('validatorPenyelesaianBebasTanggungan',[LulusButuhController::class, 'validatorPenyelesaianBebasTanggungan'])->name('validatorPenyelesaianBebasTanggungan');
Route::post('parafPenyelesaianBebasTanggungan',[LulusButuhController::class, 'parafPenyelesaianBebasTanggungan'])->name('parafPenyelesaianBebasTanggungan');
Route::post('validatorTerimaBebasTanggunganIct',[LulusButuhController::class, 'validatorTerimaBebasTanggunganIct'])->name('validatorTerimaBebasTanggunganIct');
Route::post('parafTerimaBebasTanggunganIct',[LulusButuhController::class, 'parafTerimaBebasTanggunganIct'])->name('parafTerimaBebasTanggunganIct');
Route::post('deskripsiPenyelesaianLainnya2',[LulusButuhController::class, 'deskripsiPenyelesaianLainnya2'])->name('deskripsiPenyelesaianLainnya2');
Route::post('validatorTerimaLolosNilaiSkk',[LulusButuhController::class, 'validatorTerimaLolosNilaiSkk'])->name('validatorTerimaLolosNilaiSkk');
Route::post('parafTerimaLolosNilaiSkk',[LulusButuhController::class, 'parafTerimaLolosNilaiSkk'])->name('parafTerimaLolosNilaiSkk');
Route::post('penyelesaianLainnya3',[LulusButuhController::class, 'penyelesaianLainnya3'])->name('penyelesaianLainnya3');
Route::post('validatorTerimaLolosSertifikasiBahasa',[LulusButuhController::class, 'validatorTerimaLolosSertifikasiBahasa'])->name('validatorTerimaLolosSertifikasiBahasa');
Route::post('parafTerimaLolosSertifikasiBahasa',[LulusButuhController::class, 'parafTerimaLolosSertifikasiBahasa'])->name('parafTerimaLolosSertifikasiBahasa');
Route::post('validatorTerimaLolosKrsSemester',[LulusButuhController::class, 'validatorTerimaLolosKrsSemester'])->name('validatorTerimaLolosKrsSemester');
Route::post('parafTerimaLolosKrsSemester',[LulusButuhController::class, 'parafTerimaLolosKrsSemester'])->name('parafTerimaLolosKrsSemester');
Route::post('validatorKesesuaianJumlahSks',[LulusButuhController::class, 'validatorKesesuaianJumlahSks'])->name('validatorKesesuaianJumlahSks');
Route::post('parafKesesuaianJumlahSks',[LulusButuhController::class, 'parafKesesuaianJumlahSks'])->name('parafKesesuaianJumlahSks');
Route::get('phpmyinfo', function () {
    phpinfo(); 
})->name('phpmyinfo');
if (App::environment('production')) {
    URL::forceScheme('https');
}