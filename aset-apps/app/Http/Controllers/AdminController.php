<?php

namespace App\Http\Controllers;

use App\Models\Aset;
use App\Models\JenisAset;
use App\Exports\AsetExport;
use App\Imports\AsetImport;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Crypt;

class AdminController extends Controller
{
    
    
    public function beranda(){
        $aset = DB::table('tb_aset')
             ->select(DB::raw('SUM(aset_saldo_perolehan) AS saldo_perolehan, SUM(aset_akm_susut) AS akm_susut, SUM(	aset_nilai_buku) AS nilai_buku'))
             ->get();

        return view('admin/beranda', [
            "is_aktif" => "beranda",
            "judul_navigasi" => "Beranda",
            "data" => $aset
        ]);
    }

    public function getAset(){
        return view('admin/daftar_aset', [
            "is_aktif" => "aset",
            "judul_navigasi" => "Daftar Aset",
            "data" => Aset::all(),
            "jenis_aset" => JenisAset::all()
        ]);
    }


    public function filterAset(Request $request){

        if ($request->jenis_id != '-') {
            $data = DB::table('tb_aset')
                    ->where('aset_gssl_induk', '=', $request->jenis_id)
                    ->get();
        } else {
            $data = DB::table('tb_aset')->get();
            // return redirect('/daftar-aset');
        }
        

        return response()->json($data);
    }


    public function importAset(Request $request) 
    {
        // dd($request->file('file_import'));
        Excel::import(new AsetImport, $request->file('file_import'));
        
        return redirect('/daftar-aset')->with('pesan', 'Data Berhasil Diimport!');
    }

    public function exportAset() 
    {
        
        return new AsetExport();
    
    }

    public function pdf_qr() 
    {
        // dd('ini');
        $pdf = PDF::loadview('export.pdfqr',[
            "data" => Aset::all()
        ]);
        return $pdf->stream();
    
    }


    
    public function tambahAset(){
        return view('admin/tambah_aset', [
            "is_aktif" => "aset",
            "judul_navigasi" => "Tambah Aset",
            "jenis_aset" => JenisAset::all()
        ]);
    }
    
    public function createAset(Request $request){
        
        // return $request->file('aset_foto')->store('foto');

        $data = $request->validate([
            'aset_gssl_induk' => 'required',
            'aset_no_rekening' => 'required|unique:tb_aset,aset_no_rekening',
            'aset_deskripsi' => 'required',
            'aset_qty' => 'required',
            'aset_tgl_perolehan' => 'required',
            'aset_tgl_akhir' => 'required',
            'aset_prs_susut' => 'required',
            'aset_sumber_perolehan' => 'required',
            'aset_saldo_perolehan' => 'required',
            'aset_nilai_buku' => 'required',
            'aset_akm_susut' => 'required',
            'aset_uraian' => 'required',
            'aset_foto' => 'image|file|max:1024'
        ]);

        
        if($request->file('aset_foto')){
            $data['aset_foto'] = $request->file('aset_foto')->store('foto');
        }else{
            $data['aset_foto'] = 'foto/asetDefault.png';
        }

        Aset::create($data);

        $request->session()->flash('pesan', 'Data Berhasil Ditambah');
        return redirect('/daftar-aset');

    }

    public function detailAset(Request $request){
        $aset_id = Crypt::decrypt($request->aset);
        $aset = DB::table('tb_aset')->where('aset_id', $aset_id)->first();
        return view('admin.detail', [
            "data" => $aset,
            "url" => url('detail-aset/'.$request->aset)
        ]);

    }

}
