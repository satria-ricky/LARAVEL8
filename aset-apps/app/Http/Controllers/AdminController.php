<?php

namespace App\Http\Controllers;

use App\Models\Aset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\JenisAset;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    
    
    public function beranda(){
        return view('admin/beranda', [
            "is_aktif" => "beranda",
            "judul_navigasi" => "Beranda"
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
            // $data = DB::table('tb_aset')->get();
            return redirect('/daftar-aset');
        }
        

        return response()->json($data);
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
        $user = DB::table('tb_aset')->where('aset_id', $aset_id)->first();
        dd($user);
    }

}
