<?php

use App\Http\Controllers\{Admin, AuthController, pemilik, superadmin};
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/login', [AuthController::class, 'showFormLogin'])->name("login");
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);

Route::get('/showregister', [AuthController::class, 'showFormRegister']);
Route::post('/register', [AuthController::class, 'register']);
Route::get('/autocomplete-search', [AuthController::class, 'autocompleteSearch']);

Route::view('/template', 'print.template');

Route::get('/resetpass', function () {
    return view('auth.resetpass');
});

Route::group(['middleware' => 'auth'], function () {


    Route::post('/input_coa', [Admin::class, 'tambah_coa']);
    Route::get('/coa', [Admin::class, 'tampil_coa']);
    Route::get('/hapus_coa/{id}', [Admin::class, 'hapus_coa']);

    Route::post('/input_dip', [Admin::class, 'tambah_dip']);
    Route::get('/dip', [Admin::class, 'tampil_dip']);
    Route::get('/hapus_dip/{id}', [Admin::class, 'hapus_dip']);

    Route::post('/input_perizinan', [Admin::class, 'tambah_perizinan']);
    Route::get('/perizinan', [Admin::class, 'tampil_perizinan']);
    Route::get('/hapus_perizinan/{id}', [Admin::class, 'hapus_perizinan']);

    Route::post('/input_pobpabrik', [Admin::class, 'tambah_pobpabrik']);
    Route::get('/pobpabrik', [Admin::class, 'tampil_pobpabrik']);
    Route::get('/hapus_pobpabrik/{id}', [Admin::class, 'hapus_pobpabrik']);

    Route::post('/input_catatbersih', [Admin::class, 'tambah_catatbersih']);

    Route::get('/pengolahanbatch',  [Admin::class, 'tampil_pengolahanbatch']);
    Route::post('/input_komposisi', [Admin::class, 'tambah_komposisi']);
    Route::post('/input_peralatan', [Admin::class, 'tambah_peralatan']);
    Route::post('/input_penimbangan', [Admin::class, 'tambah_penimbangan']);
    Route::get('/hapus_komposisi/{id}/{ke}', [Admin::class, 'hapus_komposisi']);
    Route::get('/hapus_peralatan/{id}/{ke}', [Admin::class, 'hapus_peralatan']);
    Route::get('/hapus_penimbangan/{id}/{ke}', [Admin::class, 'hapus_penimbangan']);
    Route::post('/tambah_batch', [Admin::class, 'tambah_batch']);
    // Route::post('/detil_batch', [Admin::class, 'tampil_detilbatch']); 
    Route::get('/detil_batch/{id}', [Admin::class, 'tampil_detilbatchid']);
    Route::post('/printpengolahanbatch', [Admin::class, 'cetak_pengolahanbatch']);


    Route::get('/laporan', [Admin::class, 'tampil_laporan']);

    Route::get('/index', function () {
        return view('index');
    })->name("home");
    Route::get('/', [AuthController::class, 'showFormLogin']);
    Route::get('/pembersihanruangan', function () {
        return view('catatan.dokumen.pembersihanruangan');
    });

    Route::get('/penerimaanBB', function () {
        return view('catatan.dokumen.penerimaanBB');
    });

    Route::get('/setting', [Admin::class, 'tampil_setting'])->name("setting");
    Route::post('/input_produk', [Admin::class, 'tambah_produk']);
    Route::post('/input_kemasan', [Admin::class, 'tambah_kemasan']);
    Route::post('/input_bahanbaku', [Admin::class, 'tambah_bahanbaku']);
    Route::post('/input_company', [Admin::class, 'tambah_company']);

    //View Belum jadi
    Route::get('/ambilbahanbaku', [Admin::class, 'tampil_ambilbahanbaku']);
    Route::get('/ambilkemasan', [Admin::class, 'tampil_ambilkemasan']);
    Route::get('/ambilprodukjadi', [Admin::class, 'tampil_ambilprodukjadi']);
    Route::get('/bersihdanpakaialat', [Admin::class, 'tampil_bersihdanpakaialat']);
    Route::get('/kemasbatch', [Admin::class, 'tampil_kemasbatch']);
    Route::get('/latihhigidansani', [Admin::class, 'tampil_latihhigidansani']);
    Route::get('/pembersihanalat', [Admin::class, 'tampil_pembersihanalat']);
    Route::get('/pendistribusian', [Admin::class, 'tampil_pendistribusian']);
    Route::get('/penggunaanutama', [Admin::class, 'tampil_penggunaanutama']);
    Route::get('/periksabahanbaku', [Admin::class, 'tampil_periksabahanbaku']);
    Route::get('/periksakemasan', [Admin::class, 'tampil_periksakemasan']);
    Route::get('/periksaproduksijadi', [Admin::class, 'tampil_periksaproduksijadi']);
    Route::get('/programlatih', [Admin::class, 'tampil_programlatih']);
    Route::get('/teraalat', [Admin::class, 'tampil_teraalat']);

    Route::get('/periksapersonil', [Admin::class, 'tampil_periksapersonil']);
    Route::get('/periksasanialat', [Admin::class, 'tampil_periksasanialat']);
    Route::get('/periksasaniruang', [Admin::class, 'tampil_periksasaniruang']);

    //pemilik
    Route::get('/aplicant', [pemilik::class, 'tampil_aplicant']);
    Route::post('/terima', [pemilik::class, 'terima']);
    Route::post('/tolak', [pemilik::class, 'tolak']);
    Route::get('/karyawan', [pemilik::class, 'tampil_karyawan']);

    //super admin
    Route::get('/dashboard', [superadmin::class, 'tampil_dashboard']);
    Route::get('/pabrik', [superadmin::class, 'tampil_pabrik']);
    Route::post('/register_pabrik', [superadmin::class, 'register']);
    Route::get('/protap', [superadmin::class, 'tampil_protap']);

    //yusril
    Route::get('program-dan-pelatihan-higiene-dan-sanitasi', [Admin::class, 'tampil_programpelatihanhigienitasdansanitasi']);
    Route::get('pemusnahan-produk', [Admin::class, 'tampil_pemusnahanproduk']);
    Route::get('penanganan-keluhan', [Admin::class, 'tampil_penanganankeluhan']);
    Route::get('penarikan-produk', [Admin::class, 'tampil_penarikanproduk']);
    Route::get('pendistribusian-produk', [Admin::class, 'tampil_distribusi']);
    Route::get('pengoprasian-alat', [Admin::class, 'tampil_pengorasianalat']);
    Route::get('pelulusan-produk', [Admin::class, 'tampil_pelulusanproduk']);
    Route::get('ambilcontoh', [Admin::class, 'tampil_pengambilancontoh']);
    Route::get('penimbangan', [Admin::class, 'tampil_penimbangan']);
    Route::post('tambah_penimbanganbahan', [Admin::class, 'tambah_penimbanganbahan']);
    Route::post('tambah_penimbanganprodukantara', [Admin::class, 'tambah_penimbanganprodukantara']);
    Route::post('tambah_ruangtimbang', [Admin::class, 'tambah_ruangtimbang']);
    Route::post('tambah_contohbahan', [Admin::class, 'tambah_contohbahan']);
    Route::post('tambah_contohproduk', [Admin::class, 'tambah_contohproduk']);
    Route::post('tambah_contohkemasan', [Admin::class, 'tambah_contohkemasan']);
    Route::post('tambah_pelulusan', [Admin::class, 'tambah_pelulusan']);
    Route::post('tambah_operasialat', [Admin::class, 'tambah_operasialat']);
    Route::post('tambah_pelatihanhiginitas', [Admin::class, 'tambah_pelatihanhiginitas']);
    Route::post('tambah_pemusnahanproduk', [Admin::class, 'tambah_pemusnahanproduk']);
    Route::post('tambah_keluhan', [Admin::class, 'tambah_keluhan']);
    Route::post('tambah_penarikan', [Admin::class, 'tambah_penarikan']);
    Route::post('tambah_distribusi', [Admin::class, 'tambah_distribusi']);
});
